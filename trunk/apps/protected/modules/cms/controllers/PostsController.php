<?php
require_once( dirname(__FILE__) . '/../components/helpers.php');

class PostsController extends Controller
{
  public $layout='/layouts/cms';
  
	public function filters(){
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
  
	public function accessRules(){
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index', 'add', 'edit', 'delete', 'upload', 'getmeta'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
  
  protected function beforeAction($action) {
    Yii::app()->params['settings'] = Options::model()->findAll();
    return parent::beforeAction($action);
  }

	public function actionIndex()
	{
    $type = 'post';
    $posts = Posts::model()->findAll('type = :type', array(':type' => $type));
		$this->render('index', array(
      'posts' => $posts,
      'type' => $type,
    ));
	}
  
  public function actionGetMeta(){
    // required parameters
    if(isset($_GET['cat'])){
      $cats = $_GET['cat'];
    }
    
    if(isset($_GET['post_id'])){
      $post_id = $_GET['post_id'];
    }
    
    $cats = explode(',', $cats);
    
    $metas = PostMetas::model()->findAll('meta_key = "rules"');
    $conditions = false;
    
    // check whether rule is the same as post condition
    foreach($metas as $meta){
      $rules = unserialize($meta->meta_value);
      
      // whether category is correct
      if($rules['key'] == 'category'){
      
        foreach($cats as $cat){
          // check condition
          if($rules['condition'] == 'is_equal_to'){
            if($rules['value'] == $cat){
              $conditions = true;
              $post_id = $meta->post_id;
              break;
            }
          }else if($rules['value'] != $cat){
            $conditions = true;
            $post_id = $meta->post_id;
            break;
          }
        }
      }else if($rules['key'] == 'post' || $rules['key'] == 'page'){
        // check condition
        if($rules['condition'] == 'is_equal_to'){
          if($rules['value'] == $post_id){
            $conditions = true;
            break;
          }
        }else if($rules['value'] != $post_id){
          $conditions = true;
          break;
        }
      }
    }
    
    
    // if all conditions are valid
    if($conditions == true){
      $count = PostMetas::model()->find('post_id = :post_id AND meta_key = "field_count"', array(':post_id' => $post_id));
      $count = $count->meta_value;
      
      $arr = array();
      for($a = 1; $a<=$count; $a++){
        $data = PostMetas::model()->find('post_id = :post_id AND meta_key = :meta_key', array(':post_id' => $post_id, ':meta_key' => 'data_'.$a));
        array_push($arr, $data->meta_value);
      }
      echo json_encode($arr);
    }
    
  }
  
  public function actionAdd(){
    $type = 'post';
    $model = new Posts;
    
    $categories = Terms::model()->findAll();
    
    if(isset($_POST['Posts'])){
      $data = $_POST['Posts'];
			$model->attributes = $data;
      $model->author = $_SESSION['user_id'];
      
      if($model->save()){
        $model->url = Helpers::baseurl().'/?p='.$model->id;
        $model->save();
        
        // save post meta
        $meta = new PostMetas;
        $meta->post_id = $model->id;
        $meta->meta_key = 'featured_image';
        $meta->meta_value = $data['featured_image'];
        $meta->save();
      
        if(isset($_POST['Posts']['category'])){
          $cats = explode(',',$data['category']);
          foreach($cats as $cat){
            $term_rel = new TermRelationships;
            $term_rel->post_id = $model->id;
            $term_rel->category_id = $cat;
            $term_rel->save();
          }
        }
      
        if($model->type == 'post'){
          $redirect = 'posts';
        }else{
          $redirect = 'pages';
        }
        
        Yii::app()->user->setFlash('success', 'You have successfully add new post.');
				$this->redirect(array('/admin/'.$redirect.'/index'));
			}
    }
    
		$this->render('add',array(
      'model' => $model,
      'type' => $type,
      'categories' => $categories
		));
  }
  
  public function actionEdit($id){
    $type = 'post';
    $model = Posts::model()->find('id = :id', array(':id' => $id));
    $categories = Terms::model()->findAll();
    $rels = TermRelationships::model()->findAll('post_id = :post_id', array(':post_id' => $id));
    $metas = PostMetas::model()->findAll('post_id = :post_id', array(':post_id' => $id));
    
    if(isset($_POST['Posts'])){
      $data = $_POST['Posts'];
			$model->attributes = $_POST['Posts'];
      $model->author = $_SESSION['user_id'];
      
      if($model->save()){
        if($model->type == 'post'){
          $tmp = 'posts';
        }else{ 
          $tmp = 'pages'; 
        }
        
        // update post meta 
        foreach($metas as $m){
          $m->delete();
        }
        
        $meta = new PostMetas;
        $meta->post_id = $model->id;
        $meta->meta_key = 'featured_image';
        $meta->meta_value = $data['featured_image'];
        $meta->save();
        
        // delete relationships
        foreach($rels as $rel){
          $rel->delete();
        }
        
        if(isset($data['category'])){
          $cats = explode(',',$data['category']);
        
          foreach($cats as $cat){
            $term_rel = new TermRelationships;
            $term_rel->post_id = $model->id;
            $term_rel->category_id = $cat;
            $term_rel->save();
          }
        }
        
        Yii::app()->user->setFlash('success', 'You have successfully edit a post.');
				$this->redirect(array('/admin/'.$tmp.'/index'));
			}
    }
    
    $this->render('edit', array(
      'type' => $type,
      'model' => $model,
      'categories' => $categories,
      'rels' => $rels
    ));
  }
  
  public function actionDelete($id){
    // delete current post
    $model = Posts::model()->find('id = :id', array(':id' => $id));
    if($model->mime_type){
      // delete existing image in storage
      unlink($_SERVER['DOCUMENT_ROOT'].'/protected/modules/cms/assets/uploads/'.$model->title);
    }
    
    $model->delete();
    
    // delete all metas
    $metas = PostMetas::model()->findAll('post_id = :post_id', array(':post_id' => $id));
    if($metas){
      foreach($metas as $meta){
        $meta->delete();
      }
    }

    // delete all relationships
    $term_rels = TermRelationships::model()->findAll('post_id = :post_id', array(':post_id' => $id));
    if($term_rels){
      foreach($term_rels as $rel){
        $rel->delete();
      }
    }
    
    Yii::app()->user->setFlash('success', 'You have successfully delete a '.$model->type.'.');
    
    if($model->type == 'post'){
      $tmp = 'posts';
    }else if($model->type == 'page'){
      $tmp = 'pages';
    }else if($model->type == 'attachment'){
      $tmp = 'media';
    }else if($model->type == 'field'){
      $tmp = 'fields';
    }
    
    $this->redirect(array('/admin/'.$tmp.'/index'));
  }
  
  public function actionUpload(){
    $model = new Posts;
    $model->title = $_POST['name'];
    $model->slug = $_POST['name'];
    $model->url = Helpers::path().'/uploads/'.$_POST['name'];
    $model->type= 'attachment';
    $model->mime_type = Helpers::get_mime_type($_POST['name']);
    $model->author = $_SESSION['user_id'];
    
    if($model->save()){
      include(dirname(__FILE__) . '/../assets/php/upload.php');
    }
  }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
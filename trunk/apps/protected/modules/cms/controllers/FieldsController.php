<?php
require_once( dirname(__FILE__) . '/../components/helpers.php');
class FieldsController extends Controller{
  public $layout='/layouts/cms';
  
  public function filters(){
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
  
	public function accessRules(){
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index', 'add', 'edit', 'delete', 'upload', 'getdatas'),
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
    $posts = Posts::model()->findAll('type = :type', array(':type' => 'field'));
		$this->render('index', array(
      'posts' => $posts
    ));
	}
  
  public function actionAdd(){
    $model = new Posts;
    
    if(isset($_POST['Posts'])){
      $data = $_POST['Posts'];
      $model->author = $_SESSION['user_id'];
      $model->title = $data['title'];
      $model->type = 'field';
      $model->status = 'published';
      $model->slug = 'field_'.Helpers::slugify($data['title']);
      
      if($model->save()){
        $field_datas = $_POST['Field'];
      
        $n = 0;
        foreach($field_datas as $field_data){        
          $n++;
          // add some fields
          $field = new PostMetas;
          $field->post_id = $model->id;
          $field->meta_key = 'data_'.$n;
          
          // array of fields
          $arr_field['label'] = $field_data['label'];
          $arr_field['name'] = $field_data['name'];
          $arr_field['type'] = $field_data['type'];
          $arr_field['instructions'] = $field_data['instructions'];
          $arr_field['required'] = $field_data['required'];
          $arr_field['default'] = $field_data['default'];
          
          $field->meta_value = serialize($arr_field);
          $field->save();
        }
        
        // field count
        $meta = new PostMetas;
        $meta->post_id = $model->id;
        $meta->meta_key = 'field_count';
        $meta->meta_value = $n;
        $meta->save();
        
        // add some rules
        $rule_data = $_POST['Rules'];
        
        $rule = new PostMetas;
        $rule->post_id = $model->id;
        $rule->meta_key = 'rules';
        
        // array of rules
        $arr_rule['key'] = $rule_data['key'];
        $arr_rule['condition'] = $rule_data['condition'];
        $arr_rule['value'] = $rule_data['value'];
        
        $rule->meta_value = serialize($arr_rule);
        $rule->save();
        
        Yii::app()->user->setFlash('success', 'You have successfully add new custom field.');
				$this->redirect(array('/admin/fields/index'));
      }
    }
    
    $this->render('add', array(
      'model' => $model
    ));
  }
  
  public function actionEdit($id){
    $model = Posts::model()->find('id = :id', array(':id' => $id));
    $metas = PostMetas::model()->findAll('post_id = :post_id', array(':post_id' => $model->id));
    
    if(isset($_POST['Posts'])){
      $data = $_POST['Posts'];
      $model->author = $_SESSION['user_id'];
      $model->title = $data['title'];
      $model->type = 'field';
      $model->status = 'published';
      $model->slug = 'field_'.Helpers::slugify($data['title']);
      
      if($model->save()){
        $field_datas = $_POST['Field'];
      
        $n = 0;
        foreach($field_datas as $field_data){
          $n++;
          // edit some fields
          // $field = new PostMetas;
          $field = PostMetas::model()->find('id = :meta_id', array(':meta_id' => $field_data['meta_id']));
          $field->post_id = $model->id;
          $field->meta_key = 'data_'.$n;
          
          // array of fields
          $arr_field['label'] = $field_data['label'];
          $arr_field['name'] = $field_data['name'];
          $arr_field['type'] = $field_data['type'];
          $arr_field['instructions'] = $field_data['instructions'];
          $arr_field['required'] = $field_data['required'];
          $arr_field['default'] = $field_data['default'];
          
          $field->meta_value = serialize($arr_field);
          $field->save();
        }
        
        // field count
        $meta = PostMetas::model()->find('post_id = :post_id AND meta_key = "field_count"', array(':post_id' => $id));
        $meta->post_id = $model->id;
        $meta->meta_key = 'field_count';
        $meta->meta_value = $n;
        $meta->save();
        
        // add some rules
        $rule_data = $_POST['Rules'];
        
        $rule = PostMetas::model()->find('post_id = :post_id AND meta_key = "rules"', array(':post_id' => $id));
        $rule->post_id = $model->id;
        $rule->meta_key = 'rules';
        
        // array of rules
        $arr_rule['key'] = $rule_data['key'];
        $arr_rule['condition'] = $rule_data['condition'];
        $arr_rule['value'] = $rule_data['value'];
        
        $rule->meta_value = serialize($arr_rule);
        $rule->save();
        
        Yii::app()->user->setFlash('success', 'You have successfully edit a custom field.');
				$this->redirect(array('/admin/fields/index'));
      }
    }
    
    $this->render('edit', array(
      'model' => $model,
      'metas' => $metas
    ));
  }
  
  public function actionGetDatas(){
    $type = $_GET['type'];
  
    if($type == 'post'){
      $datas = Posts::model()->findAll('type = :type', array(':type' => 'post'));
    }else if($type == 'page'){
      $datas = Posts::model()->findAll('type = :type', array(':type' => 'page'));
    }else if($type == 'category'){
      $datas = Terms::model()->findAll();
    }
    
    $arr = array();
    foreach($datas as $data){
      array_push($arr, $data->attributes);
    }
    echo json_encode($arr);
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
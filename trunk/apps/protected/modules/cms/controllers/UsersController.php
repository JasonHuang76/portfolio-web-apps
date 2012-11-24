<?php
require_once( dirname(__FILE__) . '/../components/helpers.php');

class UsersController extends Controller
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
				'actions'=>array('index', 'add', 'edit', 'delete'),
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
    $posts = Users::model()->findAll();
    // $user = UserMetas::model()->find('user_id = :user_id && meta_key = :meta_key', array(':user_id' => 1, ':meta_key' => 'user_role'));
    
    // print_r($user->attributes);
    // exit;
    
		$this->render('index', array(
      'posts' => $posts
    ));
	}
  
  public function actionEdit($id){
    $model = Users::model()->find('id = :id', array(':id' => $id));
    
    if(isset($_POST['Users'])){
      $data = $_POST['Users'];
      $model->attributes = $data;
      
      if($model->save()){
        Yii::app()->user->setFlash('success', 'You have successfully add new user.');
				$this->redirect(array('/admin/users/index'));
      }
    }
    
    $this->render('edit', array(
      'model' => $model
    ));
  }
  
  public function actionAdd(){
    $model = new Users;
    
    if(isset($_POST['Users'])){
      $data = $_POST['Users'];
      $model->attributes = $data;
      $model->password = md5($data['password']);
      
      if($model->save()){
        // save user additional info
        $user_meta = new UserMetas;
        $user_meta->user_id = $model->id;
        $user_meta->meta_key = 'user_role';
        $user_meta->meta_value = $data['role'];
        $user_meta->save();
        
        $user_meta = new UserMetas;
        $user_meta->user_id = $model->id;
        $user_meta->meta_key = 'firstname';
        $user_meta->meta_value = $data['firstname'];
        $user_meta->save();
        
        $user_meta = new UserMetas;
        $user_meta->user_id = $model->id;
        $user_meta->meta_key = 'lastname';
        $user_meta->meta_value = $data['lastname'];
        $user_meta->save();
      
        Yii::app()->user->setFlash('success', 'You have successfully add new user.');
				$this->redirect(array('/admin/users/index'));
      }
    }
    
    $this->render('add', array(
      'model' => $model
    ));
  }
  
  public function actionDelete($id){
    $post = Users::model()->find('id = :id', array(':id' => $id));
    
    // delete all metas
    $metas = UserMetas::model()->findAll('user_id = :user_id', array(':user_id' => $id));
    if($metas){
      foreach($metas as $meta){
        $meta->delete();
      }
    }
    
    $post->delete();
    
    Yii::app()->user->setFlash('success', 'You have successfully delete a user.');
    $this->redirect(array('/admin/users/index'));
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
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
				'actions'=>array('index', 'add', 'edit', 'delete', 'upload', 'getposts'),
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
    $posts = Posts::model()->findAll('type = :type', array(':type' => 'custom_field'));
		$this->render('index', array(
      'posts' => $posts
    ));
	}
  
  public function actionAdd(){
    $model = new Posts;
    $this->render('add', array(
      'model' => $model
    ));
  }
  
  public function actionGetPosts(){
    $type = $_GET['type'];
  
    if($type == 'post'){
      $args = array(
        
      );
      return Helpers::get_posts($args);
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
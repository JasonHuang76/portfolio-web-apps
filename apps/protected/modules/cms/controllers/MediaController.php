<?php
require_once( dirname(__FILE__) . '/../components/helpers.php');

class MediaController extends Controller
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
				'actions'=>array('index', 'sidebar'),
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
  
  public function actionSidebar(){
    $this->layout = 'no';
    $models = Posts::model()->findAll('type = :type', array(':type' => 'attachment'));
    $this->render('sidebar', array(
      'models' => $models
    ));
  }

	public function actionIndex()
	{
    $models = Posts::model()->findAll('type = :type', array(':type' => 'attachment'));
		$this->render('index', array(
      'models' => $models
    ));
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
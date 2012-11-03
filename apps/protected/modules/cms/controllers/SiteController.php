<?php
require_once( dirname(__FILE__) . '/../components/cms.php');

class SiteController extends Controller
{
  public $layout='/layouts/cms';
  
	// public function filters(){
		// return array(
			// 'accessControl', // perform access control for CRUD operations
		// );
	// }
  
	// public function accessRules(){
		// return array(
			// array('allow',  // allow all users to perform 'index' and 'view' actions
				// 'actions'=>array('login, logout, error'),
				// 'users'=>array('*'),
			// ),
			// array('allow', // allow authenticated user to perform 'create' and 'update' actions
				// 'actions'=>array('index'),
				// 'users'=>array('@'),
			// ),
			// array('allow', // allow admin user to perform 'admin' and 'delete' actions
				// 'actions'=>array('admin','delete'),
				// 'users'=>array('admin'),
			// ),
			// array('deny',  // deny all users
				// 'users'=>array('*'),
			// ),
		// );
	// }
  
  public function actionError(){
    
  }
  
	public function actionIndex()
	{
		$this->render('index');
	}
  
  public function actionLogin(){
    $this->layout = 'no';
    
    $model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect('index');
		}
		// display the login form
		$this->render('login',array('model'=>$model));
  }
  
  public function actionLogout() {
    Yii::app()->user->logout(false);
    $this->redirect(Yii::app()->getModule('cms')->user->loginUrl);
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
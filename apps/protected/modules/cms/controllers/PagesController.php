<?php
require_once( dirname(__FILE__) . '/../components/cms.php');

class PagesController extends Controller
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
				'actions'=>array('index', 'add'),
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
    $type = 'page';
    $posts = Posts::model()->findAll('type = :type', array(':type' => $type));
		$this->render('/posts/index', array(
      'posts' => $posts,
      'type' => $type,
    ));
	}
  
  public function actionAdd(){
    $type = 'page';
    $model = new Posts;
    
    if(isset($_POST['Posts'])){
			$model->attributes = $_POST['Posts'];
      
      if($model->save()){
        Yii::app()->user->setFlash('success', 'You have successfully add new page.');
				$this->redirect(array('index'));
			}
    }
    
		$this->render('/posts/add',array(
      'model' => $model,
      'type' => $type,
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
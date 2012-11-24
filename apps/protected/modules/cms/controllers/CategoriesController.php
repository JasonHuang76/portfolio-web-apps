<?php
require_once( dirname(__FILE__) . '/../components/helpers.php');

class CategoriesController extends Controller
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
				'actions'=>array('index', 'add', 'delete'),
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
  
  public function actionDelete(){
    if(isset($_POST['cat'])){
      $datas = $_POST['cat'];
      
      foreach($datas as $data){
        $cat = Terms::model()->find('id = :id', array(':id' => $data));
        $cat_rel = TermTaxonomy::model()->find('term_id = :term_id', array(':term_id' => $data));
        $cat->delete();
        
        if($cat_rel){
          $cat_rel->delete();
        }
      }
      
      Yii::app()->user->setFlash('success', 'You have successfully delete a category.');
    }
    $this->redirect('index');
  }

	public function actionIndex()
	{
    $terms = Terms::model()->findAll();
    $term = new Terms;
		$this->render('index', array(
      'terms' => $terms,
      'term' => $term
    ));
	}
  
  public function actionAdd(){
    if(isset($_POST['Terms'])){
      $term = new Terms;
      $term->attributes = $_POST['Terms'];
      
      if($term->save()){
        if(isset($term->parent)){
          $taxonomy = new TermTaxonomy;
          $taxonomy->term_id = $term->id;
          $taxonomy->taxonomy = 'category';
          $taxonomy->parent = $term->parent;
          
          if($taxonomy->save()){
            echo 'true';
          }else{
            echo 'false';
          }
        }else{
          echo 'true';
        }
      }else{
        echo 'false';
      }
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
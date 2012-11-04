<?php
class CmsModule extends CWebModule
{
  public $settings;

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'cms.models.*',
			'cms.components.*',
		));
    
    // for user login
    $this->setComponents(array(
      'errorHandler' => array(
        'errorAction' => 'cms/site/error'
      ),
      'user' => array(
        'class' => 'CWebUser',             
        'allowAutoLogin'=>true,
        'loginUrl' => Yii::app()->createUrl('admin/login'),
      ),
    ));
 
    Yii::app()->user->setStateKeyPrefix('_cms');
    // Yii::app()->homeUrl = "site/index";
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
      
			$route = $controller->id . '/' . $action->id;
      $publicPages = array(
          'site/login',
          'site/error',
      );
      if (Yii::app()->user->isGuest && !in_array($route, $publicPages)){            
          Yii::app()->getModule('cms')->user->loginRequired();                
      }
      else
          return true;
		}
		else
			return false;
	}
}

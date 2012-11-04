<?php
  class Helpers{
    public static function register($file)
    {
        $url = Yii::app()->getAssetManager()->publish(
        Yii::getPathOfAlias('application.modules.cms.assets'));

        $path = $url . '/' . $file;
        if(strpos($file, 'js') !== false)
            return Yii::app()->clientScript->registerScriptFile($path);
        else if(strpos($file, 'css') !== false)
            return Yii::app()->clientScript->registerCssFile($path);

        return $path;
    }
    
    public static function path(){
      $url = Yii::app()->getAssetManager()->publish(
      Yii::getPathOfAlias('application.modules.cms.assets'));
      return $url;
    }
    
    public static function baseurl($url=null)
    {
      static $baseUrl;
      if ($baseUrl===null)
          $baseUrl=Yii::app()->getRequest()->getBaseUrl();
      return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
    }
  }
?>
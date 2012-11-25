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
    
    // public static function module_path(){
      // return Yii::app()->getModule('cms')->getBaseUrl();
    // }
    
    public static function baseurl($url=null)
    {
      static $baseUrl;
      if ($baseUrl===null)
          $baseUrl=Yii::app()->getRequest()->getBaseUrl();
      return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
    }
    
    public static function get_mime_type($file)
    {

      // our list of mime types
      $mime_types = array(
        "pdf"=>"application/pdf"
        ,"exe"=>"application/octet-stream"
        ,"zip"=>"application/zip"
        ,"docx"=>"application/msword"
        ,"doc"=>"application/msword"
        ,"xls"=>"application/vnd.ms-excel"
        ,"ppt"=>"application/vnd.ms-powerpoint"
        ,"gif"=>"image/gif"
        ,"png"=>"image/png"
        ,"jpeg"=>"image/jpg"
        ,"jpg"=>"image/jpg"
        ,"mp3"=>"audio/mpeg"
        ,"wav"=>"audio/x-wav"
        ,"mpeg"=>"video/mpeg"
        ,"mpg"=>"video/mpeg"
        ,"mpe"=>"video/mpeg"
        ,"mov"=>"video/quicktime"
        ,"avi"=>"video/x-msvideo"
        ,"3gp"=>"video/3gpp"
        ,"css"=>"text/css"
        ,"jsc"=>"application/javascript"
        ,"js"=>"application/javascript"
        ,"php"=>"text/html"
        ,"htm"=>"text/html"
        ,"html"=>"text/html"
      );

      $file = explode('.',$file);
      $count = count($file);
      
      $extension = strtolower($file[$count-1]);
      return $mime_types[$extension];
    }
    
    // CMS FUNCTIONS
    // ---------------------------------------------------
    public static function get_post($args){
      $args = array(
        'id' => (isset($args['id'])) ? $args['id'] : '',
        'numberposts' => (isset($args['numberposts'])) ? $args['numberposts'] : '-1',
        'type' => (isset($args['type'])) ? $args['type'] : 'post',
      );
      
      $posts = Posts::model()->find('id = :id', array(':id' => $args['id']));
      
      if(isset($posts)){
        return $posts->attributes;
      }else{
        return false;
      }
    }
    
    public static function get_posts($args){
      $args = array(
        'category' => (isset($args['category'])) ? $args['category'] : '',
        'numberposts' => (isset($args['numberposts'])) ? $args['numberposts'] : '-1',
        'type' => (isset($args['type'])) ? $args['type'] : 'post',
      );
      
      // if category is supplied, then get all posts from specified category
      if($args['category'] != ''){
        $posts = Posts::model()->findAll('id = :id', array(':id' => $args['id']));
      }
      // instead, get all posts
      else{
        $posts = Posts::model()->findAll();
      }
      
      return $posts;
    }
    
    public static function get_categories($args){
      $args = array(
        'parent' => (isset($args['parent'])) ? $args['parent'] : '',
      );
      
      $return_array = array();
      
      // if parent is supplied, then get all specified categories
      if($args['parent'] != ''){
        $taxo_array = array();
        $taxo = TermTaxonomy::model()->findAll('parent = :parent', array(':parent' => $args['parent']));
        
        $categories = Terms::model()->findAll();
      }
      // instead, get all categories
      else{
        $categories = Terms::model()->findAll();
      }
      
      return $categories;
    }
    
    public static function get_meta($args){
      $args = array(
        'post_id' => (isset($args['post_id'])) ? $args['post_id'] : '',   // post_id or user_id
        'meta' => (isset($args['meta'])) ? $args['meta'] : '',            // 
        'type' => (isset($args['type'])) ? $args['type'] : 'posts',       // posts, users
      );
      
      if($args['type'] == 'posts'){
        $meta = PostMetas::model()->find('post_id = :post_id && meta_key = :meta_key', array(':post_id' => $args['post_id'], ':meta_key' => $args['meta']));
      }else if($args['type'] == 'users'){
        $meta = UserMetas::model()->find('user_id = :user_id && meta_key = :meta_key', array(':user_id' => $args['post_id'], ':meta_key' => $args['meta']));
        // print_r($meta);
      }
      
      if($meta){
        return $meta->attributes;
      }else{
        return false;
      }
    }
  }
?>
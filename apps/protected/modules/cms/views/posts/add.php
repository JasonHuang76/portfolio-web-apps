<script>
  $(document).ready(function(){
    $('#nav_<?php 
      switch($type){
        case 'page': echo 'pages';
          break;
        default: echo 'posts';
          break;
      }
    ?>').addClass('active');
  });
</script>

<div id="content">
  <div class="contentTop">
    <span class="pageTitle"><span class="icon-screen"></span><?php 
      switch($type){
        case 'page': echo 'Pages';
          break;
        default: echo 'Posts';
          break;
      }
    ?></span>
    <div class="clear"></div>
  </div>
  <!-- Breadcrumbs line -->
  <div class="breadLine">
    <div class="bc">
      <ul id="breadcrumbs" class="breadcrumbs">
        <li><a href="#">Dashboard</a></li>
        <li>
          <a href="<?php echo Helpers::baseurl(); ?>/admin/<?php 
            switch($type){
              case 'page': echo 'pages';
                break;
              default: echo 'posts';
                break;
            }
          ?>/"><?php 
            switch($type){
              case 'page': echo 'Pages';
                break;
              default: echo 'Posts';
                break;
            }
          ?></a>
        </li>
        <li class="current"><a href="#" title="">Add</a></li>
      </ul>
    </div>
  </div>
      
  <!-- Main content -->
  <div class="wrapper">
    <?php
      $form = $this->beginWidget('CActiveForm', array(
        'id' => 'validate',
        'action' => Helpers::baseurl('admin/posts/add'),
        'htmlOptions' => array(
          'class' => 'main',
        ),
      ));
    ?>
    <?php echo $this->renderPartial('/partials/required_form', array('model' => $model, 'type' => $type, 'form' => $form, 'categories' => $categories)); ?>
    <?php $this->endWidget(); ?>
  </div>
  
</div>
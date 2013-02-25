<script>
  $(document).ready(function(){
    $('#nav_fields').addClass('active');
  });
</script>

<div id="content">
  <div class="contentTop">
    <span class="pageTitle"><span class="icon-screen"></span><?php echo $model->title ?> Field Group</span>
    <div class="clear"></div>
  </div>
  <!-- Breadcrumbs line -->
  <div class="breadLine">
    <div class="bc">
      <ul id="breadcrumbs" class="breadcrumbs">
        <li><a href="#">Dashboard</a></li>
        <li>
          <a href="<?php echo Helpers::baseurl(); ?>/admin/fields">Fields</a>
        </li>
        <li class="current"><a href="#" title="">Edit</a></li>
      </ul>
    </div>
  </div>
      
  <!-- Main content -->
  <div class="wrapper">
    <?php
      $form = $this->beginWidget('CActiveForm', array(
        'id' => 'validate',
        'action' => Helpers::baseurl('admin/fields/edit/'.$model->id),
        'htmlOptions' => array(
          'class' => 'main',
        ),
      ));
    ?>
    <?php echo $this->renderPartial('_form', array('model' => $model, 'form' => $form)); ?>
    <?php $this->endWidget(); ?>
  </div>
  
</div>
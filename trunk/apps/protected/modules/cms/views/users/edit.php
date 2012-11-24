<script>
  $(document).ready(function(){
    $('#nav_users').addClass('active');
    
    $('#Users_password').keyup(function(){
      if($(this).val() != ''){
        $('#pass').hide();
      }else{
        $('#pass').show();
      }
    });
  });
</script>

<div id="content">
  <div class="contentTop">
    <span class="pageTitle"><span class="icon-screen"></span>Users</span>
    <div class="clear"></div>
  </div>
  <!-- Breadcrumbs line -->
  <div class="breadLine">
    <div class="bc">
      <ul id="breadcrumbs" class="breadcrumbs">
        <li><a href="#">Dashboard</a></li>
        <li>
          <a href="<?php echo Helpers::baseurl(); ?>/admin/users/">Users</a>
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
        'action' => Helpers::baseurl('admin/users/add'),
        'htmlOptions' => array(
          'class' => 'main',
        ),
      ));
    ?>
    
    <?php echo $this->renderPartial('_form', array('model' => $model, 'form' => $form)); ?>
    
    <?php $this->endWidget(); ?>
  </div>
  
</div>
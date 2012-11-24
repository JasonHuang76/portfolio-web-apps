<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>CMS EYESIMPLE</title>

<link href="<?php Helpers::register('css/styles.css'); ?>" rel="stylesheet" type="text/css" />
<!--[if IE]> <link href="<?php Helpers::register('css/ie.css'); ?>" rel="stylesheet" type="text/css"> <![endif]-->

<script type="text/javascript" src="<?php Helpers::register('js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/ui.spinner.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.mousewheel.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/jquery-ui.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/charts/excanvas.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/charts/jquery.flot.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/charts/jquery.flot.orderBars.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/charts/jquery.flot.pie.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/charts/jquery.flot.resize.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/charts/jquery.sparkline.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/tables/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/tables/jquery.sortable.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/tables/jquery.resizable.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/autogrowtextarea.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.uniform.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.inputlimiter.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.tagsinput.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.maskedinput.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.autotab.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.chosen.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.dualListBox.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.cleditor.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.ibutton.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.validationEngine-en.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/forms/jquery.validationEngine.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/uploader/plupload.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/uploader/plupload.html4.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/uploader/plupload.html5.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/uploader/jquery.plupload.queue.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/wizards/jquery.form.wizard.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/wizards/jquery.validate.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/wizards/jquery.form.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.collapsible.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.breadcrumbs.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.tipsy.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.progress.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.timeentry.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.colorpicker.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.jgrowl.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.fancybox.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.fileTree.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.sourcerer.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/others/jquery.fullcalendar.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/others/jquery.elfinder.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/plugins/ui/jquery.easytabs.min.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/files/bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/files/login.js'); ?>"></script>
<script type="text/javascript" src="<?php Helpers::register('js/files/functions.js'); ?>"></script>

</head>

<body>

<!-- Top line begins -->
<div id="top">
	<div class="wrapper">
    	<a href="#" title="" class="logo"><img src="<?php echo Helpers::baseurl(); ?>/images/logo.png" alt="" /></a>
        
        <!-- Right top nav -->
        <div class="topNav">
            <ul class="userNav">
                <li><a href="<?php echo Helpers::baseurl() ?>/" title="" class="logout"></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- Top line ends -->


<!-- Login wrapper begins -->
<div class="loginWrapper">
    
    <!-- New user form -->
    <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'login',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
      // 'action' => Helpers::baseurl('admin/sessions/create'),
    )); ?>
        <div class="loginPic">
            <a href="#" title=""><img src="<?php echo Helpers::path(); ?>/images/userLogin2.png" alt="" /></a>
            <div class="loginActions">
                <div><a href="#" title="Forgot password?" class="logright"></a></div>
            </div>
        </div>
            
        <?php echo $form->textField($model, 'username', array('class' => 'loginUsername', 'id' => 'username', 'placeholder' => 'Your username')); ?>
        <?php echo $form->passwordField($model, 'password', array('class' => 'loginPassword', 'placeholder' => 'Password')); ?>
        
        <div class="logControl">
            <div class="memory"><input type="checkbox" checked="checked" class="check" id="remember2" /><label for="remember2">Remember me</label></div>
            <input type="submit" name="submit" value="Login" class="buttonM bBlue" />
        </div>
    <?php $this->endWidget(); ?>

</div>
<!-- Login wrapper ends -->

</body>
</html>
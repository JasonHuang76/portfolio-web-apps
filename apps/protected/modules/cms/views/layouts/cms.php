<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>CMS EYESIMPLE</title>

<?php Helpers::register('css/styles.css'); ?>
<!--[if IE]> <?php Helpers::register('css/ie.css'); ?> <![endif]-->

<?php Helpers::register('js/jquery.min.js'); ?>
<?php Helpers::register('js/plugins/forms/ui.spinner.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.mousewheel.js'); ?>
<?php Helpers::register('js/jquery-ui.min.js'); ?>
<?php Helpers::register('js/plugins/charts/excanvas.min.js'); ?>
<?php //Helpers::register('js/plugins/charts/jquery.flot.js'); ?>
<?php //Helpers::register('js/plugins/charts/jquery.flot.orderBars.js'); ?>
<?php //Helpers::register('js/plugins/charts/jquery.flot.pie.js'); ?>
<?php //Helpers::register('js/plugins/charts/jquery.flot.resize.js'); ?>
<?php Helpers::register('js/plugins/charts/jquery.sparkline.min.js'); ?>
<?php Helpers::register('js/plugins/tables/jquery.dataTables.js'); ?>
<?php Helpers::register('js/plugins/tables/jquery.sortable.js'); ?>
<?php Helpers::register('js/plugins/tables/jquery.resizable.js'); ?>
<?php Helpers::register('js/plugins/forms/autogrowtextarea.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.uniform.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.inputlimiter.min.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.tagsinput.min.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.maskedinput.min.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.autotab.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.chosen.min.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.dualListBox.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.cleditor.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.ibutton.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.validationEngine-en.js'); ?>
<?php Helpers::register('js/plugins/forms/jquery.validationEngine.js'); ?>
<?php Helpers::register('js/plugins/uploader/plupload.js'); ?>
<?php Helpers::register('js/plugins/uploader/plupload.html4.js'); ?>
<?php Helpers::register('js/plugins/uploader/plupload.html5.js'); ?>
<?php Helpers::register('js/plugins/uploader/jquery.plupload.queue.js'); ?>
<?php Helpers::register('js/plugins/wizards/jquery.form.wizard.js'); ?>
<?php Helpers::register('js/plugins/wizards/jquery.validate.js'); ?>
<?php Helpers::register('js/plugins/wizards/jquery.form.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.collapsible.min.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.breadcrumbs.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.tipsy.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.progress.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.timeentry.min.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.colorpicker.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.jgrowl.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.fancybox.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.fileTree.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.sourcerer.js'); ?>
<?php Helpers::register('js/plugins/others/jquery.fullcalendar.js'); ?>
<?php Helpers::register('js/plugins/others/jquery.elfinder.js'); ?>
<?php Helpers::register('js/plugins/ui/jquery.easytabs.min.js'); ?>
<?php Helpers::register('js/jquery.slug.js'); ?>
<?php Helpers::register('js/files/bootstrap.js'); ?>
<?php Helpers::register('js/files/login.js'); ?>
<?php Helpers::register('js/files/functions.js'); ?>
<?php //Helpers::register('js/charts/chart.js'); ?>
<?php //Helpers::register('js/charts/hBar_side.js'); ?>

</head>

<script>
  $(document).ready(function(){
    // slug
    $('#title').slug({
      hide: false
    });
  });
</script>

<body>

<!-- Top line begins -->
<div id="top">
    <div class="wrapper">
        <a href="index.html" title="" class="logo"><img src="<?php echo Helpers::baseurl() ?>/images/logo.png" alt="" /></a>
        
        <!-- Right top nav -->
        <div class="topNav">
            <ul class="userNav">
                <li><a title="" class="search"></a></li>
                <li><a href="#" title="" class="settings"></a></li>
                <li><a href="<?php echo Helpers::baseurl(); ?>/admin/logout" title="" class="logout"></a></li>
                <li class="showTabletP"><a href="#" title="" class="sidebar"></a></li>
            </ul>
            <a title="" class="iButton"></a>
            <a title="" class="iTop"></a>
            <div class="topSearch">
                <div class="topDropArrow"></div>
                <form action="">
                    <input type="text" placeholder="search..." name="topSearch" />
                    <input type="submit" value="" />
                </form>
            </div>
        </div>
        
        <!-- Responsive nav -->
        <ul class="altMenu">
            <li><a href="index.html" title="">Dashboard</a></li>
            <li><a href="ui.html" title="" class="exp" id="current">UI elements</a>
                <ul>
                    <li><a href="ui.html">General elements</a></li>
                    <li><a href="ui_icons.html">Icons</a></li>
                    <li><a href="ui_buttons.html">Button sets</a></li>
                    <li><a href="ui_grid.html" class="active">Grid</a></li>
                    <li><a href="ui_custom.html">Custom elements</a></li>
                    <li><a href="ui_experimental.html">Experimental</a></li>
                </ul>
            </li>
            <li><a href="forms.html" title="" class="exp">Forms stuff</a>
                <ul>
                    <li><a href="forms.html">Inputs &amp; elements</a></li>
                    <li><a href="form_validation.html">Validation</a></li>
                    <li><a href="form_editor.html">File uploads &amp; editor</a></li>
                    <li><a href="form_wizards.html">Form wizards</a></li>
                </ul>
            </li>
            <li><a href="messages.html" title="">Messages</a></li>
            <li><a href="statistics.html" title="">Statistics</a></li>
            <li><a href="tables.html" title="" class="exp">Tables</a>
                <ul>
                    <li><a href="tables.html">Standard tables</a></li>
                    <li><a href="tables_dynamic.html">Dynamic tables</a></li>
                    <li><a href="tables_control.html">Tables with control</a></li>
                    <li><a href="tables_sortable.html">Sortable &amp; resizable</a></li>
                </ul>
            </li>
            <li><a href="other_calendar.html" title="" class="exp">Other pages</a>
                <ul>
                    <li><a href="other_calendar.html">Calendar</a></li>
                    <li><a href="other_gallery.html">Images gallery</a></li>
                    <li><a href="other_file_manager.html">File manager</a></li>
                    <li><a href="other_404.html">Sample error page</a></li>
                    <li><a href="other_typography.html">Typography</a></li>
                </ul>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<!-- Top line ends -->


<!-- Sidebar begins -->
<div id="sidebar">
    <div class="mainNav">
        <!-- Responsive nav -->
        <div class="altNav">
            <div class="userSearch">
                <form action="">
                    <input type="text" placeholder="search..." name="userSearch" />
                    <input type="submit" value="" />
                </form>
            </div>
            
            <!-- User nav -->
            <ul class="userNav">
                <li><a href="#" title="" class="profile"></a></li>
                <li><a href="#" title="" class="messages"></a></li>
                <li><a href="#" title="" class="settings"></a></li>
                <li><a href="#" title="" class="logout"></a></li>
            </ul>
        </div>
        
        <!-- Main nav -->
        <ul class="nav">
            <li><a id="nav_dashboard" href="<?php echo Helpers::baseurl(); ?>/admin" title=""><img src="<?php echo Helpers::path() ?>/images/icons/mainnav/dashboard.png" alt="" /><span>Dashboard</span></a></li>
            <li><a id="nav_pages" href="<?php echo Helpers::baseurl(); ?>/admin/pages" title=""><img src="<?php echo Helpers::path() ?>/images/icons/mainnav/forms.png" alt="" /><span>Pages</span></a></li>
            <li><a id="nav_categories" href="<?php echo Helpers::baseurl(); ?>/admin/categories" title=""><img src="<?php echo Helpers::path() ?>/images/icons/mainnav/statistics.png" alt="" /><span>Categories</span></a></li>
            <li><a id="nav_posts" href="<?php echo Helpers::baseurl(); ?>/admin/posts" title=""><img src="<?php echo Helpers::path() ?>/images/icons/mainnav/forms.png" alt="" /><span>Posts</span></a></li>
            <li><a id="nav_settings" href="<?php echo Helpers::baseurl(); ?>/admin/settings" title=""><img src="<?php echo Helpers::path() ?>/images/icons/mainnav/tables.png" alt="" /><span>Settings</span></a></li>
            <li><a id="nav_users" href="<?php echo Helpers::baseurl(); ?>/admin/users" title=""><img src="<?php echo Helpers::path() ?>/images/icons/mainnav/ui.png" alt="" /><span>Users</span></a></li>
            <li><a id="nav_media" href="<?php echo Helpers::baseurl(); ?>/admin/media" title=""><img src="<?php echo Helpers::path() ?>/images/icons/mainnav/forms.png" alt="" /><span>Media Library</span></a></li>
            <li><a id="nav_comments" href="<?php echo Helpers::baseurl(); ?>/admin/comments" title=""><img src="<?php echo Helpers::path() ?>/images/icons/mainnav/forms.png" alt="" /><span>Comments</span></a></li>
        </ul>
    </div>
    
</div>
<!-- Sidebar ends -->

<?php echo $content; ?>
    
<!-- Content ends -->

</body>
</html>
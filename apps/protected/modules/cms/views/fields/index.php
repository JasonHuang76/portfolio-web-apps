<script>
  $(document).ready(function(){
    $('#nav_fields').addClass('active');
  });
</script>

<div id="content">
  <div class="contentTop">
    <span class="pageTitle"><span class="icon-screen"></span>Field Groups</span>
    
    <a href="<?php echo Helpers::baseurl(); ?>/admin/fields/add" class="buttonS bGreen btn-add">
      <span class="icol-add"></span>
      <span>Add New</span>
    </a>
    <div class="clear"></div>
</div>
<!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="#">Dashboard</a></li>
                <li class="current">
                  <a href="#" title="">Fields</a>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
    
    <?php echo $this->renderPartial('/partials/notif'); ?>
    
<!-- Table with opened toolbar -->
<div class="widget">
    <div class="whead"><h6>All Fields</h6><div class="clear"></div></div>
    <div id="dyn2" class="shownpars">
        <a class="tOptions act" title="Options"><img src="<?php echo Helpers::path(); ?>/images/icons/options.png" alt="" /></a>
        <table cellpadding="0" cellspacing="0" border="0" class="dTable">
        <thead>
          <tr>
            <th>Group Name<span class="sorting" style="display: block;"></span></th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($posts as $post){ ?>
          <tr>
            <td class="center"><a href="<?php echo Helpers::baseurl() ?>/admin/fields/edit/<?php echo $post->id ?>"><?php echo $post->title; ?></a></td>
            <td class="center"><?php echo $post->created_at; ?></td>
            <td class="center">
              <a href="<?php echo Helpers::baseurl() ?>/admin/fields/edit/<?php echo $post->id ?>" class="tablectrl_small bGreyish tipS" title="Edit"><span class="iconb" data-icon="&#xe1db;"></span></a>
              <a href="<?php echo Helpers::baseurl() ?>/admin/posts/delete/<?php echo $post->id ?>" class="tablectrl_small bRed tipS" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
        </table> 
    </div>
    <div class="clear"></div> 
</div>

</div>
</div>
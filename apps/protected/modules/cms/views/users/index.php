<script>
  $(document).ready(function(){
    $('#nav_users').addClass('active');
  });
</script>

<div id="content">
  <div class="contentTop">
    <span class="pageTitle"><span class="icon-screen"></span>Users</span>
    
    <a href="<?php echo Helpers::baseurl(); ?>/admin/users/add" class="buttonS bGreen btn-add">
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
                <a href="#" title="">Users</a>
              </li>
          </ul>
      </div>
  </div>
    
  <!-- Main content -->
  <div class="wrapper"> 
  <?php echo $this->renderPartial('/partials/notif'); ?>  
  
  <div class="widget">
    <div class="whead"><h6>All Users</h6><div class="clear"></div></div>
      <div id="dyn2" class="shownpars">
          <a class="tOptions act" title="Options"><img src="<?php echo Helpers::path(); ?>/images/icons/options.png" alt="" /></a>
          <table cellpadding="0" cellspacing="0" border="0" class="dTable">
          <thead>
            <tr>
              <th>Email<span class="sorting" style="display: block;"></span></th>
              <th>Nickname</th>
              <th>Roles</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($posts as $post){ ?>
            <tr>
              <td class="center"><a href="<?php echo Helpers::baseurl() ?>/admin/users/edit/<?php echo $post->id ?>"><?php echo $post->email; ?></a></td>
              <td class="center"><?php echo $post->nickname; ?></td>
              <td class="center"><?php 
                $args = array(
                  'post_id' => $post->id,
                  'meta' => 'user_role',
                  'type' => 'users'
                );
                $data = Helpers::get_meta($args);
                echo $data['meta_value'];
              ?></td>
              <td class="center">
                <a href="<?php echo Helpers::baseurl() ?>/admin/users/edit/<?php echo $post->id ?>" class="tablectrl_small bGreyish tipS" title="Edit"><span class="iconb" data-icon="&#xe1db;"></span></a>
                <a href="<?php echo Helpers::baseurl() ?>/admin/users/delete/<?php echo $post->id ?>" class="tablectrl_small bRed tipS" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a>
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
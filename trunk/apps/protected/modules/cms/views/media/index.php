<script>
  $(document).ready(function(){
    $('#nav_media').addClass('active');
    
    $("#uploader").pluploadQueue({
      runtimes : 'html5,html4',
      url : '<?php echo Helpers::baseurl().'/admin/posts/upload' ?>',
      max_file_size : '1000kb',
      unique_names : true,
      filters : [
        {title : "Image files", extensions : "jpg,gif,png"},
      ]
    });
  });
</script>

<div id="content">
  <div class="contentTop">
    <span class="pageTitle"><span class="icon-screen"></span>Media Library</span>
  </div>
  <!-- Breadcrumbs line -->
  <div class="breadLine">
      <div class="bc">
          <ul id="breadcrumbs" class="breadcrumbs">
              <li><a href="#">Dashboard</a></li>
              <li class="current">
                <a href="#" title="">Media Library</a>
              </li>
          </ul>
      </div>
  </div>
    
  <!-- Main content -->
  <div class="wrapper"> 
    <?php echo $this->renderPartial('/partials/notif'); ?>  
  
    <div id="uploader_container" class="widget">    
        <div class="whead"><h6>Upload new media</h6><div class="clear"></div></div>
        <div id="uploader">You browser doesn't have HTML 4 support.</div>                    
    </div>
    
    <div class="widget">
      <div class="whead"><h6>Media Lists</h6><div class="clear"></div></div>
      <div class="gallery">
         <ul>
          <?php foreach($models as $model){ ?>
            <li><a href="<?php echo $model->url ?>" title="" class="lightbox" style="width: 110px; height: 110px; background: url(<?php echo $model->url ?>) no-repeat; background-position: center center; background-size: 150px auto;"></a>
              <div class="actions">
                <a href="<?php echo Helpers::baseurl() ?>/admin/posts/delete/<?php echo $model->id ?>" title=""><img src="<?php echo Helpers::path() ?>/images/icons/delete.png" alt="" /></a>
              </div>
            </li>
          <?php } ?>
         </ul> 
     </div>
  </div>
  
  </div>
</div>
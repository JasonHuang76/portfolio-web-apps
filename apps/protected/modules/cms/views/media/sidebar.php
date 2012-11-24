<script>
  $(document).ready(function(){
    $("#uploader").pluploadQueue({
      runtimes : 'html5,html4',
      url : '<?php echo Helpers::baseurl().'/admin/posts/upload' ?>',
      max_file_size : '1000kb',
      unique_names : true,
      filters : [
        {title : "Image files", extensions : "jpg,gif,png"},
      ]
    });
    
    // redefine tab
    $('#tab-container').easytabs();
    
    // use as featured image
    $('.userList li a').click(function(e){
      e.preventDefault();
      
      $('#feat').val($(this).attr('alt'));
      $('.feat_image').fadeIn('fast');
      $('.feat_image').css('background-image', 'url('+$(this).attr('alt')+')');
      
      // close sidebar
      $('.secNav').fadeOut('fast');
      $('#sidebar').toggleClass('without');
      $('#sidebar').toggleClass('with');
      $('#content').animate({
        marginLeft: '101px'
      }, 'fast').promise().done(function(){
        // remove media library
        $('.secNav').remove();
        state_load = false;
      });
    });
  });
</script>

<div class="secNav">
  <div class="secWrapper">
    <div class="secTop">
      <div class="balance">
        <div class="balInfo">Media Library<span>Set picture as featured image.</span></div>
      </div>
    </div>
    
    <!-- Tabs container -->
    <div id="tab-container" class="tab-container">
      <ul class="iconsLine ic2 etabs">
        <li><a href="#list" title=""><span class="icos-list2"></span></a></li>
        <li><a href="#upload" title=""><span class="icos-upload"></span></a></li>
      </ul>
      
      <div id="list" style="display: block;" class="active">
        <ul class="userList">
          <?php foreach($models as $model){ ?>
          <li>
            <a href="#" title="" alt="<?php echo $model->url ?>">
              <div class="pic" style="float: left; width: 37px; height: 37px; background: url(<?php echo $model->url ?>) no-repeat; background-position: center center; background-size: 45px auto;"></div>
              <span class="contactName">
                  <strong><?php echo $model->title ?></strong>
                  <!--<i>Nature and landscapes</i>-->
              </span>
              <span class="clear"></span>
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>
      
      <div id="upload" style="display: none;">
        <div id="uploader_container" class="widget">    
            <div class="whead"><h6>Upload new media</h6><div class="clear"></div></div>
            <div id="uploader">You browser doesn't have HTML 4 support.</div>                    
        </div>
      </div>
    </div>
    
      
 </div> 
 <div class="clear"></div>
 </div>
<script>
  $(document).ready(function(){
    $('#nav_categories').addClass('active');
  });
</script>

<div id="content">
  <div class="contentTop">
    <span class="pageTitle"><span class="icon-screen"></span>Categories</span>
  </div>
  <!-- Breadcrumbs line -->
  <div class="breadLine">
      <div class="bc">
          <ul id="breadcrumbs" class="breadcrumbs">
              <li><a href="#">Dashboard</a></li>
              <li class="current">
                <a href="#" title="">Categories</a>
              </li>
          </ul>
      </div>
  </div>
    
  <!-- Main content -->
  <div class="wrapper">
  
  <script>
    var global;
    $(document).ready(function(){    
      $('form.c_add').submit(function(e){
        e.preventDefault();
        
        if($(this).valid()){
          $.ajax({
            type: 'POST',
            url: '<?php echo Helpers::baseurl() ?>/admin/categories/add',
            data: $('form.c_add').serialize()
          }).done(function(data){
            if(data == 'true'){
              $('#checkAll tbody').prepend(''+
                '<tr style="opacity: 0;">'+
                  '<td><div class="checker" id="uniform-titleCheck2"><span><input type="checkbox" id="titleCheck2" name="checkRow" style="opacity: 0;"></span></div></td>'+
                  '<td>'+$('#title').val()+'</td>'+
                  '<td>'+$('#Terms_slug').val()+'</td>'+
                  '<td>0</td>'+
                '</tr>');
                
              $('#checkAll tbody tr:nth-child(1)').animate({
                opacity: 1
              },1000);
            }
          });
        }
      });
      
      // delete
      $('#del_cat').click(function(e){
        $('#table_actions').submit();
      });
    });
  </script>
  
  <?php echo $this->renderPartial('/partials/notif'); ?>
  <div class="fluid">
    <div class="widget grid6">
      <div class="whead">
        <h6>Add New Category</h6><div class="clear"></div>
      </div>
        <?php
          $form = $this->beginWidget('CActiveForm', array(
            'id' => 'validate',
            'action' => Helpers::baseurl('admin/pages/add'),
            'htmlOptions' => array(
              'class' => 'main c_add',
            ),
          ));
        ?>
        <div class="formRow">
          <div class="grid3"><label>Name:</label></div>
          <div class="grid9">
            <?php echo $form->textField($term, 'name', array('class' => 'required', 'id' => 'title')) ?>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
          <div class="grid3"><label>Slug:</label></div>
          <div class="grid9">
            <?php echo $form->textField($term, 'slug', array('class' => 'required slug')) ?>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
          <div class="grid3"><label>Parent :</label></div>
          <div class="grid9 noSearch">
          <select name="Terms[parent]" class="select">
              <option value="">None</option>
              <?php foreach($terms as $t){ ?>
              <option value="<?php echo $t->id ?>"><?php echo $t->name ?></option>
              <?php } ?>
          </select>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow noBorderB">
          <input type="submit" class="buttonS bLightBlue" value="Submit">
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div class="widget grid6">
      <?php echo $this->renderPartial('/partials/notif'); ?>
      <form class="main" id='table_actions' method='POST' action="<?php echo Helpers::baseurl() ?>/admin/categories/delete">
        <div class="whead"><span class="titleIcon check"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
          <!--<h6>Category Lists</h6>-->
          <div id="actions" style="position: relative; margin-left: 50px; top: 7px;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#actions">
              Actions
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
            <li><a id="del_cat" href="#"><span class="icos-trash"></span>Remove</a></li>
            </ul>
          </div>
          <div class="clear"></div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll check" id="checkAll">
          <thead>
            <tr>
              <td><img src="<?php echo Helpers::path(); ?>/images/elements/other/tableArrows.png" alt="" /></td>
              <td>Name</td>
              <td>Slug</td>
              <td>Posts</td>
            </tr>
          </thead>
          <tbody>
            <?php 
            $n = 1;
            foreach($terms as $t){ ?>
            <tr>
              <td><input type="checkbox" id="titleCheck<?php echo $n ?>" name="cat[<?php echo $n ?>]" value="<?php echo $t->id ?>" /></td>
              <td><!--<span class="icos-full4"></span> --><?php echo $t->name ?></td>
              <td><?php echo $t->slug ?></td>
              <td>0</td>
            </tr>
            <?php $n++; } ?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  
  
  </div>
</div>
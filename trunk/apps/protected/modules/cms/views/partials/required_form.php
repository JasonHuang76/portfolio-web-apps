<script>
  $(document).ready(function(){
    $('select[name="cat"]').change(function(){
      var val = '';
      if($(this).val()){
        var val = $(this).val().join(',');
      }
      $('input[name="Posts[category]"]').val(val);
    }); 
  });
</script>

<fieldset>
  <div class="widget fluid">
      <div class="whead"><h6>Required Information</h6><div class="clear"></div></div>
      <div class="formRow">
          <div class="grid3"><label>Title:</label></div>
          <div class="grid9">
            <?php echo $form->textField($model, 'title', array('class' => 'validate[required]', 'id' => 'title')) ?>
            <?php echo $form->error($model,'title'); ?>
          </div>
          <div class="clear"></div>
      </div>
      <div class="formRow">
          <div class="grid3"><label>Slug:</label></div>
          <div class="grid3">
            http://<?php echo $_SERVER['SERVER_NAME']; ?>/<?php 
              switch($type){
                default: echo 'uncategorized/';
                  break;
              }
            ?>
          </div>
          <div class="grid6">
            <?php echo $form->textField($model, 'slug', array('class' => 'validate[required] slug')) ?>
            <?php echo $form->error($model,'slug'); ?>
          </div>
          <div class="clear"></div>
      </div>
      <div class="formRow">
          <div class="grid3"><label>Description:</label></div>
          <div class="grid9">
            <?php echo $form->textArea($model, 'content', array('id' => 'editor', 'cols' => '16', 'class' => 'validate[required]')); ?>
            <?php echo $form->error($model,'content'); ?>
          </div>
          <div class="clear"></div>
      </div>
      <?php echo $form->hiddenField($model, 'type', array('value' => $type)); ?>
      
      <?php 
        // if type is post
        if($type == 'post'){
      ?>
      <div class="formRow">
          <div class="grid3"><label>Categories:</label></div>
          <div class="grid9">
            <input type="hidden" name="Posts[category]" value="" />
            <select data-placeholder="Select Categories" class="fullwidth select" multiple="multiple" tabindex="6" name="cat">
              <?php 
                foreach($categories as $category){ 
                  $selected = '';
                  if(isset($rels)){
                    foreach($rels as $rel){
                      if($category->id == $rel->category_id){
                        $selected = 'selected';
                      }
                    }
                  }
              ?>
                <option value='<?php echo $category->id ?>' <?php echo $selected; ?>><?php echo $category->name ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="clear"></div>
      </div>
      <?php } ?>
      
      <div class="formRow">
        <input type="submit" class="buttonS bLightBlue" value="Submit">
      </div>
  </div>
</fieldset>
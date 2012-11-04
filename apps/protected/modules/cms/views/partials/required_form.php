<fieldset>
  <div class="widget fluid">
      <div class="whead"><h6>Required Information</h6><div class="clear"></div></div>
      <div class="formRow">
          <div class="grid3"><label>Title:</label></div>
          <div class="grid9">
            <?php echo $form->textField($model, 'title', array('class' => 'validate[required]')) ?>
          </div>
          <div class="clear"></div>
      </div>
      <div class="formRow">
          <div class="grid3"><label>Slug:</label></div>
          <div class="grid3">
            <?php echo $_SERVER['SERVER_NAME']; ?>/
            <?php 
              switch($type){
                default: echo 'uncategorized/';
                  break;
              }
            ?>
          </div>
          <div class="grid6">
            <?php echo $form->textField($model, 'slug', array('class' => 'validate[required]')) ?>
          </div>
          <div class="clear"></div>
      </div>
      <div class="formRow">
          <div class="grid3"><label>Description:</label></div>
          <div class="grid9">
            <?php echo $form->textArea($model, 'content', array('id' => 'editor', 'cols' => '16', 'class' => 'validate[required]')); ?>
          </div>
          <div class="clear"></div>
      </div>
      <?php echo $form->hiddenField($model, 'type', array('value' => $type)); ?>
      
      <div class="formRow">
        <input type="submit" class="buttonS bLightBlue" value="Submit">
      </div>
  </div>
</fieldset>
<fieldset>
  <div class="widget fluid">
    <div class="whead"><h6>Required Info</h6><div class="clear"></div></div>
    <div class="formRow">
      <div class="grid3"><label>Field Group Name:</label></div>
      <div class="grid9">
        <?php echo $form->textField($model, 'group_name', array('class' => 'validate[required]')) ?>
        <?php echo $form->error($model,'group_name'); ?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="whead"><h6>Field #1</h6><div class="clear"></div></div>
    <div class="formRow">
      <div class="grid3"><label>Field Label:</label></div>
      <div class="grid9">
        <?php echo $form->textField($model, 'group_name', array('class' => 'validate[required]')) ?>
        <?php echo $form->error($model,'group_name'); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Field Name:</label></div>
      <div class="grid9">
        <?php echo $form->textField($model, 'group_name', array('class' => 'validate[required]')) ?>
        <?php echo $form->error($model,'group_name'); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Field Type:</label></div>
      <div class="grid9">
        <?php echo $form->textField($model, 'group_name', array('class' => 'validate[required]')) ?>
        <?php echo $form->error($model,'group_name'); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Field Instructions:</label></div>
      <div class="grid9">
        <?php echo $form->textArea($model, 'group_name', array('class' => 'validate[required]', 'rows' => 8)) ?>
        <?php echo $form->error($model,'group_name'); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Required?:</label></div>
      <div class="grid9">
        <?php echo $form->textField($model, 'group_name', array('class' => 'validate[required]')) ?>
        <?php echo $form->error($model,'group_name'); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Default Value:</label></div>
      <div class="grid9">
        <?php echo $form->textField($model, 'group_name', array('class' => 'validate[required]')) ?>
        <?php echo $form->error($model,'group_name'); ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</fieldset>

<fieldset>
  <div class="widget fluid">
    <div class="whead"><h6>Actions</h6><div class="clear"></div></div>
    <div class="formRow">
      <div class="grid3">&nbsp;</div>
      <div class="grid9">
        <button class="buttonS bLightBlue">Save Changes</button>
        <button class="buttonS bGreyish ">Add More Field</button>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</fieldset>
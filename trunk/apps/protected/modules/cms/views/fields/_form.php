<script>
  var count = 0;
  var global; var on_complete;
  $(document).ready(function(){
    // hack event for duplicate
    $('body').on('change', '.selector select', function(e){
      e.preventDefault();
      $(this).parents('.selector').find('span').html($(this).find('option:selected').html());
    });
  });
  
  $(document).ready(function(){
    // create existing fields
    for(var a = 1; a<=count; a++){
      var cl = $('#dummy').clone();
      $('#dummy').before('<fieldset id="'+a+'">'+cl.html()+'</fieldset>');
      
      // re-adjust the name
      $('#'+a+' .whead h6').text('Field #'+a);
      $('#'+a+' *[name*="dummy"]').each(function(){
        var name = $(this).attr('name').split('dummy');
        $(this).attr('name', 'Field['+a+']'+name[1]);
      });
    }
  
    $('#add_more').click(function(e){
      e.preventDefault();
      count++;
      
      var cl = $('#dummy').clone();
      $('#dummy').before('<fieldset style="display: none;" id="'+count+'">'+cl.html()+'</fieldset>');
      
      // re-adjust the name
      $('#'+count+' .whead h6').text('Field #'+count);
      $('#'+count+' *[name*="dummy"]').each(function(){
        var name = $(this).attr('name').split('dummy');
        $(this).attr('name', 'Field['+count+']'+name[1]);
      });
      
      // make animation dropdown
      $('#'+count).slideToggle();
      
      // make slug
      $('#'+count+' .slug').removeClass('slug').addClass('slug'+count);
      $('#'+count+' .label-title').slug({
        hide: false,
        slug: 'slug'+count
      });

    });
    
    $('#rule_key').change(function(){
      var state = $(this).val();
      
      $.ajax({
        url: '<?php echo Helpers::baseurl(); ?>/admin/fields/getdatas?type='+state,
      }).done(function(datas){
        var results = jQuery.parseJSON(datas);
        $('#rule_value').html('');
        $(results).each(function(){
          if($('#rule_key').val() == 'category'){
            $('#rule_value').append('<option value="'+this.id+'">'+this.name+'</option>');
          }else{
            $('#rule_value').append('<option value="'+this.id+'">'+this.title+'</option>');
          } 
        });
        $('#rule_value').trigger('change');
        
        // on edit group
        $('select[name="Rules[value]"]').val(on_complete);
        $('select[name="Rules[value]"]').trigger('change');
      });
    });
    
    $('#rule_key').trigger('change');
    
    // on edit group
    <?php 
      if($model->title){ 
        // rules recheck
        $args = array(
          'post_id' => $model->id,
          'meta' => 'rules',            
          'type' => 'posts',            
        );
        $rules = Helpers::get_meta($args);
        $rules = unserialize($rules->meta_value);
    ?>
      $('select[name="Rules[key]"]').val('<?php echo $rules['key'] ?>');
      $('select[name="Rules[key]"]').trigger('change');
      $('select[name="Rules[condition]"]').val('<?php echo $rules['condition'] ?>');
      $('select[name="Rules[condition]"]').trigger('change');
      // $('select[name="Rules[value]"]').val('<?php echo $rules['value'] ?>');
      on_complete = "<?php echo $rules['value'] ?>";
    <?php   
        $args = array(
          'post_id' => $model->id, 
          'meta' => 'field_count', 
          'type' => 'posts',
        );
        $count = Helpers::get_meta($args);
        $count = $count->meta_value;
        
        for($a = 1; $a<= $count; $a++){
        
        $args = array(
          'post_id' => $model->id, 
          'meta' => 'data_'.$a, 
          'type' => 'posts',
        );
        $data = Helpers::get_meta($args);
        $meta_id = $data->id;
        $data = unserialize($data->meta_value);
    ?>
      $('#add_more').trigger('click');
      // add some hidden data
      $('fieldset#<?php echo $a ?>').prepend('<input type="hidden" name="Field[<?php echo $a ?>][meta_id]" value="<?php echo $meta_id ?>" />');
      
      // generate field data
      $('*[name="Field[<?php echo $a ?>][label]"]').val('<?php echo $data['label'] ?>');
      $('*[name="Field[<?php echo $a ?>][name]"]').val('<?php echo $data['name'] ?>');
      $('*[name="Field[<?php echo $a ?>][type]"]').val('<?php echo $data['type'] ?>');
      $('*[name="Field[<?php echo $a ?>][type]"]').trigger('change');
      $('*[name="Field[<?php echo $a ?>][instructions]"]').val('<?php echo $data['instructions'] ?>');
      $('*[name="Field[<?php echo $a ?>][required]"]').val('<?php echo $data['required'] ?>');
      $('*[name="Field[<?php echo $a ?>][required]"]').trigger('change');
      $('*[name="Field[<?php echo $a ?>][default]"]').val('<?php echo $data['default'] ?>');
    <?php }} ?>
  });
</script>

<fieldset>
  <div class="widget fluid">
    <div class="whead"><h6>Required Info</h6><div class="clear"></div></div>
    <div class="formRow">
      <div class="grid3"><label>Field Group Name:</label></div>
      <div class="grid9">
        <?php echo $form->textField($model, 'title', array('class' => 'validate[required]')) ?>
        <?php echo $form->error($model,'title'); ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</fieldset>

<fieldset id="dummy" class="hide">
  <div class="widget fluid">
    <div class="whead">
      <h6>Field #1</h6>
      <div class="titleOpt" onClick="javascript: $(this).parents('fieldset').find('.formRow').slideToggle();"><a href="#" data-toggle="dropdown"><span class="icos-blocks"></span><span class="clear"></span></a></div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Field Label:</label></div>
      <div class="grid9">
        <input type="text" name="dummy[label]" class="validate[required] label-title" />
        <span class="note">This is the name which will appear on the EDIT page</span>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Field Name:</label></div>
      <div class="grid9">
        <input type="text" name="dummy[name]" class="validate[required] slug" />
        <span class="note">Single word, no spaces. Underscores and dashes allowed</span>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Field Type:</label></div>
      <div class="grid9">
        <select name="dummy[type]">
          <option value="text">Text</option>
          <option value="textarea">Textarea</option>
        </select>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Field Instructions:</label></div>
      <div class="grid9">
        <textarea name="dummy[instructions]" class="" rows=8></textarea>
        <span class="note">Instructions for authors. Shown when submitting data</span>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Required?:</label></div>
      <div class="grid9">
        <select name="dummy[required]">
          <option value="yes">Yes</option>
          <option value="no" selected>No</option>
        </select>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Default Value:</label></div>
      <div class="grid9">
        <input type="text" name="dummy[default]" class="" />
      </div>
      <div class="clear"></div>
    </div>
  </div>
</fieldset>

<fieldset>
  <div class="widget fluid">
    <div class="whead"><h6>Locations</h6><div class="clear"></div></div>
    <div class="formRow">
      <div class="grid3">
        <label>Rules</label>
      </div>
      <div class="grid9">
        <select name="Rules[key]" id="rule_key">
          <option value="post">Post</option>
          <option value="page">Page</option>
          <option value="category">Category</option>
        </select>
        
        <select name="Rules[condition]">
          <option value="is_equal_to">is equal to</option>
          <option value="is_not_equal_to">is not equal to</option>
        </select>
        
        <select name="Rules[value]" id="rule_value"></select>
        <span class="note">Create a set of rules to determine which edit screens will use these advanced custom fields</span>
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
        <button class="buttonS bGreyish" id="add_more">Add More Field</button>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</fieldset>
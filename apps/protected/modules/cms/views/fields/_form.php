<script>
  var count = 0;
  var global;
  $(document).ready(function(){
    // create existing fields
    for(var a = 1; a<=count; a++){
      var cl = $('#dummy').clone();
      $('#dummy').before('<fieldset id="'+a+'">'+cl.html()+'</fieldset>');
      
      // re-adjust the name
      $('#'+a+' .whead h6').text('Field #'+a);
      $('#'+a+' *[name*="Field"]').each(function(){
        var name = $(this).attr('name').split('Field[1]');
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
      $('#'+count+' *[name*="Field"]').each(function(){
        var name = $(this).attr('name').split('Field[1]');
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
    
    $('#rules').change(function(){
      var state = $(this).val();
      
      switch(state){
        case 'post':
          break;
        case 'page':
          break;
        case 'category':
          break;
      }
    });
  });
</script>

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
        <input type="text" name="Field[1][label]" class="validate[required] label-title" />
        <span class="note">This is the name which will appear on the EDIT page</span>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Field Name:</label></div>
      <div class="grid9">
        <input type="text" name="Field[1][name]" class="validate[required] slug" />
        <span class="note">Single word, no spaces. Underscores and dashes allowed</span>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Field Type:</label></div>
      <div class="grid9">
        <select name="Field[1][type]">
          <option value="text">Text</option>
          <option value="textarea">Textarea</option>
        </select>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Field Instructions:</label></div>
      <div class="grid9">
        <textarea name="Field[1][instructions]" class="" rows=8></textarea>
        <span class="note">Instructions for authors. Shown when submitting data</span>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Required?:</label></div>
      <div class="grid9">
        <select name="Field[1][required]">
          <option value="yes">Yes</option>
          <option value="no" selected>No</option>
        </select>
      </div>
      <div class="clear"></div>
    </div>
    <div class="formRow">
      <div class="grid3"><label>Default Value:</label></div>
      <div class="grid9">
        <input type="text" name="Field[1][default]" class="" />
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
        <select name="Rules[key]" id="rules">
          <option value="post">Post</option>
          <option value="page">Page</option>
          <option value="category">Category</option>
        </select>
        
        <select name="Rules[condition]">
          <option value="is_equal_to">is equal to</option>
          <option value="is_not_equal_to">is not equal to</option>
        </select>
        
        <select name="Rules[value]">
          <?php
            // default on posts
            $args = array();
            $posts = Helpers::get_posts($args);
            foreach($posts as $post){
          ?>
          <option value="<?php echo $post->id ?>"><?php echo $post->title; ?></option>
          <?php } ?>
        </select>
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
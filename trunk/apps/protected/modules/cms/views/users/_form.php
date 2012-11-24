<div class="widget fluid">
      <div class="whead"><h6>Required Information</h6><div class="clear"></div></div>
      
      <div class="formRow">
        <div class="grid3"><label>Username:</label></div>
        <div class="grid9">
          <?php echo $form->textField($model, 'username', array('class' => 'validate[required]')) ?>
          <?php echo $form->error($model,'username'); ?>
        </div>
        <div class="clear"></div>
      </div>
      <div class="formRow">
        <div class="grid3"><label>Email:</label></div>
        <div class="grid9">
          <?php echo $form->textField($model, 'email', array('class' => 'validate[required, custom[email]]')) ?>
          <?php echo $form->error($model,'email'); ?>
        </div>
        <div class="clear"></div>
      </div>
      <div class="formRow">
        <div class="grid3"><label>Nickname:</label></div>
        <div class="grid9">
          <?php echo $form->textField($model, 'nickname', array('class' => 'validate[required]')) ?>
          <?php echo $form->error($model,'nickname'); ?>
        </div>
        <div class="clear"></div>
      </div>
      <div class="formRow">
        <div class="grid3"><label>New Password:</label></div>
        <div class="grid9">
          <?php echo $form->passwordField($model, 'password', array('class' => 'validate[required]', 'value' => '', 'id' => 'Users_password')) ?>
          <?php echo $form->hiddenField($model, 'password', array('id' => 'pass')) ?>
          <span class="note">If you would like to change the password type a new one. Otherwise leave this blank.</span>
          <?php echo $form->error($model,'password'); ?>
        </div>
        <div class="clear"></div>
      </div>
      <div class="formRow">
        <div class="grid3"><label>Confirm Password:</label></div>
        <div class="grid9">
          <input type="password" class="validate[required,equals[Users_password]]" name="password2" id="password2">
          <span class="note">Type your new password again.</span>
        </div>
        <div class="clear"></div>
      </div>
      <div class="formRow">
        <div class="grid3"><label>Roles:</label></div>
        <div class="grid9">
          <select name="Users[role]">
            <option value="admin">Administrator</option>
            <option value="subscriber">Subscriber</option>
            <option value="author">Author</option>
          </select>
        </div>
        <div class="clear"></div>
      </div>
      
      <div class="whead"><h6>Contact Info</h6><div class="clear"></div></div>
      
      <div class="formRow">
        <div class="grid3"><label>First Name:</label></div>
        <div class="grid9">
          <?php echo $form->textField($model, 'firstname') ?>
          <?php echo $form->error($model,'firstname'); ?>
        </div>
        <div class="clear"></div>
      </div>
      <div class="formRow">
        <div class="grid3"><label>Last Name:</label></div>
        <div class="grid9">
          <?php echo $form->textField($model, 'lastname') ?>
          <?php echo $form->error($model,'lastname'); ?>
        </div>
        <div class="clear"></div>
      </div>
      
      <div class="formRow noBorderB">
        <input type="submit" class="buttonS bLightBlue" value="Submit">
      </div>
      
    </div>
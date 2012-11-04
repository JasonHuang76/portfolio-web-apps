<?php if(Yii::app()->user->hasFlash('notification')){ ?>
  <div class="nNote nInformation">
    <p><?php echo Yii::app()->user->getFlash('notification'); ?></p>
  </div>
<?php }else if(Yii::app()->user->hasFlash('error')){ ?>
  <div class="nNote nFailure">
    <p><?php echo Yii::app()->user->getFlash('error'); ?></p>
  </div>
<?php }else if(Yii::app()->user->hasFlash('success')){ ?>
  <div class="nNote nSuccess">
    <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
  </div>  
<?php } ?>
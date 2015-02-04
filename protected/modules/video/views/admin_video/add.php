<?php
Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('user').'/assets/css/uploadify.css'));

    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('video').'/assets/js/video.js'), CClientScript::POS_HEAD);
          echo $model->name;
          echo $model->type;
    ?>
<style>
    .uploadify-queue .cancel,.uploadify-queue .data,.uploadify-queue .fileName{
        display:none;

    }
    .uploadify-progress-bar{
        height: 20px;
    }
</style>

<div id="main">
    <div id="content">
    <h2 id="pageTitle">Add Video</h2>
    
    <?php 
            $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation' =>true, 
            )
            ); 

        ?>

  <?php echo $form->textFieldRow(
$model,
'title'
); ?>
 <?php /* echo $form->hiddenField(
$model,
'name'
); */ ?>

        <?php echo $form->toggleButtonRow($model, 'type',array('options'=>array('enabledLabel'=>'Youtube' , 'disabledLabel'=>'Desktop','width' => '150'))); ?>


        <div id="desktop_video" class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">Video :</label>
            <div id="upvideo" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload_video" name="file_upload_video" type="file" multiple="false">
                <div style="display:inline-block;margin:-20px 0 0 200px;color:#ff0000">
                    (only *.flv are allowed)
                </div>
                <input type="hidden" id="d_vid_name" name="d_vid_name" <?php if($model->type==0){ ?> value="<?php echo $model->name;?>" <?php } ?>>      
            </div>
            <span id="Video_name_err" class="help-inline error" style="margin-left: 180px; margin-bottom: 20px;"><?php echo @$val_error['name'][0];?></span>

            <div id="show_thumb1" style="margin-left:235px">
                <div class="vid1">
                <?php if(!empty($model->name) && $model->type==0){?> 
                <div>
                    <div style="margin-top:-20px;margin-left:5px;position:relative">
                        <a href="<?php echo Yii::app()->getBaseUrl(true);?>/uploads/video/converted/<?php echo $model->name;?>" target="_blank"></a>
                        <a href="<?php echo Yii::app()->getBaseUrl(true);?>/uploads/video/converted/<?php echo $model->name;?>" id="player" style="display:block;width:400px;height:300px;margin:10px;padding:1px;border:2px solid #ccc" > </a>
                    </div>
                </div>
                <script>
                $(function(){
                    flowplayer("player" ,base_url+'/swf/flowplayer.commercial-3.2.15.swf',{clip:{autoPlay:false}});
                })
                </script>
                <?php } ?>
                </div>
            <div id="clr" class="clear:both;"></div>
            </div>
        </div>
        
        <div id="youtube_video" class="input-box" style="margin-top:20px; display: none;" >
            <label for="profile_pr_image" class="control-label required">Video :</label>
            <div id="upvideo1" style="margin-left: 235px;margin-bottom:35px; ">
                <div id="file_upload_video-button1" class="uploadify-button " style="height: 30px; line-height: 30px; ">
                    <span class="uploadify-button-text">SEARCH YOUTUBE</span>
                </div>
                <input type="hidden" id="y_vid_name" name="y_vid_name" <?php if($model->type==1){ ?> value="<?php echo $model->name;?>" <?php } ?>>       
            </div>
            <span id="Video_name_err" class="help-inline error" style="margin-left: 180px; margin-bottom: 20px;"><?php echo @$val_error['name'][0];?></span>

            <div id="show_thumb" style="margin-left:235px">
                <?php if(!empty($model->name) && $model->type==1){?>
                    <div style="width:480px;height:320px">
                        <object width="480" height="320">
                            <param value="http://www.youtube-nocookie.com/v/<?php echo $model->name;?>?version=3&hl=en_US" name="movie">
                            <param value="true" name="allowFullScreen">
                            <param value="always" name="allowscriptaccess">
                            <embed width="480" height="320" wmode="opaque" allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="http://www.youtube-nocookie.com/v/<?php echo $model->name;?>?version=3&hl=en_US">
                        </object>
                        <img class="closeImg2" src="<?php echo Yii::app()->getBaseUrl(true);?>/images/close.png" title="Close Image"  style="margin-bottom:180px;" onclick="removeVideo(this)">
                    </div><br /><br /><br />
                <?php } ?>
            </div>
        </div>
        

                <?php echo $form->toggleButtonRow($model, 'isactive',array('options'=>array('enabledLabel'=>'On' , 'disabledLabel'=>'Off','width' => '150'))); ?>

        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>

        <?php
            $this->endWidget(); 

        ?>
        
         <?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal-img','htmlOptions'=>array('style'=>'left:30%;width:80%;display:none;'))
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Image</h4>
</div>

<div class="modal-body">

</div>

<div class="modal-footer">
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
        'type' => 'primary',
        'label' => 'Crop',
        'id' =>'sub_image',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal','class'=>'btn'),
        )
        ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal','class'=>'btn'),
        )
        ); ?>
    </div>
 
<?php $this->endWidget(); ?>
  
  
    <?php $this->beginWidget(
       'bootstrap.widgets.TbModal',
       array('id' => 'selyoutubevid',
           'htmlOptions'=>array('style'=>'width:80%;left:33%;display:none;'),

       )
   ); ?>

   <div class="modal-header">
       <a class="close" data-dismiss="modal">&times;</a>
      <div style="width:420px; margin:0 auto;"> <h4>Search Video : </h4>
       <input type="text" id="youtube_txt" >
       
       <div style="clear:both;"></div>
       </div>
   </div>

   <div class="modal-body" style="margin: 0 auto; width:90%;text-align:center;overflow: inherit;height: auto ">
    
       <div id="videos2" style="width:100%;"></div>
   </div>



   <?php $this->endWidget(); ?>
    
    
    
    </div>
</div>
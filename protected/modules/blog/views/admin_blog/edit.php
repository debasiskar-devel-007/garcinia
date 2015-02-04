<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('blog').'/assets/js/jquery.Jcrop.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('blog').'/assets/css/uploadify.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('blog').'/assets/css/jquery.Jcrop.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('blog').'/assets/css/facebox.css'));
    
    
?>

<div id="main">
    <div id="content">

        <h2 id="pageTitle">Edit Blog</h2>

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

        <?php echo $form->textFieldRow($model, 'pr_title'); ?><br />
        <?php echo $form->ckEditorRow($model, 'pr_desc', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));?>
        <?php echo $form->textFieldRow($model, 'postby',array('class'=>'firstname')); ?><br />  
        
         <div class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">User Image</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload" name="file_upload" type="file" multiple="false">      
            </div>

            <div id="show_thumb" style="margin-left:235px">
                <?php //foreach($res as $row){ if (file_exists("./uploads/product_image/thumb/".$row['imag_name'])) 
                
                if($model['user_image']!='' )
                {?>
                    <div class="imglist" style="position:relative; width:150px; margin-bottom:10px;">
                    <a href="javascript:void(0);">
                    <img name="<?php echo $model['user_image'];?>" src="<?php echo Yii::app()->request->baseUrl;?>/uploads/proimage/thumb/<?php echo $model['user_image'];?>" style="max-height:150px;max-width:150px; border:solid 1px #979797;margin-left:0px" /></a></br><input type="button" class="crop_btn" onclick="crop_image('<?php echo $model['user_image'];?>')" value="Crop"><input type="button" style="margin-left:5px;" class="crop_btn" onclick="del_up_image(this)" value="Delete"><input type="hidden" name="Blog[user_image]" value="<?php echo $model['user_image'];?>" /></div>
                    <?php //}
                
                }?>
                <div id="clr" class="clear:both;"></div>
            </div>
        </div>
         <?php echo $form->textFieldRow($model, 'priority'); ?><br /> 

        <?php echo $form->toggleButtonRow($model, 'pr_status',array('options'=>array('enabledLabel'=>'Active' , 'disabledLabel'=>'Inactive','width' => '150'))); ?>  
        <?php echo $form->toggleButtonRow($model, 'enablecom',array('options'=>array('enabledLabel'=>'Active' , 'disabledLabel'=>'Inactive','width' => '150'))); ?>  


        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); 
        ?>
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
    
    </div>   
</div>   


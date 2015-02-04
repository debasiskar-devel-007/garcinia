<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('sportsmanager').'/assets/js/jquery.Jcrop.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('sportsmanager').'/assets/css/uploadify.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('sportsmanager').'/assets/css/jquery.Jcrop.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('sportsmanager').'/assets/css/facebox.css'));
    

    
    
?>

<div id="main">
    <div id="content">
    <h2 id="pageTitle">Edit Sport</h2>
    
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
'sport_name'
); ?>
 <?php echo $form->dropDownListRow(
$model,
'sport_parentcategory',
$res
); ?>

 <div class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">Sports Icon</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload" name="file_upload" type="file" multiple="false">      
            </div>

            <div id="show_thumb" style="margin-left:235px">
                <?php //foreach($res as $row){ if (file_exists("./uploads/product_image/thumb/".$row['imag_name'])) 
                
                if($model['imag_name']!='' )
                {?>
                    <div class="imglist" style="position:relative; width:150px; margin-bottom:10px;">
                    <a href="javascript:void(0);">
                    <img name="<?php echo $model['imag_name'];?>" src="<?php echo Yii::app()->request->baseUrl;?>/uploads/sports_image/thumb/<?php echo $model['imag_name'];?>" style="max-height:46px;max-width:46px; border:solid 1px #979797;margin-left:50px" /></a></br><input type="button" class="crop_btn" onclick="crop_image('<?php echo $model['imag_name'];?>')" value="Crop"><input type="button" style="margin-left:5px;" class="crop_btn" onclick="del_up_image(this)" value="Delete"><input type="hidden" name="Sport[imag_name]" value="<?php echo $model['imag_name'];?>" /></div>
                    <?php //}
                
                }?>
                <div id="clr" class="clear:both;"></div>
            </div>
        </div>
        
        
         <div class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">Bannner Image</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload1" name="file_upload1" type="file" multiple="false">      
            </div>

            <div id="show_thumb1" style="margin-left:235px">
                <?php foreach($result as $row){ if (file_exists("./uploads/sports_image/banner/thumb/".$row['image'])) 
                
                if($row['image']!='' )
                {?>
                    <div class="imglist" style="position:relative; width:150px; margin-bottom:10px;">
                    <a href="javascript:void(0);">
                    <img name="<?php echo $row['image'];?>" src="<?php echo Yii::app()->request->baseUrl;?>/uploads/sports_image/banner/thumb/<?php echo $row['image'];?>" style="max-height:300px;max-width:300px; border:solid 1px #979797;" /></a></br><input type="button" class="crop_btn" onclick="crop_image1('<?php echo $row['image'];?>')" value="Crop"><input type="button" style="margin-left:5px;" class="crop_btn" onclick="del_up_image1(this)" value="Delete"><input type="hidden" name="imageval[]" value="<?php echo $row['image'];?>" /></div>
                    <?php }
                
                }?>
                <div id="clr" class="clear:both;"></div>
            </div>
        </div>
        
        
        <div class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">Additional Image</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload2" name="file_upload2" type="file" multiple="false">      
            </div>

            <div id="show_thumb2" style="margin-left:235px">
                <?php //foreach($res as $row){ if (file_exists("./uploads/product_image/thumb/".$row['imag_name'])) 
                
                if($model['additional_image']!='' )
                {?>
                    <div class="imglist" style="position:relative; width:150px; margin-bottom:10px;">
                    <a href="javascript:void(0);">
                    <img name="<?php echo $model['additional_image'];?>" src="<?php echo Yii::app()->request->baseUrl;?>/uploads/sports_image/additional/thumb/<?php echo $model['additional_image'];?>" style="max-height:300px;max-width:300px; border:solid 1px #979797;" /></a></br><input type="button" class="crop_btn" onclick="crop_image2('<?php echo $model['additional_image'];?>')" value="Crop"><input type="button" style="margin-left:5px;" class="crop_btn" onclick="del_up_image2(this)" value="Delete"><input type="hidden" name="Sport[additional_image]" value="<?php echo $model['additional_image'];?>" /></div>
                    <?php //}
                
                }?>
                <div id="clr" class="clear:both;"></div>
            </div>
        </div>
        <?php echo $form->ckEditorRow($model, 'sport_desc', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));?>
           <?php echo $form->textFieldRow(
$model,
'priority'
); ?>


        <?php echo $form->textFieldRow(
            $model,
            'connectionpage_name'
        ); ?>

 <?php echo $form->textFieldRow(
$model,
'tag'
); ?>
        <?php echo $form->toggleButtonRow($model, 'isactive',array('options'=>array('enabledLabel'=>'Active' , 'disabledLabel'=>'Inactive','width' => '150'))); ?>
        <?php echo $form->toggleButtonRow($model, 'show1',array('options'=>array('enabledLabel'=>'On' , 'disabledLabel'=>'Off','width' => '150'))); ?>


                <?php echo $form->toggleButtonRow($model, 'isfeatured',array('options'=>array('enabledLabel'=>'Active' , 'disabledLabel'=>'Inactive','width' => '150'))); ?>  
        

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
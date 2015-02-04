<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms').'/assets/js/jquery.Jcrop.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms').'/assets/css/uploadify.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms').'/assets/css/jquery.Jcrop.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms').'/assets/css/facebox.css'));


?>

<div id="main">
    <div id="content">
        <h2 id="pageTitle">Edit All Content</h2></br>

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
        
        <?php
            if($model['content_type']=='TEXT')
                echo $form->textArea(@$model1, 'content_type');
               
            else if($model['content_type']=='HTML')
                    echo $form->ckEditorRow(@$model1, 'content_type', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320'))); 
            else if($model['content_type']=='IMAGE')
            {
                
               if($model['image_type']==0) 
               { 
                
                   ?>
               
                       <?php 
                            if(is_array($res1)){
                       $result=@$res1[0]['content_type'];
                       //echo $result;
                       //exit;
                         
                           //echo "hello";
                           
                           ?>                                   
                    <div class="imglist" style="position:relative; width:150px; margin-bottom:10px;">
                    <a href="javascript:void(0);">
                    <img name="<?php echo @$result;?>" src="<?php echo Yii::app()->request->baseUrl;?>/uploads/content_image/thumb/<?php echo @$result;?>" style="max-height:300px;max-width:300px; border:solid 1px #979797;" /></a></br><input type="button" class="crop_btn" style="margin:0px,display:inline-block;padding:5px 15px; margin:5px 0;float:left;background:#00BEF2;border:none;cursor:pointer;" onclick="crop_image('<?php echo @$result;?>')" value="Crop"><input type="button"  class="crop_btn" style="margin:0px,display:inline-block;padding:5px 15px; margin:5px 5px;float:left;background:#00BEF2;border:none;cursor:pointer"  onclick="del_up_image1(this)" value="Delete"><input type="hidden" name="ContentInfo" value="<?php echo @$result;?>" /></div>
                  <? }?> </br> 
               
                   <div class="input-box" style="margin:20px; width="auto" >
            <label for="profile_pr_image">upload image</label>
            <div class="clear"></div>
                       
            <div id="upImage" style="margin-left: 0px;margin-bottom:35px;line-height:0px ">
                <input id="file_upload" name="file_upload"  img_height="<?php echo $model['img_height']; ?>" img_width="<?php echo $model['img_width']; ?>" type="file" multiple="false">      
            </div>

            <div id="show_thumb" style="margin-left:235px">
            <div id="clr" class="clear:both;"></div>
            </div>
        </div>
                   
            <?  }  
            
            else 
            {   ?>
            
                       <?php foreach($res1 as $r) { 
                               if(!empty($r['content_type'])) {                             ?>            
            
                                <div class="imglist" style="position:relative; width:150px; margin-bottom:10px;">
                    <a href="javascript:void(0);">
                    <img name="<?php echo @$r['content_type'];?>" src="<?php echo Yii::app()->request->baseUrl;?>/uploads/content_image/thumb/<?php echo @$r['content_type'];?>" style="max-height:300px;max-width:300px; border:solid 1px #979797;" /></a></br><input type="button" class="crop_btn " style="margin:0px,display:inline-block,padding:10px;float:left" onclick="crop_image1('<?php echo @$r['content_type']?>')" value="Crop"><input type="button" style="margin-left:5px; background:##00BEF2" class="crop_btn " style="margin:0px,display:inline-block,padding:10px;float:left;background:##00BEF2" onclick="del_up_image1(this)" value="Delete"><input type="hidden" name="imageval[]" value="<?php echo @$r['content_type'];?>" /></div>
                <?php }} ?>
            <div class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">upload image</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload1" name="file_upload1" img_width="<?php echo $model['img_width'] ;?>"   img_height="<?php echo $model['img_height'] ;?>"          type="file" multiple="true">      
            </div>

            <div id="show_thumb1" style="margin-left:235px">
            <div id="clr" class="clear:both;"></div>
            </div>
        </div>
                
                
     <?       }        
            
            
            
               ?>

                
                
    <?        }
            else if($model['content_type']=='VIDEO')
            echo "WORK IN PROGRESS";                           
        ?>
        </div>

        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); 

            $this->endWidget(); 

        ?>



    </div>
</div>
        
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
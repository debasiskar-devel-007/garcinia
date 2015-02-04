<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/jquery.Jcrop.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/css/uploadify.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/css/jquery.Jcrop.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/css/facebox.css'));


?>
<div id="main">
    <div id="content">

        <h2 id="pageTitle">Add Product</h2>

        <?php

        $imagesize = Yii::app()->params['product_image_size'];
        $previmage = $model['image'];

            $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation' =>true, 
            )
            ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'productname'
            ); ?>

        <?php echo $form->ckEditorRow(
            $model,
            'productdesc'
            ); ?>

        <?php echo $form->ckEditorRow(
            $model,
            'product_info'
            ); ?>

        <?php echo $form->ckEditorRow(
            $model,
            'product_guarantee'
            ); ?>

        <?php echo $form->ckEditorRow(
            $model,
            'product_features'
            ); ?>

        <?php echo $form->ckEditorRow(
            $model,
            'product_descdetail'
            ); ?>

        <?php echo $form->ckEditorRow(
            $model,
            'brand_info'
            ); ?>



        <?php echo $form->dropDownListRow(                                    
            $model,
            'catagoryid',$res
            ); ?>



        <div class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">Product Image</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload" name="file_upload" type="file" multiple="false">      
            </div>

            <div id="show_thumb">
                <?php if(count($previmage)){
                    foreach($previmage as $val){
                    ?>
                        <div class="imglist-box2"><img src="<?php echo $this->actionGetAssetsUrl();?>/images/closenew.png" class="closediv" onclick="delImage('<?php echo $val;?>',this)">
                            <?php foreach($imagesize as $size){ ?>
                                <div class="image-main-div">
                                    <img style="max-height:150px;max-width:150px; border:solid 1px #979797;" src="<?php echo Yii::app()->getBaseUrl(true);?>/uploads/product_image/thumb/<?php echo $size[0];?>X<?php echo $size[1];?>/<?php echo $val;?>" name="<?php echo $val;?>" folder="<?php echo $size[0];?>X<?php echo $size[1];?>">
                                    <div class="crop-img"><img src="<?php echo $this->actionGetAssetsUrl();?>/images/crop.png" onclick="crop_image('<?php echo $val;?>','<?php echo $size[0];?>','<?php echo $size[1];?>')"></div>
                                </div>
                            <?php } ?>
                            <input type="hidden" name="Product[image][]" value="<?php echo $val;?>" />
                            <div style="clear: both;"></div>
                        </div>
                <?php }} ?>
                <div id="clr" class="clear:both;"></div>
            </div>
        </div>

        <?php echo $form->toggleButtonRow($model, 'isactive'); ?>
       <?php /*echo $form->toggleButtonRow($model, 'product_type',array('options'=>array('disabledLabel'=>'Downloadable' , 'enabledLabel'=>'Physical','width' => '170')
            ,

            'onChange'=>'js:
            if($("#Product_product_type").is(":checked")==true){
            //alert(1);                                                                                  

            $("#upImage1").hide();                                                                                    

            }
            else{
            // alert(2);
            $("#upImage1").show();
            }

            ')) */?>

        <?php echo $form->toggleButtonRow($model, 'product_type',array('options'=>array('enabledLabel'=>'Original' , 'disabledLabel'=>'Upsell','width' => '150'))); ?>



    <!--    <div class="input-box" style="margin-top:20px;" >

            <div id="upImage1" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload1" name="file_upload1" type="file" multiple="false">      
            </div>

            <div class="app" style="margin-left: 30px;">    
                <div id="clr" class="clear:both;"></div>
            </div>
        </div>-->

        <?php /*echo $form->toggleButtonRow($model, 'is_color',array('options'=>array('disabledLabel'=>'No' , 'enabledLabel'=>'Yes')
            ,

            'onChange'=>'js:
            if($("#Product_is_color").is(":checked")==true){
                $("#colordiv").show();                                                                                    
            }
            else{
                $("#colordiv").hide();
            }

            ')) */?>
        
       <!-- <div class="input-box" style="margin-top:20px;" id="colordiv">
        <label class="control-label required">Product Color</label>
        <div style="margin-left: 235px;margin-bottom:35px; ">
            <input type="button" id="picker" class="btn" value="Choose Color" />
            <div id="colorlist" style="margin-top: 10px; width:300px;">
                <div style="clear: both;" class="clrs"></div>
            </div>
        </div>
    </div>-->

       <!-- <?php /*echo $form->toggleButtonRow($model, 'is_size',array('options'=>array('disabledLabel'=>'No' , 'enabledLabel'=>'Yes')
            ,

            'onChange'=>'js:
            if($("#Product_is_size").is(":checked")==true){
                $("#sizediv").show();                                                                                    
            }
            else{
                $("#sizediv").hide();
            }

            ')) */?>
        
        <div class="input-box" style="margin-top:20px;" id="sizediv">
        <label class="control-label required">Available Size</label>
        <div style="margin-left: 180px;margin-bottom:35px;" id="sizedivList">
            <div><input type="text" name="size[]" placeholder="Enter Size">&nbsp;&nbsp;<input type="text" name="size_price[]" placeholder="Enter Price">&nbsp;&nbsp;<img onclick="addsizediv(this)" src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/CircledPlus.png" alt="">&nbsp;&nbsp;<img onclick="delsizediv(this)" src="<?php /*echo Yii::app()->theme->baseUrl;*/?>/images/CircledMinus.png" alt=""></div>
        </div>
    </div>-->

        <?php echo $form->textFieldRow(
            $model,
            'productprice'
            ); ?>


        <?php echo $form->textFieldRow(
            $model,
            'priority'
            ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'sqnumber'
        ); ?>

        <?php echo $form->hiddenField($model,'file_name',array('id'=>'hidden')); ?> 
        <?php echo $form->hiddenField($model,'original_name',array('id'=>'hiddenname')); ?>       

        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Submit',
            'htmlOptions' => array('class'=>'btn1'),
            ) 
            ); ?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array('buttonType' => 'reset', 'label' => 'Reset','htmlOptions' => array('class'=>'btn1'))
            ); ?>

        <?php
            $this->endWidget(); ?>



        <!-- Modal for crop Image [start] -->
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
        <!-- Modal for crop Image [end] -->


    </div>
</div>
<?php $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>'Success',
    //'value'=>'name',
    'htmlOptions'=>array('class'=>'nameinglebel','style'=>'display:none')
    )); ?>
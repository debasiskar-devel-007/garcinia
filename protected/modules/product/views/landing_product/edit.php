<script type="text/javascript">

 var arr='<?php echo json_encode($arrtype) ;?>';



</script>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/jquery.Jcrop.js'), CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/css/uploadify.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/css/jquery.Jcrop.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/css/facebox.css'));


?>

<?php
    $baseUrl =  Yii::app()->BaseUrl;
$arr3= array(''=>'Select Type','1'=>'Original','0'=>'Upsell');

$imagesize = Yii::app()->params['product_image_size'];


/*var_dump($arrtype);
exit;*/
?>


<div id="main">
    <div id="content">
        <h2 id="pageTitle">Releate New Product For Landing Page</h2>

        <?php /** @var TbActiveForm $form */
            $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation' =>true, 
            )
            ); ?>




        <?php echo $form->hiddenField(
            $model,
            'product_image'
        ); ?>

        <?php echo $form->dropDownListRow(
            $model,
            'landing_id',$arr
        ); ?>

        <?php echo $form->dropDownListRow(
            $model,
            'product_type',$arr3
        ); ?>


        <?php echo $form->dropDownListRow(
            $model,
            'product_id',$arr1,array('disabled'=>true)
        ); ?>


        <?php echo $form->textFieldRow(
            $model,
            'product_name'
        ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'product_price'
        ); ?>

        <?php echo $form->ckEditorRow(
            $model,
            'product_desc',array('id'=>'prodesc')
        ); ?>

        <div class="input-box" style="margin-top:20px;display:none" >
        <?php if(!empty($model['product_image'])){
            $imagename = $model['product_image'];
            ?>
            <div>
                <div class="imglist-box2">

                    <?php foreach($imagesize as $size){ ?>
                        <div class="image-main-div">
                            <img style="max-height:150px;max-width:150px; border:solid 1px #979797;" src="<?php echo Yii::app()->getBaseUrl(true);?>/uploads/product_image/thumb/<?php echo $size[0];?>X<?php echo $size[1];?>/<?php echo $imagename;?>" name="<?php echo $imagename;?>" folder="<?php echo $size[0];?>X<?php echo $size[1];?>">
                            <div class="crop-img" style="display: none;"><img src="<?php echo $this->actionGetAssetsUrl();?>/images/crop.png" onclick="crop_image('<?php echo $imagename;?>','<?php echo $size[0];?>','<?php echo $size[1];?>')"></div>
                        </div>
                    <?php } ?>


                    <input type="hidden" value="<?php echo $imagename;?>">
                    <input type="button" onclick="selectimage('<?php echo $imagename;?>')" value="Select">
                    <div style="clear: both;"></div>
                </div>
            </div>
        <?php } ?>
            <div id="show_thumb">

                <div id="clr" class="clear:both;"></div>
            </div>
            <label for="profile_pr_image" class="control-label required">Product Image</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload1" name="file_upload" type="file" multiple="false">
            </div>

            <?php echo $form->error($model,'product_image'); ?>


    </div>






        <?php echo $form->textFieldRow(
            $model,
            'quantity'
        ); ?>

        <?php echo $form->dropDownListRow(
            $model,
            'shipping_id', CHtml::listData(ShippingCharge::model()->findAll(array('order' => 'shipping_charge ASC')), 'id', function($loc){ return $loc->shipping_name . " - (" . $loc->shipping_charge.")"; }), array('empty'=>'Select Shipping Type')
        ); ?>

        <?php echo $form->toggleButtonRow($model, 'autoship'); ?>
        <?php echo $form->toggleButtonRow($model, 'isactive'); ?>


        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Submit',
            'htmlOptions' => array('class'=>'button'),
            ) 
            ); ?>


        <?php
            $this->endWidget(); ?>

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
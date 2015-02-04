<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'refund-form',
    'enableAjaxValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    )
)); ?>

<!--<input type="hidden" name="tranid" id="tranid" value="">-->
<input type="hidden" name="poid" id="poid" value="">


<?php echo $form->dropDownListRow(
    $model,
    'rprolist',array(),array('prompt'=>'Select Product')
); ?>
<?php echo $form->hiddenField(
    $model,
    'card_no'
); ?>

<?php echo $form->hiddenField(
    $model,
    'transaction_id'
); ?>

<?php echo $form->hiddenField(
    $model,
    'card_exp_mon'
); ?>
<?php echo $form->hiddenField(
    $model,
    'card_exp_year'
); ?>
<?php echo $form->textFieldRow(
    $model,
    'refundvalue'
); ?>
<?php echo $form->hiddenField(
    $model,
    'refundprovalue'
); ?>



<?php  echo CHtml::ajaxSubmitButton(
    'Refund',
    Yii::app()->createUrl('product/admin/order/refund'),

    array(
        'dataType'=>'json',
        'type' => 'POST',
        'data' => "js:$('#refund-form').serialize()",
        'success'=>'function(data){
                    if(data["msg"]=="success"){
                         $("#refundModal").modal("hide");
                         bootbox.dialog(data["val"]);
                         setTimeout(function(){bootbox.hideAll();},2000);

                    }else{
                        formerrorshow($("#refund-form"),data["val"]);
                    }
                    }',


    ),
    array(
        'class'=>'button'
    )
);
?>

<?php $this->endWidget() ?>
<span style="color: red">* It can be done only for the settled transaction and a transaction might take upto 48 hours to settle.</span>
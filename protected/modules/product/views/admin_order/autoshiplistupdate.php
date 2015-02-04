<?php 

                $mon = array(''=>'MM','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12');

                $y = date('Y');
                $year[''] = 'YYYY';
                for($i=$y-1;$i<$y+30;$i++){
                    $year[$i] =$i;
                }


                /** @var BootActiveForm $form */
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'autoupForm12',
                    'enableAjaxValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    )
                )); ?>
            <div class="form-contain">

                <?php echo $form->textFieldRow($model, 'card_no'); ?>
                <?php echo $form->dropDownListRow($model, 'card_exp_mon',$mon)?>  
                <?php echo $form->dropDownListRow($model, 'card_exp_year',$year)?>  
                <?php echo $form->textFieldRow($model, 'card_cvv'); ?>

            </div>
<?php  echo CHtml::ajaxSubmitButton(
    'update',
    Yii::app()->createUrl('product/admin/order/autoshipupdate'),
    array(
        'dataType'=>'json',
        'type' => 'POST',
        'data' => "js:$('#autoupForm12').serialize()",
        'success'=>'function(data){
                    if(data["msg"]=="success"){
                         //$("#addnotesModal").modal("hide");
                         //bootbox.dialog("Notes Added Successfully");
                         //setTimeout(function(){bootbox.hideAll();shownote1(data["val"]);},2000);

                    }else{
                        formerrorshow1($("#autoupForm"),data["val"]);
                    }
                    }',

        // 'beforeSend'=>'before',
    ),
    array(
        'class'=>'button'
    )
);
?>

<?php $this->endWidget(); ?>
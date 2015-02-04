    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'add-note',
    'enableAjaxValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    )
)); ?>

    <input type="hidden" name="uid" id="userid" value="10">


    <?php echo $form->textAreaRow(
        $model,
        'notes'
    ); ?>



        <?php  echo CHtml::ajaxSubmitButton(
            'Save',
            Yii::app()->createUrl('user/admin/user/addnote1'),
            array(
                'dataType'=>'json',
                'type' => 'POST',
                'data' => "js:$('#add-note').serialize()",
                'success'=>'function(data){
                    if(data["msg"]=="success"){
                         $("#addnotesModal").modal("hide");
                         bootbox.dialog("Notes Added Successfully");
                         setTimeout(function(){bootbox.hideAll();shownote1(data["val"]);},2000);

                    }else{
                        formerrorshow($("#add-note"),data["val"]);
                    }
                    }',

               // 'beforeSend'=>'before',
            ),
            array(
                'class'=>'button'
            )
        );
        ?>

    <?php $this->endWidget() ?>
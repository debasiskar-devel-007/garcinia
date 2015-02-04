<?php
    $baseUrl =  Yii::app()->BaseUrl;
?>

       <?php /** @var TbActiveForm $form */
            $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            array(
                'id' => 'cngpassform',
                'enableAjaxValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                )
            )
            ); ?>
            
            <input type="hidden" name="id" id="userid" value="10">                

        <?php echo $form->passwordFieldRow(
            $model,
            'password'
            ); ?>

        <?php echo $form->passwordFieldRow(
            $model,
            'password2'
            ); ?>




<?php  echo CHtml::ajaxSubmitButton(
    'Submit',
    Yii::app()->createUrl('user/admin/user/changePass'),
    array(
        'dataType'=>'json',
        'type' => 'POST',
        'data' => "js:$('#cngpassform').serialize()",
        'success'=>'function(data){
                    if(data["msg"]=="success"){
                                               $("#cngpassModal").modal("hide");
                                               bootbox.dialog("Password Changed Successfully");
                                               setTimeout(function(){bootbox.hideAll();},2000);
                    }else{
                        formerrorshow($("#cngpassform"),data["val"]);
                    }
                    }',

        // 'beforeSend'=>'before',
    ),
    array(
        'class'=>'button'
    )
);
?>
        

        <?php
            $this->endWidget(); ?>

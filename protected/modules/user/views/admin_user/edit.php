<?php
    $baseUrl =  Yii::app()->BaseUrl;
?>

<div id="main">
    <div id="content">
        <h2 id="pageTitle">Edit User</h2>                            

        <?php /** @var TbActiveForm $form */
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
            'fname'
            ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'lname'
            ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'email'
            ); ?>

 <!--       --><?php /*echo $form->dropDownListRow(
            $model,
            'role',$roleList,array('options'=>array($prevRole=>array('selected'=>'selected')))
        ); */?>

        <?php echo $form->dropDownListRow(
            $model,
            'role',$roleList, array('multiple'=>true,'onclick'=>'isAffliate(this)','options'=>$selOptions)
        ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'cpa',array('readonly'=>true)
        ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'cpc',array('readonly'=>true)
        ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'cpl',array('readonly'=>true)
        ); ?>


        <?php echo $form->textFieldRow(
            $model,
            'phone'
            ); ?>

        <?php echo $form->datepickerRow(
            $model,
            'dob',
            array(
            'prepend' => '<i class="icon-calendar"></i>'
            )
            ); ?>

     <?php //echo $form->hiddenField($model,'role',array('value'=>1)); ?>



        <?php echo $form->textAreaRow(
            $model,
            'address'
            ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'city'
            ); ?>

        <?php echo $form->dropDownListRow(
            $model,
            'country',$countryList,array('onchange'=>'getState(this,\'UserManager_state\')')
            ); ?>

        <?php echo $form->dropDownListRow(
            $model,
            'state',array(''=>'Select Country First')
            ); ?>

        <?php echo $form->toggleButtonRow($model, 'gender',array('options'=>array('enabledLabel'=>'Male' , 'disabledLabel'=>'Female','width'=>'180'))); ?>                

        <?php echo $form->toggleButtonRow($model, 'is_active'); ?>                


        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Submit',
            'htmlOptions' => array('class'=>'button'),
            ) 
            ); ?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array('buttonType' => 'reset', 'label' => 'Cancel','htmlOptions' => array('class'=>'button','onclick'=>'javascript:window.location.href=\''.$baseUrl.'/user/admin/user\''))
            ); ?>


        <?php
            $this->endWidget(); ?>

        <input type="hidden" id="sel_state" value="<?php echo (isset($model['state']))?$model['state']:$result['state']; ?>">

    </div>
     </div>
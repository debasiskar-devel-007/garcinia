<div id="main">
    <div id="content">

        <h2 id="pageTitle">Add Shipping</h2>

        <?php 
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
            'shipping_name'
        ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'shipping_charge'
            ); ?>
        <?php echo $form->ckEditorRow($model, 'shipping_desc', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));?>


        <?php echo $form->toggleButtonRow($model, 'isactive',array('options'=>array('enabledLabel'=>'Active' , 'disabledLabel'=>'Inactive','width' => '150'))); ?>


        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Submit',
                'htmlOptions' => array('class'=>'btn1'),
            )
        ); ?>


        <?php
            $this->endWidget(); ?>
            

            
            
    </div>
</div>
    
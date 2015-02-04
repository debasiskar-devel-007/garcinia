<div id="main">
    <div id="content">

        <h2 id="pageTitle">Set Processing Fee</h2>

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
            'shipping_charge',array('labelOptions' => array('label' => 'Processing Fee'))
            ); ?>


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
    
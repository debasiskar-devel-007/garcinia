<?php  $themeUrl = Yii::app()->theme->baseUrl;  
       $base =  Yii::app()->request->baseUrl;
?>



               <?php /** @var TbActiveForm $form */
            $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation' =>true, 
            'action'=>$base.'/Contactus/default/index',
            )
            ); ?>  
        
     
        <?php echo $form->textFieldRow(
            $model,
            'name',
            array('placeholder'=>'First Name')
            ); ?>
     
    
        <?php echo $form->textFieldRow(
            $model,
            'email',
            array('placeholder'=>'Email')
            ); ?>
     
            <?php echo $form->textFieldRow(
            $model,
            'subject',
            array('placeholder'=>'Subject')
            ); ?>
     
                   <?php echo $form->textAreaRow(
            $model,
            'message',
            array('placeholder'=>'Message')
            ); ?>
        
<div class="clear"></div>
                       
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Submit',
            'htmlOptions' => array('class'=>'btn'),
            ) 
            ); ?>
       


        <?php
            $this->endWidget(); ?>
        

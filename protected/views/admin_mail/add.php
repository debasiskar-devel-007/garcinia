<div class="newform">
  

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'type' =>'horizontal',
      'enableClientValidation'=>true,
    'htmlOptions'=>array('class'=>''),
)); ?>


    
  
   <?php
   $base1= Yii::app()->getBaseUrl(true);
   
    //echo $base1;
    //exit;
?>
                                                <div id="main">
    <div id="content">
        <h2  id="pageTitle">Add an Admin Mail</h2>

 <?php echo $form->textFieldRow($model, 'name', array('class'=>'span3')); ?> </br> 
 <?php echo $form->textFieldRow($model, 'email', array('class'=>'span3')); ?> </br> 
 <?php echo $form->ckEditorRow($model, 'remarks', 
 array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));?>
 </br>
 <?php echo $form->toggleButtonRow($model, 'isactive'); ?> </br>
        
 <div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
</div>
 </div> 


<?php $this->endWidget(); ?>
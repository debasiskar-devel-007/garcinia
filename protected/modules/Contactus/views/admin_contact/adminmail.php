<div class="newform">
<h3>SET ADMIN MAIL HERE</h3>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
    )); ?>

<?php echo $form->textFieldRow($model, 'email', array('class'=>'span3')); ?>
</br>

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'UPDATE')); ?>


<?php $this->endWidget(); ?>
</div>
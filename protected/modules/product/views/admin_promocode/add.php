
 
<div id="main">
    <div id="content">
<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'bootstrap.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
'enableClientValidation' =>true, 
)
); ?>


 
<h2 id="pageTitle">Add Promo Code</h2>

 <?php echo $form->textFieldRow(
$model,
'code_text',
array(
'append' => '<a href="javascript:void(0);" id="coderefresh" style="margin-top:1px;"><img src="'.$this->module->getAssetsUrl().'/images/refresh.png" ></a>','value'=>$randomString
)
); ?>

<?php echo $form->datepickerRow(
$model,
'st_date',
array(
'prepend' => '<i class="icon-calendar"></i>','options'=>array('format' => 'yyyy-mm-dd' , 'weekStart'=> 1)
)
); ?>

<?php echo $form->datepickerRow(
$model,
'end_date',
array(
'prepend' => '<i class="icon-calendar"></i>','options'=>array('format' => 'yyyy-mm-dd' , 'weekStart'=> 1)
)
); ?>

 

 <?php /* echo $form->toggleButtonRow($model, 'type',array('options'=>array('enabledLabel'=>'Flat' , 'disabledLabel'=>'Percentage','width'=>'180'))); */ ?>

        <?php echo $form->dropDownListRow(
            $model,
            'type',
            array(0=>'Percentage',1=>'Flat',2=>'Free Shipping'),array('onchange'=>'changeType(this)')
        ); ?>

 <?php echo $form->textFieldRow(
$model,
'dis_value'
); ?>

<?php echo $form->toggleButtonRow($model, 'isactive'); ?>




<?php $this->widget(
'bootstrap.widgets.TbButton',
array(
'buttonType' => 'submit',
'type' => 'primary',
'label' => 'Submit',
'htmlOptions' => array('class'=>'btn1'),
) 
); ?>
<?php $this->widget(
'bootstrap.widgets.TbButton',
array('buttonType' => 'link', 'label' => 'Cancel','url'=>'listing','htmlOptions' => array('class'=>'btn1'))
); ?>


<?php
$this->endWidget(); ?>

<?php //$this->beginWidget(
    //'bootstrap.widgets.TbModal',
    //array('id' => 'myModal-img')
//); ?>
 <!--
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>Image</h4>
    </div>
 
    <div class="modal-body">
        
    </div>
 
    <div class="modal-footer">
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'type' => 'primary',
                'label' => 'Crop',
                'id' =>'sub_image',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal','class'=>'btn'),
            )
        ); ?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'label' => 'Close',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal','class'=>'btn'),
            )
        ); ?>
    </div>-->
 
<?php //$this->endWidget(); ?>
</div>
</div>
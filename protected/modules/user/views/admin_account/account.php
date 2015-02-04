<?php
    $baseUrl =  Yii::app()->BaseUrl;
   
?>


<div class="account-right">
   
   
   <h2>Account Information</h2>
   
<div class="account-text">
     
     <h5>Required Fields <span>*</span></h5>
     <?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'bootstrap.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
'enableClientValidation' =>true, 
)
); ?>

                                <?php


                        $this->widget('bootstrap.widgets.TbAlert', array(
                        'block' => true,
                        'fade' => true,
                        'closeText' => '&times;', // false equals no close link
                        'events' => array(),
                        'htmlOptions' => array(),
                        //'userComponentId' => 'user',
                        'alerts' => array( // configurations per alert type
                        // success, info, warning, error or danger
                        'success' => array('closeText' => '&times;'),
                        'info', // you don't need to specify full config
                        'warning' => array('block' => false, 'closeText' => false),
                        'error' => array('block' => false, 'closeText' => 'AAARGHH!!')
                        ),
                        ));
                    ?>   
     
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
'phone'
); ?> 



        <?php echo $form->datepickerRow(
            $model,
            'dob',
            array(
            'prepend' => '<i class="icon-calendar"></i>',
            
            )
            ); ?>

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
            'country',$countryList,array('onchange'=>'getState1(this,\'AccountInfo_state\')')
            ); ?>

        <?php echo $form->dropDownListRow(
            $model,
            'state',array(''=>'Select Country First')
            ); ?>

               <?php echo $form->toggleButtonRow($model, 'gender',array('options'=>array('enabledLabel'=>'Male' , 'disabledLabel'=>'Female','width'=>'180' , 'height'=>'25','height'=>'35','htmlOptions'=>array('style'=>'line-height:35px')))); ?> 
<?php $this->widget(
'bootstrap.widgets.TbButton',
array(
'buttonType' => 'submit',
'type' => 'primary',
'label' => 'Update',
'htmlOptions' => array('class'=>'btn1'),
) 
); ?>
<?php $this->widget(
'bootstrap.widgets.TbButton',
array('buttonType' => 'link', 'label' => 'Cancel','url'=>'listing','htmlOptions' => array('class'=>'btn1','style'=>'margin-left:10px'))
); ?>


<?php
$this->endWidget(); ?>

    <input type="hidden" id="sel_state" value="<?php echo (isset($model['state']))?$model['state']:$result['state']; ?>">

     
     
   
   </div>
   
   </div>
<?php
    $baseUrl =  Yii::app()->BaseUrl;
?>


<div class="account-right">
   
   
   <h2>Account Information</h2>
   
<div class="account-text">
     
     <h5>Change Password <span>*</span></h5>
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
     
 <?php echo $form->passwordFieldRow(
$model,
'oldpassword'
); ?>     

 <?php echo $form->passwordFieldRow(
$model,
'password'
); ?> 
     
      <?php echo $form->passwordFieldRow(
$model,
'password2'
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
<?php $this->widget(
'bootstrap.widgets.TbButton',
array('buttonType' => 'link', 'label' => 'Cancel','url'=>'listing','htmlOptions' => array('class'=>'btn1','style'=>'margin-left:10px'))
); ?>


<?php
$this->endWidget(); ?>
     
     
     
     
   
   </div>
   
   </div>
<?php
    $baseUrl =  Yii::app()->baseurl;
    $themeUrl = Yii::app()->theme->baseUrl;  
?>


<style type="text/css">
.login-body .controls #UserLogIn_email{ width:100%!important; border-radius:4px!important;}
</style>


 <div class="inner-wrapper">
<!-- login-left-->

 
 <!-- login-left end -->
<!-- login-form-->
 <div class="login-form">
   <div class="logintop"> <h2> Login</h2></div>
                

<div class="login-body">
  
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
            'email',
            array('placeholder'=>'Enter Your Email')
            ); ?>

        <?php echo $form->passwordFieldRow(
            $model,
            'password',array('value'=>'','placeholder'=>'Enter Your Password')
            ); ?>

 
 

        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Log In',
            'htmlOptions' => array('class'=>'button'),
            ) 
            ); ?>

            

        <?php
            $this->endWidget(); ?>
            
<div class="clear"></div>
   
   </div>
 
 <div class="loginbottom">
   
  <!-- <a href="<?php /*echo $baseUrl;*/?>/user/default/forgot-password">Recover Password</a>-->
   </div>
    
 
 </div>
 
 <!-- login-form end -->
 
 <div class="clear"></div>
 </div>



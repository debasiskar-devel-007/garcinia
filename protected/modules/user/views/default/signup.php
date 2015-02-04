<?php
    $baseUrl =  Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;
?>
                       
 <div class="inner-wrapper" style="width:100%;">
 
  <div class="login-form">
   <div class="logintop"> <h2> Sign UP</h2></div>
                

<div class="signup-body">
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
            'fname',
            array('placeholder'=>'First Name')
            ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'lname',
            array('placeholder'=>'Last Name')
            ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'email',
            array('placeholder'=>'Email')
            ); ?>

        <?php echo $form->passwordFieldRow(
            $model,
            'password',array('value'=>'','placeholder'=>'Password')

            ); ?>

        <?php echo $form->passwordFieldRow(
            $model,
            'password2',
            array('placeholder'=>'Confirm Password')
            ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'phone',
            array('placeholder'=>'Phone')
            ); ?>

        <?php echo $form->datepickerRow(
            $model,
            'dob',
            array(
            'prepend' => '<i class="icon-calendar"></i>',
            'placeholder'=>'Date Of Birth'
            )
            ); ?>

        <?php echo $form->textAreaRow(
            $model,
            'address',
            array('placeholder'=>'Address')
            ); ?>

        <?php echo $form->textFieldRow(
            $model,
            'city',
            array('placeholder'=>'City')
            ); ?>

        <?php echo $form->dropDownListRow(
            $model,
            'country',$countryList,array('onchange'=>'getState(this,\'UserManager_state\')')
            ); ?>

        <?php echo $form->dropDownListRow(
            $model,
            'state',array(''=>'Select Country First')
            ); ?>

        <?php echo $form->toggleButtonRow($model, 'gender',array('options'=>array('enabledLabel'=>'Male' , 'disabledLabel'=>'Female','width'=>'180' , 'height'=>'30','height'=>'40','htmlOptions'=>array('style'=>'line-height:35px')))); ?>       
                <?php
           // echo $form->checkboxRow($model, 'checkbox', array('value'=>1, 'uncheckValue'=>0));
        ?>         
        

      
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
            array('buttonType' => 'reset', 'label' => 'Cancel','htmlOptions' => array('class'=>'button','onclick'=>'javascript:window.location.href=\''.$baseUrl.'/user/\''))
            ); ?>


        <?php
            $this->endWidget(); ?>


        <input type="hidden" id="sel_state" value="<?php echo $model['state']; ?>">
        <div class="clear"></div>

</div></div></div>
<?php
    $baseUrl =  Yii::app()->BaseUrl;
    
?>
<div id="main">
         <div id="content">
                 <h2 id="pageTitle">Create New Role</h2>                            
 
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
        'name'
        ); ?>

    <?php echo $form->ckEditorRow(
        $model,
        'description'
        ); ?>
               
               
 <?php echo $form->toggleButtonRow($model, 'is_active'); ?>                

                  
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
        array('buttonType' => 'reset', 'label' => 'Cancel','htmlOptions' => array('class'=>'button','onclick'=>'javascript:window.location.href=\''.$baseUrl.'/user/admin/role\''))
        ); ?>
                  
                                       
<?php
    $this->endWidget(); ?>
                
        </div>
     </div>
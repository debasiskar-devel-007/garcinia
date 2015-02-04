<?php
    $baseUrl =  Yii::app()->BaseUrl;
    
?>
<div id="main">
         <div id="content">
                 <h2 id="pageTitle">Add Stock</h2>                            
 
<?php /** @var TbActiveForm $form */
    $form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm',
    array(
    'id' => 'horizontalForm',
    'type' => 'horizontal',
    'enableClientValidation' =>true, 
    )
    ); ?>                
                    
      <?php echo $form->dropDownListRow(
        $model,
        'product_id',$productlist, array('options' => array($id=>array('selected'=>true)))

        ); ?>

    <?php echo $form->textFieldRow(
        $model,
        'stock'
        ); ?>
               
 
                  
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
        array('buttonType' => 'reset', 'label' => 'Cancel','htmlOptions' => array('class'=>'button','onclick'=>'javascript:window.location.href=\''.$baseUrl.'/product/admin/stock\''))
        ); ?>
                  
                                       
<?php
    $this->endWidget(); ?>
                
        </div>
     </div>
<div id="main">
    <div id="content">
    <h2 id="pageTitle">Edit Content</h2>
    
    <?php 
            $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation' =>true, 
            )
            ); 

        ?>

        <?php echo $form->dropDownListRow(
$model,
'content_type',
array(''=>'Select a Type','HTML'=> 'HTML', 'IMAGE'=>'IMAGE', 'VIDEO'=>'VIDEO','TEXT'=>'TEXT'),
 array('class'=>'contype')
); ?>
                    <?php echo $form->dropDownListRow(
            $model,
            'page_id',
            $arr
            ); ?>
        <div id="img" style="display: none;">
            <?php echo $form->toggleButtonRow($model, 'image_type',array('options'=>array('enabledLabel'=>'Single' , 'disabledLabel'=>'Multiple','width' => '150'))); ?>
            
             <?php echo $form->textFieldRow($model, 'img_width'); ?>  
             <?php echo $form->textFieldRow($model, 'img_height'); ?>  
        </div>
        <?php echo $form->ckEditorRow($model, 'content_desc', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));?>
          

        <?php echo $form->toggleButtonRow($model, 'content_status',array('options'=>array('enabledLabel'=>'Active' , 'disabledLabel'=>'Inactive','width' => '150'))); ?>  
        

        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); 
        ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>

        <?php
            $this->endWidget(); 

        ?>
    
    
    
    </div>
</div>
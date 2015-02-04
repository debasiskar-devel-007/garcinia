
  <script type="text/javascript"> 
    var currentuser_id;
    var data;
    var base_url="<?php echo Yii::app()->getBaseUrl(true); ?>";



</script>
 
                                        <div id="main">
    <div id="content">
        <h2  id="pageTitle">Contact Manager</h2>

 <?php

        $this->widget('bootstrap.widgets.TbExtendedGridView', array(
        'type' => 'striped bordered',
        'dataProvider'=>$model->search(),
        'template' => "{summary}{items}{pager}",
        //---------------------------------------------- this widget code is written add a bulk action------ 

       


        //----------------------------------------------End of bulk action-------
        'enablePagination' => true,
        'summaryText'=>'Displaying {start}-{end} of {count} results.',
        'filter'=>$model,
        'columns' => array(




        array(
        //'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'name',
        'header'=>'name',
        'filter' => CHtml::activeTextField($model, 'name'),
        'value' => '$data->name',
        'id'=>'$data[uid]',
        'sortable'=>true,
       

   
        ),

        array(
        //'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'email',
        'header'=>'email',
        'filter' => CHtml::activeTextField($model, 'email'),
        'value' => '$data->email',
        'sortable'=>true,
        'type'=>'html',
             
        ),
        
         array(
        //'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'subject',
        'header'=>'subject',
        'filter' => CHtml::activeTextField($model, 'subject'),
        'value' => '$data->subject',
        'id'=>'$data[uid]',
        'sortable'=>true,

   

   
        ),
        

         
         array(
        //'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'message',
        'header'=>'message',
        'filter' => CHtml::activeTextField($model, 'message'),
        'value' => '$data->message',
        'id'=>'$data[uid]',
        'sortable'=>true,

   

   
        ),
        
                    array(
        //'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'date',
        'filter' => CHtml::activeTextField($model, 'date'),
      'value'=>'date("m/d/Y", strtotime($data->date))',
        'id'=>'$data[uid]',
        'sortable'=>true,
        

   
        ),
        
        

        
           array
(
    'class'=>'CButtonColumn',
    'template'=>'{dialog}',
    
    'buttons'=>array
    (    'evaluateID'=>true,   
        'dialog' => array
        (
            'label'=>'Message',  
            'url'=>'"#$data->id"',
              
             'options' => array('id'=>'$data->id'),     
            'click'=>'function(){
            
         var val = $(this).attr("id");    
          alert(val);    
       
        
               $.post(base_url+"/Contactus/admin_contact/showcomment",{"id":val},function(res){
               
               
    

    $("#myModal3").children("div.modal-body").html(res); 


               });
            //$("#dialog_id").dialog("open"); return false;
            //widthCal("#mymodal3");  
                  $("#myModal3").modal("show");  
            }',
            //'htmlOptions'=>array('id'=>$data->id),
        ),


        
        
        

        

    ),
),

        
        

        
     
        
        



        

        
        )
        ));
    ?>
    <?php 
    $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'myModal3')); ?>
     
    <div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4 style="color: black;">Message</h4>
    </div>
     
    <div class="modal-body" style="color: black;">
    
    </div>
     
    <div class="modal-footer">

    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Close',
    'url' => '#',
    'htmlOptions' => array('data-dismiss' => 'modal'),
    )); ?>
    </div>
     
    <?php $this->endWidget(); ?>


                      </div>
</div>

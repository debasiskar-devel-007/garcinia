<script type="text/javascript"> 
    
    var base_url="<?php echo Yii::app()->getBaseUrl(true); ?>";



</script>
<?php


    if(Yii::app()->user->hasFlash('success')) //checked whether the success message is been set or not. If set then the folling widget will run.
    {

        $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>true, // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
        'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'x'), // success, info, warning, error or danger
        ),
        ));
    }
    else if(Yii::app()->user->hasFlash('error'))//checked whether the error message is been set or not.If set then the folling widget will run.
        {
            $this->widget('bootstrap.widgets.TbAlert', array(
            'block'=>true, // display a larger alert block?
            'fade'=>true, // use transitions?
            'closeText'=>true, // close link text - if set to false, no close link is displayed
            'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'x'), // success, info, warning, error or danger
            ),
            ));
        }


?>
   <div id="main">
    <div id="content">
        <h2  id="pageTitle">Mail Manager</h2>

<div style="float: right;margin-bottom: 30px;">
    <?php
        $base_url=Yii::app()->getBaseUrl(true);
        $this->widget('bootstrap.widgets.TbButton',array(
        'label' => 'Add',
        'type' => 'primary',
        'size' => 'small',
        
        'url' => $this->createUrl('admin/mail/add'),
        ));
                                                                                  
    ?>
</div>

<div style="float: right;margin-right: 10px !important;">
    <?php
        $base_url=Yii::app()->getBaseUrl(true);
        $this->widget('bootstrap.widgets.TbButton',array(
        'label' => 'Showall',
        'type' => 'primary',
        'size' => 'small',
        
        'url' => $this->createUrl('adminmail/index'),
        ));
                                                                                  
    ?>
</div>
<br />


 
   
   
   
    <?php

        $this->widget('bootstrap.widgets.TbExtendedGridView', array(
        'type' => 'striped bordered',
        'dataProvider'=>$model->search(),
        'template' => "{summary}{items}{pager}",
        //---------------------------------------------- this widget code is written add a bulk action------ 

        'bulkActions' => array(
        'actionButtons' => array(

        array(
        'buttonType' => 'button',
        'type' => 'primary',
        'size' => 'small',
        'label' => 'Delete Selected',
        //'click' => 'js:function(values){console.log(values);}',
        //'url' => $this->createUrl('role/deleteall'),
        //'url'=>'yii::app()->controller->createUrl("role/deleteall")',
        'click' => 'js:function(checked){
        var values = [];
        checked.each(function(){
        values.push($(this).val());
        //alert($(this).val());
        });
        $.ajax({
        type: "POST",
        url:"deleteall", 
        data: {ids:values.join(",")},
        success:function(data){
        $(".idcheckbox" ).each(function( index ) {     
        var chkid=($(this).children().val());       //here this refers to td then its child input value is selected.
        var ckhflag=($.inArray(chkid,values));    //here it is being checked whether chkid is in the array value or not.
        if(ckhflag!=-1)
        {
        $(this).parent().slideUp(500);
        //$(this).parent().remove();
         bootbox.alert(" your selected mail has been deleted !");
        }
      
        });

        }
        
        //bootbox.alert(" your selected user has been activated !"); 
        });

        }'
        ),
        array(
        'buttonType' => 'button',
        'type' => 'primary',
        'size' => 'small',
        'label' => 'Active Selected',
        'click' => 'js:function(values){console.log(values);}',

        'click' => 'js:function(checked){
        var values = [];
        checked.each(function(){
        values.push($(this).val());

        });
                $(".idcheckbox").children("input").each(function(){
            if($(this).is(":checked")){
            //alert($(this).val())
                    if($(this).parent("td").parent("tr").children("td.toggle-column").children("a").children("i").attr("class")=="icon-remove-sign"){
                         $(this).parent("td").parent("tr").children("td.toggle-column").children("a").click();   
                    }
                   
            
                 //alert($(this).val());   
            }
            //bootbox.alert("your data is activated");    
        });

         bootbox.alert(" your selected mail has been activated !");  
        }'

        ),

        array(
        'buttonType' => 'button',
        'type' => 'primary',
        'size' => 'small',
        'label' => 'Deactive Selected',
        'click' => 'js:function(values){console.log(values);}',

        'click' => 'js:function(checked){
        
        var values = [];
        checked.each(function(){
        values.push($(this).val());

        });
        
        $(".idcheckbox").children("input").each(function(){
            if($(this).is(":checked")){
            //alert($(this).val())
                    if($(this).parent("td").parent("tr").children("td.toggle-column").children("a").children("i").attr("class")=="icon-ok-circle"){
                         $(this).parent("td").parent("tr").children("td.toggle-column").children("a").click();   
                    }
                     
                 //alert($(this).val());   
            }
            //bootbox.alert("your data is deactivated");    
        });
             
         bootbox.alert(" your selected mail has been deactivated !");  
      

        }'
        )

        ),

        // if grid doesn't have a checkbox column type, it will attach
        //one and this configuration will be part of it
        'checkBoxColumnConfig' => array(
        'name' => 'id',
        'htmlOptions'=>array('class'=>'idcheckbox'),
        //'class'=>'idcheck'
        // 'idval'=>'{data}'
        ),
        ),

  


        //----------------------------------------------End of bulk action-------
        'enablePagination' => true,
        'summaryText'=>'Displaying {start}-{end} of {count} results.',
        'filter'=>$model,
        'columns' => array(




        array(
        'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'name',
        'filter' => CHtml::activeTextField($model, 'name'),
        'value' => '$data->name',
        'type'=>'html',
        'id'=>'$data[uid]',
        'sortable'=>true,
        'editable' => array(
        'url' => $this->createUrl('adminmail/EditableSaver'),
        'placement' => 'right',
        'inputclass' => 'span3',
        'validate' => 'js: function(value){
        if($.trim(value) == "") return "This field is required";
        }'
        ),

   
        ),

        array(
       'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'email',
        'filter' => CHtml::activeTextField($model, 'email'),
        'value' => '$data->email',
        'sortable'=>true,
        'type'=>'html',
                'editable' => array(
        'url' => $this->createUrl('adminmail/EditableSaver'),
        'placement' => 'right',
        'inputclass' => 'span3',
        'validate' => 'js: function(value){
        if($.trim(value) == "") return "This field is required";
        }'
        ),
             
        ),
        
         array(
    'class'=>'bootstrap.widgets.TbToggleColumn',
    'toggleAction'=>'admin_mail/toggle',
    'name' => 'isactive',
    'header' => 'Status' 
    ),

        array(
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'class'=>'bootstrap.widgets.TbButtonColumn',
        //'afterDelete'=>"function(link,success,data){ if(success) $(this).parent().parent().parent().remove(); }",
        //'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",
        'template' => '{delete}  ',   //the bootstrap is modified to remove the view. 

       // 'deleteButtonUrl'=>'Yii::app()->controller->createUrl("role/delete", array("id"=>$data[id]))', //the control is redirected to role/delete with the id value.
       // 'updateButtonUrl'=>'yii::app()->controller->createUrl("role/updatedata",array("id"=>$data[id]))',
        ),
        
         array
(
    'class'=>'CButtonColumn',
    'template'=>'{dialog}',
    
    'buttons'=>array
    (
        'dialog' => array
        (
            'label'=>'REMARKS',
            'url'=>'"#"',
            //'options' => array('id'=>$data->id),
            'click'=>'function(){
            
         var id=$(this).parent().parent().children().children().val(); 
         //alert(id);
               $.post(base_url+"/Contactus/admin/mail/showans",{"id":id},function(res){
               // $("#vw_content").click();
        
    
    

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
    
    
    
</div>
</div> 

<?php //------------------------------ VIEW content------------------- ?>



<?php

 $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'myModal3')); ?>
     
    <div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>REMARKS</h4>
    </div>
     
    <div class="modal-body">
    <p>One fine body...</p>
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
<?php

$sess = Yii::app()->session['sess_user'];
if(isset($sess)){
if(in_array(11,$sess['role']))
$r='table-cell';
else
$r='none';
}
else
    $r='none';


?>
<div id="main">
    <div id="content">
        <h2 id="pageTitle">Landing Listing</h2>

        <?php Yii::import('zii.widgets.ButtonColumn');  ?>
        <?php

            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Add',
            'type' => 'primary',
            'size' => 'small',
            'url' => Yii::app()->request->baseUrl.'/landing_page_manager/admin/landingpage/add',
            'htmlOptions' => array('style'=>'float:right;margin-left:10px')
            ));

        ?>
        
                <?php

            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Show All',
            'id'=>"refresh", 
            'type' => 'primary',
            'size' => 'small',
            'url' => Yii::app()->request->baseUrl.'/landing_page_manager/admin/landingpage/add',
            'htmlOptions' => array('style'=>'margin-bottom:6px; margin-left:12px;float:right')
            ));

        ?>
           
        <?php

            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',


            'dataProvider'=>$model->search(),
            'template' => "{summary}{items}{pager}",
             'id'=>'user-grid',
            //---------------------------------------------- this widget code is written add a bulk action------ 


            'bulkActions' => array(
            'actionButtons' => array(


            array(
            'buttonType' => 'button',
            'type' => 'primary',
            'size' => 'small',
            'label' => 'Delete Selected',
            'click' => 'js:function(checked){
            var values = [];
            checked.each(function(){
            values.push($(this).val());
            //alert(values);

            });
            $.ajax({
            type: "POST",
            url:base_url+"/landing_page_manager/admin/landingpage/deleteall", 
            data: {ids:values.join(",")},
            success:function(data){
            //alert(data);
            $(".idcheckbox" ).each(function( index ) { //to delete the tr that has been deleted.    
            var chkid=($(this).children().val());  
            //here this refers to td then its child input value is selected.
            var ckhflag=($.inArray(chkid,values));    //here it is being check whether chkid is in the array value or not.
            if(ckhflag!=-1)
            {
            $(this).parent().slideUp(500);
            //$(this).parent().remove();
            }
            });
            //alert(data);
            //update the grid now
            // $("#yw2").yiiGridView("delete");
            }
            });

            }'

            ),
            array(
            'buttonType' => 'button',
            'type' => 'primary',
            'size' => 'small',
            'class'=>'btn',
            'label' => 'Active Selected',
            'click' => 'js:function(checked){
            bootbox.dialog(\'Processing.. Please wait\');
            var values = [];
            checked.each(function(){
            values.push($(this).val());

            });
            $.post(base_url+\'/landing_page_manager/admin_landingpage/bulkupdate\',
            {values:values,attr:\'isactive\',status:1},function(res){
            bootbox.hideAll();
            bootbox.alert("Your selected Product has been successfully activated.");
            $(\'#yw0_c0_all\').attr(\'checked\',false);
            checked.each(function(){
            $(this).attr(\'checked\',false);
            var togClassI=$(this).parent("td").parent("tr").children("#st").children("a").children("i");
           // $(togClassI).attr("class","icon-ok-circle");
            });
            
            var grid= "user-grid";
            $.fn.yiiGridView.update(grid);

            });
            
            }'

            ), 

            array(
            'buttonType' => 'button',
            'type' => 'primary',
            'size' => 'small',
            'class'=>'btn',
            'label' => 'Deactive Selected',
            //'click' => 'js:function(values){console.log(values);}',

            'click' => 'js:function(checked){
            bootbox.dialog(\'Processing.. Please wait\');
            var values = [];
            checked.each(function(){
            values.push($(this).val());

            });
            $.post(base_url+\'/landing_page_manager/admin_landingpage/bulkupdate\',
            {values:values,attr:\'isactive\',status:0},function(res){
            bootbox.hideAll();
            bootbox.alert("Your selected Product has been successfully deactivated.");
            $(\'#yw0_c0_all\').attr(\'checked\',false);
            checked.each(function(){
            $(this).attr(\'checked\',false);
            var togClassI=$(this).parent("td").parent("tr").children("#st").children("a").children("i");
            //$(togClassI).attr("class","icon-remove-sign");
            });
            var grid= "user-grid";
            $.fn.yiiGridView.update(grid);
            
            });
            
            
            }'

            ),





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
                    //'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'id',
                    'filter' => CHtml::activeTextField($model, 'id'),
                    'value' => '$data->id',
                    'id'=>'$data[id]',
                    'sortable'=>true,

                    ),

            
            
                           array( 
    'class'=>'bootstrap.widgets.TbImageColumn',
    'header' => 'Landing Page Image',
    'imagePathExpression'=>'$data->userImagePath($data->image)',
    'usePlaceKitten'=>FALSE,
    'htmlOptions'=>array('style'=>'max-height:46px;max-width:46px;')
    //'placement' => 'right',
    //'inputclass' => 'span3'
    ),
            
            
          //  array(
//            'class'=>'bootstrap.widgets.TbRelationalColumn',
//            'name' => 'image',
//            'filter' =>false,
//            'url' => $this->createUrl('admin/product/getImage/$data[id]'),
//            'value'=> '"View Image"',
           // 'afterAjaxUpdate' => 'js:function(tr,rowid,data){
            //bootbox.alert(rowid);
           // }'
//            ),


            array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'name',
            'filter' => CHtml::activeTextField($model, 'name'),
            'value' => '$data->name',
            'id'=>'$data[id]',
            'sortable'=>true,
            'editable' => array(
            'url' => $this->createUrl('admin/landingpage/EditableSaver'),
            'placement' => 'right',
            'inputclass' => 'span3',
            'validate' => 'js: function(value){
            if($.trim(value) == "") return "This field is required";
            }'
            ),

            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),
            array(
            //'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'url',
            'filter' => CHtml::activeTextField($model, 'url'),
            'value' => 'Yii::app()->getBaseUrl(true)."/".$data->url',
            'id'=>'$data[id]',
            'sortable'=>true,
            /*'editable' => array(
            'url' => $this->createUrl('admin/landingpage/EditableSaver'),

            'placement' => 'right',
            'inputclass' => 'span3',
            'validate' => 'js: function(value){
            if($.trim(value) == "") return "This field is required";
            }'
            ),*/

            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),









            //................for toggle coloum [start]..........
            array(
            'class'=>'bootstrap.widgets.TbToggleColumn',
            'toggleAction'=>'admin/landingpage/toggle',
            'displayText'=>true,
            'checkedButtonLabel'=>'Active',
            'uncheckedButtonLabel'=>'Inactive',
//            'checkedIcon'=>false,
//            'uncheckedIcon'=>false,
            
            'afterToggle'=>'function(success,data){ if (success) 
            {
            if(bulkstatus!=1)
            {
            bootbox.hideAll();
           
            if($(sel).children().children().attr("class")=="icon-ok-circle")
            bootbox.alert( "Landing Page is deactivated");
            if($(sel).children().children().attr("class")=="icon-remove-sign")
            bootbox.alert("Landing Page is activated");
            //alert(9);
            }

            }

            }',
            'sortable'=>true,   
            'name' => 'isactive',
            'htmlOptions'=>array('id'=>'st','onclick'=>'toggle(this)'),
            'header' => 'Status'
            ),



            //................for toggle coloum [End]..........

            //-------------------------Additional Action Links----------------------------
            array
            (
            'class'=>'ButtonColumn',
            'template'=>'{dialog}</br>',
            'evaluateID'=>true,
            'header'=>'',
            //'htmlOptions'=>array('id'=>'$data->id'),

            'buttons'=>array
            (    

            'dialog' => array
            (
            'label'=>'Description',
            //'imageUrl'=>'$data->id',
            //'url'=>'"$data->id"',
            // 'id' => '$data->id',


            // 'sss'=>'$data->id',
            'options' => array('id'=>'$data->id'), 

            'click'=>'function(){
            var val = $(this).attr("id");


            //alert(val);
            $("#swdesc").html("<span>loading..</span>");
            $.post(base_url+"/landing_page_manager/admin/landingpage/showcontent",{"id":val},function(res){

            //alert(res); 

            // $("#myModal").modal(\'show\');
            $("#swdesc").html(res); 

            })
            $("#myModal").modal(\'show\');
            }',

            ),


            ),
            ),
            //------------------------- End Additional Action Links----------------------------






            array(
            'htmlOptions' => array('nowrap'=>'nowrap','style'=>'display:'.$r),
            'headerHtmlOptions'=>array('nowrap'=>'nowrap','style'=>'display:'.$r),
            'filterHtmlOptions'=>array('nowrap'=>'nowrap','style'=>'display:'.$r),
            'visible'=>'false',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            //'afterDelete'=>"function(link,success,data){ if(success) $(this).parent().parent().parent().remove(); }",
            //'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",

                'template' => '{delete} {update}',   //the bootstrap is modified to remove the view.
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("admin/landingpage/deletedata", array("id"=>$data->id))', //the control is redirected to role/delete with the id value.
            'updateButtonUrl'=>'yii::app()->controller->createUrl("admin/landingpage/updatedata",array("id"=>$data->id))',

                ),


            )
            ));
        ?>

        <?php $this->beginWidget(
            'bootstrap.widgets.TbModal',
            array('id' => 'myModal')
            ); ?>

        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h4>Landing Page Description:</h4>
        </div>

        <div class="modal-body" id="swdesc">
            <span>loading..</span>
        </div>

        <div class="modal-footer">

            <?php $this->widget(
                'bootstrap.widgets.TbButton',
                array(
                'label' => 'Close',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal','class'=>'modal-btn'),
                )
                ); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
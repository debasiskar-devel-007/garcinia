<script type="text/javascript">
    var baseUrl ="<?php echo yii::app()->baseurl;  ?>"
    var assetUrl ="<?php echo $this->module->assetsUrl;  ?>"



    var sel;
    var bulkstatus=0;
    function toggle(el)
    {
        alert(el);
        if(bulkstatus!=1)
            {
            bootbox.dialog('Processing.. Please wait');
            sel=el;
        }
    }
</script>


<div id="main">
    <div id="content">
        <h2 id="pageTitle"> Blog Listing </h2>

        <div style="margin-top: 10px;" class="newtable">   
            <?php

                $base_url=Yii::app()->getBaseUrl(true);
                $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Show All',
                'type' => 'primary',
                'size' => 'small',
                'id'=>"show_but",

                //'url' => $this->createUrl('#'),
                'htmlOptions'=>array('style'=>"display:none;")
                ));

            ?>



            <div style="float: right;" class="newform">
                <?php
                    $baseUrl = Yii::app()->request->baseUrl;
                    $this->widget('bootstrap.widgets.TbButton',array(
                    'label' => 'Add',
                    'type' => 'primary',
                    'size' => 'small',
                    'url' => $baseUrl.'/blog/admin/blog/add',
                    ));
                ?>
            </div>

            <?php


                Yii::import('zii.widgets.ButtonColumn');


                $this->widget('bootstrap.widgets.TbExtendedGridView', array(
                'type' => 'striped bordered',
                'id' =>'user-grid',
                // 'dataProvider' => new CActiveDataProvider('dev',array(
                // 'criteria'=>array('condition'=>'id < 95'))  // only the values of the corresponding ids with less than 5 value will get                                                       displayed
                // ),
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
                'click' => 'js:function(checked){
                var values = [];
                checked.each(function(){
                values.push($(this).val());

                });
                $.ajax({
                type: "POST",
                url:baseUrl+"/blog/admin/blog/deleteall", 
                data: {ids:values.join(",")},
                success:function(data){
                $(".idcheckbox" ).each(function( index ) { //to delete the tr that has been deleted.    
                var chkid=($(this).children().val());       //here this refers to td then its child input value is selected.
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
                'label' => 'Activate Selected',
                'click' => 'js:function(checked){
                bootbox.dialog(\'Processing.. Please wait\');
                var values = [];
                checked.each(function(){
                values.push($(this).val());

                });
                $.post(baseUrl+\'/blog/admin_blog/bulkupdate\',
                {values:values,attr:\'pr_status\',status:1},function(res){
                bootbox.hideAll();
                bootbox.alert("Your selected Blogs has been successfully activated.");
                $(\'#yw0_c0_all\').attr(\'checked\',false);
                checked.each(function(){
                $(this).attr(\'checked\',false);
                var togClassI=$(this).parent("td").parent("tr").children("#st").children("a").children("i");
               
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
                'label' => 'Enable Selected',
                'click' => 'js:function(checked){
                bootbox.dialog(\'Processing.. Please wait\');
                var values = [];
                checked.each(function(){
                values.push($(this).val());

                });
                $.post(baseUrl+\'/blog/admin_blog/bulkupdate\',
                {values:values,attr:\'enablecom\',status:1},function(res){
                bootbox.hideAll();
                bootbox.alert("Your selected Blogs Comment has been successfully activated.");
                $(\'#yw0_c0_all\').attr(\'checked\',false);
                checked.each(function(){
                $(this).attr(\'checked\',false);
                var togClassI=$(this).parent("td").parent("tr").children("#st").children("a").children("i");
                
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
                'label' => 'Deactivate Selected',
                //'click' => 'js:function(values){console.log(values);}',

                'click' => 'js:function(checked){
                bootbox.dialog(\'Processing.. Please wait\');
                var values = [];
                checked.each(function(){
                values.push($(this).val());

                });
                $.post(baseUrl+\'/blog/admin_blog/bulkupdate\',
                {values:values,attr:\'pr_status\',status:0},function(res){
                bootbox.hideAll();
                bootbox.alert("Your selected Blogs has been successfully deactivated.");
                $(\'#yw0_c0_all\').attr(\'checked\',false);
                checked.each(function(){
                $(this).attr(\'checked\',false);
                var togClassI=$(this).parent("td").parent("tr").children("#st").children("a").children("i");
               
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
                'label' => 'Disable Selected',
                //'click' => 'js:function(values){console.log(values);}',

                'click' => 'js:function(checked){
                bootbox.dialog(\'Processing.. Please wait\');
                var values = [];
                checked.each(function(){
                values.push($(this).val());

                });
                $.post(baseUrl+\'/blog/admin_blog/bulkupdate\',
                {values:values,attr:\'enablecom\',status:0},function(res){
                bootbox.hideAll();
                bootbox.alert("Your selected Blogs Comment has been successfully deactivated.");
                $(\'#yw0_c0_all\').attr(\'checked\',false);
                checked.each(function(){
                $(this).attr(\'checked\',false);
                var togClassI=$(this).parent("td").parent("tr").children("#st").children("a").children("i");
                $(togClassI).attr("class","icon-remove-sign");
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
    'class'=>'bootstrap.widgets.TbImageColumn',
    'header' => 'author Image',
    'imagePathExpression'=>'$data->userImagePath($data->user_image)',
    'usePlaceKitten'=>FALSE,
    'htmlOptions'=>array('style'=>'max-height:46px;max-width:46px;')
    //'placement' => 'right',
    //'inputclass' => 'span3'
    ),
       

                array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'pr_title',
                'filter' => CHtml::activeTextField($model, 'pr_title'),
                'value' => '$data->pr_title',
                'id'=>'$data[id]',
                'sortable'=>true,
                'type'=>'html',
                'editable' => array(
                'url' => $this->createUrl('admin/blog/EditableSaver'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'

                ),
                ),


                array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'postby',
                'filter' => CHtml::activeTextField($model, 'postby'),
                'value' => '$data->postby',      

                'id'=>'$data[id]',
                'sortable'=>true,
                'type'=>'html',
                'editable' => array(
                'url' => $this->createUrl('admin/blog/EditableSaver'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'

                ),

                ),
                
                array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'priority',
                'filter' => CHtml::activeTextField($model, 'priority'),
                'value' => '$data->priority',      

                'id'=>'$data[id]',
                'sortable'=>true,
                'type'=>'html',
                'editable' => array(
                'url' => $this->createUrl('admin/blog/EditableSaver'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'

                ),

                ),
                
                



                array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'pr_date',
                'filter' =>CHtml::activeDropDownList($model, 'pr_date',$res), 
                'value'=>'$data->pr_date',
                //'value'=>'date("m/d/Y h:m a", strtotime($data->pr_date))',
                'sortable'=>true,

                'editable' => array(
                'url' => $this->createUrl('admin/blog/EditableSaver'),
                'type'=>'date',
                'format'=> 'dd/mm/yyyy',
                'viewformat'=> 'dd/mm/yyyy',
                'placement' => 'right',
                'inputclass' => 'span3',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'
                ),


                ),
                





                //................for toggle coloum [start]..........
                array(
                'class'=>'bootstrap.widgets.TbToggleColumn',
                'toggleAction'=>'admin/blog/toggle',
                'displayText'=>true,
                'checkedButtonLabel'=>'Active',
                'uncheckedButtonLabel'=>'Inactive',
                'sortable'=>false, 
                'htmlOptions'=>array('id'=>'st','onclick'=>'toggle(this)'),  
                'name' => 'pr_status',
                'header' => 'Status',
                'afterToggle'=>'function(success,data){ if (success) 
                {
                if(bulkstatus!=1)
                {
                bootbox.hideAll();
                var productname=$(sel).prevAll().eq(3).children().text();
                if($(sel).children().children().attr("class")=="icon-ok-circle")
                bootbox.alert("Blog is deactivated");
                if($(sel).children().children().attr("class")=="icon-remove-sign")
                bootbox.alert("Blog is activated");

                }

                }

                }',
                ),
                //................for toggle coloum [End]..........
                array(
                'class'=>'bootstrap.widgets.TbToggleColumn',
                'toggleAction'=>'admin/blog/toggle1',
                'displayText'=>true,
                'checkedButtonLabel'=>'Enable',
                'uncheckedButtonLabel'=>'Disable',
                'sortable'=>false,   
                'name' => 'enablecom',
                'header' => 'Comment Status',
                'htmlOptions'=>array('id'=>'lt','onclick'=>'toggle(this)'),  
                'afterToggle'=>'function(success,data){ if (success) 
                {
                if(bulkstatus!=1)
                {
                bootbox.hideAll();
                var productname=$(sel).prevAll().eq(3).children().text();
                if($(sel).children().children().attr("class")=="icon-ok-circle")
                bootbox.alert("Blog Comment is deactivated");
                if($(sel).children().children().attr("class")=="icon-remove-sign")
                bootbox.alert("Blog Comment is activated");

                }

                }

                }',
                ), 

                array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'bootstrap.widgets.TbButtonColumn',

                'template' => '{delete} {update}',   //the bootstrap is modified to remove the view.
                'header' =>'ACTION',

                'deleteButtonUrl'=>'Yii::app()->controller->createUrl("admin/blog/delete", array("id"=>$data->id))', //the control is redirected to role/delete with the id value.
                'updateButtonUrl'=>'yii::app()->controller->createUrl("admin/blog/updatedata",array("id"=>$data->id))',
                ),

                //-------------------------Additional Action Links----------------------------
                array
                (
                'class'=>'ButtonColumn',

                'template'=>'{dialog}',
                'evaluateID'=>true, 
                'header'=>'Click For Description',


                'buttons'=>array
                (    

                'dialog' => array
                (
                'label'=>'Content',

                'options' => array('id'=>'$data->id'), 

                'click'=>'function(){
                var val = $(this).attr("id");
                //$("#vw_content").click();
                $("#cont").html("<img src="+assetUrl+"/images/loading.GIF>"); 
                //alert(val);
                $.post(baseUrl+"/blog/admin/blog/showcontent",{"id":val},function(res){ 

                $("#myModal1").modal(\'show\');
                $("#cont").html(res); 

                })

                $("#myModal1").modal(\'show\');
                }',

                ),






                ),
                )
                //------------------------- End Additional Action Links----------------------------
                )
                ));
            ?>
        </div>
    </div>


    <?php //------------------------------ VIEW content------------------- ?>
    <?php
        $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'myModal1')); ?>

    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4> Content</h4>
    </div>

    <div id="cont" class="modal-body" style="position: relative;">
        <p></p>
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



<?php //------------------------------ END VIEW content------------------- ?>


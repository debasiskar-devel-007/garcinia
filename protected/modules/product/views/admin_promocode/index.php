<div id="main">
    <div id="content">
        <h2 id="pageTitle">Promo Code Listing</h2>
        <div class="addbutton" style="margin-bottom:6px; margin-left:12px;"><a href="<?php echo Yii::app()->baseurl;?>/product/admin/promocode/add" class="button">Add</a></div>
        <div class="addbutton" id="refresh" style="margin-bottom:6px; margin-left:12px;"><a href="javascript:void(0)" class="button">Show All</a></div>
        <script type="text/javascript">  
            var baseUrl = "<?php echo Yii::app()->request->baseUrl; ?>";

            var sel;
            var bulkstatus=0;
            function toggle(el)
            {
                if(bulkstatus!=1)
                    {
                    bootbox.dialog('Processing.. Please wait');
                    sel=el;
                }
            }
        </script>

        <!--<script type="text/javascript">  

        var baseUrl = "<?php echo Yii::app()->request->baseUrl; ?>";

        $(function(){
        $(".button-column").children("a").attr("href","javascript:void(0)");
        $("#show_but").attr("href","javascript:void(0)");
        $("tr.filters").children('td').children('input').bind("keyup",function(e){
        if(e.which==13){
        $("#show_but").css("display","inline");
        }
        });

        $("tr.filters").children('td').children('input').bind("blur",function(e){
        $("#show_but").css("display","inline");
        });

        $("#show_but").click(function(){
        window.location.reload(true);
        //alert(5);
        //            $("tr.filters").children('td').children('input').val(""); 
        //            $("tr.filters").children('td').children('input').trigger('keyup');
        });





        });


        </script>-->

        <?php Yii::import('zii.widgets.ButtonColumn');  ?>
        <div style="margin-top: 10px;" class="newtable">
           

            <?php

                $this->widget('bootstrap.widgets.TbExtendedGridView', array(
                'type' => 'striped bordered',
                'id'=>'user-grid',
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
                'class'=>'btn',
                'label' => 'Delete All',
                'click' => 'js:function(checked){
                var values = [];
                checked.each(function(){
                values.push($(this).val());

                });

                $.ajax({
                type: "POST",
                url:"deleteall", 
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
                'label' => 'Active Selected',
                'click' => 'js:function(checked){
                bootbox.dialog(\'Processing.. Please wait\');
                var values = [];
                checked.each(function(){
                values.push($(this).val());

                });
                $.post(base_url+\'/product/admin/promocode/bulkupdate\',
                {values:values,attr:\'isactive\',status:1},function(res){
                bootbox.hideAll();
                bootbox.alert("Your selected promo code has been successfully activated.");
                $(\'#user-grid_c0_all\').attr(\'checked\',false);
                checked.each(function(){
                $(this).attr(\'checked\',false);
                var togClassI=$(this).parent("td").parent("tr").children("#status").children("a");

                $(togClassI).html("<i class=\"icon-ok-circle\"></i>Acive");
                });

                });
                }'

                ), 

                array(
                'buttonType' => 'button',
                'type' => 'primary',
                'size' => 'small',
                'class'=>'btn',
                'label' => 'Deactive Selected',
                'click' => 'js:function(checked){
                bootbox.dialog(\'Processing.. Please wait\');
                var values = [];
                checked.each(function(){
                values.push($(this).val());

                });
                $.post(base_url+\'/product/admin/promocode/bulkupdate\',
                {values:values,attr:\'isactive\',status:0},function(res){
                bootbox.hideAll();
                bootbox.alert("Your selected promo code has been successfully deactivated.");
                $(\'#user-grid_c0_all\').attr(\'checked\',false);
                checked.each(function(){
                $(this).attr(\'checked\',false);
                var togClassI=$(this).parent("td").parent("tr").children("#status").children("a");
                $(togClassI).html("<i class=\"icon-remove-sign\"></i>Inactive");
                });
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
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'code_text',
                'filter' => CHtml::activeTextField($model, 'code_text'),
                'value' => '$data->code_text',
                'id'=>'$data[id]',
                'sortable'=>true,
                'editable' => array(
                'url' => $this->createUrl('admin/promocode/EditableSaver'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'
                ),
                ),

                array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'st_date',
                'filter' => CHtml::activeTextField($model, 'st_date'),
                'value' => '$data->st_date',
                'id'=>'$data[id]',
                'sortable'=>true,
                'editable' => array(
                'url' => $this->createUrl('admin/promocode/EditableSaver'),
                'placement' => 'right',
                'type' => 'date',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'
                ),
                ),

                array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'end_date',
                'filter' => CHtml::activeTextField($model, 'end_date'),
                'value' => '$data->end_date',
                'id'=>'$data[id]',
                'sortable'=>true,
                'editable' => array(
                'url' => $this->createUrl('admin/promocode/EditableSaver'),
                'placement' => 'right',
                'type' => 'date',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'
                ),
                ),

/*
                array(
                'class'=>'bootstrap.widgets.TbToggleColumn',
                'toggleAction'=>'admin/promocode/toggle1',
                'displayText'=>true,
                'checkedButtonLabel'=>'Flat',
                'uncheckedButtonLabel'=>'Percentage',
                'checkedIcon'=>false,
                'uncheckedIcon'=>false,
                'sortable'=>true,   
                'name' => 'type',
                'htmlOptions'=>array('id'=>'ft'),
                'header' => 'Type'
                ),
*/

                    array(
                        'class' => 'bootstrap.widgets.TbDataColumn',
                        'name' => 'type',
                        //'filter' => CHtml::activeDropDownList($model, 'type',array(0=>'Percentage',1=>'Flat',2=>'Free Shipping')),
                        'filter' => false,
                        'value' => '($data->type == 0)?"Percentage":(($data->type == 1)?"Flat":(($data->type == 2)?"Free Shipping":""))',
                        'id'=>'$data[id]',

                    ),

                array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'dis_value',
                'filter' => CHtml::activeTextField($model, 'dis_value'),
                'value' => 'floatval($data->dis_value)',
                'id'=>'$data[id]',
                'sortable'=>true,
                'editable' => array(
                'url' => $this->createUrl('admin/promocode/EditableSaver'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'
                ),
                ),

                array(
                'class'=>'bootstrap.widgets.TbToggleColumn',
                'toggleAction'=>'admin/promocode/toggle',
                'displayText'=>true,
                'checkedButtonLabel'=>'Active',
                'uncheckedButtonLabel'=>'Inactive',
                'sortable'=>true,   
                'name' => 'isactive',
                'htmlOptions'=>array('id'=>'status'),
                'header' => 'Status'
                ),

                array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'bootstrap.widgets.TbButtonColumn',
                //'afterDelete'=>"function(link,success,data){ if(success) $(this).parent().parent().parent().remove(); }",
                //'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",
                'template' => '{delete} {update}',   //the bootstrap is modified to remove the view. 

                'deleteButtonUrl'=>'Yii::app()->controller->createUrl("admin/promocode/deletedata", array("id"=>$data->id))', //the control is redirected to role/delete with the id value.
                'updateButtonUrl'=>'yii::app()->controller->createUrl("admin/promocode/updatedata",array("id"=>$data->id))',
                ),


                )
                ));

            ?>
        </div>



    </div>
</div>
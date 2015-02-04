<div id="main">
    <div id="content">
        <h2 id="pageTitle">Category Listing</h2>
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

            <?php

                $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Add',
                'type' => 'primary',
                'size' => 'small',
                'url' => Yii::app()->request->baseUrl.'/product/admin/category/add',
                'htmlOptions' => array('style'=>'float:right')
                ));

            ?>

            <?php

                $this->widget('bootstrap.widgets.TbExtendedGridView', array(
                'type' => 'striped bordered',
                // 'dataProvider' => new CActiveDataProvider('dev',array(
                // 'criteria'=>array('condition'=>'id < 95'))  // only the values of the corresponding ids with less than 5 value will get                                                       displayed
                // ),
                'dataProvider'=>$model->search(),
                'template' => "{summary}{items}{pager}",
                    'id' =>'user-grid',
                    'ajaxUrl'=> Yii::app()->request->getUrl(),
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
                //'click' => 'js:function(values){console.log(values);}',

                'click' => 'js:function(checked){
                //var values = [];
                checked.each(function(){
                //alert($(this).val());
                bootbox.dialog("Processing.. Please wait");
                var togClass=$(this).parent("td").parent("tr").children("#st").children("a").children("i").attr("class");
                if(togClass=="icon-remove-sign"){
                $(this).parent("td").parent("tr").children("#st").children("a").click();  
                }

                bootbox.alert("Your selected categories has been successfully activated.");

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
                //var values = [];
                checked.each(function(){
                bootbox.dialog("Processing.. Please wait");
                //alert($(this).val());
                bootbox.dialog("Processing.. Please wait");
                var togClass=$(this).parent("td").parent("tr").children("#st").children("a").children("i").attr("class");

                if(togClass=="icon-ok-circle"){
                $(this).parent("td").parent("tr").children("#st").children("a").click();  
                }

                bootbox.alert("Your selected categories has been successfully activated.");
                });


                }'

                ),

                array(
                'buttonType' => 'button',
                'type' => 'primary',
                'size' => 'small',
                'class'=>'btn',
                'label' => 'Active Feature Selected',
                //'click' => 'js:function(values){console.log(values);}',

                'click' => 'js:function(checked){
                bulkstatus=1;
                //var values = [];
                checked.each(function(){

                //alert($(this).val());
                bootbox.dialog("Processing.. Please wait");
                var togClass=$(this).parent("td").parent("tr").children("#ft").children("a").children("i").attr("class");

                if(togClass=="icon-remove-sign"){
                $(this).parent("td").parent("tr").children("#ft").children("a").click();  
                }

                });
                bootbox.alert("Your selected categories has been successfully activated to get featured.");
                bulkstatus=0;
                }'

                ),

                array(
                'buttonType' => 'button',
                'type' => 'primary',
                'size' => 'small',
                'class'=>'btn',
                'label' => 'Deactive Feature Selected',
                //'click' => 'js:function(values){console.log(values);}',

                'click' => 'js:function(checked){
                bulkstatus=1;
                //var values = [];
                checked.each(function(){

                //alert($(this).val());
                var togClass=$(this).parent("td").parent("tr").children("#ft").children("a").children("i").attr("class");

                if(togClass=="icon-ok-circle"){
                $(this).parent("td").parent("tr").children("#ft").children("a").click();  
                }

                });
                bootbox.alert("Your selected categories has been successfully diactivated to get featured.");
                bulkstatus=0;
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
                //   
                //    array( 
                //    'class'=>'bootstrap.widgets.TbImageColumn',
                //    'header' => 'Category Image',
                //    'imagePathExpression'=>'$data->userImagePath($data->categoryimage)',
                //    'usePlaceKitten'=>FALSE,
                //    'htmlOptions'=>array('style'=>'max-height:100px;max-width:100px;')
                //'placement' => 'right',
                //'inputclass' => 'span3'
                //    ),

                array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'categoryname',
                'filter' => CHtml::activeTextField($model, 'categoryname'),
                'value' => '$data->categoryname',
                'id'=>'$data[id]',
                'sortable'=>true,
                'editable' => array(
                'url' => $this->createUrl('admin/category/EditableSaver'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'
                ),

                // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
                ),



                array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'parentcategoryid',
                'filter' =>CHtml::activeTextField($model, 'parentcategoryid'),
                'value' => '$data->parentcategoryid',
                'id'=>'$data[id]',
                'sortable'=>true,
                'editable' => array(
                'url' => $this->createUrl('admin/category/EditableSaver'),
                'emptytext'=>'NA',
                'source'    => Editable::source(category::model()->findAll(), 'id', 'categoryname'),
                'type' => 'select',
                //'model' => $model->search(),
                //'attribute' => 'parentcategoryid',
                'placement' => 'right',
                'inputclass' => 'span3',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'
                ),



                // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
                ),
                array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'priority',
                'filter' => CHtml::activeTextField($model, 'priority'),
                'value' => '$data->priority',
                'id'=>'$data[d]',
                'sortable'=>true,
                'editable' => array(
                'url' => $this->createUrl('admin/category/EditableSaver'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'
                ),

                // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
                ),

                //................for toggle coloum [start]..........
                array(
                'class'=>'bootstrap.widgets.TbToggleColumn',
                'toggleAction'=>'admin/category/toggle',
                'displayText'=>true,
                'checkedButtonLabel'=>'Active',
                'uncheckedButtonLabel'=>'Inactive',
                'sortable'=>true,   
                'name' => 'isactive',
                'htmlOptions'=>array('id'=>'st'),
                'header' => 'Status'
                ),

                array(
                'class'=>'bootstrap.widgets.TbToggleColumn',
                'toggleAction'=>'admin/category/toggle1', 
                
                'afterToggle'=>'function(success,data){ if (success) 
                {
                if(bulkstatus!=1)
                {
                bootbox.hideAll();
                var categoryname=$(sel).prevAll().eq(3).children().text();
                if($(sel).children().children().attr("class")=="icon-ok-circle")
                bootbox.alert(categoryname + " is diactivated for featured category");
                if($(sel).children().children().attr("class")=="icon-remove-sign")
                bootbox.alert(categoryname + "is activated for featured category");
                //alert(9);
                }

                }

                }',
                'sortable'=>false,   
                'name' => 'isfeatured',
                'htmlOptions'=>array('id'=>'ft','onclick'=>'toggle(this)'),
                'header' => 'Featured',
                'displayText'=>true,
                'checkedButtonLabel'=>'Featured',
                'uncheckedButtonLabel'=>'Unfeatured',
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
                $.post(baseUrl+"/product/admin/category/showcontent",{"id":val},function(res){

                //alert(res); 

                $("#myModal").modal(\'show\');
                $("#swdesc").html(res); 

                })
                }',

                ),


                ),
                ),
                //------------------------- End Additional Action Links----------------------------






                array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'bootstrap.widgets.TbButtonColumn',
                //'afterDelete'=>"function(link,success,data){ if(success) $(this).parent().parent().parent().remove(); }",
                //'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",
                'template' => '{delete} {update}',   //the bootstrap is modified to remove the view. 

                'deleteButtonUrl'=>'Yii::app()->controller->createUrl("admin/category/deletedata", array("id"=>$data->id))', //the control is redirected to role/delete with the id value.
                'updateButtonUrl'=>'yii::app()->controller->createUrl("admin/category/updatedata",array("id"=>$data->id))',
                ),


                )
                ));
            ?>
        </div>


        <?php $this->beginWidget(
            'bootstrap.widgets.TbModal',
            array('id' => 'myModal')
            ); ?>

        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h4>Category Description:</h4>
        </div>

        <div class="modal-body" id="swdesc">

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
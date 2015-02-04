


<div id="main">
    <div id="content">
        <h2 id="pageTitle"> Page Listing </h2>

       
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
                'id'=> 'user-grid',
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
                url:base_url+"/cms/admin/pagemanager/deleteall", 
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
                $.post(base_url+\'/cms/admin_pagemanager/bulkupdate\',
                {values:values,attr:\'page_status\',status:1},function(res){
                bootbox.hideAll();
                bootbox.alert("Your selected Blogs has been successfully activated.");
                $(\'#yw0_c0_all\').attr(\'checked\',false);
                checked.each(function(){
                $(this).attr(\'checked\',false);
                var togClassI=$(this).parent("td").parent("tr").children("#st").children("a").children("i");
                //$(togClassI).attr("class","icon-ok-circle");
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
                $.post(base_url+\'/cms/admin_pagemanager/bulkupdate\',
                {values:values,attr:\'page_status\',status:0},function(res){
                bootbox.hideAll();
                bootbox.alert("Your selected Blogs has been successfully deactivated.");
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
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'page_name',
                'filter' => CHtml::activeTextField($model, 'page_name'),
                'value' => '$data->page_name',
                'id'=>'$data[id]',
                'sortable'=>true,
                'type'=>'html',
                'editable' => array(
                'url' => $this->createUrl('admin/pagemanager/EditableSaver'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'validate' => 'js: function(value){
                if($.trim(value) == "") return "This field is required";
                }'

                ),
                ),


                array(
                //'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'page_desc',
                'filter' => CHtml::activeTextField($model, 'page_desc'),
                'value' => '$data->page_desc',      

                'id'=>'$data[id]',
                'sortable'=>true,
                'type'=>'html',


                ),
                
                







                //................for toggle coloum [start]..........
                array(
                'class'=>'bootstrap.widgets.TbToggleColumn',
                'toggleAction'=>'admin/pagemanager/toggle',
                'displayText'=>true,
                'checkedButtonLabel'=>'Active',
                'uncheckedButtonLabel'=>'Inactive',
                'sortable'=>false, 
                'htmlOptions'=>array('id'=>'st','onclick'=>'toggle(this)'),  
                'name' => 'page_status',
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
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'bootstrap.widgets.TbButtonColumn',

                'template' => '{delete} {update}',   //the bootstrap is modified to remove the view.
                'header' =>'ACTION',

                'deleteButtonUrl'=>'Yii::app()->controller->createUrl("admin/pagemanager/delete", array("id"=>$data->id))', //the control is redirected to role/delete with the id value.
                'updateButtonUrl'=>'yii::app()->controller->createUrl("admin/pagemanager/updatedata",array("id"=>$data->id))',
                ),

                //-------------------------Additional Action Links----------------------------

                //------------------------- End Additional Action Links----------------------------
                )
                ));
            ?>
        </div>
    </div>


    
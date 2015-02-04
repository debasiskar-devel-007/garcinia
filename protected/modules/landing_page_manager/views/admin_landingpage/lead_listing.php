
<div id="main">
    <div id="content">
        <h2 id="pageTitle">Lead Report</h2>

        <?php Yii::import('zii.widgets.ButtonColumn');  ?>
        
        
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
            // 'dataProvider' => new CActiveDataProvider('dev',array(
            // 'criteria'=>array('condition'=>'id < 95'))  // only the values of the corresponding ids with less than 5 value will get                                                       displayed
            // ),
            'dataProvider'=>$model->search(),
            'template' => "{summary}{items}{pager}",
             'id'=>'user-grid',
            //---------------------------------------------- this widget code is written add a bulk action------ 

/*
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
*/

            //----------------------------------------------End of bulk action-------


            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            'filter'=>$model,
            'columns' => array(
            

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'fname',
            'header'=>'Name',
            'filter' => CHtml::activeTextField($model, 'fullname'),
            //'value' => '$data->fname.\' \'.$data->lname',
            'value' => '$data->fullname',
            'id'=>'$data[id]',
            'sortable'=>true,
            
            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),
            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'email',
            'filter' => CHtml::activeTextField($model, 'email'),
            'value' => '$data->email',
            'id'=>'$data[id]',
            'sortable'=>true,

            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'dob',
            'filter' => false,
            'value' => '$data->dob',
            'id'=>'$data[id]',
            'sortable'=>true,

            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'city',
            'filter' => CHtml::activeTextField($model, 'city'),
            'value' => '$data->city',
            'id'=>'$data[id]',

            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'state',
            'filter' => CHtml::activeTextField($model, 'state'),
            'value' => '$data->state.\',\'.$data->country',
            'id'=>'$data[id]',
            'sortable'=>true,
            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'affiliate_code',
            'header' => 'Affiliate',
            'filter' => CHtml::activeDropDownList($model, 'affiliate_code',$aff),
            'value' => '$data->affiliate_fname.\' \'.$data->affiliate_lname',
            'id'=>'$data[id]',
            'sortable'=>true,
            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),



/*
            array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            //'afterDelete'=>"function(link,success,data){ if(success) $(this).parent().parent().parent().remove(); }",
            //'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",
            'template' => '{delete} {update}',   //the bootstrap is modified to remove the view. 

            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("admin/landingpage/deletedata", array("id"=>$data->id))', //the control is redirected to role/delete with the id value.
            'updateButtonUrl'=>'yii::app()->controller->createUrl("admin/landingpage/updatedata",array("id"=>$data->id))',
            ),
*/

            )
            ));
        ?>

      
    </div>
</div>
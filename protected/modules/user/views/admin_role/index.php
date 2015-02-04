<?php
    $baseUrl =  Yii::app()->BaseUrl;

?>
<script type="text/javascript">  

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
<div id="main">
    <div id="content">
        <h2  id="pageTitle">User Role Listing</h2>


        <div class="addbutton" style="margin-bottom:6px; margin-left:12px;"><a href="<?php echo $baseUrl;?>/user/admin/role/add" class="button">Add</a></div>    
        <!--  <div class="redtext">You have 10 New User to Approve</div>  -->
        <?php
            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider'=>$model->search(),
            'template' => "{summary}{items}{pager}",
            'ajaxUrl'=> Yii::app()->request->getUrl(),
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
            url:baseUrl+"/user/admin_role/deleteall", 
            data: {ids:values.join(",")},
            success:function(data){
            $(".idcheckbox" ).each(function( index ) { //to delete the tr that has been deleted.    
            var chkid=($(this).children().val());  
            //here this refers to td then its child input value is selected.
            var ckhflag=($.inArray(chkid,values));    //here it is being check whether chkid is in the array value or not.
            if(ckhflag!=-1)
            {
            $(this).parent().slideUp(500);
            }
            });
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
            $.post(baseUrl+\'/user/admin_role/bulkupdate\',
            {values:values,attr:\'is_active\',status:1},function(res){
            bootbox.hideAll();
            bootbox.alert("Your selected Role has been successfully activated.");
            $(\'#yw0_c0_all\').attr(\'checked\',false);
            checked.each(function(){
            $(this).attr(\'checked\',false);
            var togClassI=$(this).parent("td").parent("tr").children("#st").children("a").children("i");
            $(togClassI).attr("class","icon-ok-circle");
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
            //'click' => 'js:function(values){console.log(values);}',

            'click' => 'js:function(checked){
            bootbox.dialog(\'Processing.. Please wait\');
            var values = [];
            checked.each(function(){
            values.push($(this).val());

            });
            $.post(baseUrl+\'/user/admin_role/bulkupdate\',
            {values:values,attr:\'is_active\',status:0},function(res){
            bootbox.hideAll();
            bootbox.alert("Your selected Role has been successfully deactivated.");
            $(\'#yw0_c0_all\').attr(\'checked\',false);
            checked.each(function(){
            $(this).attr(\'checked\',false);
            var togClassI=$(this).parent("td").parent("tr").children("#st").children("a").children("i");
            $(togClassI).attr("class","icon-remove-sign");
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
            'name' => 'name',
            'filter' => CHtml::activeTextField($model, 'name'),
            'value' => '$data->name',
            'id'=>'$data[id]',
            'sortable'=>true,
            'editable' => array(
            'url' => $this->createUrl('admin_role/EditableSaver'),
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
            'name' => 'description',
            'filter' => CHtml::activeTextField($model, 'description'),
            'value' => 'Common_helper::put_safe($data->description)',
            'id'=>'$data[id]',
            'type' => 'html'
            ),

            array(
            'class'=>'bootstrap.widgets.TbToggleColumn',
            'toggleAction'=>'admin_role/toggle',
            'afterToggle'=>'function(success,data){ if (success) 
            {
            //alert(bulkstatus);
            if(bulkstatus!=1)
            {
            bootbox.hideAll();
            var productname=$(sel).prevAll().eq(2).children().text();
            if($(sel).children().children().attr("class")=="icon-ok-circle")
            bootbox.alert("Role is diactivated");
            if($(sel).children().children().attr("class")=="icon-remove-sign")
            bootbox.alert("Role is activated");
            //alert(9);
            }

            }

            }',
            'sortable'=>true,   
            'name' => 'is_active',
            'htmlOptions'=>array('id'=>'st','onclick'=>'toggle(this)'),
            'header' => 'Status'
            ),

            array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            //'afterDelete'=>"function(link,success,data){ if(success) $(this).parent().parent().parent().remove(); }",
            //'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",
            'template' => '{delete} {update}',   //the bootstrap is modified to remove the view. 

            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("admin_role/del", array("id"=>$data->id))', //the control is redirected to role/delete with the id value.
            'updateButtonUrl'=>'yii::app()->controller->createUrl("admin/role/update",array("id"=>$data->id))',
            ),


            )
            ));
        ?>                      

    </div>
     </div>
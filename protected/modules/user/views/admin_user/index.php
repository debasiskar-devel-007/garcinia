<?php
    $baseUrl =  Yii::app()->BaseUrl;

$sess = Yii::app()->session['sess_user'];

$sessrole = @$sess['role'];
$sessid = $sess['id'];
?>

<div id="main">
    <div id="content">
        <h2  id="pageTitle">User Listing</h2>


        <div class="addbutton" style="margin-bottom:6px; margin-left:12px;"><a href="<?php echo $baseUrl;?>/user/admin/user/add" class="button">Add</a></div>
        <div class="addbutton" id="refresh" style="margin-bottom:6px; margin-left:12px;"><a href="javascript:void(0)" class="button">Show All</a></div>
        <!--  <div class="redtext">You have 10 New User to Approve</div>  -->
        <?php

            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'id'=>'user-grid',
            'dataProvider'=>$model->search($sessrole,$sessid),
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
            url:base_url+"/user/admin/user/deleteall", 
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
            $.post(base_url+\'/user/admin/user/bulkupdate\',
            {values:values,attr:\'is_active\',status:1},function(res){
            bootbox.hideAll();
            bootbox.dialog("Your selected User has been successfully activated.");
            setTimeout(function(){bootbox.hideAll();},2000);
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
            //'click' => 'js:function(values){console.log(values);}',

            'click' => 'js:function(checked){
            bootbox.dialog(\'Processing.. Please wait\');
            var values = [];
            checked.each(function(){
            values.push($(this).val());

            });
            $.post(base_url+\'/user/admin/user/bulkupdate\',
            {values:values,attr:\'is_active\',status:0},function(res){
            bootbox.hideAll();
            bootbox.dialog("Your selected User has been successfully deactivated.");
            setTimeout(function(){bootbox.hideAll();},2000);
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
            'class'=>'bootstrap.widgets.TbRelationalColumn',
            'name' => 'role',
            //'filter' => CHtml::activeTextField($model, 'role'),
            'filter' => CHtml::activeDropDownList($model, 'role',$roleList),
            'url' => $this->createUrl('admin/user/getRenderRole/$data[id]'),
            //'value'=> '$data->role',
            'value'=> '"View Roles"',
            'afterAjaxUpdate' => 'js:function(tr,rowid,data){
            //bootbox.alert(rowid);
            }'
            ),

            
            array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'fname',
            'filter' => CHtml::activeTextField($model, 'fname'),
            'value' => '$data->fname',
            'id'=>'$data[id]',
            'sortable'=>true,
            'editable' => array(
            'url' => $this->createUrl('admin/user/EditableSaver'),
            'placement' => 'right',
            'inputclass' => 'span3',
            'validate' => 'js: function(value){
            if($.trim(value) == "") return "This field is required";
            }'
            ),

            ),

            array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'lname',
            'filter' => CHtml::activeTextField($model, 'lname'),
            'value' => '$data->lname',
            'id'=>'$data[id]',
            'sortable'=>true,
            'editable' => array(
            'url' => $this->createUrl('admin/user/EditableSaver'),
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
            'id'=>'$data[id]',
            'sortable'=>true,
            'editable' => array(
            'url' => $this->createUrl('admin/user/EditableSaver'),
            'placement' => 'right',
            'inputclass' => 'span3',
            'validate' => 'js: function(value){
            if($.trim(value) == "") return "This field is required";
            }'
            ),

            ),


/*            array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'dob',
            'filter' => CHtml::activeTextField($model, 'dob'),
            'value' => '$data->dob',
            'id'=>'$data[id]',
            'sortable'=>true,
            'editable' => array(
            'url' => $this->createUrl('admin/user/EditableSaver'),
            'type'=>'date',
            'format'=> 'mm/dd/yyyy',
            'viewformat'=> 'mm/dd/yyyy',
            'placement' => 'right',
            'inputclass' => 'span3',
            'validate' => 'js: function(value){
            if($.trim(value) == "") return "This field is required";
            }'
            ),

            ),*/

                array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name'=>'address',
                    'header' => 'Full Address',
                    'filter' => CHtml::activeTextField($model, 'fulladdress'),
                    'value' => '$data->fulladdress',
                    'id'=>'$data[id]',
                    'type' => 'html',
                    'sortable'=>false,


                ),

                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name'=>'cpa',
                    'header' => 'CPA / CPC / CPL',
                    'filter' => false,
                    'value' => '(intval($data->is_aff))?"CPA : ".$data->cpa."<br>CPC : ".$data->cpc."<br>CPL : ".$data->cpl:""',
                    'id'=>'$data[id]',
                    'type'=>'html',
                    'sortable'=>false,


                ),

/*

            array(
            'class'=>'bootstrap.widgets.TbToggleColumn',
            'toggleAction'=>'admin/user/genderToggle',
            'afterToggle'=>'function(success,data){ if (success) 
            {
            bootbox.hideAll();
            bootbox.alert("User Gender is changed");
            }

            }',
            'sortable'=>true,
            'displayText'=>true,
            'checkedButtonLabel'=>'Male',
            'uncheckedButtonLabel'=>'Female',
            'checkedIcon'=>false,
            'uncheckedIcon'=>false,
            'name' => 'gender',
            'htmlOptions'=>array('id'=>'st1','onclick'=>'toggleloader(this)'),
            'header' => 'Gender'
            ),*/

            array(
            'class'=>'bootstrap.widgets.TbToggleColumn',
            'toggleAction'=>'admin/user/toggle',
            'afterToggle'=>'function(success,data){ if (success) 
            {
            bootbox.hideAll();
            if($(sel).children().children().attr("class")=="icon-ok-circle")
            bootbox.alert("User is diactivated");
            if($(sel).children().children().attr("class")=="icon-remove-sign")
            bootbox.alert("User is activated");

            }

            }',
            'displayText'=>true,
            'checkedButtonLabel'=>'Acive',
            'uncheckedButtonLabel'=>'Inactive',
            'name' => 'is_active',
            'htmlOptions'=>array('id'=>'status','onclick'=>'toggleloader(this)'),
            'header' => 'Status'
            ),



            array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            //'afterDelete'=>"function(link,success,data){ if(success) $(this).parent().parent().parent().remove(); }",
            //'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",
            'template' => '{delete} {update} {change_password} <br/> {notes} <br/> {aff_code} ',   //the bootstrap is modified to remove the view.
            'evaluateID'=>true,
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("admin/user/del", array("id"=>$data->id))', //the control is redirected to role/delete with the id value.
            'updateButtonUrl'=>'yii::app()->controller->createUrl("admin/user/update",array("id"=>$data->id))',
            //'buttons'=>array('change_password'=>array('label'=> '<img src="'.Yii::app()->theme->baseUrl.'/images/add.png" />','url'=>'yii::app()->controller->createUrl("admin/user/cngpass",array("id"=>$data->id))','options'=>array('title'=>'Change Password')))  
            'buttons'=>
                array('change_password'=>array('label'=> '<img style="height:15px;" src="'.Yii::app()->theme->baseUrl.'/images/cngpass.png" />','options'=>array('title'=>'Change Password','onclick'=>'cngpass(this)','id'=>'$data->id')),
                'notes'=>array('label'=> 'Notes','options'=>array('title'=>'User Notes','onclick'=>'shownote(this)','id'=>'$data->id','class'=>'usernote ')),
                'aff_code'=>array(
                    'label'=> 'Grab Affiliate Code',
                    'visible' => 'intval($data["is_aff"])',
                    'options'=>array('title'=>'Grab Affiliate Code','onclick'=>'grab_aff_code(this)','id'=>'$data->id')),
            )
            

            ),


            )
            ));
        ?>                      

    </div>
</div>

<!-- Modal For change Password[start] -->
<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'cngpassModal')
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Change Password : </h4>
</div>

<div class="modal-body">
    <?php
        $model1 = new UserManager('cngpass');
        $this->renderPartial('change_pass',array('model'=>$model1));
    ?>
</div>


     
    <?php $this->endWidget(); ?>
<!-- Modal For change Password[end] -->

<!-- Modal For Show Notes[start] -->
<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'shownotesModal')
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Notes List : </h4>
</div>

<div class="modal-body">

</div>

     
    <?php $this->endWidget(); ?>
<!-- Modal For Show Notes[end] -->

<!-- Modal For Add Notes[start] -->
<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'addnotesModal')
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Add Note : </h4>
</div>

<div class="modal-body">
<?php
        $model3 = new UserNotes();
        $this->renderPartial('add_note',array('model'=>$model3));
    ?>
</div>

    <?php $this->endWidget(); ?>
<!-- Modal For Add Notes[end] -->
<!-- Modal For Grab Code[start] -->
<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'grabcodemodal')
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Grab Affiliate Link : </h4>
    <input type="hidden" class="hid" value="<?php echo Yii::app()->getBaseUrl(true);?>" />

</div>

<div class="modal-body">




    <script language="JavaScript">
    $(function(){
        $('.copy-button').each(function(){
            // Disables other default handlers on click (avoid issues)
            $(this).on('click', function(e) {
                e.preventDefault();

            });

            // Apply clipboard click event
            $(this).clipboard({
                path: asset_url+'/js/jquery.clipboard.swf',

                copy: function() {
                    var this_sel = $(this);
                    //alert(8);
                    var str = $(this).prev('.aff_link').val();
                    // var str = str1;

                    // Hide "Copy" and show "Copied, copy again?" message in link
                    //  this_sel.find('.code-copy-first').hide();
                    //  this_sel.find('.code-copy-done').show();

                    // Return text in closest element (useful when you have multiple boxes that can be copied)
                    return str;
                }
            });

        });

        $('.copy-button1').each(function(){
            // Disables other default handlers on click (avoid issues)
            $(this).on('click', function(e) {
                e.preventDefault();

            });

            // Apply clipboard click event
            $(this).clipboard({
                path: asset_url+'/js/jquery.clipboard.swf',

                copy: function() {
                    var this_sel = $(this);
                    //alert(8);
                    var str = $(this).prev('.aff_link1').val();
                    // var str = str1;

                    // Hide "Copy" and show "Copied, copy again?" message in link
                    //  this_sel.find('.code-copy-first').hide();
                    //  this_sel.find('.code-copy-done').show();

                    // Return text in closest element (useful when you have multiple boxes that can be copied)
                    return str;
                }
            });

        });


    });
</script>
</div>

    <?php $this->endWidget(); ?>
<!-- Modal For Grab Code[end] -->
<!-- Modal For Grab Code[start] -->
<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'grabcodemodal1')
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>&nbsp;</h4>
</div>

<div class="modal-body">
This User is not a Affiliate
</div>

     
    <?php $this->endWidget(); ?>
<!-- Modal For Grab Code[end] -->

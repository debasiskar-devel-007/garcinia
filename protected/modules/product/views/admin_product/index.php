<script type="text/javascript">
    var baseUrl= "<?php echo yii::app()->baseurl;?>";

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
        <h2 id="pageTitle">Product Listing</h2>

        
 <!--       <select name="Product[product_type]" data-original-title="" onchange="updategrid()">
    <option value="">Select a Type:</option>
    <option  data-original-title="" value="0">Downloadable</option>
    <option data-original-title="" value="1">Physical</option>
    
   
  </select>-->
  
  <!--<div class="addbutton" id="refresh" style="margin-bottom:6px; margin-left:12px;"><a href="javascript:void(0)" class="button">Show All</a></div>--> 
        <?php Yii::import('zii.widgets.ButtonColumn');

        $arr= array(''=>'select type','1'=>'Original','0'=>'Upsell');

        ?>
        <div class="addbutton" style="margin-bottom:6px; margin-left:12px;"><a href="<?php echo yii::app()->getBaseUrl(true);?>/product/admin/product/add" class="button">Add</a></div>
        <div class="addbutton" id="refresh" style="margin-bottom:6px; margin-left:12px;"><a href="javascript:void(0)" class="button">Show All</a></div>

        <?php

            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            // 'dataProvider' => new CActiveDataProvider('dev',array(
            // 'criteria'=>array('condition'=>'id < 95'))  // only the values of the corresponding ids with less than 5 value will get                                                       displayed
            // ),
            'dataProvider'=>$model->search(),
            'template' => "{summary}{items}{pager}",
            'id' =>'user-grid',      
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
            url:baseUrl+"/product/admin/product/deleteall", 
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
            $.post(baseUrl+\'/product/admin_product/bulkupdate\',
            {values:values,attr:\'isactive\',status:1},function(res){
            bootbox.hideAll();
            bootbox.alert("Your selected Product has been successfully activated.");
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
            $.post(baseUrl+\'/product/admin_product/bulkupdate\',
            {values:values,attr:\'isactive\',status:0},function(res){
            bootbox.hideAll();
            bootbox.alert("Your selected Product has been successfully deactivated.");
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
            'name' => 'productid',
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
            'name' => 'image',
            'filter' =>false,
            'url' => $this->createUrl('admin/product/getImage/$data[id]'),
            'value'=> '"View Image"',
           // 'afterAjaxUpdate' => 'js:function(tr,rowid,data){
            //bootbox.alert(rowid);
           // }'
            ),


            array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'productname',
            'filter' => CHtml::activeTextField($model, 'productname'),
            'value' => '$data->productname',
            'id'=>'$data[productid]',
            'sortable'=>true,
            'editable' => array(
            'url' => $this->createUrl('admin/product/EditableSaver'),
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
            'name' => 'productprice',
            'filter' => CHtml::activeTextField($model, 'productprice'),
            'value' => '$data->productprice',
            'id'=>'$data[productid]',
            'sortable'=>true,
            'editable' => array(
            'url' => $this->createUrl('admin/product/EditableSaver'),

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
            'name' => 'catagoryid',
            'filter' => CHtml::activeDropDownList($model, 'catagoryid',$res),
            'value' => '$data->catagoryid',
            'id'=>'$data[productid]',
            'sortable'=>true,
            'editable' => array(
            'url' => $this->createUrl('admin/product/EditableSaver'),
            'emptytext'=>'FOR TESTING USE',
            'source'    => Editable::source(Category::model()->findAll(), 'id', 'categoryname'),
            'type' => 'select',
            //'model' => $model->search(),
            //'attribute' => 'parentcategoryid',
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
            'id'=>'$data[productid]',
            'sortable'=>false,
            'editable' => array(
            'url' => $this->createUrl('admin/product/EditableSaver'),

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
                    'name' => 'sqnumber',
                    'filter' => CHtml::activeTextField($model, 'sqnumber'),
                    'value' => '$data->sqnumber',
                    'id'=>'$data[productid]',
                    'sortable'=>false,
                    'editable' => array(
                        'url' => $this->createUrl('admin/product/EditableSaver'),

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
            'name' => 'product_type',
               'filter' => CHtml::activeDropDownList($model, 'product_type',$arr),
            'value' => '($data->product_type == 1)?"Original":"Upsell"',
            'id'=>'$data[productid]',
            'sortable'=>true,


            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),  



            //................for toggle coloum [start]..........
            array(
            'class'=>'bootstrap.widgets.TbToggleColumn',
            'toggleAction'=>'admin/product/toggle',
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
            var productname=$(sel).prevAll().eq(3).children().text();
            if($(sel).children().children().attr("class")=="icon-ok-circle")
            bootbox.alert("product"+" "+ productname + " is deactivated");
            if($(sel).children().children().attr("class")=="icon-remove-sign")
            bootbox.alert("product"+" "+ productname + " is activated");
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
            'template'=>'{dialog}</br>,{dialog1}</br>,{dialog2}</br>,{dialog3}</br>,{dialog4}</br>',
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
            'options' => array('id'=>'$data->productid'), 

            'click'=>'function(){
            var val = $(this).attr("id");


            //alert(val);
            $("#swdesc").html("<span>loading..</span>");
            $.post(baseUrl+"/product/admin/product/showcontent",{"id":val},function(res){

            //alert(res); 

            // $("#myModal").modal(\'show\');
            $("#swdesc").html(res); 

            })
            $("#myModal").modal(\'show\');
            }',

            ),
             'dialog1' => array
            (
            'label'=>'Product Info',
            //'imageUrl'=>'$data->id',
            //'url'=>'"$data->id"',
            // 'id' => '$data->id',


            // 'sss'=>'$data->id',
            'options' => array('id'=>'$data->productid'), 

            'click'=>'function(){
            var val = $(this).attr("id");


            //alert(val);
            $("#swdesc").html("<span>loading..</span>");
            $.post(baseUrl+"/product/admin/product/showcontent1",{"id":val},function(res){

            //alert(res); 

            // $("#myModal").modal(\'show\');
            $("#swdesc").html(res); 

            })
            $("#myModal").modal(\'show\');
            }',

            ),
              'dialog2' => array
            (
            'label'=>'Product Guarantee',
            //'imageUrl'=>'$data->id',
            //'url'=>'"$data->id"',
            // 'id' => '$data->id',


            // 'sss'=>'$data->id',
            'options' => array('id'=>'$data->productid'), 

            'click'=>'function(){
            var val = $(this).attr("id");


            //alert(val);
            $("#swdesc").html("<span>loading..</span>");
            $.post(baseUrl+"/product/admin/product/showcontent2",{"id":val},function(res){

            //alert(res); 

            // $("#myModal").modal(\'show\');
            $("#swdesc").html(res); 

            })
            $("#myModal").modal(\'show\');
            }',

            ),
               'dialog3' => array
            (
            'label'=>'Product Features',
            //'imageUrl'=>'$data->id',
            //'url'=>'"$data->id"',
            // 'id' => '$data->id',


            // 'sss'=>'$data->id',
            'options' => array('id'=>'$data->productid'), 

            'click'=>'function(){
            var val = $(this).attr("id");


            //alert(val);
            $("#swdesc").html("<span>loading..</span>");
            $.post(baseUrl+"/product/admin/product/showcontent3",{"id":val},function(res){

            //alert(res); 

            // $("#myModal").modal(\'show\');
            $("#swdesc").html(res); 

            })
            $("#myModal").modal(\'show\');
            }',

            ),
               'dialog4' => array
            (
            'label'=>'Brand Info',
            //'imageUrl'=>'$data->id',
            //'url'=>'"$data->id"',
            // 'id' => '$data->id',


            // 'sss'=>'$data->id',
            'options' => array('id'=>'$data->productid'), 

            'click'=>'function(){
            var val = $(this).attr("id");


            //alert(val);
            $("#swdesc").html("<span>loading..</span>");
            $.post(baseUrl+"/product/admin/product/showcontent4",{"id":val},function(res){

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
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'evaluateID'=>true,     
            //'afterDelete'=>"function(link,success,data){ if(success) $(this).parent().parent().parent().remove(); }",
            //'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",
            'template' => '{delete} {update}',   //the bootstrap is modified to remove the view.

            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("admin/product/deletedata", array("id"=>$data->productid))', //the control is redirected to role/delete with the id value.
            'updateButtonUrl'=>'yii::app()->controller->createUrl("admin/product/updatedata",array("id"=>$data->productid))',
            
                        'buttons'=>array
            (
    


       



/*
            'd3' => array
            (
            'label'=>'See files',

            'options' => array('id'=>'\'\'.$data->productid','rel' => 'tooltip', 'data-toggle' => 'tooltip','title'=>'step '),

            'click'=>'function(){
            var val = $(this).attr("id");
            //alert(val);
            $.post(base_url+"/product/admin/product/showfile",{"id":val},function(res){

            alert(res);

            $("#myModal2").modal(\'show\');
            
            $("#swdesc2").find("a").attr("href",base_url+"/uploads/files/"+res);

            })
            }',
            'visible'=>'$data->product == 0',  


            ),*/


    





            ),
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
            <h4>Product Description:</h4>
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
        
        
            <?php $this->beginWidget(
        'bootstrap.widgets.TbModal',
        array('id' => 'myModal2')
        ); ?>

    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>Training step:</h4>
    </div>

    <div class="modal-body" id="swdesc2">
        <!--<input class="vid_id" type="text" readonly="readonly" style="margin: 10px;">  -->
        <a href=res target="_blank" >click to download </a>


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

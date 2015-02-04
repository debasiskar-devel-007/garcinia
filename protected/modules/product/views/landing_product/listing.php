<?php
$baseUrl =  Yii::app()->BaseUrl;
?>


<div id="main">


<div id="content">


<h2  id="pageTitle">Product - Landing Page Relation</h2>








<div class="addbutton" style="margin-bottom:6px; margin-left:12px;"><a href="<?php echo $baseUrl;?>/product/landing-product/add-product" class="button">Add</a></div>


<div class="addbutton" id="refresh" style="margin-bottom:6px; margin-left:12px;"><a href="javascript:void(0)" class="button">Show All</a></div>


<!--  <div class="redtext">You have 10 New User to Approve</div>  -->


<?php





$this->widget('bootstrap.widgets.TbExtendedGridView', array(


    'type' => 'striped bordered',


    'id'=>'user-grid',


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

            bootbox.dialog(\'Processing.. Please wait\');


            $.ajax({


            type: "POST",


            url:base_url+"/product/landing_product/deleteall",


            data: {ids:values.join(",")},


            success:function(data){


            $(".idcheckbox" ).each(function( index ) { //to delete the tr that has been deleted.    


            var chkid=($(this).children().val());  


            //here this refers to td then its child input value is selected.


            var ckhflag=($.inArray(chkid,values));    //here it is being check whether chkid is in the array value or not.


            if(ckhflag!=-1)


            {


            bootbox.hideAll();


            bootbox.alert("Your selected forums has been successfully deleted.");

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


            $.post(base_url+\'/product/landing_product/bulkupdate\',


            {values:values,attr:\'isactive\',status:1},function(res){


            bootbox.hideAll();


            bootbox.alert("Your selected product has been successfully activated.");


            $(\'#user-grid_c0_all\').attr(\'checked\',false);


            checked.each(function(){


            $(this).attr(\'checked\',false);

            var togClassI=$(this).parent("td").parent("tr").children("#status").children("a");


            $(togClassI).html("<i class=\"icon-ok-circle\"></i>Active");


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


            $.post(base_url+\'/product/landing_product/bulkupdate\',


            {values:values,attr:\'isactive\',status:0},function(res){


            bootbox.hideAll();


            bootbox.alert("Your selected product has been successfully deactivated.");


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

        'checkBoxColumnConfig' => array(


            'name' => 'id',


            'htmlOptions'=>array('class'=>'idcheckbox'),


        ),


    ),








    //----------------------------------------------End of bulk action-------








    'enablePagination' => true,


    'summaryText'=>'Displaying {start}-{end} of {count} results.',


    'filter'=>$model,


    'columns' => array(



        array(


            'class' => 'bootstrap.widgets.TbImageColumn',


            'imagePathExpression'=>'Yii::app()->getBaseUrl(true)."/uploads/product_image/thumb/".$data->product_image',
            'imageOptions'=>array("style"=>"max-width:150px;max-height:150px"),
            'header'=>'Image'


        ),


        array(


            'class' => 'bootstrap.widgets.TbDataColumn',


            'name' => 'landing_id',


            'filter' => CHtml::activeDropDownList($model, 'landing_id',$arr),


            'value' => '$data->landing_page_name',


            'id'=>'$data[id]',


            'sortable'=>true,




        ),


        array(


            'class' => 'bootstrap.widgets.TbDataColumn',


            'name' => 'product_id',


            'filter' => CHtml::activeDropDownList($model, 'product_id',$arr1),


            'value' => '$data->product_orig_name',


            'id'=>'$data[id]',

            'header'=>'Product Original Name',


            'sortable'=>true,

        ),

        array(


            'class' => 'bootstrap.widgets.TbDataColumn',


            'name' => 'product_name',


            'filter' => CHtml::activeTextField($model, 'product_name'),


            'value' => '$data->product_name',


            'id'=>'$data[id]',


            'sortable'=>true,

        ),





        array(


            'class' => 'bootstrap.widgets.TbDataColumn',


            'name' => 'product_type',


            'filter' => CHtml::activeDropDownList($model, 'product_type',array(""=>"All",0=>"Upsell",1=>"Original")),


            'value' => '($data->product_type==1)?"Original":"Upsell"',


            'id'=>'$data[id]',

            'type' => 'html',

            'sortable'=>true,



        ),


        array(


            'class' => 'bootstrap.widgets.TbDataColumn',


            'name' => 'product_price',


            'filter' => false,


            'value' => '$data->product_price',


            'id'=>'$data[id]',


            'sortable'=>true,


        ),

/*        array(


            'class' => 'bootstrap.widgets.TbDataColumn',


            'name' => 'product_desc',


            'filter' => false,


            'value' => '$data->product_desc',


            'id'=>'$data[id]',


            'sortable'=>false,
            'type'=>'html'


        ),

*/

        array(


            'class' => 'bootstrap.widgets.TbDataColumn',


            'name' => 'quantity',


            'filter' => false,


            'value' => '$data->quantity',


            'id'=>'$data[id]',


            'sortable'=>true,


        ),

        array(


            'class' => 'bootstrap.widgets.TbDataColumn',


            'name' => 'shipping_id',


            'filter' => CHtml::activeDropDownList($model, 'shipping_id',CHtml::listData(ShippingCharge::model()->findAll(array('order' => 'shipping_charge ASC')), 'id', function($loc){ return $loc->shipping_name . " - (" . $loc->shipping_charge.")"; }), array('empty'=>'Select Shipping Type')),


            'value' => '$data->ship_name',


            'id'=>'$data[id]',

            'type' => 'html',

            'sortable'=>true,



        ),


        array(


            'class'=>'bootstrap.widgets.TbToggleColumn',


            'toggleAction'=>'false',
            'displayText'=>true,
            'checkedButtonLabel'=>'Active',
            'uncheckedButtonLabel'=>'Inactive',
            'name' => 'autoship',
            'header' => 'Is AutoShip?'


        ),

        array(


            'class'=>'bootstrap.widgets.TbToggleColumn',


            'toggleAction'=>'landing_product/toggle',
            'displayText'=>true,
            'checkedButtonLabel'=>'Active',
            'uncheckedButtonLabel'=>'Inactive',


            'afterToggle'=>'function(success,data){

            if (success)


            {

            bootbox.hideAll();

            if(data == 1)
                bootbox.alert("Product is activated");
            else
                bootbox.alert("Product is deactivated");





            }





            }',


            'name' => 'isactive',


            'htmlOptions'=>array('id'=>'status'),


            'header' => 'Status'


        ),











        array(


            'htmlOptions' => array('nowrap'=>'nowrap'),


            'class'=>'bootstrap.widgets.TbButtonColumn',

            'template' => '{delete} {update} ',   //the bootstrap is modified to remove the view.


            'evaluateID'=>true,


            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("landing_product/del", array("id"=>$data->id))', //the control is redirected to role/delete with the id value.


            'updateButtonUrl'=>'yii::app()->controller->createUrl("landing_product/update",array("id"=>$data->id))',


        ),








    )


));


?>











</div>


</div>



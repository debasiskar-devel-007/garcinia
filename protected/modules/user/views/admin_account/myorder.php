<?php
    $baseUrl =  Yii::app()->BaseUrl;

?>

<style type="text/css">
@media screen and (max-width:1024px){

        td:nth-of-type(1):before { content: "Transaction"; }
        td:nth-of-type(2):before { content: "Transaction Status"; }
        td:nth-of-type(3):before { content: "Total"; }
        td:nth-of-type(4):before { content: "Order Time"; }
        td:nth-of-type(5):before { content: "Shipping Status"; }
        td:nth-of-type(5):before { content: ""; }
    


}
</style>
<div class="account-right">
   
   
   <h2>My Order</h2>
   
<div class="account-text">
     

<div class="addbutton" id="refresh" style="margin-bottom:6px; margin-left:12px;"><a href="javascript:void(0)" class="button">Show All</a></div>

        <?php
            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider'=>$model->fetchorder($id),
             'id'=>'order table_liquid ',
            'template' => "{summary}{items}{pager}",

            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            'filter'=>$model,
            'columns' => array(

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'transaction_id',
            'filter' => CHtml::activeTextField($model, 'transaction_id'),
            'value' => '$data->transaction_id',
            'id'=>'$data[id]',
            'sortable'=>true,

            ),


            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'transaction_status',
            'filter' => CHtml::activeTextField($model, 'transaction_status'),
            'value' => '$data->transaction_status',
            'id'=>'$data[id]',
            'sortable'=>true,

            ),


            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'total',
            'filter' => CHtml::activeTextField($model, 'total'),
            'value' => '$data->total',
            'id'=>'$data[id]',
            'sortable'=>true,

            ),


            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'order_time',
            'filter' => CHtml::activeTextField($model, 'order_time'),
            'value' => 'date(\'m/d/Y h:i a\',$data->order_time)',
            'id'=>'$data[id]',
            'sortable'=>true,

            ),


            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'shipping_status',
            //'filter' => CHtml::activeTextField($model, 'shipping_status'),
            'filter' =>  CHtml::activeDropDownList($model, 'shipping_status',$shiping_status_arr),
            'value' => '$data->shipping_status1',
            'id'=>'$data[id]',
            'sortable'=>true,

            ),


            array
            (
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{dialog}</br>{dialog1}</br>{dialog2}</br>',
            'evaluateID'=>true, 
            'header'=>'',
            //'htmlOptions'=>array('id'=>'$data->id'),

            'buttons'=>array
            (    

            'dialog' => array
            (
            'label'=>'Billing Details',
            'options' => array('id'=>'$data->orderid'), 

            'click'=>'function(){
            var val = $(this).attr("id");
            //alert(val);

            $("#myModal").modal(\'show\');
            $("#myModal").find(".modal-header").hide();
            $("#myModal").find(".modal-footer").hide();
            $("#swdesc").html(\'<div style="text-align:center;"><img src="'.Yii::app()->request->baseUrl.'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>\');

            $.post(base_url+"/product/admin/order/showbill",{"id":val},function(res){

            //alert(res); 

            result = eval(\'(\'+res+\')\');
            html = \'\';

            html += \'Name : \'+result[\'billing_fname\'] + \' \'+result[\'billing_lname\']+\'<br />\';
            html += \'Address : \'+result[\'billing_add\']+\'<br />\';
            html += \'Phone No : \'+result[\'billing_phone\']+\'<br />\';
            html += \'Email : \'+result[\'billing_email\']+\'<br />\';
            html += \'Zip : \'+result[\'billing_zip\']+\'<br />\';
            html += \'City : \'+result[\'billing_city\']+\'<br />\';
            html += \'State : \'+result[\'billing_state\']+\'<br />\';
            html += \'Country : \'+result[\'billing_country\']+\'<br />\';


            $("#myModal").find(".modal-header").show();
            $("#myModal").find(".modal-footer").show();
            $("#myModal").modal(\'show\');
            $("#myModal").find(".modal-header h4").text("Billing Details");
            $("#swdesc").html(html); 

            })
            }',

            ),




            'dialog1' => array
            (
            'label'=>'Shipping Details',
           
            'options' => array('id'=>'$data->orderid'), 

            'click'=>'function(){
            var val = $(this).attr("id");
            //alert(val);

            $("#myModal").modal(\'show\');
            $("#myModal").find(".modal-header").hide();
            $("#myModal").find(".modal-footer").hide();
            $("#swdesc").html(\'<div style="text-align:center;"><img src="'.Yii::app()->request->baseUrl.'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>\');

            $.post(base_url+"/product/admin/order/showship",{"id":val},function(res){

            //alert(res); 

            result = eval(\'(\'+res+\')\');
            html = \'\';

            html += \'Name : \'+result[\'shipping_fname\'] + \' \'+result[\'shipping_lname\']+\'<br />\';
            html += \'Address : \'+result[\'shipping_add\']+\'<br />\';
            html += \'Phone No : \'+result[\'shipping_phone\']+\'<br />\';
            html += \'Zip : \'+result[\'shipping_zip\']+\'<br />\';
            html += \'City : \'+result[\'shipping_city\']+\'<br />\';
            html += \'State : \'+result[\'shipping_state\']+\'<br />\';
            html += \'Country : \'+result[\'shipping_country\']+\'<br />\';


            $("#myModal").find(".modal-header").show();
            $("#myModal").find(".modal-footer").show();
            $("#myModal").modal(\'show\');
            $("#myModal").find(".modal-header h4").text("Shipping Details");
            $("#swdesc").html(html); 

            })
            }',

            ),



            'dialog2' => array
            (
            'label'=>'Product Details',
            
            'options' => array('id'=>'$data->orderid'), 

            'click'=>'function(){
            var val = $(this).attr("id");
            //alert(val);

            $("#myModal").modal(\'show\');
            $("#myModal").find(".modal-header").hide();
            $("#myModal").find(".modal-footer").hide();
            $("#swdesc").html(\'<div style="text-align:center;"><img src="'.Yii::app()->request->baseUrl.'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>\');

            $.post(base_url+"/product/admin/order/showPro",{"id":val},function(res){

            //alert(res); 

            $("#myModal").find(".modal-header").show();
            $("#myModal").find(".modal-footer").show();
            $("#myModal").modal(\'show\');
            $("#swdesc").html(res); 

            })
            }',

            ),


            ),
            ),






            )
            ));
        ?>                      
   
   </div>
   
   </div>
     
     
     
     

<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal','htmlOptions'=>array('style'=>'width:80%;left:33%'))
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4></h4>
</div>

<div class="modal-body" id="swdesc">

</div>

<div class="modal-footer">

    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
        'label' => 'Close',
        'url' => 'javascript:void(0)',
        'htmlOptions' => array('data-dismiss' => 'modal','class'=>'modal-btn'),
        )
        ); ?>
    </div>
     
    <?php $this->endWidget(); ?>
 


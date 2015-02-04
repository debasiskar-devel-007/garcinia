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
        <h2  id="pageTitle">Product Stock Listing</h2>


        <div class="addbutton" style="margin-bottom:6px; margin-left:12px;"><a href="<?php echo $baseUrl;?>/product/admin/stock/add" class="button">Add</a></div> 
         <div class="addbutton" id="refresh" style="margin-bottom:6px; margin-left:12px;"><a href="javascript:void(0)" class="button">Show All</a></div>   
        <!--  <div class="redtext">You have 10 New User to Approve</div>  -->
        <?php
            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'id'=>'user-grid',
            'type' => 'striped bordered',
            'dataProvider'=>$model->search(),
            'template' => "{summary}{items}{pager}",

            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            'filter'=>$model,
            'columns' => array(

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'product',
            'filter' => CHtml::activeTextField($model, 'product'),
            'value' => '$data->product',
            'id'=>'$data[id]',
            'sortable'=>true,
            
            ),
            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'avail_stock',
            'filter' => false,
            'value' => '$data->avail_stock',
            'id'=>'$data[id]',
            'sortable'=>true,
            ),

            /*
            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'time',
            'filter' => false,
            'value' => 'date(\'m/d/Y h:i a\',$data->time)',
            'id'=>'$data[id]',
            'sortable'=>true,
            ),
            */
            
            array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {add}',   //the bootstrap is modified to remove the view. 
            'viewButtonUrl'=>'yii::app()->controller->createUrl("admin/stock/details",array("id"=>$data->product_id))',
            'evaluateID'=>true,
             'buttons'=>
                array(
                'add'=>array('label'=> '<img style="height:15px;" src="'.Yii::app()->theme->baseUrl.'/images/add.png" />','options'=>array('title'=>'Add Stock','onclick'=>'addstock(this)','id'=>'$data->product_id')),
                
            )
            

            ),

            

            )
            ));
        ?>                      

    </div>
     </div>
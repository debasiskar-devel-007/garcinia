<?php
    $baseUrl =  Yii::app()->BaseUrl;

?>
<div id="main">
    <div id="content">
        <h2  id="pageTitle">Affiliate CPC Report</h2>
        <div class="filters">

        <?php
        $this->widget(
            'bootstrap.widgets.TbDatePicker',
            array(
                'name' => 'AffiliatePerClick[fromdate]',
                'options'=>array('format'=>'mm-dd-yyyy')
            )
        );
        ?>
        <span style="width: 40px"></span>
        <?php


        $this->widget(
            'bootstrap.widgets.TbDatePicker',
            array(
                'name' => 'AffiliatePerClick[todate]',
                'options'=>array('format'=>'mm-dd-yyyy')
            )
        );

        $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'label' => 'Filter By date',
                'type' => 'Primary',
                'htmlOptions'=>array('style'=>'margin-bottom:10px;margin-left:20px','onclick'=>'updategrid()')
            )
        );
        ?>
        </div>

        <div class="addbutton" id="refresh" style="margin-bottom:6px; margin-left:12px;"><a href="javascript:void(0)" class="button">Show All</a></div>
        <!--  <div class="redtext">You have 10 New User to Approve</div>  -->
        <?php

        $this->widget('bootstrap.widgets.TbGroupGridView', array(
            'type' => 'striped bordered',
            'id'=>'user-grid',
            'dataProvider'=>$model->search(),
            'template' => "{summary}{items}{pager}",
            'extraRowColumns'=> array('firstLetter'),
            'mergeType' => 'nested',
            'mergeColumns' => array('total_cpc','total_cpc_cost'),
            /*
            'extraRowTotals' => function($data, $row, &$totals) {
                if(!isset($totals['count'])) $totals['count'] = 0;
                $totals['count']++;

                if(!isset($totals['sum_age'])) $totals['sum_age'] = 0;
                $totals['sum_age'] += $data['cpc_no'];
            },
*/
            'extraRowExpression' => '"<b style=\"font-size: 14px; color: #333;\">".$data->fullname."</b>"',

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
            bootbox.alert("Your selected User has been successfully activated.");
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
            bootbox.alert("Your selected User has been successfully deactivated.");
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
            */

            //----------------------------------------------End of bulk action-------


            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            'filter'=>$model,
            'columns' => array(

                array(
                    'name' => 'firstLetter',
                    'value' => '$data->fullname',
                    'headerHtmlOptions' => array('style'=>'display:none'),
                    'htmlOptions' =>array('style'=>'display:none')
                ),

                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'fullname',
                    'header' => 'Affiliate Name',
                    'filter' => CHtml::activeTextField($model, 'fullname'),
                    'value' => '$data->fullname',
                    'id'=>'$data[id]',
                    'sortable'=>true,


                ),

                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'page_id',
                    'filter' => CHtml::activeDropdownList($model, 'page_id',$page_set),
                    'value' => '($data->page_id == 2)?"Landing Page":"Home Page"',
                    'id'=>'$data[id]',
                    'sortable'=>true,


                ),

                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'ip_address',
                    'filter' => CHtml::activeTextField($model, 'ip_address'),
                    'value' => '$data->ip_address',
                    'id'=>'$data[id]',
                    'sortable'=>true,


                ),

                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'time',
                    'filter' => false,
                    'value' => 'date(\'M d,Y h:i a\',$data->time)',
                    'id'=>'$data[id]',
                    'sortable'=>true,


                ),

                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'cpc_rate',
                    'filter' => false,
                    'value' => '$data->cpc_rate',
                    'id'=>'$data[id]',
                    'sortable'=>true,
                    'footer' => "Total(Grand): ".$model->fetchTotalclicks($model->search()->getData()),


                ),

                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'total_cpc',
                    'filter' => false,
                    'value' => '$data->tot_cpc',
                    'id'=>'$data[id]',
                    'sortable'=>true,
                    'footer' => "Total(Grand): ".$model->fetchTotalcpc($model->search()->getData()),


                ),

                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'total_cpc_cost',
                    'filter' => false,
                    'value' => '$data->tot_cpc_cost',
                    'id'=>'$data[id]',
                    'sortable'=>true,
                    //'footer' => "Total: ".$model->fetchTotalDays($model->search()->getData()),


                ),









            )

        ));
        ?>

    </div>
</div>

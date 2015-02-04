<?php
    $baseUrl =  Yii::app()->BaseUrl;
   
?>

<div class="addbutton" style="margin-bottom:6px; margin-left:12px;"><a href="javascript:void(0);" onclick="addnote('<?php echo $id;?>')" class="button">Add</a></div>
<?php
            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider'=>$model->fetchbyid($id),
            'template' => "{summary}{items}{pager}",

            //---------------------------------------------- this widget code is written add a bulk action------ 

            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            //'filter'=>$model,
            'columns' => array(

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'user_id',
            //'filter' => CHtml::activeTextField($model, 'user_id'),
            'value' => '$data->fullname',
            'id'=>'$data[id]',
            'sortable'=>false,
            

            ),

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'notes',
           // 'filter' => CHtml::activeTextField($model, 'notes'),
            'value' => '$data->notes',
            'id'=>'$data[id]',
            'sortable'=>false,
            

            ),

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'time',
           // 'filter' => CHtml::activeTextField($model, 'time'),
            'value' => 'date("M d,Y,h:i a",$data->time)',
            'id'=>'$data[id]',
            'sortable'=>false,
            

            ),

            array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            //'afterDelete'=>"function(link,success,data){ if(success) $(this).parent().parent().parent().remove(); }",
            //'deleteConfirmation'=>"js:'Record with ID '+$(this).parent().parent().children(':first-child').text()+' will be deleted! Continue?'",
            'template' => '{del2}',   //the bootstrap is modified to remove the view.
            'evaluateID'=>true,
            'buttons'=>
                    array('del2'=>array('label'=> '<i class="icon-trash"></i>','options'=>array('title'=>'Change Password','onclick'=>'delnote(this)','id'=>'$data->id')),
                    )
            
            

            ),


            )
            ));
        ?>
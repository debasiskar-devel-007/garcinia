<div id="main">
    <div id="content">
        <h2 id="pageTitle">Newsletter Listing</h2>


        <?php Yii::import('zii.widgets.ButtonColumn');


        ?>

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
            'ajaxUrl'=> Yii::app()->request->getUrl(),
            //---------------------------------------------- this widget code is written add a bulk action------ 




            //----------------------------------------------End of bulk action-------


            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            'filter'=>$model,
            'columns' => array(
            


            array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'userid',
            'filter' => CHtml::activeTextField($model, 'userid'),
            'value' => '$data->userid',
            'id'=>'$data[id]',
            'sortable'=>true,


            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),
            array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'time',
            'filter' => CHtml::activeTextField($model, 'time'),
            //'value' => '$data->time',
                'value' => 'date("m/d/y",$data->time)',

                'id'=>'$data[id]',
            'sortable'=>true,


            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),

                array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'email',
                    'filter' => CHtml::activeTextField($model, 'email'),
                    'value' => '$data->email',
                    'id'=>'$data[id]',
                    'sortable'=>true,


                    // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
                ),


                array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'has_select',
                    'filter' => CHtml::activeTextField($model, 'has_select'),
                    'value' => '($data->has_select == 0)?"Not Subscribed":"Subscribed"',
                    'id'=>'$data[id]',
                    'sortable'=>true,


                    // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
                ),





            )
            ));
        ?>



        
        

    </div>
</div>

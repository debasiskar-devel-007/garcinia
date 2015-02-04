<div id="main">
    <div id="content">
        <h2 id="pageTitle">Wishlist Report</h2>
       
        <?php Yii::import('zii.widgets.ButtonColumn');  ?>
        <div style="margin-top: 10px;" class="newtable">
            <?php

                $base_url=Yii::app()->getBaseUrl(true);
                $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Show All',
                'type' => 'primary',
                'size' => 'small',
                'id'=>"show_but",

                //'url' => $this->createUrl('#'),
                'htmlOptions'=>array('style'=>"display:none;")
                ));

            ?>

            <?php

                $this->widget('bootstrap.widgets.TbExtendedGridView', array(
                'type' => 'striped bordered',
                'dataProvider'=>$model->search(),
                'template' => "{summary}{items}{pager}",
                //---------------------------------------------- this widget code is written add a bulk action------ 


                'bulkActions' => array(),


                //----------------------------------------------End of bulk action-------


                'enablePagination' => true,
                'summaryText'=>'Displaying {start}-{end} of {count} results.',
                'filter'=>$model,
                'columns' => array(
               array(
                'name' => 'fullname',
                //'filter' => CHtml::activeTextField($model, 'fullname'),
                'filter' => false,
                'value' => '$data->fullname',
                'id'=>'$data[id]',
                'sortable'=>false,
                'header'=>'Name'
                ),

               array(
                'name' => 'productname',
                //'filter' => CHtml::activeTextField($model, 'productname'),
                'filter' => false,
                'value' => '$data->productname',
                'id'=>'$data[id]',
                'sortable'=>false,
                'header'=>'Product Name'
                ),

               array(
                'name' => 'time',
                'filter' => false,
                'value' => 'date(\'m/d/Y h:i a\',$data->time)',
                'id'=>'$data[id]',
                'sortable'=>false,
                'header'=>'Added Time'
                ),

               array(
                'name' => 'is_added',
                'filter' => false,
                'value' => '($data->is_added)?date(\'m/d/Y h:i a\',$data->is_added):""',
                'id'=>'$data[id]',
                'sortable'=>false,
                'header'=>'Aad to Cart Time'
                ),

               array(
                'name' => 'is_deleted',
                'filter' => false,
                'value' => '($data->is_deleted)?date(\'m/d/Y h:i a\',$data->is_deleted):""',
                'id'=>'$data[id]',
                'sortable'=>false,
                'header'=>'Deleted Time'
                ),

               array(
                'name' => 'isactive',
                'filter' => false,
                'value' => '($data->isactive)?"Active":"Inactive"',
                'id'=>'$data[id]',
                'sortable'=>false,
                'header'=>'Is Active?'
                ),


                )
                ));
            ?>
        </div>


        <?php $this->beginWidget(
            'bootstrap.widgets.TbModal',
            array('id' => 'myModal')
            ); ?>

        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h4>Category Description:</h4>
        </div>

        <div class="modal-body" id="swdesc">

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
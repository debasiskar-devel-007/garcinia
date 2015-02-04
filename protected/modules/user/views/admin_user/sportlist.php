
<div id="main">
    <div id="content">
        <h2  id="pageTitle">Sport List For <?php echo Common_helper::get_name($id);?></h2>

<?php echo $id;
exit;
 ?>
        
        <!--  <div class="redtext">You have 10 New User to Approve</div>  -->
        <?php
            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider'=>Usericon::model()->geticon($id),
            'template' => "{summary}{items}{pager}",
           
            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            //'filter'=>UserRoleRelation::model(),
            'columns' => array(

            array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'sport_name',
            //'filter' => CHtml::activeTextField(UserRoleRelation::model(), 'role_id'),
            'value' => '$data->sport_name',
            'id'=>'$data[id]',
            'sortable'=>false

            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),



            )
            ));
        ?>                      

    </div>
     </div>
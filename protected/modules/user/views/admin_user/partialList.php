<?php
    $baseUrl =  Yii::app()->BaseUrl;

$sess = Yii::app()->session['sess_user'];

$sessrole = @$sess['role'];
$sessid = $sess['id'];
?>

<div id="main">
    <div id="content">
        <h2  id="pageTitle">Partial Listing</h2>

        <div class="addbutton" id="refresh" style="margin-bottom:6px; margin-left:12px;"><a href="javascript:void(0)" class="button">Show All</a></div>
        <!--  <div class="redtext">You have 10 New User to Approve</div>  -->

        <?php
        $this->widget(
        'bootstrap.widgets.TbDatePicker',
        array(
        'name' => 'UserManager[fromdate]',
        'options'=>array('format'=>'yyyy-mm-dd')
        )
        );
        ?>
        <span style="width: 40px"></span>
        <?php


        $this->widget(
            'bootstrap.widgets.TbDatePicker',
            array(
                'name' => 'UserManager[todate]',
                'options'=>array('format'=>'yyyy-mm-dd')
            )
        );

        $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'label' => 'Filter By date',
                'type' => 'Primary',
                'htmlOptions'=>array('style'=>'margin-bottom:10px;margin-left:20px','onclick'=>'updategrid1()')
            )
        );
        ?>

        <?php

            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'id'=>'user-grid',
            'dataProvider'=>$model->partial_search($sessrole,$sessid),
            'template' => "{summary}{items}{pager}",
            'ajaxUrl'=> Yii::app()->request->getUrl(),




            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            'filter'=>$model,
            'columns' => array(

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'fullname',
            'header' => 'Name',
            'filter' => CHtml::activeTextField($model, 'fullname'),
            'value' => '$data->fullname',
            'id'=>'$data[id]',
            'sortable'=>true,


            ),


                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'email',
                    'filter' => CHtml::activeTextField($model, 'email'),
                    'value' => '$data->email',
                    'id'=>'$data[id]',
                    'sortable'=>true,


                ),
                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'affiliatename',
                    'filter' => CHtml::activeTextField($model, 'affiliatename'),
                    'value' => '$data->affiliatename',
                    'id'=>'$data[id]',
                    'sortable'=>true,


                ),
                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'landingname',
                    'filter' => CHtml::activeTextField($model, 'landingname'),
                    'value' => '$data->landingname',
                    'id'=>'$data[id]',
                    'sortable'=>true,


                ),



                array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
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
                    'name'=>'time',
                     'filter' => false,
                    'value' => 'date("m/d/Y",strtotime($data->time))',
                    'id'=>'$data[id]',
                    'sortable'=>true,


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

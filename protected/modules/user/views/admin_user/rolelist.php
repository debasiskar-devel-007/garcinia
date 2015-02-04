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
        <h2  id="pageTitle">Role List For <?php echo Common_helper::get_name($id);?></h2>


        
        <!--  <div class="redtext">You have 10 New User to Approve</div>  -->
        <?php
            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider'=>UserRoleRelation::model()->getUserRole($id),
            'template' => "{summary}{items}{pager}",
           
            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            //'filter'=>UserRoleRelation::model(),
            'columns' => array(

            array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'role_id',
            //'filter' => CHtml::activeTextField(UserRoleRelation::model(), 'role_id'),
            'value' => '$data->role_id',
            'id'=>'$data[id]',
            'sortable'=>false

            // 'rowHtmlOptionsExpression' => 'array("id" => $data->uid)',
            ),
            array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'description',
            //'filter' => CHtml::activeTextField(UserRoleRelation::model(), 'description'),
            'value' => 'Common_helper::put_safe($data->description)',
            'id'=>'$data[id]',
            'sortable'=>true,
            'type' => 'html'
            ),


            )
            ));
        ?>                      

    </div>
     </div>
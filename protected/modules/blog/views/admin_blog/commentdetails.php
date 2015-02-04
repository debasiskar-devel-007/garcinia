<script type="text/javascript">
    $(function(){
        $('tr').children('th').css('color','#000');   
        $('tr.even').children('th').css('background','#FFF');

        $(".toggle-column").children('a').click(function(){
            var cls1=$(this).children('i').attr('class');
            if(cls1=="icon-remove-sign"){
                $(this).children('i').removeAttr('class').addClass('icon-ok-circle');   
            }
            else{
                $(this).children('i').removeAttr('class').addClass('icon-remove-sign');   
            }

        });

        $(".idcheckbox1").children('a').click(function(){
            //$('tfoot')
        });




    });
</script>
<br /><div style="margin-top: 10px;" class="newform">   
    <?php 
        //  Yii::import('zii.widgets.ButtonColumn');

        /*echo "<pre>";
        print_r($m_user_details);
        echo "</pre>";
        */
        $i=1;                                  
        //foreach($m_user_details as $row){ ?>
    <?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
        'type' => 'striped bordered',
        'id'=>'commentTab',
        // 'dataProvider' => new CActiveDataProvider('dev',array(
        // 'criteria'=>array('condition'=>'id < 95'))  // only the values of the corresponding ids with less than 5 value will get                                                       displayed
        // ),

        'bulkActions' => array(
        'actionButtons' => array(
        array(
        'buttonType' => 'button',
        'type' => 'primary',
        'size' => 'small',
        'label' => 'Active Selected',
        'click' => 'js:function(checked){
        var values = [];
        checked.each(function(){
        values.push($(this).val());

        });
        $(".idcheckbox1").children("input").each(function(){
        if($(this).is(":checked")){
        //alert($(this).val())
        if($(this).parent("td").parent("tr").children("td.toggle-column").children("a").children("i").attr("class")=="icon-remove-sign"){
        $(this).parent("td").parent("tr").children("td.toggle-column").children("a").click();   
        }

       // bootbox.alert(" your selected comments has been activated !");  

        //alert($(this).val());   
        }
        //bootbox.alert("your data is activated");    
        });

        }'
        ),
        array(
        'buttonType' => 'button',
        'type' => 'primary',
        'size' => 'small',
        'label' => 'Inactive Selected',
        'click' => 'js:function(checked){
        var values = [];
        checked.each(function(){
        values.push($(this).val());

        });
        $(".idcheckbox1").children("input").each(function(){
        if($(this).is(":checked")){
        //alert($(this).val())
        if($(this).parent("td").parent("tr").children("td.toggle-column").children("a").children("i").attr("class")=="icon-ok-circle"){
        $(this).parent("td").parent("tr").children("td.toggle-column").children("a").click();   
        }

       // bootbox.alert(" your selected comments has been deactivated !");  

        //alert($(this).val());   
        }
        //bootbox.alert("your data is activated");    
        });

        }'
        ),
        array(
        'buttonType' => 'button',
        'type' => 'primary',
        'size' => 'small',
        'label' => 'Inactive Selected',
        'click' => 'js:function(values){console.log(values);}'
        ),


        ),
        // if grid doesn't have a checkbox column type, it will attach
        // one and this configuration will be part of it
        'checkBoxColumnConfig' => array(
        'name' => 'id',
        'htmlOptions'=>array('class'=>'idcheckbox1'), 
        ),
        ),

        'enablePagination' => true,  
        'dataProvider'=>$model->search($blog_id),
        'template' => "{summary}{items}{pager}",
        'columns' => array( 
        array( 
        'class'=>'bootstrap.widgets.TbImageColumn',
        'header' => 'Profile Image',
        'imagePathExpression'=>'$data->userImagePath($data->s_prof_image)',
        'usePlaceKitten'=>FALSE,
        'htmlOptions'=>array('style'=>'max-height:100px;max-width:100px;')
        //'placement' => 'right',
        //'inputclass' => 'span3'
        ),
        array(
        //  'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 's_fname',
        'filter' => CHtml::activeTextField($model, 's_fname'),
        'value' => '$data->s_fname',
        'id'=>'$data[uid]',
        //'sortable'=>true,
        'type'=>'html',

        ), 
        array(
        //  'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 's_lname',
        'filter' => CHtml::activeTextField($model, 's_lname'),
        'value' => '$data->s_lname',
        'id'=>'$data[uid]',
        //'sortable'=>true,
        'type'=>'html',

        ), 
        array(
        //  'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'comment',
        'filter' => CHtml::activeTextField($model, 'comment'),
        'value' => '$data->comment',
        'id'=>'$data[uid]',
        'sortable'=>false,
        'type'=>'html',

        ), 

        array(
        'class'=>'bootstrap.widgets.TbToggleColumn',
        'toggleAction'=>'default/togglecomnt',
        'sortable'=>false,   
        'name' => 'i_active',
        'header' => 'Status'
        ),


        ),


        ) 
        );
    ?>


    <?php 
        //  $i++;
        //   } ?>



</div>
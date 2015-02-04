<script type="text/javascript">
    $(function(){
        $('tr').children('th').css('color','#000');   
        $('tr.even').children('th').css('background','#FFF');

    });
</script>
<?php 

    // var_dump($res); exit;
    $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$res[0],
    'attributes'=>array(
    //array('name'=>'s_prof_image',
    //'label'=>'Profile Image','type' => 'html','value'=>$m_dataset->userImagePathHtml($m_dataset->s_prof_image)),
    array('name'=>'pr_title', 'label'=>'Title'),
    array('name'=>'pr_desc', 'label'=>'Description','type'=>'html'),
    //array('name'=>'evalstatus(pr_status)', 'label'=>'Status'),

    ),
    ));

?>
<div style="float: right;">
    <?php
        $base = yii::app()->baseUrl;    

        $this->widget('bootstrap.widgets.TbButton',array(
        'label' => 'Back',
        'type' => 'primary',
        'size' => 'small',
        'url'  => $base.'/index.php/Blog/default',
        ));


          
    ?> 

</div>
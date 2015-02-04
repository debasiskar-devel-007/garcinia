<div style="height:480px;width:480px; margin: 0;" class="newtable">
<?php 
if(!empty($data)){
?>
<?php
       //  var_dump($data);

 $this->beginWidget('Galleria');?>
     <?php
     if(!empty($data)){
     for($i=0;$i<count($data);$i++){ ?>
          <img src="<?php echo $data[$i] ?>" alt="Description of image" title="Title of image" />

     <?php } 
     }
     ?>
<?php $this->endWidget();?>
<?php }else{  ?>
<strong style="size:landscape;">NO IMAGE AVAILABLE</b>
<?php } ?>
</div>
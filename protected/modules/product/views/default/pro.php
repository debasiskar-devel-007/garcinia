<?php
    $baseUrl =  Yii::app()->baseUrl;

    $themeUrl = Yii::app()->theme->baseUrl;
?>

<?php 
    $base = Yii::app()->request->baseUrl;
    $res = Category::model()->findAll('isactive=1  order by priority DESC');
    //echo "<pre>";
    //echo $res[0]['productid'];
    
    foreach($res as $row){

    ?>
    
   
    <li><a href="<?php echo $base;?>/product/default/detailscat/id/<?php echo $row['id']; ?>/name/<?php echo preg_replace("![^a-z0-9]+!i", "-",strtolower($row['categoryname']));?>"> <?php echo $row['categoryname']; ?></a></li>

    <?php } ?>
  

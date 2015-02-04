<?php
    $baseUrl =  Yii::app()->baseUrl;

    $themeUrl = Yii::app()->theme->baseUrl;
?>
<div class="img-contain">
   <div style="width: 260px; margin: 0 auto;"> <div class="top-img1"><img src="<?php echo $baseUrl; ?>/uploads/product_image/list/<?php echo $data->productimage;?>"  alt="#" /></div></div>

    <strong> <?php echo ucfirst($data->productname);?></strong>
    <div class="img-text1"><?php echo Common_helper::character_limiter(strip_tags($data->productdesc),130);?></div>
    <span>$<?php echo $data->productprice;?></span>
    <div class="btnmain">
        <div class="btn1"><a href="<?php echo $baseUrl; ?>/product/default/details/id/<?php echo $data->productid;?>/name/<?php echo preg_replace("![^a-z0-9]+!i", "-",strtolower($data->productname));?>">Learn More</a></div>
        <div class="btn1"><a href="javascript:void(0);" onclick="<?php echo CHtml::ajax(array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('shopping-cart/add'),
                    'data'=>array('id'=>$data->productid),
                    'success'=>'function(res){
                        if(res > 0){
                        window.location.href = \''.$baseUrl.'/product/checkout\';
                        $(\'#nocart\').text(\'(\'+res+\')\');
                        }
                    }'
                    ));
                ?>" >Buy Now</a></div>
        <div class="clear"></div>
    </div>
        </div>
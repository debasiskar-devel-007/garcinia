<?php
    $baseUrl =  Yii::app()->baseUrl;

    $themeUrl = Yii::app()->theme->baseUrl;
?>
<div class="product-contain">
    <div class="img-contain"><img src="<?php echo $baseUrl; ?>/uploads/product_image/list/<?php echo $data->productimage;?>" style="max-width: 260px; max-height: 260px;" /></div>
    <div class="text-contain">
        <strong><?php echo ucfirst($data->productname);?></strong>
        <br />
    <?php echo Common_helper::character_limiter(strip_tags($data->productdesc),110);?><br />
        <span>$<?php echo $data->productprice;?></span>
    </div>
    <div class="btn-div"><div class="btn-div">
       <div class="btn-pro"><a href="javascript:void(0);" onclick="buynow1('<?php echo $data->productid;?>')" >Buy Now</a></div>    
            <div class="clear"></div>  
            <div class="clear"></div>  
        </div>
    </div>

             </div>
             

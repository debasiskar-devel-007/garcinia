<?php
    $baseUrl =  Yii::app()->baseUrl;

    $themeUrl = Yii::app()->theme->baseUrl;
    $autoship = Yii::app()->session['autoship']; 
     $sess = Yii::app()->session['sess_user'];
?>
<div class="product-contain">
    <div class="img-contain"><a href="<?php echo $baseUrl; ?>/product/default/details/id/<?php echo $data->productid;?>/name/<?php echo preg_replace("![^a-z0-9]+!i", "-",strtolower($data->productname));?>/catagoryid/<?php echo $data->catagoryid;?>"><img src="<?php echo $baseUrl; ?>/uploads/product_image/list/<?php echo $data->productimage;?>" /></a>
    <?php if($data->avail_stock == 0){ ?>
    <img src="<?php echo $themeUrl?>/images/stock.png" style="position:absolute; width:50%; left:0; top:0;"/>
    <?php } ?>
    
    </div>
    
    <div class="pro-name-contain">
        <div class="pro-name" rel="tooltip" title="<?php echo ucfirst($data->productname);?>"><?php echo Common_helper::character_limiter(($data->productname),16);?></div>

        <div class="pro-price">$<?php echo $data->productprice;?></div>
           <div class="clear"></div>  
    </div>
    <div class="product-menu">
    <a href="<?php echo $baseUrl; ?>/product/default/details/id/<?php echo $data->productid;?>/name/<?php echo preg_replace("![^a-z0-9]+!i", "-",strtolower($data->productname));?>/catagoryid/<?php echo $data->catagoryid;?>" class="plink1">Product Info</a>
    <?php if($data->avail_stock){ ?>
        <a href="javascript:void(0);" product-name="<?php echo ucfirst($data->productname);?>" onclick="buypro1('<?php echo $data->productid; ?>',<?php echo intval(@$sess['id']);?>,this)" class="plink2">Add to Cart</a>
    <?php }else{ ?>
        <a href="javascript:void(0);" product-id="<?php echo intval($data->productid);?>" user-email="<?php echo (@$sess['email']);?>" class="plink2 notifyme">Notify Me</a>
    <?php } ?>
                  <div class="clear"></div>
    </div>
    
    <div class="text-contain">

    <?php echo Common_helper::character_limiter(strip_tags($data->productdesc),60);?><br />
  
    </div>
     
             </div>
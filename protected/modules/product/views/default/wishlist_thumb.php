<?php
    $baseUrl =  Yii::app()->baseUrl;

    $themeUrl = Yii::app()->theme->baseUrl;
    $autoship = Yii::app()->session['autoship']; 
     $sess = Yii::app()->session['sess_user'];  
?>
<div class="product-contain">
    <div class="img-contain"><a href="<?php echo $baseUrl; ?>/product/default/details/id/<?php echo $data->productid;?>/name/<?php echo preg_replace("![^a-z0-9]+!i", "-",strtolower($data->productname));?>/catagoryid/<?php echo $data->catagoryid;?>"><img src="<?php echo $baseUrl; ?>/uploads/product_image/list/<?php echo $data->productimage;?>" style="max-width: 260px; max-height: 260px;" /></a>
    <?php if($data->avail_stock == 0){ ?>
        <img src="<?php echo $themeUrl?>/images/stock.png" style="position:absolute; width:50%; left:0; top:0;"/> 
    <?php } ?>
    </div>
    <div class="pro-name-contain">
        <div class="pro-name" rel="tooltip" title="<?php echo ucfirst($data->productname);?>"><?php echo Common_helper::character_limiter(ucfirst($data->productname),18);?></div>

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
       
    <?php echo Common_helper::character_limiter(strip_tags($data->productdesc),60);?>
    </div>
    
    
      <div class="remove-pro"><a href="javascript:void(0);" onclick="delwish(this,'<?php echo $data->productid;?>','<?php echo intval(@$sess['id'])?>','<?php echo $data->wishlistid;?>')" >Remove</a></div>  
   <!-- <div class="btn-div">
            <div class="btn-pro"><a href="<?php echo $baseUrl; ?>/product/default/details/id/<?php echo $data->productid;?>/name/<?php echo preg_replace("![^a-z0-9]+!i", "-",strtolower($data->productname));?>/catagoryid/<?php echo $data->catagoryid;?>" >Learn More</a></div>
            <div class="btn-pro"><a href="javascript:void(0);" product-name="<?php echo ucfirst($data->productname);?>" onclick="<?php echo ($data->avail_stock)?'buypro1(\''.$data->productid.'\','.intval(@$sess['id']).',this)':'return false';?>" >Buy Now</a></div>
            
            <div class="btn-pro"><a href="javascript:void(0);" onclick="delwish(this,'<?php echo $data->productid;?>','<?php echo intval(@$sess['id'])?>','<?php echo $data->wishlistid;?>')" >Remove</a></div>
            <div class="clear"></div> 
                    
 
            <div class="clear"></div>  
        </div>          -->
    

             </div>
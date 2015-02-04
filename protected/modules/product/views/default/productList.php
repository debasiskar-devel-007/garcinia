<?php
    $baseUrl =  Yii::app()->baseUrl;

    $themeUrl = Yii::app()->theme->baseUrl;

    $imgPath = Yii::app()->getBaseUrl(true)."/uploads/product_image/thumb/700X357/";

?>
<div class="problock1">
    <div class="top-header"><?php echo $data->product_name;?> <span>
            <?php $sess=yii::app()->session['offerval'] ;

            ?>
            $<?php echo $data->product_price;?>

        </span></div>
    <div class="leftpro1">

        <input type="checkbox"  class="ck1" onchange="cng_chk(this)">

        <img src="<?php echo $imgPath.$data->product_image;?>" alt="#" />

    </div>


    <div class="rightprice1">

        <h2>
        <?php if($data->id == 12){ ?>
        Just Pay The Shipping Charge:$
           <?php if(intval($sess))
            {
                if($sess==1){
                    $disc=7.95/2;
                    echo number_format($disc,2);
                }
                else
                {
                    $disc=7.95/4;
                    echo number_format($disc,2);
                }
            }
            else
            {
            ?>
            7.95
            <?php } ?>

        <?php } ?>
        </h2>
        <?php if($data->autoship==1) {?>
   <img src="<?php echo $themeUrl;?>/images/autoship.png" alt="#" class="autoship" />
        <?php } ?>



      
        <a href="javascript:void(0);" l_id="<?php echo intval($data->id);?>" onclick="selectproduct(this)" s_pro="0" class="buynow">Buy Now</a>
  <img src="<?php echo $themeUrl;?>/images/graylogo.png" alt="#" class="glogo" />

    </div>
    <div class="clear"></div>
</div>

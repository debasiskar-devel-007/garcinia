<?php
    $baseUrl =  Yii::app()->baseUrl;

    $themeUrl = Yii::app()->theme->baseUrl;

    //$imgPath = Yii::app()->getBaseUrl(true)."/uploads/product_image/thumb/237X214/";
    $imgPath = Yii::app()->getBaseUrl(true)."/uploads/product_image/thumb/";



$res=ShippingCharge::model()->findAll('id='.$data->shipping_id);

$model= new TransactionOrderDetails();
$modres=TransactionProductDetails::model()->findAll('order_id='.$_GET['orderid']);

//echo $data->card_last_four;
//echo $data->card_last_four;

?>

<div class="upsell-wrapper">
    <h3><?php echo $data->product_name ?><br />

      <span style="font-size:19px; line-height:26px; display:inline-block; padding-top:15px;color:#000;"><?php  echo $data->product_desc ?></span>
    </h3>


    <div class="pro-img"><img src="<?php echo $imgPath.$data->product_image;?>" style="display: block;margin: 0 auto" alt="#" /></div>

    <div class="pro-detail">
        <h4>Add To Order :<span>$<?php echo $data->product_price; ?></span><br /><br /></h4>
        <h4>+Shipping:<span>$<?php echo $res[0]['shipping_charge']; ?></span></h4>
        <?php
        if($data->autoship==1){



          ?>
            <div class="autobill">
            <input value="<?php echo $data->id;?>" type="checkbox" name="ex3_b" class="autoship_chk ck2">
                <label>Autobill</label>
            </div>
     <?php   }

        ?>
        <a href="javascript:void(0)"  onclick="upsellpro(<?php echo $_GET['orderid'] ?>,<?php echo $res[0]['shipping_charge']; ?>,this)"  cardno="<?php echo $modres[0]['card_last_four'] ?>"  cardmon="<?php echo $modres[0]['card_exp_month'] ?>"   cardyear="<?php echo $modres[0]['card_exp_year'] ?>"            productid="<?php echo $data->product_id ?>"  landingidid="<?php echo $data->id ?>" name="<?php echo $data->product_name ?>" desc="<?php echo $data->product_desc ?>" price="<?php echo $data->product_price ?>" quan="<?php echo $data->quantity ?>" type="<?php echo $data->product_type ?>">YES</a>
        <a href="<?php echo yii::app()->getBaseUrl(true) ?>/product/default/bill/orderid/<?php echo $_GET['orderid'] ; ?>">NO</a>

        <h5>50% OFF</h5><br />

    </div>




    <div class="clear"></div>

</div>


<?php $themeUrl = Yii::app()->theme->baseUrl;


$model= new TransactionOrderDetails();

$pro_det = LandingProductRelation::model()->fetchAllPro2($id);

$pro_det = $pro_det[0];


$imgPath = Yii::app()->getBaseUrl(true)."/uploads/product_image/thumb/";



$res=ShippingCharge::model()->findAll('id='.$pro_det['shipping_id']);

$model= new TransactionOrderDetails();
$modres=TransactionProductDetails::model()->findAll('order_id='.$_GET['orderid']);


?>

<script type="application/javascript">
    $(function(){
        $.blockUI({
            message: $('#uiblock'),
            css: {
                top: '10%',
                width:'60%',
                left:'20%',
                border:'0',
                background:'none'
            }
        });
    });
</script>
<div class="top-header">

    <div class="inner-wrapper" style="min-height:650px;">

        <div class="top-logo" ><a href="<?php echo 12;?>"><img src="<?php echo $themeUrl ?>/images/logo.png" alt="#" style="display:block; margin:0 auto; float:none;" /></a></div>

        <div class="clear"></div>
    </div>
</div>

<div id="uiblock" style="display: none">
    <div class="popup-main">

        <h2><img src="<?php echo $themeUrl ?>/images/popup-text.png" alt="#" /></h2>

        <div class="pro-box"> <img src="<?php echo $imgPath.$pro_det['product_image'];?>" alt="#" /> </div>
        <div class="right-poparrow">
            <div class="popup-price">

                <span>Price:</span> $<?php echo $pro_det['product_price'] ?><br/>

                <span>+ Shipping:</span> $<?php echo $res[0]['shipping_charge']; ?>


            </div>
            <img src="<?php echo $themeUrl ?>/images/parrow.png" alt="#"  /> </div>
        <div class="clear"></div>

        <h3>Safe & Natural Colon Cleanse, Perfect<br/>
            Blend For Complete <span>Cleansing</span> & <span>Detoxifying!</span></h3>

        <a href="javascript:void(0)"  onclick="upsellpro(<?php echo $_GET['orderid'] ?>,<?php echo $res[0]['shipping_charge']; ?>,this)"  cardno="<?php echo $modres[0]['card_last_four'] ?>"  cardmon="<?php echo $modres[0]['card_exp_month'] ?>"   cardyear="<?php echo $modres[0]['card_exp_year'] ?>"            productid="<?php echo $pro_det['product_id'] ?>"  landingidid="<?php echo $pro_det['id'] ?>" name="<?php echo $pro_det['product_name'] ?>" desc="<?php echo $pro_det['product_desc'] ?>" price="<?php echo $pro_det['product_price'] ?>" quan="<?php echo $pro_det['quantity'] ?>" type="<?php echo $pro_det['product_type'] ?>" class="link1"><img src="<?php echo $themeUrl ?>/images/pbtn.png" alt="#" /></a>

        <div class="bottom-close"><a href="<?php echo yii::app()->getBaseUrl(true) ?>/product/default/bill/orderid/<?php echo $_GET['orderid'] ; ?>">No Thanks</a> </div>

    </div>
    </div>


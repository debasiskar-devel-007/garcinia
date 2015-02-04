<?php
    $baseUrl =  Yii::app()->baseUrl;

    $themeUrl = Yii::app()->theme->baseUrl;

    $cart = Yii::app()->session['cart'];

?>
<div class="table-listing">

    <div class="div1">
    <a rel="tooltip" data-original-title="Delete This Item From Cart" href="javascript:void(0);" onclick="<?php echo CHtml::ajax(array(
                'type'=>'POST',
                'url'=>CController::createUrl('shopping-cart/del'),
                'data'=>array('id'=>$data->productid),
                'success'=>'function(res){
                window.location.href = \''.$baseUrl.'/product/shopping-cart\';
                }'
                ));
            ?>">
        <img src="<?php echo $themeUrl;?>/images/close-cart.png" alt="Del" />
            </a>
    </div>

    <div class="div2">
        <img src="<?php echo $baseUrl; ?>/uploads/product_image/thumb/<?php echo $data->productimage;?>" style="max-width: 104px;" />
    </div>

    <div class="div3">
        <?php echo ucfirst($data->productname);?>
    </div>
    <div class="div4">
        $<?php echo number_format($data->productprice,2);?>
    </div>
    <div class="div5">
        <select  onchange="<?php echo CHtml::ajax(array(
                'type'=>'POST',
                'url'=>CController::createUrl('shopping-cart/update'),
                'data'=>array('id'=>$data->productid,'quan'=>'js:jQuery(this).val()'),
                'success'=>'function(res){
                    window.location.href = \''.$baseUrl.'/product/shopping-cart\';
                }'
                ));
            ?>">
            <?php for($i=1;$i<=10;$i++){ ?>
                <option value="<?php echo $i; ?>" <?php if($cart[$data->productid] == $i) { ?> selected="selected" <?php } ?>><?php echo $i; ?></option>
                <?php } ?> 
        </select>


    </div>
    <div class="div6">
        $<?php echo number_format(($data->productprice*$cart[$data->productid]),2);?>
    </div>



    <div class="clear"></div>

     </div>
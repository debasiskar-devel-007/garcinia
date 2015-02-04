<?php
    $baseUrl =  Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;

    $cart = Yii::app()->session['cart'];
    
    $sess = Yii::app()->session['sess_user'];

?>


<div class="productlist-wrapper">


    <div class="inner-wrapper">

        <div class="cart-table" style="padding-bottom:30px;">
            <div class="top-heading">
                <div class="div1">&nbsp;</div>
                <div class="div2">Product Name</div>
                <div class="div3">Unit Price</div>
                <div class="div4">Quantity</div>
                <div class="div5">Price</div>

                <div class="clear"></div>
            </div>

            <?php if(count($cart) > 0) { ?>


                <?php 
                    $this->widget(
                    'bootstrap.widgets.TbThumbnails',
                    array(
                    'dataProvider' => $model->cartList($cart),
                    'template' => "{items}\n{pager}",
                    'itemView' => 'application.modules.product.views.shopping_cart.cartList',
                    )
                    );
                ?>

                <?php } ?>

            <div class="btnchack"><a href="<?php echo $baseUrl;?>/product/default/listing" data-original-title="Continue Shopping" rel="tooltip">Continue Shopping</a></div>
            <?php if(count($cart) > 0) { ?>
               <div class="btnchack"> <a href="javascript:void(0);" onclick="checklogin(<?php echo intval(@$sess['id'])?>)" data-original-title="Check Out" rel="tooltip">Check Out</a> </div>
                <?php } ?>

        </div>







    </div>


</div>


<!-- Modal For check Login[start] -->
<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'showchecklogin')
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
</div>

<div class="modal-body">
<div class="btn2"><a href="<?php echo Yii::app()->baseUrl?>/user/default/login/page/cart">Log In</a></div>
<div class="btn2"><a href="<?php echo Yii::app()->baseUrl?>/product/checkout">Continue As a Guest</a></div>
</div>

<div class="modal-footer">

    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal','class'=>'modal-btn'),
        )
        ); ?>
    </div>
     
    <?php $this->endWidget(); ?>
<!-- Modal For check Login[end] -->

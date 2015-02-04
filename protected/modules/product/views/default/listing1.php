<?php
    $baseUrl =  Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;
?>





 <div class="inner-wrapper">

      <div class="productlist-wrapper">
      
             <h4>Product List</h4>  
             
        <?php 
            $this->widget(
            'bootstrap.widgets.TbThumbnails',
            array(
            'dataProvider' => $model->frontList1($id),
            'template' => "{items}\n{pager}",
            'itemView' => 'application.modules.product.views.default.productList',
            )
            );
        ?>
        
        
              
             
             
             <div class="clear"></div>
              <div style="width:95%; height:1px; background:#dbdbdb; margin:10px 0;"></div>
             <!--<p style="text-align: center; font-size: 15px; "><span style="color:#fd9b00;
  font-family:sansationregular;
  font-size:18px; display:block; padding-bottom: 5px;">Guarantee</span>
              Guaranteed your low introductory price will not go up. All you have to do is lock it in with 12 months Auto-Ship plus for a limited time only your 1st order has free shipping and handling while Auto-Ship guarantees an additional 25% off of all S&H for the initial 6 months. </p>-->
      
      </div>
   
   
   
   




 </div>



<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal')
); ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>&nbsp;</h4>
</div>
<div class="modal-body" style="text-align: center;">
    <!-- <img src="<?php echo $themeUrl?>/images/autoship-icon.png" alt="" style="width: 120px; display: block; margin: 0 auto;">-->

    <h4 style="text-align:center; color:#fd9b00; font-family:Arial, Helvetica, sans-serif; font-size:22px;">You have successfully updated your cart.</h4>

    <img src="<?php echo $themeUrl?>/images/logo.png" alt="" style="width: 60%; display: block; margin: 30px auto;">


    <input type="button" value="Continue"  onclick="javascript:window.location.href='<?php echo Yii::app()->getBaseurl(true);?>/product/'" style="background:#fd8c21; border:none; border-radius:5px; padding: 8px 15px; width: 140px; color:#fff;">          <input type="button" onclick="javascript:window.location.href='<?php echo Yii::app()->getBaseurl(true);?>/product/checkout'" style="background:#fd8c21; border:none; color:#fff; border-radius:5px; padding: 8px 15px; width: 140px;" value="Checkout">


</div>

<?php $this->endWidget(); ?>

    
    
     <?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'showcheckinglogin')
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
</div>

<div class="modal-body">
<input type="button" value="Log In"  onclick="javascript:window.location.href='<?php echo Yii::app()->getBaseurl(true);?>/login'" style="background:#fd8c21; border:none; border-radius:5px; padding: 8px 15px; width: 140px; color:#fff;">          <input type="button" onclick="javascript:window.location.href='<?php echo Yii::app()->getBaseurl(true);?>/user/default/sign-up'" style="background:#fd8c21; border:none; color:#fff; border-radius:5px; padding: 8px 15px; width: 140px;" value="Sign Up">

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

<div id="anindiv" style="display: none;">hhf hf hds j</div>
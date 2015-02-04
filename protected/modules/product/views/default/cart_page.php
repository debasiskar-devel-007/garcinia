<?php $themeUrl = Yii::app()->theme->baseUrl;
$last_insert_id =  Yii::app()->session['last_insert_id'];

$price = number_format(floatval(0),2);
$shipping = 0;
$tax = 0;

$errors = $model->geterrors();
$errors = @$errors["landing_product_id"][0];

$landing_page_id=1;
if(isset(Yii::app()->request->cookies['landing_page_id'])){
    $landing_page_id = Yii::app()->request->cookies['landing_page_id'];
    $landing_page_id = (string)$landing_page_id;
}

$arrmonth=array(''=>'Card Exp Month','01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
$arryear=array(''=>'Card Exp Year','2014'=>'2014','2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023','2024'=>'2024');


?>


<style>
    .control-label{
        display: none !important;
    }
    .control-group{
        margin-bottom: 0 !important;
    }
    .controls{
        margin-left: 0 !important;
    }

</style>

<style type="text/css">
    .thumbnails{
        margin-left: 0 !important;
        margin-bottom: 0 !important;
    }
</style>
<script type="application/javascript">
    $(function(){
        $('#TransactionOrderDetails_card_exp_mon').parent().parent('.control-group').css('width','35%');
        $('#TransactionOrderDetails_card_exp_mon').parent().parent('.control-group').css('float','left');
        $('#TransactionOrderDetails_card_exp_mon').parent('.controls').css('width','100%');
        $('#TransactionOrderDetails_card_exp_year').parent().parent('.control-group').css('width','35%');
        $('#TransactionOrderDetails_card_exp_year').parent().parent('.control-group').css('float','left');
        $('#TransactionOrderDetails_card_exp_year').parent('.controls').css('width','100%');
        $('#TransactionOrderDetails_card_cvv').parent().parent('.control-group').css('width','75%');
        $('#TransactionOrderDetails_card_cvv').parent().parent('.control-group').css('float','left');
        $('#TransactionOrderDetails_card_cvv').parent('.controls').css('width','100%');


    if($("#horizontalForm").find('input.error').length >0){
        $('html, body').animate({ scrollTop: $("#horizontalForm").find('input.error:first').offset().top-100 }, 500);
        $('#horizontalForm').find('input.error:first').focus();
        if($("#horizontalForm").find('input[type="hidden"].error').length >0){
            $('#errrrrr').text('<?php echo $errors;?>');

            //document.getElementById("#chk_bill_ship").checked = true;
            $('html, body').animate({ scrollTop: $("#errrrrr").offset().top-100 }, 500);
        }
    }else{
        $('html, body').animate({ scrollTop: $("#horizontalForm").offset().top-200 }, 500);
    }

        if($('.err1').text() != ""){
            $('html, body').animate({ scrollTop: $("#TransactionOrderDetails_card_no").offset().top-100 }, 500);
            $('#TransactionOrderDetails_card_no').focus();
        }


       // $('.left-contain').stickyScroll({ container: '.right-contain' })


    });

    function scrolltoform1(){
        $('html, body').animate({ scrollTop: $("#horizontalForm").offset().top-100 }, 500);
        $('#TransactionOrderDetails_shipping_fname').focus();
    }
</script>


<script type="application/javascript">

    var flag1=1;
    $(window).bind('beforeunload', function(){

        if(flag1==1)
        {

         bootbox.dialog('<div class="homepopup1"><iframe src="<?php echo yii::app()->getBaseurl(true) ?>/product/default/Popcart" width="100%" frameborder="0" scrolling="no"></iframe></div>');
		$('#offer2').parent().css('padding','5px');
		$('#offer2').parent().css('overflow-y','hidden');
		$('#offer2').parent().css('height','auto');
		$('#offer2').parent().css('background','none')
		
        $.post(base_url+'/product/default/setoffer',{val:2},function(res){


        });

        }
        flag1=2;
        window.onbeforeunload = null;

        return '';
    });


</script>



<div class="order-wrapper">


<div class="order-left">
    <h2><img src="<?php echo $themeUrl;?>/images/order-text1.png" alt="#" /></h2>

    <h3>Get your dream body...</h3>

    <div class="order-arrow-div">
        <div class="arrow1">Shipping Info</div>
        <div class="arrow2">Finish Order</div>
        <div class="arrow3">Summary</div>

        <div class="clear"></div>
    </div>
    <div class="purchase-contain">


        <?php
        $this->widget(
            'bootstrap.widgets.TbThumbnails',
            array(
                'dataProvider' => LandingProductRelation::model()->fetchAllPro($landing_page_id),
                'template' => "{items}\n{pager}",
                'viewData' => array('l_id'=>$model->product_id),
                'itemView' => 'application.modules.product.views.default.productList',
            )
        );
        ?>

        <h6>Product Purchase Plan:</h6>

        <div class="purchase-table">
            <table width="100%" border="0" cellspacing="10" cellpadding="0" id="itemtbl">
                <tr>
                    <td width="81%" align="left" valign="middle" id="proname">No Product</td>
                    <td colspan="2" width="18%" align="center" valign="middle"><span id="proprice">$00.00</span></td>

                </tr>

                <tr>
                    <td width="100%"  colspan="3"align="center" valign="middle">Shipping : <span id="proship">$00.00</span></td>

                </tr>
                <tr>
                    <td width="100%"  colspan="3"align="center" valign="middle">Total : <span id="prototal">$00.00</span></td>

                </tr>
            </table>


        </div>

    </div>



</div>

<div class="order-right">
        <div class="logo-div"><img src="<?php echo $themeUrl;?>/images/logo.png" alt="#" /></div>
        <div class="icon-div"><img src="<?php echo $themeUrl;?>/images/oicon1.png" alt="#" /></div>
        <div class="arrow-img2"><img src="<?php echo $themeUrl;?>/images/formarrow.png" alt="#" /></div>
        <div class="form-wrapper">
        <div class="form-top">
            <h2>TELL US WHERE TO SEND</h2>
            <h3>YOUR BOTTLE TODAY!</h3>

        </div>

        <h4>payment information</h4>

        <div class="form-body">

        <h5>Secure 128-bit SSL Connection</h5>

        <img src="<?php echo $themeUrl;?>/images/visa.png" alt="#" style="display:block; margin:0 auto;" />

            <span style="color: #ff0000;display:block;" id="errrrrr" class="error"></span>
            <a  onclick="scrolltoform1()" id="choosepro">Choose Product </a>
        <div class="clear"></div>

        <strong style="display: block; padding:10px 0 0 15px;">1. Shipping Address</strong>

                    <?php /** @var TbActiveForm $form */
                    $form = $this->beginWidget(
                        'bootstrap.widgets.TbActiveForm',
                        array(
                            'id' => 'horizontalForm',

                            'type' => 'horizontal',
                            'enableClientValidation' =>true,
                            'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                                'afterValidate'=>'js:function(form, data, hasError)
                                        {
                                          if(!hasError){


                                          window.onbeforeunload = null;
                                             return true;
                                            }
                                        }'

                            )
                        )
                    ); ?>

                    <?php echo $form->hiddenField(
                        $model,
                        'landing_product_id'
                    ); ?>

                    <?php echo $form->hiddenField(
                        $model,
                        'product_id'
                    ); ?>

                    <?php echo $form->hiddenField(
                        $model,
                        'product_name'
                    ); ?>

                    <?php echo $form->hiddenField(
                        $model,
                        'product_desc'
                    ); ?>

                    <?php echo $form->hiddenField(
                        $model,
                        'product_quan'
                    ); ?>

                    <?php echo $form->hiddenField(
                        $model,
                        'autoship_id'
                    ); ?>

                    <?php echo $form->hiddenField(
                        $model,
                        'subtotal',array('value'=>$price)
                    ); ?>

                    <?php echo $form->hiddenField(
                        $model,
                        'shiping_charge',array('value'=>$shipping)
                    ); ?>

                    <?php echo $form->hiddenField(
                        $model,
                        'tax',array('value'=>$tax)
                    ); ?>


                    <?php echo $form->textFieldRow(
                        $model,
                        'shipping_fname', array("placeholder"=>"First Name",'class'=>"input1")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'shipping_lname', array("placeholder"=>"Last Name",'class'=>"input1")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'shipping_add', array("placeholder"=>"Address",'class'=>"input1")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'shipping_city', array("placeholder"=>"City",'class'=>"input1")
                    ); ?>

                    <?php echo $form->dropDownListRow(
                        $model,
                        'shipping_state',$this->getStateList(254), array('class'=>"input2")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'shipping_zip', array("placeholder"=>"Zip Code",'class'=>"input1")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'shipping_phone', array("placeholder"=>"Phone",'class'=>"input1")
                    ); ?>

        <strong style="display: block; padding:10px 0 0 15px;">2. Billing Address</strong>
                    <div class="ckbox" attr="0">
                        <input id="chk_bill_ship" style="margin-top: 1px;" type="checkbox" value="1" <?php if($model['check'] == 1){ ?> checked="checked" <?php } ?> name="TransactionOrderDetails[check]">
                        <?php //echo $form->checkBox($model, 'check', array('uncheckValue'=>0,'id'=>"chk_bill_ship")); ?>
                       <span style="margin-top: 2px"> Use shipping address as the billing address.</span>
                    </div>

                    <?php echo $form->textFieldRow(
                        $model,
                        'billing_fname', array("placeholder"=>"First Name",'class'=>"input1")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'billing_lname', array("placeholder"=>"Last Name",'class'=>"input1")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'billing_add', array("placeholder"=>"Address",'class'=>"input1")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'billing_city', array("placeholder"=>"City",'class'=>"input1")
                    ); ?>

                    <?php echo $form->dropDownListRow(
                        $model,
                        'billing_state',$this->getStateList(254), array('class'=>"input2")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'billing_zip', array("placeholder"=>"Zip Code",'class'=>"input1")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'billing_phone', array("placeholder"=>"Phone",'class'=>"input1")
                    ); ?>

                    <?php echo $form->textFieldRow(
                        $model,
                        'billing_email', array("placeholder"=>"Email ID",'class'=>"input1")
                    ); ?>



                    <strong style="display: block; padding:10px 0 0 15px;">3. Payment Info</strong>
                    <span style="color: #ff0000;" class="error err1"><?php echo Yii::app()->user->getFlash('msg');?></span>
                    <?php echo $form->textFieldRow(
                        $model,
                        'card_no', array("placeholder"=>"Card Number",'class'=>"input1")
                    ); ?>
                    <img src="<?php echo $themeUrl;?>/images/f1.png" alt="#" class="visaimg"  />


                        <div style="margin-left: 10px;">
                            <?php echo $form->dropDownListRow(
                                $model,
                                'card_exp_mon',$arrmonth, array('class'=>"input1")
                            ); ?>

                            <div class="slimg">/</div>
                            <?php echo $form->dropDownListRow(
                                $model,
                                'card_exp_year',$arryear, array('class'=>"input1")
                            ); ?>
                    <div class="clear"></div>
                    </div>
                    <?php echo $form->textFieldRow(
                        $model,
                        'card_cvv', array("placeholder"=>"Card Verification Code",'class'=>"input5")
                    ); ?>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="<img src='<?php echo yii::app()->getBaseUrl(true) ?>/images/cvv.jpg'>"  id="vcode"><img src="<?php echo $themeUrl;?>/images/f2.png" id="vcode"   alt="#" style="margin:20px 0 0 20px;"/></a>
                    <div class="clear"></div>

        <a href="javascript:void(0)" onclick="scheduled_terms()" id="term">Terms & Conditions</a></br>
        <div class="ckbox" attr="0">

            <?php echo $form->checkBox($model, 'accept',array('class'=>'checkterms'));?>
            <?php //echo $form->checkBox($model, 'check', array('uncheckValue'=>0,'id'=>"chk_bill_ship")); ?>
            <span style="margin-top: 2px"> Accept Terms and Conditions Of This Site.</span>
            <?php echo $form->error($model,'accept'); ?>
        </div>


        <input type="submit"  class="subbtn1"  value="Expedite My Order!"/>

        <div id="termscart">
            <p class="form-text"> Terms & Conditions: You are ordering a fifteen day evaluation of Garcinia Body today for just the price of shipping! We are so confident in the results of our product that we would like you to try and evaluate our product for fifteen days! At any point during this trial period, if you are unhappy, please call us in order to cancel your membership and avoid being billed for the discounted program. Fifteen days after your order if you are happy with the product you will be billed the discounted price of $69.95 (plus shipping) and we will continue to receive monthly shipments of Garcinia Body that will be billed to you automatically, to ensure your product is delivered. To cancel automatic delivering and billing, please email us at <a href="mailto:CustomerService@GarciniaBody.com">CustomerService@GarciniaBody.com</a>. All shipping costs incurred during this process are non-refundable.</p>
        </div>

                    <?php $this->endWidget(); ?>



                </div>

              

            </div>


        </div>

<div class="clear"></div>

<div class="order-bottom-div">
    <img src="<?php echo $themeUrl;?>/images/usps.png" alt="#" />

    U.S. Shipping Time: 5-7 business days (not insured and shipping time is not guaranteed)</br>

    International Shipping Time: 7-15 business days (depending on customs)</br>

    <strong>Note:</strong> Shipping rates can vary by destination country. Begin the checkout process to determine exact shipping rates for your address.</br>

    Garcinia Body is not responsible for your country’s duties or taxes that may occur.
</div>

</div>
















<?php
    $baseUrl =  Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;

    $cart = Yii::app()->session['cart'];
    
    $cartprice = Yii::app()->session['cart_price'];
    
   // print_r($cartprice);
    
    //$color_array = ProductColor::model()->findAll();
    //$size_array = ProductSize::model()->findAll();
?>
<script type="text/JavaScript">


var curst1;
var curst2;
function changestate()
{
	var cval=($('#TransactionOrderDetails_shipping_country').val());
	//alert(cval);
	$.post(base_url+'/product/checkout/getstatefromcountry',{val:cval},function(res){
            //window.location.reload();
			//alert(jQuery.parseJSON(res));
			res=jQuery.parseJSON(res);
			var optionsAsString = "";
			optionsAsString += "<option value= > Select Your State </option>";
for(x in res) {
    optionsAsString += "<option value='" + x + "'>" + res[x] + "</option>";
}
//alert(optionsAsString);
$("#TransactionOrderDetails_shipping_state").find('option').remove().end().append($(optionsAsString));
			
        });
	setTimeout(function(){
	
	//alert(curst1);
	if(curst1>0) $('#TransactionOrderDetails_shipping_state').val(curst1);
	else {
	 
	 //$("#TransactionOrderDetails_shipping_state").find('option').prepend($(optionsAsString));
	}
	
	},3000);
	
}


function changestate1()
{
	var cval=($('#TransactionOrderDetails_billing_country').val());
	//alert(cval);
	$.post(base_url+'/product/checkout/getstatefromcountry',{val:cval},function(res){
            //window.location.reload();
			//alert(jQuery.parseJSON(res));
			res=jQuery.parseJSON(res);
			var optionsAsString = "";
			optionsAsString += "<option value= > Select Your State </option>";
for(x in res) {
    optionsAsString += "<option value='" + x + "'>" + res[x] + "</option>";
}
//alert(optionsAsString);
$("#TransactionOrderDetails_billing_state").find('option').remove().end().append($(optionsAsString));
			
        });
		
		//alert(curst2);
		
		setTimeout(function(){
	
	//alert(curst1);
	if(curst2>0) $('#TransactionOrderDetails_billing_state').val(curst2);
	
	},3000);
	
}
$(function()
{
	
	
	$('#TransactionOrderDetails_shipping_country').prepend("<option value= >select Your Country</option>");
	$('#TransactionOrderDetails_billing_country').prepend("<option value= >select Your Country</option>");
	var countrysel1=('<?=@$order_ship_bill_details['shipping_country']?>');
	var countrysel2=('<?=@$order_ship_bill_details['billing_country']?>');
	if(countrysel1<2) $('#TransactionOrderDetails_shipping_country').val(254);
	if(countrysel2<2) $('#TransactionOrderDetails_billing_country').val(254);
	
	changestate1();
	changestate();
	curst1=('<?=@$order_ship_bill_details['shipping_state']?>');
	//if(curst1>0) $('#TransactionOrderDetails_shipping_state').val(curst1);
	curst2=('<?=@$order_ship_bill_details['billing_state']?>');
	//if(curst2>0) $('#TransactionOrderDetails_billing_state').val(curst2);
	
});

</script>
 <div class="productlist-wrapper" style="padding-top:4px;">


    <div class="inner-wrapper">

        <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'=>'horizontalForm',
            'type'=>'horizontal',
            'enableClientValidation'=>true,
            )); ?>

        <div class="checkout-left">

            <h2>1. Shipping Address</h2>

            <div class="form-contain">
      
      
            
        <?php 
		
		if(!is_array($order_ship_bill_details)) $order_ship_bill_details=Yii::app()->session['order_ship_bill_details'];
		//var_dump(Yii::app()->session['order_ship_bill_details']);
       ?>
        
 <?php echo $form->textFieldRow($model, 'shipping_fname',array('value'=>@$order_ship_bill_details['shipping_fname'])); ?>

                <?php echo $form->textFieldRow($model, 'shipping_lname',array('value'=>@$order_ship_bill_details['shipping_lname'])); ?>

                <?php echo $form->textFieldRow($model, 'shipping_phone',array('value'=>@$order_ship_bill_details['shipping_phone'])); ?>

                <?php echo $form->textAreaRow($model, 'shipping_add', array('class'=>'span8', 'rows'=>5, 'value'=>@$order_ship_bill_details['shipping_add'])); ?>

                <?php echo $form->dropDownListRow($model, 'shipping_country',$country,array('value'=>@$order_ship_bill_details['shipping_country'], 'onchange'=>'changestate();','options' => array(@$order_ship_bill_details['shipping_country']=>array('selected'=>true)))); ?>

                <?php echo $form->dropDownListRow($model, 'shipping_state',$state,array('options' => array(@$order_ship_bill_details['shipping_state']=>array('selected'=>true)))); ?>

                <?php echo $form->textFieldRow($model, 'shipping_city', array('value'=>@$order_ship_bill_details['shipping_city'])); ?>

                <?php echo $form->textFieldRow($model, 'shipping_zip', array('value'=>@$order_ship_bill_details['shipping_zip'])); ?>
       
        
      
      </div>    

            <input name="" type="checkbox" id="chk_bill_ship" style="float:left; margin:2px 10px 0 0;"/> Use shipping address as the billing address.

            <h2 style="padding-top:20px;">2. Billing Address</h2>

            <div class="form-contain">

                <?php echo $form->textFieldRow($model, 'billing_fname',array('value'=>@$order_ship_bill_details['billing_fname'])); ?>

                <?php echo $form->textFieldRow($model, 'billing_lname',array('value'=>@$order_ship_bill_details['billing_lname'])); ?>

                <?php echo $form->textFieldRow($model, 'billing_email',array('value'=>@$order_ship_bill_details['billing_email'])); ?>

                <?php echo $form->textFieldRow($model, 'billing_phone',array('value'=>@$order_ship_bill_details['billing_phone'])); ?>

                <?php echo $form->textAreaRow($model, 'billing_add', array('class'=>'span8', 'rows'=>5,'value'=>@$order_ship_bill_details['billing_add'])); ?>

                <?php echo $form->dropDownListRow($model, 'billing_country',$country,array('value'=>@$order_ship_bill_details['billing_country'], 'onchange'=>'changestate1();','options' => array(@$order_ship_bill_details['billing_country']=>array('selected'=>true)))); ?>

                <?php echo $form->dropDownListRow($model, 'billing_state',$state,array('options' => array(@$order_ship_bill_details['billing_state']=>array('selected'=>true)))); ?>

                <?php echo $form->textFieldRow($model, 'billing_city',
                    array('value'=>@$order_ship_bill_details['billing_city'])); ?>

                <?php echo $form->textFieldRow($model, 'billing_zip',
                    array('value'=>@$order_ship_bill_details['billing_zip'])); ?>
                 <?php echo $form->hiddenField($model,'shipping_status',array('value'=>1)); ?>

            </div> 




            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit','htmlOptions'=>array('class'=>'btn'))); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'button', 'label'=>'Back','htmlOptions'=>array('class'=>'btn','onclick'=>'history.back()'))); ?>



        </div>

        <div class="checkout-right">
            <h2>Order Summary</h2>

            <div class="checkout-body">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <th align="left" valign="top">Item</th>
                        <th align="left" valign="top">Qty.</th>
                        <th align="left" valign="top">Price</th>
                        <!--<th align="left" valign="top">Delivery&nbsp;Details</th>-->
                        <th align="left" valign="top">Subtotal</th>
                       <!-- <th align="left" valign="top">Autoship</th>-->
                        <th align="left" valign="top">&nbsp;</th>
                    </tr>


                  <tr>

                      <td align="left" valign="top" colspan="3" class="total-div">

                          <?php     $ship_charge = ShippingCharge::model()->findAll('isactive=1'); ?>
                          <select id="ship" onchange="shipval()">
                              <!-- <option value=" ">Select a Type</option>-->

                              <?php foreach($ship_charge as $s) {?>
                                  <option value="<?php echo $s['shipping_charge']; ?>"><?php echo  $s['shipping_name']; ?></option>
                              <?php } ?>
                          </select>

                      </td>


                  </tr>
                    <?php 
                        /*$discount = Yii::app()->session['discount'];    */
                       /* $discount_code = Yii::app()->session['discount_code'];      */
                        /*$dis_type = Yii::app()->session['discount_type'];   */
                        $total = 0;
                        //$discount = floatval($discount);
                       /* $pro_fee = Yii::app()->session['pross_fee']; */
                        $shipping_charge = Yii::app()->session['shipping_charge'];
                        
                       /* $autoship = Yii::app()->session['autoship'];                */



                    foreach($cartdet as $row){
                            $price = number_format($cartprice[$row['productid']]['price'],2,".","");
                            $quantity = $cart[$row['productid']];
                            $subtotal = number_format($price*intval($quantity),2,".","");
                            $total += $subtotal;
                           
                        ?>

                        <tr>
                            <td align="left" valign="top" style="padding-right:10px;">
                                <?php echo ucfirst($row['productname']);?>
                            </td>
                            <!--<td align="left" valign="top"><div class="item-box" style="color:#000;"><?php echo $quantity;?></div></td>-->
                            <td align="left" valign="top"><input class="item-box cart_quan" product_id="<?php echo $row['productid'];?>" style="color:#000; height: 24px;" type="text" value="<?php echo $quantity;?>"></td>
                            <td align="left" valign="top">$<?php echo $price;?></td>
                            <!--<td align="left" valign="top">3-4 Days</td>-->
                            <td align="center" valign="top" style="text-align: center;"><?php //if($autoship[$row['productid']] == 1){ echo "<del>$".$subtotal1."</del><br>"; }?>$<?php echo $subtotal?></td>
                            <!--<td align="center" valign="top" style="text-align: center;"><input onclick="setunsetauto(this)" type="checkbox" product_id="<?php //echo $row['productid'];?>" <?php //if($autoship[$row['productid']] == 1){?> checked="checked" <?php //} ?> ></td>  -->
                            <td align="left" valign="top">
                            <a href="javascript:void(0);" data-original-title="Delete This Item" rel="tooltip" onclick="<?php echo CHtml::ajax(array(
                'type'=>'POST',
                'url'=>CController::createUrl('shopping-cart/del'),
                'data'=>array('id'=>$row['productid']),
                'success'=>'function(res){
                    
                    bootbox.dialog(\'Cart updated successfully.\');
                    setTimeout(function(){
                        window.location.href = \''.$baseUrl.'/product/checkout\';
                    },2000);
                }'
                ));
            ?>"><img src="<?php echo $themeUrl;?>/images/d-icon.png"></a>
                            <a href="javascript:void(0);" data-original-title="Add to Wishlist" rel="tooltip" onclick="<?php echo CHtml::ajax(array(
                'type'=>'POST',
                'url'=>CController::createUrl('wishlist/carttowishlist'),
                'data'=>array('id'=>$row['productid']),
                'success'=>'function(res){
                    
                    bootbox.dialog(\'Cart updated successfully.\');
                    setTimeout(function(){
                        window.location.href = \''.$baseUrl.'/product/checkout\';
                    },2000);
                }'
                ));
            ?>">Add to Wishlist</a>
            </td>
                        </tr> 

                        <?php } ?> 
                    <tr>


                        <td align="left" valign="top" colspan="6" class="total-div"><h4 style="background: none; width: 100%; text-align: right; padding: 0 20px 0 0;">Estimated Total:&nbsp;&nbsp;<span>$<?php echo number_format($total,2,".","");?></span></h4></td>

                    </tr>
                    <!--<tr>
                        <td align="left" valign="top" colspan="6" class="total-div"><h4 style="background: none; width: 100%; text-align: right; padding: 0 20px 0 0;">Discount:&nbsp;&nbsp;<span>$<?php //echo number_format($discount,2);?></span></h4></td>

                    </tr>  -->
                    <tr>
                        <td align="left" valign="top" colspan="6" class="total-div"><h4 style="background: none; width: 100%; text-align: right; padding: 0 20px 0 0;">Shipping Charge:&nbsp;&nbsp;<span>$<?php echo number_format($shipping_charge,2);?></span></h4></td>

                    </tr>
                   <!-- <tr>
                        <td align="left" valign="top" colspan="6" class="total-div"><h4 style="background: none; width: 100%; text-align: right; padding: 0 20px 0 0;">Processing Fee:&nbsp;&nbsp;<span>$<?php //echo number_format($pro_fee,2);?></span></h4></td>

                    </tr>   -->
                    <tr>
                       <!-- <td align="left" valign="top" colspan="6" class="total-div"><h4 style="background: none; width: 100%; text-align: right; padding: 0 20px 0 0;">Total:&nbsp;&nbsp;<span>$<?php //echo number_format(($total-$discount+$pro_fee+$shipping_charge),2);?></span></h4></td> -->
                        <td align="left" valign="top" colspan="6" class="total-div"><h4 style="background: none; width: 100%; text-align: right; padding: 0 20px 0 0;">Total:&nbsp;&nbsp;<span>$<?php echo number_format(($total+$shipping_charge),2,".","");?></span></h4></td>

                    </tr>
                    
                   <!-- <tr>
                        <td align="left" valign="top" colspan="6" class="total-div"><input type="checkbox" onclick="hav_pcode(this)" id="promo_have"  <?php //if(!empty($discount_code)){ ?> checked="checked" <?php //} ?> style="margin:1px 5px 0 0;">I Have a Promocode.</td>
                    </tr>     -->
                  <!--<tr>
                        <td align="left" valign="top" colspan="6" class="total-div">
                        <div id="err" style="width: 96%; color: #f00; padding-left: 5px; margin-bottom: 5px;"></div>
                       <input type="text" id="promo_code" placeholder="Enter Your Promocode" style="width: 30px;" style="margin:1px 5px 0 0;" <?php //if(!empty($discount_code)){ ?> value="<?php //echo $discount_code;?>" <?php // } ?>
                        <input type="button" id="chk_promo_btn" value="Check" onclick="chk_promo_code(this,'<?php //echo $total;?>')" style="background: none repeat scroll 0 0 #fd9b17; border: 1px solid #A7E1FD; border-radius: 5px; color: #FFFFFF; float: left; height: 37px; margin: 0 5px;  text-align: center; width: 71px;"></td>

                    </tr>-->          
                </table>

                <input type="hidden" name="TransactionOrderDetails[subtotal]" value="<?php echo number_format($total,2,".","");?>" />


            </div>

        </div>

        <?php $this->endWidget(); ?>

        <div class="clear"></div>







    </div>


</div>

<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'autoship_')
); ?>

    <div class="modal-header" style="text-align: right;">
        <a class="close" data-dismiss="modal" style="float: none;">&times;</a>
    </div>

    <div class="modal-body">
        <span>Total Occurrences :
        <input type="hidden" id="totalval">
            <select name="total_occurrences" id="total_occurrences">
                <?php for($i=1;$i<=36;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
            </select>
            <br/><br/>
            Subcription Inteval :
            <select name="occ_interval" id="occ_interval">
                <?php for($i=1;$i<=12;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?> Months</option>
                <?php } ?>
            </select>
            <br/><br/>
            <input type="button" onclick="settotalocc(this)" value="Ok" style="background: none repeat scroll 0 0 #1A5F88; border: 1px solid #A7E1FD; border-radius: 5px; color: #FFFFFF; float: left; height: 37px; margin: 0 5px; text-align: center; width: 71px;" />
        </span>
    </div>


<?php $this->endWidget(); ?>

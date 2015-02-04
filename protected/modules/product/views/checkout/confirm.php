<?php
    $baseUrl =  Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;

    $order_ship_bill_details = Yii::app()->session['order_ship_bill_details'];
    $order_product_details = Yii::app()->session['order_product_details'];

$discount = Yii::app()->session['discount'];
$discount = floatval($discount);

$pro_fee = Yii::app()->session['pross_fee'];
$pro_fee = floatval($pro_fee);

$shipping_charge = Yii::app()->session['shipping_charge'];
$shipping_charge = floatval($shipping_charge);

$autoship = Yii::app()->session['autoship'];

$sess_arr = Yii::app()->session['sess_user'];


?>
<style>
    #ship_edit{
        text-decoration: underline;
        cursor: pointer;
    }
</style>
<script>
    $(function(){
        $('#ship_edit').click(function(){
           var shipc = $(this).text();
           bootbox.dialog($('#hid_form').html());
        });
    });

    function up_ship(obj){
        var newshipc = $(obj).prev().val();
        $.post(base_url+'/product/checkout/updateship',{newshipc:newshipc},function(res){
            window.location.reload();
        });
    }
</script>


 <div class="productlist-wrapper" >

    <div class="inner-wrapper">

        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="confirmation">
            <tr>
                <th colspan="2"><h6>Cart Contents</h6></th>

            </tr>
            <?php 
            foreach($order_product_details as $row) {
            ?>
            <tr>
                <td align="left" valign="top"><?php echo $row['product_name'];?></td>
                <td align="right" valign="top" style="text-align:right;">
                <?php
                    //if($autoship[$row['product_id']] == 1){
                        //$auto_dis5 = number_format((($row['product_price']*15)/100),2);
                        //$proprice = $row['product_price']-$auto_dis5;
                ?>
               <!-- <span style="margin-right: 10px; ">Autoship</span><span><?php //echo $row['product_quantity']." * $".$proprice;?></span> -->
                <?php 
                   // }else{
                ?>
                <span><?php echo $row['product_quantity']." * $".$row['product_price'];?></span>
                <?php
                   // }
                ?>
                </td>
            </tr>
            
            <?php } ?>

            <tr>
                <th colspan="2"><h6>Delivery Information</h6></th>

            </tr>
            <tr>
                <td align="left" valign="top">Name </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['shipping_fname']." ".@$order_ship_bill_details['shipping_lname'];?></span></td>
            </tr>
            <tr>
                <td align="left" valign="top">Address </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['shipping_add'];?></span></span></td>
            </tr>
            <tr>
                <td align="left" valign="top">Country </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['shipping_country_name'];?></span></td>
            </tr>

            <tr>
                <td align="left" valign="top">State </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['shipping_state_name'];?></span></td>
            </tr>

            <tr>
                <td align="left" valign="top">City </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['shipping_city'];?></span></td>
            </tr>

            <tr>
                <td align="left" valign="top">Zip </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['shipping_zip'];?></span></td>
            </tr>

            <tr>
                <td align="left" valign="top">Phone </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['shipping_phone'];?></span></td>
            </tr>


            <tr>
                <th colspan="2"><h6>Billing Information</h6></th>

            </tr>
            <tr>
                <td align="left" valign="top">Name </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['billing_fname']." ".@$order_ship_bill_details['billing_lname'];?></span></td>
            </tr>
            <tr>
                <td align="left" valign="top">Email </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['billing_email'];?></span></td>
            </tr>
            <tr>
                <td align="left" valign="top">Address </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['billing_add'];?></span></td>
            </tr>
            <tr>
                <td align="left" valign="top">Country </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['billing_country_name'];?></span></td>
            </tr>

            <tr>
                <td align="left" valign="top">State </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['billing_state_name'];?></span></td>
            </tr>

            <tr>
                <td align="left" valign="top">City </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['billing_city'];?></span></td>
            </tr>

            <tr>
                <td align="left" valign="top">Zip </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['billing_zip'];?></span></td>
            </tr>
            <tr>
                <td align="left" valign="top">Phone </td>
                <td align="right" valign="top" style="text-align:right;"><span><?php echo @$order_ship_bill_details['billing_phone'];?></span></td>
            </tr>

            <tr>
                <th colspan="2"><h6>Sub Total</h6></th>

            </tr>
            <tr>
                <td align="left" valign="top"  style="border:none;">&nbsp;</td>
                <td align="right" valign="top" style="text-align:right; border:none;"><span>$<?php echo @$order_ship_bill_details['subtotal'];?></span></td>
            </tr>

            <tr>
                <th colspan="2"><h6>Shipping</h6></th>

            </tr>
            <tr>
                <td align="left" valign="top"  style="border:none;">&nbsp;</td>
                <td align="right" valign="top" style="text-align:right; border:none;"><span>$</span><span><?php echo  number_format($shipping_charge,2);?></span></td>
            </tr>

            <tr>
                <th colspan="2"><h6>Total</h6></th>

            </tr>
            <tr>
                <td align="left" valign="top"  style="border:none;">&nbsp;</td>
                <td align="right" valign="top" style="text-align:right; border:none;"><span>$<?php echo number_format((@$order_ship_bill_details['subtotal']+$shipping_charge),2);?></span></td>
            </tr>

            <tr>
                <th colspan="2"><h6>Payment Info</h6>  </th>
            </tr> 

        </table>
        <div class="checkout-left">

            <?php 

                $mon = array(''=>'MM','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12');

                $y = date('Y');
                $year[''] = 'YYYY';
                for($i=$y-1;$i<$y+30;$i++){
                    $year[$i] =$i;
                }


                /** @var BootActiveForm $form */
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'horizontalForm',
                'type'=>'horizontal',
                'enableClientValidation'=>true,
                )); ?>
            <div class="form-contain">

                <?php echo $form->textFieldRow($model, 'card_no'); ?>
                <?php echo $form->dropDownListRow($model, 'card_exp_mon',$mon)?>  
                <?php echo $form->dropDownListRow($model, 'card_exp_year',$year)?>  
                <?php echo $form->textFieldRow($model, 'card_cvv'); ?>

            </div>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit','htmlOptions'=>array('class'=>'btn'))); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'button', 'label'=>'Back','htmlOptions'=>array('class'=>'btn','onclick'=>'history.back()'))); ?>



        </div>

        <div class="clear"></div>

        <?php $this->endWidget(); ?>

    </div>


</div>

<div id="hid_form" style="display: none;">
    <div>
        <h1>Edit Shipping Charge</h1>
        <input type="text" id="newshipc" value="<?php echo  number_format($shipping_charge,2);?>"><input type="button" value="Ok" onclick="up_ship(this)"><input type="button" value="Cancel" onclick="javascript:bootbox.hideAll();">
    </div>
</div>
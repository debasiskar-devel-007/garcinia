<!DOCTYPE html>
<html>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="border:solid 1px #ddd; background:#f2eded; padding:10px; font-family:Arial, Helvetica, sans-serif;">
        <tr>
        
        

         
<td  colspan="2" valign="middle" align="center"><img src="http://shop.azcowtown.com/themes/cow/images/logo.png" border="0"   alt="#" style=" margin:10px auto; display:block; width:90%;"/></td>
        </tr>
        
                                    
                                            
        
        
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="323" style="border:solid 1px #fff; border-right: none; font-size:14px; padding:10px 10px; background:#fd8c21; " ><strong style="color:#fff">Dear <?php echo ucfirst($order_ship_bill_details['billing_fname']).' '.ucfirst($order_ship_bill_details['billing_lname']);?>, Your Order ID : <span style="color:#000;">#<?php echo str_pad($orderId, 6, "0", STR_PAD_LEFT);?></span></strong></td>
          <td width="255" style="font-size:12px; color:#ffffff; border:solid 1px #fff; border-left: none; text-align:right; padding:10px 10px; background:#fd8c21;">Order Placed on : <?php echo date('Y-m-d h:i A',$order_ship_bill_details['order_time']);?></td>
        </tr>
        
        
          <tr>
          <td colspan="2" style="font-size:12px; color:#333; padding:10px;">You have done all the hard work!! Now sit back and relax. We will send you an Email<br/> the moment your order items are dispatched to your address.</td>
        </tr>
        
        
        
        <tr>
          <td colspan="2" style="font-size:12px; color:#333; "><table width="auto" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="7" style="background:#fd8c21; border:solid 1px #fff; width:100%; height:20px; padding:5px 0px; font-size:14px; color:#fff;">&nbsp;&nbsp;Order Details :</td>
              </tr>
              <tr>
                <td width="41" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>S.no</strong></td>
                <td width="163" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Item name</strong></td>
                <td width="57" style="padding:5px ; border-bottom:solid 1px #ccc;"><strong>Quantity</strong></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Price</strong></td>
              </tr>
              <?php
                                                   $p=0;
                                                    foreach($order_product_details as $pro){
                                                        $p++;
                                                       
                ?>
            <tr>
                <td width="41" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $p;?></td>
                <td width="163" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo ucwords($pro['product_name']);?></td>
                <td width="57" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $pro['product_quantity'];?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;">
                <?php
                echo number_format($pro['product_quantity']*$pro['product_price'], 2, '.', '');
                ?>
                </td>
              </tr>
              <?php
        }
?>
            
              </table></td>
        </tr>
        
        <tr>
          <td colspan="2" style="font-size:12px;background:#fd8c21; border:solid 1px #fff; padding:10px; color:#333;"><table width="600" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" style=" padding-bottom:20px; color:#fff;"> </td>
              </tr>
              
              <tr>
                <td width="316" style="border-right:dotted 1px #fff; padding:0px; color:#fff;"><strong>Shipping Address :</strong><br />
                  <br />
                  <strong><?php echo ucfirst($order_ship_bill_details['shipping_fname']).' '.ucfirst($order_ship_bill_details['shipping_lname']);?></strong><br />
                   <?php echo $order_ship_bill_details['shipping_add'].','.$order_ship_bill_details['shipping_city'].'-'.$order_ship_bill_details['shipping_zip'].','.$order_ship_bill_details['shipping_state_name'].','.$order_ship_bill_details['shipping_country_name'];?></td>
                <td width="284" style="padding:10px;" valign="top"><table width="auto" border="0" cellspacing="0" cellpadding="0" style="float:right; color:#fff;">
                    <tr>
                      <td style="padding:5px;"><strong>Total Amount :</strong> </td>
                      <td style="padding:5px;"><strong>$<?php echo $order_ship_bill_details['subtotal'];?></strong></td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Shipping Charges :</td>
                      <td style="padding:5px;">$<?php echo $order_ship_bill_details['shiping_charge'];?></td>
                    </tr>
                    <tr>
                      <td style="padding:5px;"><strong>Payable Amount :</strong></td>
                      <td style="padding:5px;"><strong>$<?php echo $order_ship_bill_details['total'];?></strong></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        
        <tr>
                            <td  colspan="2" valign="middle" align="center">&nbsp;</td>
                        </tr>
        
            <tr>
                        <td colspan="2" width="255px" align="center" valign="middle" colspan="2" style="font-size:11px; color:#fff;  text-align:right; padding:20px 10px 15px 20px; background:#fd8c21; text-align:center; line-height: 40px;  border:solid 1px #fff;">Copyright &copy; Allrights Reserved.</td>
                        </tr>
        
      </table></td>
  </tr>
</table>

</body>
</html>

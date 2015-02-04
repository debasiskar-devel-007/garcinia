<!DOCTYPE html>
<html>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
     <td> 
    
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="border:solid 1px #ddd; background:#fefcfc; padding:10px; font-family:Arial, Helvetica, sans-serif;">
        <tr>
        
        

         
<td  colspan="2" valign="middle" align="center"><img src="http://valescere.com/themes/newfrontend/images/logo-mail.png"  alt="Logo" border="0"></td>
        </tr>
        
                                    
                                            
        
        
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td  width="323" style="border:solid 1px #2FAAEB; border-right: none; font-size:14px; padding:10px 10px; background:#1A5F88; " ><strong style="color:#fff">Packing Slip for Order: <span style="color:#ccc;">#<?php echo str_pad($orderId, 6, "0", STR_PAD_LEFT);?> </span></strong></td>
          <td width="255" style="font-size:12px; color:#ffffff; border:solid 1px #2FAAEB; border-left: none; text-align:right; padding:10px 10px; background:#1A5F88;"><strong style="color:#fff">Order Date: <span style="color:#ccc;"><?php echo date('dS M Y',$order_ship_bill_details['order_time']);?></span></strong></td>
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td  width="289" style="border:solid 1px #2FAAEB; border-right: none; font-size:14px; padding:10px 10px; background:#1A5F88; " ><strong style="color:#fff">Ship To: </strong>
     
          </td>
          <td width="289" style="font-size:14px; color:#ffffff; border:solid 1px #2FAAEB; border-left: none; text-align:left; padding:10px 10px; background:#1A5F88;"><strong style="color:#fff">Bill To:  </strong></td>
        </tr>
        
        <tr>
          <td  width="289" style=" line-height:26px; color:#333; border-right: none; font-size:14px; padding:10px 10px; " >
          <strong><?php echo ucfirst($order_ship_bill_details['shipping_fname']).' '.ucfirst($order_ship_bill_details['shipping_lname']);?></strong><br />
 <?php echo $order_ship_bill_details['shipping_add'];?><br />
 <?php echo $order_ship_bill_details['shipping_city'].'-'.$order_ship_bill_details['shipping_zip'];?> <br />
<?php echo Common::getStatename($order_ship_bill_details['shipping_state']).','.Common::getCountryname($order_ship_bill_details['shipping_country']);?> 
     
          </td>
          <td width="289" style="font-size:14px; color:#333; line-height:26px; border-left: none; text-align:left; padding:10px 10px; ">
          
          
          <strong><?php echo ucfirst($order_ship_bill_details['billing_fname']).' '.ucfirst($order_ship_bill_details['billing_lname']);?></strong><br />
 <?php echo $order_ship_bill_details['billing_add'];?><br />
 <?php echo $order_ship_bill_details['billing_city'].'-'.$order_ship_bill_details['billing_zip'];?> <br />
<?php echo Common::getStatename($order_ship_bill_details['billing_state']).','.Common::getCountryname($order_ship_bill_details['billing_country']);?> 
          
          
          </td>
        </tr>
        
        
          <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
        
        
               <tr>
          <td colspan="2">
          
          
          </td>
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
        
        
               <tr>
                               
          <td colspan="2">
          
    




        <table width="700" border="0" cellspacing="0" cellpadding="0" align="center">  
            <tr>
    <th style=" padding:10px 10px;  border:solid 1px #2FAAEB; border-right: none; font-size:14px; background:#1A5F88; color:#fff; text-align:center;  width: 200px; ">Item Name </th>
    
    <th style=" padding:10px 10px;  border:solid 1px #2FAAEB; border-right: none; font-size:14px; background:#1A5F88; color:#fff; text-align:center;   width: 80px; ">Autoship</th>
    
    <th style=" padding:10px 10px;  border:solid 1px #2FAAEB; border-right: none; font-size:14px; background:#1A5F88; color:#fff; text-align:center;   width: 80px;">Quantity</th>
    
    <th style=" padding:10px 10px;  border:solid 1px #2FAAEB; border-right: none; font-size:14px; text-align:center; background:#1A5F88; color:#fff;   width: 80px;">Price </th>
    
    <th style=" padding:10px 10px;  border:solid 1px #2FAAEB; border-right: none; font-size:14px; text-align:center; background:#1A5F88; color:#fff;   width: 80px;">Item Total </th>

  </tr>
      
     <?php  
 foreach($order_product_details as $pro){
     
    /* if($autoship[$pro['product_id']] == 1){
                 $auto_dis5 = number_format((($pro['product_price']*15)/100),2);
                    $proprice = $pro['product_price']-$auto_dis5;
                }else{
                    $proprice = $pro['product_price'];
                }*/
                $proprice = $pro['product_price'];
      ?>
  
      
        <tr>
    <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 200px; "><?php echo ucwords($pro['product_name']);?></td>
    <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc;  width: 80px;"><?php echo ($autoship[$pro['product_id']] == 1)?'Yes':'No';?></td>
    <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center;  border-bottom:solid 1px #ccc; width: 80px;"><?php echo $pro['product_quantity'];?></td>
    <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc;  width: 80px;">$<?php echo $proprice;?></td>
     <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 80px; ">$<?php echo number_format($pro['product_quantity']*$proprice, 2, '.', '');?></td>

  </tr>
  
   <?php } ?>     
      
      
      <tr>

    <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 200px;">&nbsp;</td>
    <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 80px; ">&nbsp;</td>
     <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 80px;">&nbsp; </td>
      <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center;  border-bottom:solid 1px #ccc; width: 80px; background:#efefef;">Shipping  </td>
       <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center;  border-bottom:solid 1px #ccc; width: 80px;">$<?php echo $order_ship_bill_details['shiping_charge'];?></td>
  </tr>
  <tr>

    <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 200px;">&nbsp;</td>
    <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 80px; ">&nbsp;</td>
     <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 80px;">&nbsp; </td>
      <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center;  border-bottom:solid 1px #ccc; width: 80px; background:#efefef;">Discount  </td>
       <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center;  border-bottom:solid 1px #ccc; width: 80px;">$<?php echo $order_ship_bill_details['discount_val'];?></td>
  </tr>
          <tr>
  
      <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 200px;">&nbsp;</td>
    <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 80px; ">&nbsp;</td>
     <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center; border-bottom:solid 1px #ccc; width: 80px;">&nbsp; </td>
      <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center;  border-bottom:solid 1px #ccc; width: 80px; background:#efefef;">Total  </td>
       <td style="font-size:12px; padding:10px 10px;  color:#333; text-align:center;  border-bottom:solid 1px #ccc; width: 80px;">$<?php echo $order_ship_bill_details['total'];?> </td>
  </tr>
      
      
      </table>    
          </td>
        </tr>
        
        
        
          <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        
        
        
           <tr>
                      <td colspan="2" width="255px" align="center" valign="middle" colspan="2" style="font-size:11px; color:#fff;  text-align:center; background:#1a5f88; text-align:center; line-height:40px; padding: 15px 0;">
                      Copyright &copy; Allrights Reserved.</td>
                       
                        </tr>
       
        
      </table>
         </td>   
  </tr>
</table>

</body>
</html>
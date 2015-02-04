<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Garcinia</title>
</head>

<body style="background:#fff; margin:0; padding:0;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <table width="600" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;">
                <tr>
                    <td colspan="2" align="center" valign="middle" style=" background:#fff9fc; border-bottom:solid 2px #1699E4; padding:10px 0;"><a href="http://garcinia-body.com"><img src="http://garcinia-body.com/themes/front/images/logo.png"  width="180" alt="#"/></a></td>
                </tr>

                <tr>
                    <td style="border-top:solid 2px #1699E4; width:48%; padding:15px 0 0 2%;" align="left">
                        <strong style="font-size:26px; color:#669900; font-weight:normal; font-style:italic;"></strong><br />

                        <span style="font-size:14px; color:#f83027;"></span>
                    </td>
                    <td style="border-top:solid 2px #1699E4; width:48%; padding:15px 2% 0 0; font-size:14px; color:#363636; line-height:25px;" align="right">
                        Order ID: <?php echo str_pad($order['id'], 6, "0", STR_PAD_LEFT);?><br />

                        Order Date: <?php echo date('d/m/Y',$order['time']);?>
                    </td>
                </tr>

                <tr>
                    <td style=" width:48%; padding:25px 0 0 2%;" align="left" valign="top">
                        <span style="background:#1699E4; width:89%; padding:8px 0 7px 5%;  font-size:18px; color:#fff; display:block;">Bill To</span>

                    </td>
                    <td style=" width:48%; padding:25px 2% 0 0;" align="right" >

                        <span style="background:#1699E4; width:89%; padding:8px 0 7px 5%;  font-size:18px; color:#fff; text-align:left; display:block;">Ship To</span>
                    </td>
                </tr>

                <tr>
                    <td style=" width:48%; padding:0px 0 0 2%;" align="left" valign="top">
                        <table width="94%" border="0" cellspacing="5" cellpadding="0" style="border:solid 1px #e0e0e0; font-size:14px; color:#929292; padding:1%;">

                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">Name : <?php echo $order_ship_bill_details['shipping_fname']." ".$order_ship_bill_details['shipping_lname'];?></td>
                            </tr>
                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">Address : <?php echo $order_ship_bill_details['shipping_add'];?></td>
                            </tr>

                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">Phone : <?php echo $order_ship_bill_details['shipping_phone'];?></td>
                            </tr>

                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">City : <?php echo $order_ship_bill_details['shipping_city'];?></td>
                            </tr>

                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">State : <?php echo $this->getStateCode($order_ship_bill_details['shipping_state']);?></td>
                            </tr>

                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">Zip : <?php echo $order_ship_bill_details['shipping_zip'];?></td>
                            </tr>
                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">Country : US</td>
                            </tr>


                        </table>
                    </td>
                    <td style=" width:48%; padding:0px 2% 0 0;" align="right">

                        <table width="94%" border="0" cellspacing="5" cellpadding="0" style="border:solid 1px #e0e0e0; font-size:14px; color:#929292; padding:1%;">

                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">Name : <?php echo $order_ship_bill_details['billing_fname']." ".$order_ship_bill_details['billing_lname']?></td>
                            </tr>
                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">Address : <?php echo $order_ship_bill_details['billing_add'];?></td>
                            </tr>

                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">Phone : <?php echo $order_ship_bill_details['billing_phone'];?></td>
                            </tr>

                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">City : <?php echo $order_ship_bill_details['billing_city'];?></td>
                            </tr>

                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">State : <?php echo $this->getStateCode($order_ship_bill_details['billing_state']);?></td>
                            </tr>

                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">Zip : <?php echo $order_ship_bill_details['billing_zip'];?></td>
                            </tr>
                            <tr>
                                <td style="background:#ececec; width:90%; padding:6px;">Country : US</td>
                            </tr>

                        </table>



                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center" valign="middle" style=" font-size:18px; color:#929292; padding:15px 0;">Shipping Method: Standard Shipping (Residential)</td>
                </tr>


                <tr>
                    <td colspan="2" align="center" valign="middle">

                        <table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:5px 0; border:solid 1px #c6c6c6; border-bottom:none; font-size:13px;">
                            <tr>
                                <th width="9%"  align="left" valign="middle" style="background:#1699E4; color:#fff; font-size:14px; padding:5px 2%;">Item</th>
                                <th   width="10%" align="left" valign="middle"  style="background:#1699E4; color:#fff; font-size:14px; padding:5px 2%;">Quantity </th>
                                <th  width="29%" align="middle" valign="middle"  style="background:#1699E4; color:#fff; font-size:14px; padding:5px 2%;">Name</th>
                                <th  width="37%" align="right" valign="middle"  style="background:#1699E4; color:#fff; font-size:14px; padding:5px 2%;">Amount</th>
                                <th  width="15%" align="right" valign="middle"  style="background:#1699E4; color:#fff; font-size:14px; padding:5px 2%;">Autoship</th>
                            </tr>

                            <tr>
                                <td  width="9%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle">1</td>
                                <td  width="10%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >1</td>
                                <td  width="29%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" ><?php echo $order_product_details['product_name'];?></td>
                                <td  width="37% " style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="right" valign="middle"><span style="display:inline-block; text-align:right; width:76px;">$<?php echo $order_product_details['product_price'];?></span></td>
                                <td  width="15% " style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="right" valign="middle"><?php echo ($autoship)?"Yes":"No";?></td>
                            </tr>
                            <tr>
                                <td  width="9%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle">&nbsp;</td>
                                <td  width="10%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp;</td>
                                <td  width="29%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp; </td>
                                <td  width="37% " style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="right" valign="middle"><span style="display:inline-block; padding-right:5px; text-align:right; width:76px;">Sub total</span><span style="display:inline-block; text-align:right; width:76px;">$<?php echo $order_ship_bill_details['subtotal'];?></span></td>
                                <td  width="15%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp; </td>
                            </tr>
                            <tr>
                                <td  width="9%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle">&nbsp;</td>
                                <td  width="10%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp;</td>
                                <td  width="29%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp; </td>
                                <td  width="37% " style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="right" valign="middle"> <span style="display:inline-block; padding-right:5px; text-align:right; width:76px;">Shipping</span>          <span style="display:inline-block; text-align:right;  width:76px;">$<?php echo number_format($order_ship_bill_details['shiping_charge'],2);?></span></td>
                                <td  width="15%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp; </td>
                            </tr>

                            <tr>
                                <td  width="9%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle">&nbsp;</td>
                                <td  width="10%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp;</td>
                                <td  width="29%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp; </td>
                                <td  width="37% " style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="right" valign="middle"> <span style="display:inline-block; padding-right:5px; text-align:right; width:76px;"> Tax Rate </span>          <span style="display:inline-block; text-align:right; width:76px;"> $0.00</span></td>
                                <td  width="15%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp; </td>
                            </tr>
                            <tr>
                                <td  width="9%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle">&nbsp;</td>
                                <td  width="10%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp;</td>
                                <td  width="29%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp; </td>
                                <td  width="37% " style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="right" valign="middle"> <span style="display:inline-block; padding-right:5px; text-align:right; width:76px;"> Total </span>           <span style="display:inline-block; text-align:right; width:76px;">$<?php echo $order['total'];?></span></td>
                                <td  width="15%" style="border-bottom:solid 1px #c6c6c6;  padding:8px 2%;" align="left" valign="middle" >&nbsp; </td>
                            </tr>









                        </table>



                    </td>
                </tr>


                <tr>
                    <td colspan="2" align="center" valign="middle"><a href="http://garcinia-body.com/" style="background:#1699E4; display:inline-block; color:#fff; font-size:16px; font-weight:bold; padding:15px 18px; margin:20px auto; text-decoration:none; border: solid 2px #1699E4;">Continue Shopping</a></td>
                </tr>

                <tr>
                    <td colspan="2" align="center" valign="middle" style="font-size:12px; color:#fff; text-align:center; background:#1699E4; padding:25px 10px;">Copyright 2014 Garcinia" All rights reverved.
                        <p style="text-align: center; font-size:12px;"> 61 N Plains Industrial Rd,<br/>
                            Wallingford, CT 06492
                            <br/>
                            <a href="tel:860-214-4800" style="text-decoration: underline; color: #ffffff;">(860) 214-4800</a><br/>

                            <a href="mailto:customerservice@buynaturalcurves.com" style="text-decoration: underline; color: #ffffff;"> customerservice@garcinia-body.com/</a>
                        </p> </td>
                </tr>

            </table>


        </td>
    </tr>
</table>





</body>
</html>

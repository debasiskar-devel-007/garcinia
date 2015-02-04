<?php $themeUrl = Yii::app()->theme->baseUrl;
//echo Yii::app()->session['user_id'];
//unset(Yii::app()->session['last_insert_id']);
//exit;

$res=TransactionOrderDetails::model()->findAll('orderid='.$tid);
$state=State::model()->findAll('id='.$res[0]['billing_state']);
$state1=State::model()->findAll('id='.$res[0]['shipping_state']);

$pro=TransactionProductDetails::model()->findAll('order_id='.$res[0]['orderid']);

?>
<div class="top-header">

    <div class="inner-wrapper">

        <div class="top-logo" style="float:none; margin:0 auto; display: block;"><a href="javascript:void(0)"><img src="<?php echo $themeUrl ?>/images/logo.png" alt="#" style="float:none; margin:0 auto; display: block;" /></a></div>


        <div class="clear"></div>
    </div>
</div>

<div class="inner-bill">
    <div class="bill-top">


        <div class="right-contain">
            Order ID: <?php echo $res[0]['orderid'] ?><br />

            Order Date: <?php echo date('d/m/y',$res[0]['order_time']) ?>
        </div>

        <div class="clear"></div>

    </div>


    <div class="bill-body">

        <div class="billto-contain">
            <h4>Bill To</h4>
            <div class="input-billdiv"><strong>Name:</strong><?php echo $res[0]['billing_fname'].' '.$res[0]['billing_lname'] ?></div>

            <div class="input-billdiv"><strong>Address:</strong><?php echo $res[0]['billing_add']; ?></div>
            <div class="input-billdiv"><strong>City:</strong> <?php echo $res[0]['billing_city']; ?></div>
            <div class="input-billdiv"><strong>State:</strong><?php echo $state[0]['s_st_name']; ?></div>

            <div class="input-billdiv"><strong>Zip:</strong><?php echo $res[0]['billing_zip']; ?></div>


            <div class="input-billdiv"><strong>Email:</strong> <?php echo $res[0]['billing_email']; ?></div>

        </div>

        <div class="shipto-contain">
            <h4>Ship To</h4>

            <div class="input-billdiv"><strong>Name:</strong><?php echo $res[0]['shipping_fname'].' '.$res[0]['shipping_lname'] ?></div>

            <div class="input-billdiv"><strong>Address:</strong><?php echo $res[0]['shipping_add'] ;?> </div>
            <div class="input-billdiv"><strong>City:</strong> <?php echo $res[0]['shipping_city'] ;?></div>
            <div class="input-billdiv"><strong>State:</strong> <?php echo $state1[0]['s_st_name']; ;?></div>

            <div class="input-billdiv"><strong>Zip:</strong> <?php echo $res[0]['shipping_zip'] ;?></div>


            <div class="input-billdiv"><strong>Email:</strong><?php echo $res[0]['billing_email'] ;?></div>

        </div>


        <div class="clear"></div>

        <h5>Shipping Method: Standard Shipping</h5>


    </div>


    <div class="shiping-contain">


        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th style="border-radius:8px 0 0 0;" width="15%" align="center" valign="middle">Item</th>
                <th width="15%" align="center" valign="middle">Quantity</th>
                <th width="30%" align="left" valign="middle">Name</th>
                <th style="border-radius:0 8px 0 0; padding-right:25px;text-align: right;" width="40%" align="right" valign="middle">Amount</th>
            </tr>



                <?php

                $count=1;
                foreach($pro as $p)
                {



                ?>
            <tr>
                <td align="center" valign="middle" style="text-align: center"><?php echo $count ; ?></td>
                <td align="center" valign="middle" style="text-align: center">1</td>
                <td><?php echo $p['product_name']; ?></td>
                <td align="right" valign="middle" style="padding-right:25px; text-align:right; ">$<?php echo $p['product_price'] ?></td>
            </tr>
                <?php
                   $count++;

                }
                ?>


            <tr>


                <td  colspan="4"  align="right"valign="middle" style="text-align: right;"> <span style="display:inline-block; padding-right:20px;">Shipping:</span>$<?php echo $res[0]['shiping_charge'] ?></td>
            </tr>

            <tr>

                <td  colspan="4"  align="right"valign="middle" style=" text-align: right;"> <span style="display:inline-block; padding-right:20px;">Sub total:</span>$<?php echo $res[0]['subtotal'] ?></td>
            </tr>
            <tr>


                <td  colspan="4" align="right"  valign="middle" style="text-align: right;"> <span style="display:inline-block; padding-right:20px;">Tax Rate:</span>$0.00</td>
            </tr>


            <tr>



                <td  colspan="4"  align="right" valign="middle" style="text-align: right;"> <span style="display:inline-block; padding-right:20px; font-weight:bold;">Total: </span><strong>$<?php echo $res[0]['total'] ?></strong></td>
            </tr>

        </table>





    </div>



    <!--<a  href="#" class="shop-btn">Continue Shopping</a>-->
</div>
<?php $themeUrl = Yii::app()->theme->baseUrl;

$res=TransactionOrderDetails::model()->findAll('user_id='.$id);
?>

<div class="cart-top-contain">
    <div class="row">
        <div class="col-md-3"><a href="<?php echo Yii::app()->getBaseUrl(true);?>"><img src="<?php echo $themeUrl;?>/images/natural.png"  alt="#"/></a></div>
        <div class="col-md-9"><img src="<?php echo $themeUrl;?>/images/cart-top.png" alt="#" /></div>

    </div>

    <div class="carvarrow"><img src="<?php echo $themeUrl;?>/images/form-arrow.png" alt="#"/></div>
</div>



<div class="container">






    <div class="cartpagewrapper">

        <div class="row">
            <div class="col-md-12">

                <div class="left-contain" style="width:100%;">
                    <h2 class="text-thank">thank you for your order</h2>

                    <div class="thank-left-pro"><img src="<?php echo $themeUrl;?>/images/pro5.png" alt="#" /></div>

                    <div class="thank-right-pro">

                        <h3>Your order will be shipped to the address supplied shortly. </h3><br />
                        <br />

If you would like to receive our Natural Curves: Natural Beauty Tips & Secrets Newsletter please enter your email address and check the box below.

<div class="thank-form-contain">
<label>eMail Address: </label> <input type="text"  class="thkinput" value="<?php echo $res[0]['billing_email'] ?>" disabled/>
<div class="clear"></div><br />

<input name="" type="checkbox" id="newsletter" value="" class="checkbox" /><span class="chtext">Please send me the Natural Curves: Natural Beauty Tips & Secrets Newsletter via email.</span>
<div class="clear"></div>

<input type="button" value="Submit" id="sub" onclick="savenewsletter(<?php echo $id ?>)"  class="thksub"/>

</div>

                    </div>


                    <div class="clear"></div>



                </div>

            </div>

        </div>
    </div>

    <div style="display:none;" id="newsmsg">
        <div class="termspopup" style="text-align: center">
          Thank You we Will Get Back To You Soon!

        </div></div>

    <!-- Google Code for Purchase Conversion Page -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 975652522;
        var google_conversion_language = "en";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "8QnkCJb9r1YQqo2d0QM";
        var google_remarketing_only = false;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/975652522/?label=8QnkCJb9r1YQqo2d0QM&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>

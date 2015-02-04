<?php
$themeUrl= yii::app()->theme->baseurl;
$base= yii::app()->baseurl;
?>
<div class="top-bg">


    <img src="<?php echo $themeUrl ?>/images/top-bgmain2.png"  alt="#"  class="top-img-con"/>

    <img src="<?php echo $themeUrl ?>/images/new2.png"  alt="#"  class="top-img-con2" style="overflow:hidden;"/>


    <div class="main-wrapper-top">
        <h1>The revolution has begun... Pure Wash cleaning up the world one spin at a time</h1>
        <div class="logo"><a href="#"><img src="<?php echo $themeUrl ?>/images/logo.png" alt="#" /></a></div>

        <div class="form-contain">
            <div class="ftop"><img src="<?php echo $themeUrl ?>/images/form-top.png"  alt="#"/></div>
            <div class="formwrapper">
                <?php /** @var TbActiveForm $form */
                $form = $this->beginWidget(
                    'bootstrap.widgets.TbActiveForm',
                    array(
                        'id' => 'horizontalForm',
                        'type' => 'horizontal',
                        'enableClientValidation' =>true,
                        // 'action'=>$base.'/landing_page_manager/default/index'
                    )
                ); ?>

                <?php echo $form->textFieldRow(
                    $model,
                    'fname',array('class'=>'input1')
                ); ?>

                <?php echo $form->textFieldRow(
                    $model,
                    'lname',array('class'=>'input1')
                ); ?>
                <?php echo $form->textFieldRow(
                    $model,
                    'city',array('class'=>'input1')
                ); ?>

                <?php echo $form->dropDownListRow(
                    $model,
                    'country',array('US'=>'United State'),array('class'=>'input1')
                ); ?>

                <?php echo $form->dropDownListRow(
                    $model,
                    'state',$state,array('class'=>'input1')
                ); ?>

                <?php echo $form->dropDownListRow(
                    $model,
                    'phone',$state,array('class'=>'input1')
                ); ?>

                <?php echo $form->dropDownListRow(
                    $model,
                    'email',$state,array('class'=>'input1')
                ); ?>


                <?php $this->widget(
                    'bootstrap.widgets.TbButton',
                    array(
                        'buttonType' => 'submit',
                        'type' => 'primary',
                        'label' => 'Submit',
                        'htmlOptions' => array('class'=>'button'),
                    )
                ); ?>

                <?php
                $this->endWidget(); ?>


            </div>
            <div class="fbottom"><img src="<?php echo $themeUrl ?>/images/form-bottom.png"  alt="#"/></div>
        </div>


        <div class="clear"></div>
    </div>


</div>

<div class="clear"></div>
<img src="images/new.png"  alt="#" class="new2"/>
<div class="body2-con" style="z-index:999999999999; overflow:auto;">
    <div class="main-wrapper">
        <h2><span>GET THIS</span> AMAZING DEAL <span>NOW!</span> ONLY $299 <strong>MSRP is $699.00</strong></h2>

        <div class="video">


            <iframe width="100%" height="100%" src="//www.youtube.com/embed/R9PQUXsOIsw" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="btn1"><a href="#"><img src="<?php echo $themeUrl ?>/images/btn1.png" alt="#" /></a></div>

        <div class="text-con"><img src="<?php echo $themeUrl ?>/images/text1.png"  alt="#"/></div>

        <div class="clear"></div>


        <h3 style="font-size:28px; font-weight:normal; color:#000; line-height:24px; text-align:center; padding:25px 0 0 0;">Risk Free. Money Back Gurantee. 3-Year Warranty.</h3>

    </div>
</div>

<img src="<?php echo $themeUrl ?>/images/body3.png" alt="#" style="width:100%; margin:5px 0 0 0;" />

<div class="body3-con">

    <img src="<?php echo $themeUrl ?>/images/body4.png" alt="#" style="width:100%;" />

    <div class="main-wrapper3">
        <a href="#"><img src="<?php echo $themeUrl ?>/images/btn1new.png" alt="#" /></a>

        <h2>Tell your family and friends about us now! <span>3 Year Warranty! </span></h2>

        <div class="clear"></div>

    </div>



</div>


<div class="body3-con">
    <img src="<?php echo $themeUrl ?>/images/body5.png" alt="#" style="width:100%;" />

    <div class="new-btn4"><a href="#"><img src="<?php echo $themeUrl ?>/images/btn1.png" alt="#" style="width:100%;" /></a></div>



</div>

<div class="body-6">
    <div class="main-wrapper">
        <img src="<?php echo $themeUrl ?>/images/img.png" alt="#" style="width:80%; margin:5px auto; display:block;" />

        <h2>The Best Home Invention Since The Washing Machine</h2>

        <img src="<?php echo $themeUrl ?>/images/img2.png" alt="#" style="margin:5px auto; display:block;" class="imgpro" />
        <div class="video2">
            <iframe width="100%" height="100%" src="//www.youtube.com/embed/HzjHp2GCNB8" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="btn5"><a href="#"><img src="<?php echo $themeUrl ?>/images/btn1.png"  alt="#"/></a></div>
        <div style=" text-align:center; font-size:36px; padding:25px 0; line-height:40px;"><span style="color:#f37028;">BE</span> <span style="color:#96c13c;">GREEN</span><span style="color:#f37028;">, SAVE</span> <span style="color:#96c13c;">GREEN</span>  <span style="color:#000;">3 Years Warranty</span></div>


        <ul class="list1">

            <li> No need for toxic laundry detergent ever</li>

            <li> No need for hot water ever</li>


            <li> No more toxic chemical on your skin</li>


            <li>Reduce your energy cost</li>


            <li>Reduces cost of repairs</li>


            <li>Reduce drying time</li>


            <li> It pays for itself over and over</li>






        </ul>



        <ul  class="list2">

            <li> No more bacteria, allergen and skin irritant</li>


            <li> No scummy soap build up in washing machine</li>

            <li>Save money while you protecting family health </li>

            <li> Protecting family health while you saving our Ocean</li>

            <li> Do your part and Don’t pollute our food source</li>

            <li> No polluted laundry wastewater to our environment</li>






        </ul>

        <div class="clear"></div>



        <div style=" text-align:center; font-size:36px; padding:40px 0; text-transform:uppercase; line-height:40px; color:#96c13c;">reduce the toxins in <span style="color:#f37028;">your life</span> and <span style="color:#f37028;">help</span> to make for better world </div>
        <div style="width:30%; margin:0px auto;"><a href="#"><img src="<?php echo $themeUrl ?>/images/btn1.png" alt="#" style="width:100%;" /></a></div>

    </div>

</div>



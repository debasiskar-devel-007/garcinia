<?php

$themeUrl = Yii::app()->theme->baseUrl;
//if(!isset(Yii::app()->request->cookies['landing_page_id'])){
    Yii::app()->request->cookies['landing_page_id'] = new CHttpCookie('landing_page_id', 1,array('expire'=>time()+2592000));
//}

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

<script type="application/javascript">

   var flag=1;






   $(window).bind('beforeunload', function(){


        if(flag==1)
        {


            //$.facebox($('#info1').html());

        bootbox.dialog('<div class="homepopup1"><iframe src="<?php echo yii::app()->getBaseurl(true) ?>/product/default/pop" width="100%" frameborder="0" scrolling="no"></iframe></div>');
        //bootbox.dialog('<div class="homepopup1"><iframe src="<?php echo yii::app()->getBaseurl(true) ?>/product/default/pop" width="100%" frameborder="0" scrolling="no"></iframe></div>');

		$('#offer1').parent().css('padding','5px');
		$('#offer1').parent().css('overflow-y','hidden');
		
	
		
        $.post(base_url+'/product/default/setoffer',{val:1},function(res){


        });

        }
        flag=2;
        window.onbeforeunload = null;


        return 'Be sure to exit!';
    });


</script>


<div class="top-part">
    <div class="top1-wrapper">
        <div class="left-part1">
            <div class="left-imgcon"><img src="<?php echo $themeUrl; ?>/images/img1.png" alt="#" /></div>
            <h1><img src="<?php echo $themeUrl; ?>/images/text1.png" alt="#" /></h1>

            <ul>
                <li><span>DECREASE</span>&nbsp;&nbsp;FAT PRODUCTION </li>
                <li><span>SUPRESSES</span>&nbsp;&nbsp;APPETITE </li>
                <li><span>INCREASES</span>&nbsp;&nbsp;SERATONIN LEVELS</li>

            </ul>

            <div class="arrow-contain">
                <h2>Send My</h2>
                <h3>TRIAL ORDER TODAY!</h3>

            </div>

            <div class="offer-img"></div>
            <div class="pro-img1"></div>
            <div class="clear"></div>

           <!-- <div class="asseenon"></div>
            <div class="bottom-img"></div>-->


        </div>
        <div class="right-part1">

            <div class="arrow-img"><img src="<?php echo $themeUrl; ?>/images/formarrow.png" alt="#" /></div>
            <div class="logo"><a href="<?php echo Yii::app()->getBaseurl(true);?>"><img src="<?php echo $themeUrl; ?>/images/logo.png" alt="#" /></a></div>
            <div class="form-top">
                <h2>TELL US WHERE TO SEND</h2>
                <h3>YOUR BOTTLE TODAY!</h3>

            </div>

            <h4>Just Pay Shipping & Handling</h4>
            <div class="form-body">

            <h5></h5>

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

                <?php echo $form->textFieldRow(
                    $model,
                    'fname', array("placeholder"=>"First Name",'class'=>"input1")
                ); ?>

                <?php echo $form->textFieldRow(
                    $model,
                    'lname', array("placeholder"=>"Last Name",'class'=>"input1")
                ); ?>

                <?php echo $form->textFieldRow(
                    $model,
                    'email', array("placeholder"=>"Email Address",'class'=>"input1")
                ); ?>

                <?php echo $form->textFieldRow(
                    $model,
                    'city', array("placeholder"=>"City",'class'=>"input1")
                ); ?>
                <?php echo $form->dropDownListRow(
                    $model,
                    'state',$this->getStateList(254), array('class'=>"input2")
                ); ?>
                <?php echo $form->textFieldRow(
                    $model,
                    'zip', array("placeholder"=>"Zip Code",'class'=>"input1")
                ); ?>

                <?php echo $form->textFieldRow(
                    $model,
                    'phone', array("placeholder"=>"Phone",'class'=>"input1")
                ); ?>


                <input type="submit" class="btn1" value=""  />
                <img src="<?php echo $themeUrl; ?>/images/form-bottom.png" alt="#" style="display:block; margin:0px auto; margin-top:5px;" />

                <?php $this->endWidget(); ?>

            </div>


        </div>

        <div class="clear"></div>


    </div>
</div>

<div class="div-main-bg">
<div class="middle-contain">
    <div class="middle-wrapper">
        <h2>WHAT IS GARCINIA CAMBOGIA (hca)</h2>

        <h3>Why Are Scientists And Media </h3>
        <h4>Buzzing About Garcinia?</h4>

        <div class="pro-contain">
            <div class="left-part"><img src="<?php echo $themeUrl; ?>/images/pro2.png"  alt="#"/></div>
            <div class="right-part">
                <p><strong> Garcinia Cambogia is the most talked about natural weight loss supplement – for good reason!</strong><br />
                    <br />

                    Garcinia Cambogia is a revolutionary breakthrough for dieters! Garcinia Cambogia is a fruit that has been found to burn fat as energy, reduce calorie intake, support healthy metabolism, and boosts mood.
                    <br />
                    <br />

                    HCA is the essential ingredient extracted from the rind of the Garcinia Cambogia fruit and helps you burn fat rather than store it! </p>

            </div>

            <div class="clear"></div>
        </div>


    </div>

</div>


<div class="body-block3">

    <div class="block3wrapper">

        <div class="blockimg">
            <img src="<?php echo $themeUrl; ?>/images/img3.png" alt="#" />

            BURN FAT
        </div>

        <div class="blockimg">
            <img src="<?php echo $themeUrl; ?>/images/img4.png" alt="#" />

            SUPPRESS APPETITE
        </div>
        <div class="blockimg">
            <img src="<?php echo $themeUrl; ?>/images/img5.png" alt="#" />

            SUPPORT METABOLISM
        </div>
        <div class="blockimg">
            <img src="<?php echo $themeUrl; ?>/images/img6.png" alt="#" />

            BALANCE MOOD
        </div>

        <div class="clear"></div>

        <div class="block-text2">
            <div class="left-text2">
                <h2>Send My Trial Order Today!</h2>
                <!--<h3>100% Money Back Guarantee if You Don’t Get The Results You Desired</h3>-->
            </div>

            <div class="rightbtn"><a href="javascript:void(0);" onclick="scrolltoform()"><img src="<?php echo $themeUrl; ?>/images/btn2.png" alt="#" /></a></div>


            <div class="clear"></div>

        </div>


    </div>

</div>


<div class="middle4text">WHAT IS GARCINIA CAMBOGIA (hca)</div>


<div class="block4-body">
    <div class="block4wrapper">
        <h2>WHY pure  GARCINIA CAMBOGIA?</h2>
        <h3>Lose weight the all-natural way with Garcinia Cambogia. This revolution enables you to drop pounds without diet or exercise.</h3>

        <div class="clear"></div>
        <div class="text-con1">Known for its numerous health benefits, Garcinia Cambogia and its HCA help the body to burn fat, suppress appetite, support a healthy metabolism, and increase serotonin levels to balance moods.</div>
        <div class="clear"></div>

        <div class="text-con2">Garcinia Cambogia is the most effective supplement to help you lose weight and be the healthier, happier you.</div>
        <div class="clear"></div>

        <div class="pro-box3">
            <img src="<?php echo $themeUrl; ?>/images/pro3.png" alt="#" />
        </div>
        <div class="clear"></div>


    </div>

</div>

<div class="block4wrapper">

    <div class="block-text2">
        <div class="left-text2">
            <h2>Send My Trial Order Today!</h2>
            <!--<h3>100% Money Back Guarantee if You Don’t Get The Results You Desired</h3>-->
        </div>

        <div class="rightbtn"><a href="javascript:void(0);" onclick="scrolltoform()"><img src="<?php echo $themeUrl; ?>/images/btn2.png" alt="#" /></a></div>


        <div class="clear"></div>

    </div>

</div>

<div class="middle5text">HYDROXYCITRIC ACID REALLY WORKS!</div>


<div class="block5contain">

    <h2>The ultimate fat-burner </h2>

    <div class="text-div">
        The powerful HCA extract found in Pure Garcinia Premium is known to reduce appetite and belly fat while improving overall health. <br />
        <br />


        Pure Garcinia Cambogia not only aids in weight loss and helps you shed inches, it also boosts serotonin, your feel-good hormones, which reduces stress and helps to control cravings and emotional eating.

    </div>

    <div class="clear"></div>


</div>
<div class="block4wrapper" style="margin-top:0px;">
    <div class="block-text2" style="margin-top:0px;">
        <div class="left-text2">
            <h2>Send My Trial Order Today!</h2>
            <!--<h3>100% Money Back Guarantee if You Don’t Get The Results You Desired</h3>-->
        </div>

        <div class="rightbtn"><a href="javascript:void(0);" onclick="scrolltoform()"><img src="<?php echo $themeUrl; ?>/images/btn2.png" alt="#" /></a></div>


        <div class="clear"></div>

    </div>

</div>

<div class="middle5text" style="margin-top:60px;">REAL PEOPLE, REAL RESULTS.</div>

<div class="block6contain">
    <h2>PEOPLE WHO BENEFIT FROM PURE GARCINIA
        CAMBOGIA </h2>

    <h3><span>Our customers are happy to </span> speak about their results!</h3>
    <div class="block-left">
        <img src="<?php echo $themeUrl; ?>/images/img7.png" />

        <p>"This product is great. I have lost 9lbs so far. I am a stress eater. This product really helped me not eat because I was having a stressful day. <strong>The product also killed by cravings for food when I was not hungry.</strong> When I am grocery shopping this product has caused me to shop healthier. I have been a lot calmer and more focused on reaching my goal. I am not on edge, or have jitteriness, or nervousness like some diet products can do."<br />
            <br />

            <span>- L.H., Long Beach, CA</span></p>
        <div class="clear"></div>
    </div>

    <div class="block-right">
        <img src="<?php echo $themeUrl; ?>/images/img8.png" />

        <p>"I tried this brand a few years ago and it did <strong>help lessen my appetite without jitters</strong>. Later I purchased an unknown brand, which did NOTHING for me. I went back to my Amazon past purchases and found this brand, ordered once again, and it is working perfectly again (5-10 lb. loss without exercise or dieting). I'm overweight by about 15-20 lbs, and have a small frame, I don't eat much anyway. "
            <br />
            <br />

            <span>- E.P., Las Vegas, NV</span></p>
        <div class="clear"></div>
    </div>


    <div class="clear"></div>

</div>

<div class="block7con">
    <div class="block7-wrapper">
        <h2><img src="<?php echo $themeUrl; ?>/images/text2.png" alt="#" />
        </h2>
        <div class="pro7"><img src="<?php echo $themeUrl; ?>/images/pro4.png" alt="" /></div>
        <div class="pro7-div">
            <h3>Get Your Dream Body</h3>
            <h4>The Easy Way!</h4>
            <h2>Product Not Approved by the FDA</h2>

            <img src="<?php echo $themeUrl; ?>/images/bicon.png" alt="#" class="bicon" />

            <a href="javascript:void(0);" onclick="scrolltoform()"><img src="<?php echo $themeUrl; ?>/images/btn3.png" alt="#" /></a>

        </div>

        <img src="<?php echo $themeUrl; ?>/images/girl2.png" alt="#" class="girlimg" />
        <div class="clear"></div>

    </div>

</div>


</div>



<?php

$themeUrl = Yii::app()->theme->baseUrl;
//if(!isset(Yii::app()->request->cookies['landing_page_id'])){
    Yii::app()->request->cookies['landing_page_id'] = new CHttpCookie('landing_page_id', 2,array('expire'=>time()+2592000));
//}
?>

<div class="container">
<div class="warning-div"><span>WARNING:</span> Due to high demand created by recently being featured in TV, radio, and print, we cannot guarantee supplies will last. As of <?php echo date('F jS',strtotime('+1day'));?> we currently have product in STOCK and READY TO SHIP within 24 hours.</div>


<div class="top-part1">

    <div class="row">
        <div class="col-md-8">
            <div class="left-contain">
                <div class="img2"><a href="<?php echo Yii::app()->getBaseUrl(true);?>"><img src="<?php echo $themeUrl;?>/images/natural.png" alt="#" /></a></div>
                <div class="img3"><img src="<?php echo $themeUrl;?>/images/unleash.png" alt="#" /></div>
                <div class="img1"> <img src="<?php echo $themeUrl;?>/images/girl1.png" alt="#" /> </div>
                <div class="img-resonsive"> <img src="<?php echo $themeUrl;?>/images/girl2.png" alt="#" /> </div>

                <div class="img4"><img src="<?php echo $themeUrl;?>/images/pro1.png" alt="#" /></div>


                <div class="text-div"><h6>Bring Your <span>Inner Sexy</span> Out
                        With  the Herbal Help of
                        <span>Natural Curves&reg;</span> </h6>

                    <ul>
                        <li>Seductive Confidence</li>
                        <li>Irresistible Beauty</li>
                        <li>Curves For Miles</li>
                        <li>Sexy That's Meant
                            to Be Seen!</li>

                    </ul>
                </div>

                <div class="clear"></div>

                <div class="bottom-arrow-contain">
                    <img src="<?php echo $themeUrl;?>/images/arrow.png"  alt="#"/>
                    <p>*free bottles on select offers get yours before it’s gone</p>
                </div>

            </div>
        </div>
        <div class="col-md-4">

            <div class="right-contain">
                <div class="form-top-img">
                    <div class="left-img">
                        <img src="<?php echo $themeUrl;?>/images/l1.png" alt="" />
                        <img src="<?php echo $themeUrl;?>/images/l2.png" alt="" />

                    </div>

                    <div class="right-img">
                        <img src="<?php echo $themeUrl;?>/images/gnc.png" alt="#" />
                        <img src="<?php echo $themeUrl;?>/images/vita.png" alt="#" />
                    </div>

                    <div class="clear"></div>

                </div>
                <div class="clear"></div>
                <div class="top-arrow"><img src="<?php echo $themeUrl;?>/images/form-arrow.png"  alt="#"/></div>

                <img src="<?php echo $themeUrl;?>/images/free.png" style="position: absolute; left: -74px; top: 60px; width:113px;"  alt="#"/>
                <div class="form-main">
                    <div class="form-heding">
                        <h2>WHERE DO WE SEND YOUR</h2>
                        <h3>FREE BOTTLE*?</h3>
                        <h4>ENTER YOUR SHIPPING INFORMATION</h4>

                    </div>

                    <?php /** @var TbActiveForm $form */
                    $form = $this->beginWidget(
                        'bootstrap.widgets.TbActiveForm',
                        array(
                            'id' => 'horizontalForm',
                            'type' => 'horizontal',
                            'enableClientValidation' =>true,
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
                        'state',$this->getStateList(254), array('class'=>"input1")
                    ); ?>
                    <?php echo $form->textFieldRow(
                        $model,
                        'zip', array("placeholder"=>"Zip Code",'class'=>"input1")
                    ); ?>





                    <input type="submit"  class="subbtn1"  value=""/>

                    <?php $this->endWidget(); ?>

                    <div class="form-bottom-text">Your information is secure. Read our <a href="javascript:void(0)" onclick="scheduled_policy()">Privacy Policy</a> here.  Special  Pricing on next page.</div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="contain2">

    <div class="topheding">
        <h2>Ready to start turning heads wherever you go? </h2>
        <h3>Just imagine the possibilities …</h3>

    </div>
    <div class="left-text-contain">

        <ul>
            <li>Boost your self-image with pure, balanced health …
                you’re positively radiant!

            </li>
            <li>Shed that "Plain Jane" image for good … and release  "Sexy Lexi!"</li>

            <li>Feel and look fabulous in a slinky, strapless dress ..</li>
            <li>Wear that teeny bikini with pride .. </li>

            <li>And generate extra steam in the bedroom with your new, sensual confidence.

            </li>



        </ul>

        <h4>Begin your </h4>

        <h5>transformation today ..</h5>
        <h6>and <span>get the admiration</span> you've always wanted (and deserve)!</h6>

    </div>

    <div class="right-img"><img src="<?php echo $themeUrl;?>/images/girl3.png"  alt="#"/></div>

</div>

<div class="contain3">
    <div class="heading-contain">Get Your Sexy Back—The Natural Way!</div>

    <div class="left-img-paqrt"><img src="<?php echo $themeUrl;?>/images/girl4.png"  alt="#"/></div>

    <div class="textpart">
        <h3>Did you know … the incredible ingredients in Natural Curves have thousands of years of history behind them?</h3>

        These are the SAME beauty-boosting botanicals that wealthy women of ancient Greece used to go from plainly pretty to breathtaking … (Aphrodite would have approved!)<br />
        <br />


        The same herbs that ladies in Asia keep close to the chest … for their secret power to “magically” create voluptuous curves out of stick-straight bodies …
        out of stick straight bodies…  <br />  <br />

        And the same beauty-boosting extracts that thousands of women across the U.S. and Canada today continue to use to their great satisfaction (and to that of their romantic partners.)


        <h4>Your friends will ooze jealousy .. </h4>
        <h5>and demand to know what your secret is! </h5>


    </div>

    <div class="right-product"><img src="<?php echo $themeUrl;?>/images/pro1.png" alt="#" />
        <img src="<?php echo $themeUrl;?>/images/free.png" style=" display: block; margin:0 auto; margin-top:-65px; position: relative; z-index: 99999; width: 144px; "  alt="#"/>
    </div>


    <div class="right-btn"><a href="javascript:void();" onclick="scrolltoform()"><img src="<?php echo $themeUrl;?>/images/btn.png"  alt="#"/></a></div>


    <div class="clear"></div>

</div>


<div class="contain4">
    <h2>Powerful Ingredients Fou<strong style="display: inline-block; margin-left: -1px; font-weight: normal;">n</strong>d <span>Inside Natural Curves&reg;?</span></h2>
    <h3> Natural Curves Has Only the Finest Herbs, Freshest Berry Extracts and Most Potent Roots For Accentuating Your Femininity.</h3>

    <div class="row">
        <div class="col-md-5">
            <div class="text-div1">
                <img src="<?php echo $themeUrl;?>/images/i1.png"  alt="#"/>
                <strong>Saw Palmetto Berry</strong><br />

                Not just for men’s good health, fruit extracts from this spiky plant are good for women too. It is an anti-androgen, helping balance hormones and reduce the visible effects of aging.

                <div class="clear"></div>
            </div>
            <div class="text-div1">
                <img src="<?php echo $themeUrl;?>/images/i2.png"  alt="#"/>
                <strong>Fenugreek Seed </strong><br />

                Seeds from this exotic, spinach-like plant are stimulating to sensitive tissues. They’re also known to relieve inflammation and imbalances in the body.

                <div class="clear"></div>
            </div>
            <div class="text-div1">
                <img src="<?php echo $themeUrl;?>/images/i3.png"  alt="#"/>
                <strong>Blessed Thistle Leaf</strong><br />

                This zesty thistle is the go-to for nursing mothers and acts as a hormonal balancing agent for women.

                <div class="clear"></div>
            </div>

            <div class="text-div1">
                <img src="<?php echo $themeUrl;?>/images/i4.png"  alt="#"/>
                <strong>Chasteberry</strong><br />

                Greek women’s favorite for enhancing beauty, the berry of this pretty purple tree has been used for centuries for balancing hormones, managing menstrual symptoms, and even relieving breast tenderness.

                <div class="clear"></div>
            </div>

        </div>
        <div class="col-md-2"> <img src="<?php echo $themeUrl;?>/images/pro2.png"  alt="#" class="proing"/></div>
        <div class="col-md-5">
            <div class="text-div2">
                <img src="<?php echo $themeUrl;?>/images/i5.png"  alt="#"/>
                <strong>Dandelion Root</strong><br />

                Yes, your favorite childhood flower is more than just a weed—dandelion makes an excellent liver tonic and helps enhance beauty.

                <div class="clear"></div>
            </div>

            <div class="text-div2">
                <img src="<?php echo $themeUrl;?>/images/i6.png"  alt="#"/>
                <strong>Fennel Seed</strong><br />

                This sweet, highly aromatic herb isn’t just good for cooking. It’s a gold standard that ancient beauticians relied on for ladies in need of a beauty boost.

                <div class="clear"></div>
            </div>
            <div class="text-div2">
                <img src="<?php echo $themeUrl;?>/images/i7.png"  alt="#"/>
                <strong>Ginseng Root</strong><br />

                The Chinese’s favorite warming root balances estrogens and has been traditionally used for women’s energy and libido. It’s also great for relaxation, immune system support, and fatigue.

                <div class="clear"></div>
            </div>
            <div class="text-div2">
                <img src="<?php echo $themeUrl;?>/images/i8.png"  alt="#"/>
                <strong>Black Cohosh Root </strong><br />

                The root of this pretty white flower acts like estrogen, making it one of the best herbs for enhancing beauty and—bonus!—it is also known to relieve menstrual and menopausal discomforts.

                <div class="clear"></div>
            </div>
        </div>

    </div>


</div>


<div class="contain5">
    <div class="text-heding">real users. real results.</div>

    <div class="row">
        <div class="col-md-3">
            <div class="div-contain1">
                <img src="<?php echo $themeUrl;?>/images/img2.png" alt="#" />
                <strong>Has no side effects and IT WORKS</strong><br />
                This product is AMAZING! I am sure the results vary for every woman...but I've been using it for 5 days, and I am already seeing the results. I cannot wait to see what the results are in a few weeks. This has boosted my confidence.  I am truly satisfied.

            </div>
        </div>
        <div class="col-md-3">

            <div class="div-contain1">
                <img src="<?php echo $themeUrl;?>/images/img1.png" alt="#" />
                <strong>Works Great!</strong><br />
                I did a lot of research and this supplement has the same ingredients as the other expensive supplements and I must say that I am very impressed! I have only been using this supplement for about 3 weeks but I can already tell a difference!!!


            </div>
        </div>
        <div class="col-md-3">
            <div class="div-contain1">
                <img src="<?php echo $themeUrl;?>/images/img3.png" alt="#" />
                <strong>Really Works</strong><br />
                I am very happy I found this product. It does take a few weeks to work but it's worth the wait. On my second bottle and it's still working.


            </div>

        </div>
        <div class="col-md-3" style="background:none; border:none;">
            <div class="div-contain1"  style="background:none; border:none;">
                <img src="<?php echo $themeUrl;?>/images/img4.png" alt="#" />
                <strong>AMAZING!</strong><br />

                Excellent product! It really works! Great service. I will be a repeat customer. Very fast delivery!




            </div>

        </div>



    </div>

    <div class="bottom-text">Testimonials quoted are from actual users who freely posted their comments online without any inducement from the manufacturer.  Natural Curves is an all natural women’s beauty supplement formulated to assist women in gaining better overall health.  Typical customers who use the product for the recommended 90 days have reported an increase in their overall well being.  Specific results may vary depending on usage, body chemistry and other factors such as diet or medications.  Please consult your physician before adding any supplement to your diet.  All pictures used are models and not actual Natural Curves users.</div>
</div>

<div class="contain6">

    <div class="row">
        <div class="col-md-4">
            <div class="pro1">
                <img src="<?php echo $themeUrl;?>/images/pro3.png"  alt="#"/>
            </div>
            <div class="pro2">
                <img src="<?php echo $themeUrl;?>/images/li1.png" alt="#" />
                <img src="<?php echo $themeUrl;?>/images/li2.png" alt="#" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="col-md-8">
            The Top Selling All Natural Women’s Health & Beauty
            Supplement sold at these Fine Health and Nutrition Stores.<br />
            <br />
            Over 10 Years of Sales to hundreds of thousands of women. 
        </div>


    </div>
</div>


<div class="contain7">
    <div class="contain7-wrapper">
        <div class="left-girl-img"><img src="<?php echo $themeUrl;?>/images/girl5.png" alt="#"  class="g1"/><img src="<?php echo $themeUrl;?>/images/girl6.png" alt="#"class="g2" /></div>
        <div class="text-contain">
            <img src="<?php echo $themeUrl;?>/images/natural.png"  alt="#" class="imgcon1"/>
            <img src="<?php echo $themeUrl;?>/images/unleash.png"  alt="#" class="imgcon2"/>

            <h5>Bring Your <span>Inner Sexy</span> Out With
                the Herbal Help of <span>Natural Curves&reg;</span>
            </h5>
            <p>Ready to flaunt your natural curves and get your sexy on?
                Get ready to rock that bikini, turn heads wherever you go,
                and capture the <strong>confidence you've always wanted!</strong>
            </p>

        </div>

        <div class="rigth-box">
            <img src="<?php echo $themeUrl;?>/images/new-pro-con.png" alt="#" />

            <img src="<?php echo $themeUrl;?>/images/free.png" style=" display: block; margin:0 auto; margin-top:-93px; position: relative; z-index: 99999; width: 152px; "  alt="#"/>
            <a href="javascript:void();" onclick="scrolltoform()"><img src="<?php echo $themeUrl;?>/images/btn.png"  alt="#"/></a>

        </div>


        <div class="clear"></div>

        <div class="arrow-img"><img src="<?php echo $themeUrl;?>/images/arrow.png"  alt="#"/></div>

    </div>
</div>

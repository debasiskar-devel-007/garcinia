<?php
$themeUrl= yii::app()->theme->baseurl;
$base= yii::app()->baseurl;

?>
<div class="top-contain">


  <div class="main-wrapper">
    <div class="logo"><a href="<?php echo yii::app()->getBaseUrl(true); ?>"><img src="<?php echo $themeUrl; ?>/images/logo.png"  alt="logo"/></a></div>
    
    
    <div class="right-text">
      <figure><img src="<?php echo $themeUrl; ?>/images/top-text.png" alt="#" /></figure>
      <h1>Renue Cosmetics Presents Valescere Cream</h1>
      <div class="pic-contain"> <img src="<?php echo $themeUrl; ?>/images/pic1.png"  alt="#" class="pic1"/> <img src="<?php echo $themeUrl; ?>/images/pic2.png"  alt="#" class="pic2"/>
        <div class="clear"></div>
      </div>
      
      
      <div class="socal-icon"> <a href="https://www.facebook.com/valescereBBXT55" target="_blank"><img src="<?php echo $themeUrl; ?>/images/icon1.png"  alt="#" class="icon1"/></a> <a href="https://twitter.com/valescerecream" target="_blank"> <img src="<?php echo $themeUrl; ?>/images/icon2.png"  alt="#" class="icon2"/></a> <a href="http://www.linkedin.com/in/valescerecream" target="_balnk"> <img src="<?php echo $themeUrl; ?>/images/icon3.png"  alt="#" class="icon3"/></a> <a href="https://www.youtube.com/channel/UCXcB_06sBBN14bf5SP1FrZg" target="_blank"> <img src="<?php echo $themeUrl; ?>/images/icon4.png"  alt="#" class="icon4"/></a> <a href="http://instagram.com/valescerecream" target="_blank"> <img src="<?php echo $themeUrl; ?>/images/icon5.png"  alt="#" class="icon5"/></a>
        <div class="clear"></div>
         
        
      </div>
    </div>
    
    
    <div class="clear"></div>
    
    <section>
      
      <div class="video-wrapper">
       
       <h2>We are Here The Now the future </h2>
      <!-- video-container-->
       <div class="video-container">
         <iframe src="https://www.youtube.com/embed/_K5ZD7yfqc8" frameborder="0" width="560" height="315"></iframe>
         
       
</div>

<!-- video-container end -->

<div class="arrow"><img src="<?php echo $themeUrl; ?>/images/arrow.png"  alt="#"/></div>
<div class="btn2" style="margin: 0 auto; margin-top: 15%;"><a href="<?php echo yii::app()->getBaseUrl(true); ?>">Buy Now!</a></div>

<figure><img src="<?php echo $themeUrl; ?>/images/product.png"  alt="#"/></figure>
  <div class="clear"></div>
      </div>
      <!--form-contain-->
      <div class="form-contain">
      
         <div class="form-body">
           
              <div class="top-img">
                <figure><img src="<?php echo $themeUrl; ?>/images/form-top.png"   alt="#"/></figure>
                <span><img src="<?php echo $themeUrl; ?>/images/free-img.png"  alt="#"/></span>
              
              </div>
            <?php /* ?>
              <form>
              <p style="visibility: hidden;">Lorem ipsum dolor sit amet demo text</p>
           
             <!-- <span class="error">error text</span>-->
              <label>User Name :</label>
              
              <input type="text"  class="input1"/>
              
              <div class="clear"></div>
             <!-- <span class="error">error text</span>-->
              <label>Password :</label>
              
              <input type="password"  class="input1"/>
              
              <div class="clear"></div>
             <!-- <span class="error">error text</span>-->
              <label>Email ID :</label>
              
              <input type="text"  class="input1"/>
              
              <div class="clear"></div>
             <!-- <span class="error">error text</span>-->
              <label>Date Of Birth :</label>
              
              <input type="text"  class="input1"/>
              
              <div class="clear"></div>
             <!-- <span class="error">error text</span>-->
              <label>City :</label>
              
              <input type="text"  class="input1"/>
              
              <div class="clear"></div> 
              
              <!-- <span class="error">error text</span>-->
              <label>Country :</label>
              
              <input type="text"  class="input1"/>
              
              <div class="clear"></div>
              
              <div class="terms">
              
             <strong> Terms & Condition</strong><br />

Agreed and consent to our <a href="<?php echo yii::app()->getBaseUrl(true) ?>/product/default/terms" target="_blank">Terms of Service</a>, and End User License Agreement

<div class="clear"></div>
                  
                  <input name="" type="radio" value="" class="input2" /> <span>I Agree </span> <input name="" type="radio" value=""  class="input2"/><span>I Do Not Agree</span>
                  
                  
              </div>
              
              <div class="clear"></div>
              <?php 
$form = $this->beginWidget(
'bootstrap.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
'enableClientValidation' =>true, 
)
); ?>
           
           <?php $this->widget(
'bootstrap.widgets.TbButton',
array('buttonType' => 'link', 'label' => 'Submit','url'=>$base.'/product/default','htmlOptions' => array('class'=>'btn'))
); ?>
<?php
$this->endWidget(); ?>
           
           </form>
         <?php */ ?>
         
         
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
            
            <p style="visibility: hidden;">Lorem ipsum dolor sit amet demo text</p>             

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
            'email',array('class'=>'input1')
            ); ?>

        <?php echo $form->datepickerRow(
            $model,
            'dob',
            array(
            'prepend' => '<i class="icon-calendar"></i>',
            'class'=>'input2'
            )
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
            
             <div class="clear"></div>
              
              <div class="terms">
              
             <strong> Terms & Condition</strong><br />

Agreed and consent to our <a href="<?php echo yii::app()->getBaseUrl(true) ?>/product/default/terms" target="_blank">Terms of Service</a>, and End User License Agreement

<div class="clear"></div>
                  
                  <?php echo $form->radioButtonListRow(
$model,
'radioButtons',
array(
1=>'I Agree',
""=>'I Do Not Agree',
)
); ?>
                  
              </div>

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
      
      </div>
    <!--form-contain end -->
    
    <div class="clear"></div>
    </section>
    
    
    
    
    
    
  </div>
  
  
</div>
<div class="middle-body-contain">

  <div class="main-wrapper">
  
    <div class="text-wrapper">
    
    <div  class="top-text"><img src="<?php echo $themeUrl; ?>/images/health-text.png" alt="#" />
    
    <h2>Health is an important aspect of life</h2>
    </div>
   <p> At Bb-Xt55 Holding Co., Inc. we are dedicated to developing subsidiaries which are product specific. These subsidiaries are designed to carry product lines infused with the Bb-xT55 formulations and will target their fields of specific demographics for global sales. <br />
<br />


Each category is a multi-billion or trillion dollar industry annually. For example: Renue Cosmetics Co. has Valescere Cream which was developed, prototyped and tested for more 18 months, it has gained recognition with well known Dr's, Do's, DMD's and Surgeons. Valescere Cream is endorsed by the President of the American Board of Laser Surgeons.<br />
<br />
 

With your help not only will we exceed a billion dollars a year in sales on this unique and remarkable product, but we will also brand our own jewelry lines through Lotus Jewelry Co., and we will develop subsidiaries for the clothing industry, paint industry, sporting goods, automotive, airline, rail, schools, military and endless other applications. </p>

     <div class="doctor"><img src="<?php echo $themeUrl; ?>/images/doctor.png"  alt="#"/></div>
     
     <div class="clear"></div>
    
    </div>
    
   
  
  </div>

</div>

<!--middle-body-contain end -->

<div class="approximately-contain">
<div class="main-wrapper">
  <h2>Approximately <span>20% of American adults</span> are diagnosed with <span>arthritis</span> each year</h2>
  
  <figure><img src="<?php echo $themeUrl; ?>/images/aprox-img.png"  alt="#"/></figure>
  
  <div class="btn2"><a href="<?php echo yii::app()->getBaseUrl(true); ?>">Buy Now!</a></div>
  
  
</div>
</div>



<div class="testimonials_cotain">

  <div class="main-wrapper">
  
       <h2>TESTIMONIALS</h2>
       
              <figure><img src="<?php echo $themeUrl; ?>/images/testimonials-img.png" alt="#"  class="pic1"/><img src="<?php echo $themeUrl; ?>/images/testimonials-img2.png" alt="#"  class="pic2"/></figure>
       <p>
       <strong>Edward M. Zimmerman, <span>MD - Medical Director Las Vegas Laser & Lipo</span> </strong>

       "As part of an un-controlled study, in concert with Mr. Johnny Lee, the developer of this proprietary technology, I gifted samples of the cream to several dozen of my patients and several of my staff to evaluate trends of anecdotal experience.  The majority of them had similar reductions in existing aches and pains from arthritis, overuse and post operative pain.  Additionally, patients have noted reduced healing times and less post operative pain and swelling when utilizing the cream post-operatively after liposculpting.  In particular, using the cream on deep bruising after surgery, sclero-therapy and other trauma, as well as on soft tissue with poor perfusion, has resulted in more rapid healing and resolution of bruising. <a href="#">View More</a>" <br />
<br />
<strong>Johnny Lee,<span>Founder of Body Balance</span> </strong>

       My name is Johnny Lee. I am a 50 year old male, and the founder of Body Balance and its formulas. This is my testimonial on an experimental cream or mudpack, which I have developed. On May 5, 2011 while overseas I was wounded with a knife. The injury extended approximately 4 inches across my upper left forearm, cutting to the bone and through 5 ligaments, and one main artery. The ligaments and tendons weren't controlling the movement from the index finger to the little finger or the motions of my wrist. <a href="#">View More</a>" 
       
       
       <br />
<br />
<strong>Ernesto Hipolito,<span> B.S., D.M.D.</span> </strong>

      I, Dr. Ernesto Hipolito, would like this letter to serve as my advocation of the technology and the company of Body Balance.<br />
<br />


I was very reserved about my opinion of this product. The basic principle of this product seemed logical enough in both the scientific and practical reasoning, so I ran a series of tests on random patients. <a href="#">View More</a>" 
       
       
       
       </p>
     
       

       
       
       <div class="clear"></div>
     
     
  </div>


</div>


<div class="bottom-body-contain">
  <div class="main-wrapper">
  
  <div class="girl-img"><img src="<?php echo $themeUrl; ?>/images/bottom-product-img.png"  alt="#"/></div>
    <h2>Renue cosmetic co Presents Valescere goals Objectives</h2>
    
      <p>At Bb-Xt55 Holding Co., Inc. we are dedicated to developing subsidiaries which are product specific. These subsidiaries are designed to carry product lines infused with the Bb-xT55 formulations and will target their fields of specific demographics for global sales. <br />
<br />


Each category is a multi-billion or trillion dollar industry annually. For example: Renue Cosmetics Co. has Valescere Cream which was developed, prototyped and tested for more 18 months, it has gained recognition with well known Dr's, Do's, DMD's and Surgeons. Valescere Cream is endorsed by the President of the American Board of Laser Surgeons.<br />

<a href="<?php echo yii::app()->getBaseUrl(true); ?>"  class="btn3">Buy Now!</a>
<strong>Become Powerful</strong>



</p>

<figure><img src="<?php echo $themeUrl; ?>/images/bottom-product-img.png"  alt="#"/></figure>


<p>With your help not only will we exceed a billion dollars a year in sales on this unique and remarkable product, but we will also brand our own jewelry lines through Lotus Jewelry Co., and we will develop subsidiaries for the clothing industry, paint industry, sporting goods, automotive, airline, rail, schools, military and endless other applications. <br />
<br />


The newest product is the Bb-Xt55 Formulated
Cream, which is 100% natural, and the formula does not require FDA approval. Bb-Xt55 formula and variations thereof have patent pending applications and the founder; Mr. Ruston holds the trade secrets and intellectual property ("IP") rights to these formulas and products. Also the product formula has been prototyped and tested with the Bb-Xt55 infusion system into fabric, materials, precious metals, jewelry, pet products, military gear, riding gear, athletic gear and apparel, and much more.<br />

<strong>Become sound in health</strong>
</p>
    
    
    <div class="clear"></div>
  
  </div>

</div>

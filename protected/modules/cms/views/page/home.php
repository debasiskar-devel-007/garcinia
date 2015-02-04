<?php $themeurl = Yii::app()->theme->baseUrl;
//var_dump($res);


 ?>


<!--banner-->
<div class="banner">

<div class="left-video">
<div class="video-container">
     
       <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(23,$res) ?>" alt="Search engine friendly content">  
        <!--<a href="images/Messing.flv" class="player" style="display:block;width:100%; height:100%" id="player">
    <img src="images/video-img.png" alt="Search engine friendly content">
    </a>-->
    
    
    

<!-- this script block will install Flowplayer inside previous A tag -->
<!--<script>
flowplayer("player", "http://releases.flowplayer.org/swf/flowplayer-3.2.18.swf");
</script>-->

         </div>
</div>
<div class="right-text">
<div>
 <div class="fb-like" data-href="http://www.azcowtown.com/" data-width="340px" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
</div>
 <h1><?php echo $this->GetcontentByid(19,$res) ?></h1>
 <p>
 <strong><?php echo $this->GetcontentByid(20,$res) ?></strong><br />
 <?php echo $this->GetcontentByid(21,$res) ?>
 

<br />

<a href="#" onclick="a_comm()">- Read More</a>
</p>

</div>
 <div class="clear"></div>
</div>
<!-- end banner-->
<!--image-contain-->
<div class="image-contain">
 <ul>
 
 <li><a href="#" style="color: #fff;" page_ink_id="7"><img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->getcontentByid(49,$res) ?>" alt="#" />
 Shooting Range</a>
 
 </li>
  <li><a href="#" style="color: #fff;" page_ink_id="14"><img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->getcontentByid(50,$res) ?>" alt="#" />
    Store</a>
  </li>
   <li style="margin-right:0;"><a href="#" style="color: #fff;" page_ink_id="11"><img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->getcontentByid(51,$res) ?>" alt="#" />
     Studio</a>
   </li>
 </ul>

<div class="clear"></div>
</div>
<!--image-contain end -->

<!--<div class="inner-body">
<h2 class="contact-text">Training Division</h2>

<p style="padding:20px 0; font-size:13px; line-height:24px;"><strong>"Americas Secret Range, The Most famous Range You Never Heard of".</strong><br />

Richard has a lengthy historical document that has been paired down quite a bit.  I have provided the original document and if our customer clicks â€œRead Moreâ€? at the end of the new condensed version (verbiage provided below) they can then read the entire article.  I have provided more information as well below that can be utilized as well to allow the customer can click on to read more about.<br />
<br />


<strong>About</strong><br />

Cowtown is a Private 80 acre range comprised of hills and valleys and a variety of flat ranges and bays located in Peoria Arizona just south of Lake Pleasant, adjacent to the Agua Fria River and surrounded by State Land. The terrain is a mixture of washes, open spaces and hills that accommodates camouflage, tracking, K9 exercises and advanced night vision exercises. None of these training missions are feasible on traditional flat shooting ranges. Cowtown Range has been the home to many of America's most elite tactical operators for their training needs for over 15 years which is why we have the title of  â€œThe Most Famous Range Nobody Has Heard ofâ€?. Every step on our range is an elevation change which creates an advantageous venue for training; â€œPrecision Tactics for Managing Conflict at A Distanceâ€?.<br />

<a href="#" style="color:#f79339;">Read moreâ€¦</a><br />
<br />


<strong>Cowtown Range and Training Facility</strong><br />

Today, the Ghost Town remains and the surrounding 88 acres serves as a training ground for 2 sniper and weapon training schools as well as being a training site for many Private Contractors, DOD, Law Enforcement and Military training groups. Cowtown Range is the "Most Famous Range Nobody Has Heard of". This training is all performed on the West Range utilizing the Afghan Village and long range target lanes as well as washes and hills and valleys. The unique terrain on the West Range provides challenging target acquisition as each step is an elevation change. The East Range is a flat, open area and consists of 6 Bays, (2) 100 yard ranges, a large Shoot house and 2 rifle ranges.<br />
<br />


<strong>Cowtown Studios</strong><br />

Cowtown Studios caters to a wide range of events and venues from specialized training to corporate events as well as filming opportunities. Cowtown Studios consists of several old movie sets including an old Ghost Town and Mexican or Afghan style village. The natural patina and textures of the materials and structures found on site make Cowtown Studios highly desirable for Casting Location Scouts and photographers. The Cowtown Management Group is currently seeking additional Clubs and User Groups to set up at Cowtown. Additional space is available near the Cowtown Cowboy Action Shooters or on the East Range which is a much flatter elevation and ideally suited for Clubs and User Groups. Additional bays have been developed as well as a long range shooting lane capable of facilitating shooters out to 250 yards.<br />
<br />

<strong>
Non-Profit Component</strong><br />

Promote Hope, Inc, which is run by Paul Mueller and Steve Simon focuses on the unique needs of all First Responders; Fire, Law Enforcement, Military and Trauma Room Personnel. We provide a relaxing weekend retreat for all participants including fly fishing on the pond, a guided desert tour via TomCars, trigger time on some unique weapons platforms including the DillonAero M134D Mini Gun, McMillan Tac50/Tac308 and catered food. This simple concept has proven to be quite successful in helping our Wounded Warriors and other First Responders find peace again through peer interaction.<br />
<br />


<strong>Hazard Zone Medical</strong><br />

This course allows opportunity for the operator without formal medical training to be able to provide immediate care to patients during any phase of tactical situations. Our curriculum consists of basic medical & trauma training in hazardous conditions and teaches all participants how to effectively treat the wounded with minimal medical equipment as well as basic self-care and basic buddy aid. The basic training is geared to give valuable basic lifesaving skills and provides an experience of combat medicine, basic techniques in providing rapid medical stabilization and evacuation of patients in critical conditions while in authentic combat based scenarios. The course is dynamic and has all field work without formal classroom lectures.


</p>


</div>   -->
<div id="info1" style="display:none;" >
   <strong><?php echo $this->GetcontentByid(20,$res) ?></strong><br />   
     <?php echo $this->GetcontentByid(22,$res) ?>

</div>

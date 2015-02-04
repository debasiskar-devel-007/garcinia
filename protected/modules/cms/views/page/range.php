 <?php $themeurl = Yii::app()->theme->baseUrl;
//var_dump($res);


 ?>
 
 <script src="js/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    
    function b_comm()
    {
         //$.facebox('dsf dsf ds fdsf ds fds fdsfds f'); 
         $.facebox($('#info2').html()); 
    }
    
    
    </script>
<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */
                   $('.head').click(function(e){
        //$('.content').slideUp();     
        e.preventDefault();
        $(this).closest('li').find('.content').slideToggle();
       
      });

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
    <!--<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />-->

<!--banner-->

<div class="inner-banner" style="position:relative;"> <img src="<?php echo yii::app()->getBaseUrl(true) ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(134,$res) ?>" alt="#" /> 
<h2 class="banner-text">Private Memberships & User Groups are available! <a href="contactus.php">Click HERE</a> to contact us!</h2>

</div>
<!-- end banner-->
<div class="inner-body">
        <ul  class="Scontainer" style="height:110px;">

       <?php $htmlcontent  = "  <li><a class='fancybox' href='htmlcontent2' data-fancybox-group='gallery'><img src='htmlcontent1'  alt='#'/></a></li>";

     echo  $this->getmultipleFaceboxContent(52,$res,$htmlcontent);
       ?>
<!--<li><a class="fancybox" href="<?php /*echo $themeurl */?>/images/g1.jpg" data-fancybox-group="gallery"><img src="<?php /*echo $themeurl */?>/images/g1.jpg"  alt="#"/></a></li>
<li><a class="fancybox" href="<?php /*echo $themeurl */?>/images/g2.jpg" data-fancybox-group="gallery"><img src="<?php /*echo $themeurl */?>/images/g2.jpg"  alt="#"/></a></li>

<li><a class="fancybox" href="<?php /*echo $themeurl */?>/images/g6.jpg" data-fancybox-group="gallery"><img src="<?php /*echo $themeurl */?>/images/g6.jpg"  alt="#"/></a></li>
<li><a class="fancybox" href="<?php /*echo $themeurl */?>/images/g7.jpg" data-fancybox-group="gallery"><img src="<?php /*echo $themeurl */?>/images/g7.jpg"  alt="#"/></a></li>
<li><a class="fancybox" href="<?php /*echo $themeurl */?>/images/g8.jpg" data-fancybox-group="gallery"><img src="<?php /*echo $themeurl */?>/images/g8.jpg"  alt="#"/></a></li>
<li><a class="fancybox" href="<?php /*echo $themeurl */?>/images/g9.jpg" data-fancybox-group="gallery"><img src="<?php /*echo $themeurl */?>/images/g9.jpg"  alt="#"/></a></li>
<li><a class="fancybox" href="<?php /*echo $themeurl */?>/images/g10.jpg" data-fancybox-group="gallery"><img src="<?php /*echo $themeurl */?>/images/g10.jpg"  alt="#"/></a></li>
<li><a class="fancybox" href="<?php /*echo $themeurl */?>/images/g11.jpg" data-fancybox-group="gallery"><img src="<?php /*echo $themeurl */?>/images/g11.jpg"  alt="#"/></a></li>



<li><a class="fancybox" href="<?php /*echo $themeurl */?>/images/g23.jpg" data-fancybox-group="gallery"><img src="<?php /*echo $themeurl */?>/images/g23.jpg"  alt="#"/></a></li>
<li><a class="fancybox" href="<?php /*echo $themeurl */?>/images/g24.jpg" data-fancybox-group="gallery"><img src="<?php /*echo $themeurl */?>/images/g24.jpg"  alt="#"/></a></li>
          -->
        
        </ul>


<h2 class="contact-text" style="margin-top:25px;"><?php echo $this->getcontentByid(26,$res) ;?></h2>

<p style="padding:20px 0;line-height:22px;">The Cowtown Shooting Range is divided into two sections, the East and West Shooting Ranges.  
 <?php echo $this->getcontentByid(27,$res) ;?>
</p>

<div class="range-left">

<h2 class="contact-text" style="margin-top:25px;"><?php echo $this->getcontentByid(28,$res) ;?> </h2>
 <ul>
 
<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(29,$res) ;?></strong></a><br />
<p style="font-size:13px;"><?php echo $this->getcontentByid(30,$res) ;?></p> <br />
<div class="content"><img src="<?php echo $themeurl ?>/images/westplatform1.jpg" alt="#" /></div>  
             
</li>

<!--<span style="font-size:12px; line-height:24px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec varius libero vitae est laoreet faucibus. Phasellus tristique diam sed feugiat posuere.</span>     -->
 
</li>
<li> <a href="#"  class="head"><strong><?php echo $this->getcontentByid(31,$res) ;?> </strong></a><br />
<p style="font-size:13px;"><?php echo $this->getcontentByid(32,$res) ;?></p><br />
  <div class="content"><img src="<?php echo $themeurl ?>/images/westplatform2.jpg" alt="#" /></div>               

</li>

<li><a href="#" class="head"><strong><?php echo $this->getcontentByid(33,$res) ;?></strong></a></br>
<p style="font-size:13px;"><?php echo $this->getcontentByid(34,$res) ;?></p> <br />
<div class="content"><img src="<?php echo $themeurl ?>/images/westplatform3.jpg" alt="#" /></div> 
</li>

</ul>

</div>
<div class="range-right"><a href="#" onclick="b_comm()"><img src="<?php echo yii::app()->getBaseUrl(true) ?>/uploads/content_image/thumb/<?php echo $this->getcontentByid(131,$res) ;  ?>" alt="#" /></a></div>

<div class="clear"></div>
<div class="range-left" style="width:100%;">


 <ul>
 

<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(35,$res) ;?></strong></a> <br />
<p style="font-size:13px;"><?php echo $this->getcontentByid(36,$res) ;?></p><br />
<!--<div class="content"><img src="<?php echo $themeurl ?>/images/eastbay6.jpg" alt="#" /></div>-->
</li>
<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(38,$res) ;?></strong></a><br />
<p style="font-size:13px;"><?php echo $this->getcontentByid(39,$res) ;?></p><br />
<!--<div class="content"><img src="<?php echo $themeurl ?>/images/shoothouse.jpg" alt="#" /></div>-->
</li>
<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(40,$res) ;?></strong></a> <br />
<p style="font-size:13px;"><?php echo $this->getcontentByid(41,$res) ;?></p><br />
<!--<div class="content"><img src="images/logo.png" alt="#" /></div>  -->
</li>
<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(42,$res) ;?></strong></a> <br />
<p style="font-size:13px;">
<?php echo $this->getcontentByid(43,$res) ;?>
</p><br />
<!--<div class="content"><img src="images/logo.png" alt="#" /></div>  -->
</li>
<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(44,$res) ;?></strong></a> <br />
<p style="font-size:13px;"><?php echo $this->getcontentByid(45,$res) ;?></p><br />
<!--<div class="content"><img src="images/logo.png" alt="#" /></div>  -->
</li> 
<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(46,$res) ;?></strong></a> <br />
<p style="font-size:13px;"><?php echo $this->getcontentByid(47,$res) ;?></p><br />
<!--<div class="content"><img src="images/logo.png" alt="#" /></div>  -->
</li>
</ul>

<h2 class="contact-text" style="margin-top:40px;"><?php echo $this->getcontentByid(48,$res) ;?></h2>
  <ul>

<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(53,$res) ;?></strong></a><br />
   <p style="font-size:13px;"><?php echo $this->getcontentByid(54,$res) ;?>
Measurements:
</p><br />
 <div class="content"><img src="<?php echo $themeurl ?>/images/eastbay1.jpg" alt="#" /></div> 
</li>
<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(56,$res) ;?></strong></a>
   <p style="font-size:13px;">        
   <?php echo $this->getcontentByid(57,$res) ;?>
</p><br />
  <div class="content"><img src="<?php echo $themeurl ?>/images/eastbay2.jpg" alt="#" /></div> 
</li>
<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(59,$res) ;?></strong></a>
<p style="font-size:13px;">
<?php echo $this->getcontentByid(60,$res) ;?>
</p><br />
   <div class="content"><img src="<?php echo $themeurl ?>/images/eastbay3.jpg" alt="#" /></div> 

</li>
<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(62,$res) ;?></strong></a>
<p style="font-size:13px;">
<?php echo $this->getcontentByid(63,$res) ;?>
 </p><br /> 
  <div class="content"><img src="<?php echo $themeurl ?>/images/eastbay4.jpg" alt="#" /></div> 
</li>
<li> <a href="#" class="head"><strong><?php echo $this->getcontentByid(65,$res) ;?> </strong></a><br />
 <p style="font-size:13px;">
 <?php echo $this->getcontentByid(66,$res) ;?> 

 </p><br /> 
  <div class="content"><img src="<?php echo $themeurl ?>/images/eastbay5.jpg" alt="#" /></div> 
</li>
<li> <a href="#" class="head"><strong> <?php echo $this->getcontentByid(68,$res) ;?> </strong></a><br />
  <p style="font-size:13px;">
  <?php echo $this->getcontentByid(69,$res) ;?> 


 </p><br /> 

  <div class="content"><img src="<?php echo $themeurl ?>/images/eastbay6.jpg" alt="#" /></div> 

</li> 
 <li> <a href="#" class="head"><strong>  <?php echo $this->getcontentByid(71,$res) ;?>  </strong></a><br />
  <p style="font-size:13px;">

   <?php echo $this->getcontentByid(72,$res) ;?>  


 </p><br /> 

 <div class="content"><img src="<?php echo $themeurl ?>/images/shoothouse.jpg" alt="#" /></div> </li>

<li> <a href="#" class="head"><strong>   <?php echo $this->getcontentByid(74,$res) ;?></strong></a><br />
  <p style="font-size:13px;">
   <?php echo $this->getcontentByid(75,$res) ;?>

 </p><br /> 

 <div class="content"><img src="<?php echo $themeurl ?>/images/east100yardrange.jpg" alt="#" /></div>

</li>

<li> <a href="#" class="head"><strong>   <?php echo $this->getcontentByid(77,$res) ;?></strong></a><br />
  <p style="font-size:13px;">
   <?php echo $this->getcontentByid(78,$res) ;?>

 </p><br /> 

  <div class="content"><img src="<?php echo $themeurl ?>/images/eastplatform1.jpg" alt="#" /></div>

</li>
<li> <a href="#" class="head"><strong>   <?php echo $this->getcontentByid(80,$res) ;?></strong></a><br />
  <p style="font-size:13px;">
   <?php echo $this->getcontentByid(81,$res) ;?>




 </p><br /> 

 <!--<div class="content"><img src="<?php echo yii::app()->getBaseUrl(true) ?>/uploads/content_image/thumb/<?php echo $this->getcontentByid(82,$res) ;  ?>" alt="#" /></div> -->

</li> 
</ul>

</div>

<div class="clear"></div>
<p style="line-height:22px; padding:10px 0 5px 0;">
<span style="font-size:18px; color:#fd9b00;">   <?php echo $this->getcontentByid(90,$res) ;?> </span><br /><br />
    <?php echo $this->getcontentByid(91,$res) ;?> 
 <br />
<br />
<span style="font-size:18px; color:#fd9b00;"> <?php echo $this->getcontentByid(92,$res) ;?>          </span><br /><br />
  <?php echo $this->getcontentByid(93,$res) ;?>          
<br />
<br />


<span style="font-size:18px; color:#fd9b00;">  <?php echo $this->getcontentByid(94,$res) ;?>  </span><br /><br />
   <?php echo $this->getcontentByid(95,$res) ;?> 
<!--Cowtown Cowboy Action Shooting is a multi-faceted shooting sport in which contestants compete with firearms typical of those used in the taming of the Old West: single action revolvers, pistol caliber lever action rifles, and old time shotguns.  The shooting competition is staged in a unique, characterized, "Old West" style. It is a timed sport in which shooters compete for prestige on a course of different shooting stages.  Each scenario, as they are called, features an array of situations, many based on famous incidents or movies scenes, in which the shooters must test their mettle against steel targets.<br />
<br />


One of the unique aspects of Cowboy Action Shooting is the use of aliases and costuming. Each participant adopts a shooting alias appropriate to a character or profession of the late 19th century, a Hollywood western star, or an appropriate character from fiction. <br />
<br />


Their costume is then developed accordingly. Many event participants gain more enjoyment from the costuming aspect of our sport than from the shooting competition, itself. Regardless of an individual's area of interest, CAS events provide regular opportunities for fellowship and fun with like-minded folks and families.<br />
To join the Cowboy Shooters, contact us at <strong>barbwire@ccsa-az.us</strong>.


</p>

<p style="padding:25px 0 0 0; line-height:24px; font-size:13px;">
<!--<img src="images/fbi-img.png" alt="#"  class="fbi-img"/> -->
<!--<strong style="font-weight:normal; color:#fff; font-size:18px;">" The most important shooting range you never heard of "</strong><br />
<br />
       -->
<!--Question: where in the Valley have many of America’s most elite tactical operators been quietly training over the past few years? (No, not Ben Avery). Answer: Cowtown. Not exactly a household name in the shooting world, but a sampling of customers who use Cowtown  includes: US Army Delta Force, Special forces, Rangers and National Guard Units, Air force Special Operations, Marine Recon and Scout Snipers, US Coast Guard law enforcement and sniper units, US Navy SEAL teams, including Seal Team Six (yes, that one) several federal agencies, including the FBI, Pentagon Police, US Marshalls, DHS,  Department of Energy (nuclear security) and some “three letter�? agencies that avoid publicity. Police special units include Las Vegas Swat, LAPD, LA County Swat, Phoenix SAU, and several dozen others.<br />
So what does Cowtown have to offer that motivates these elite organizations to come from States across America for training?  To begin with, it’s close in still but out of sight, offers flexible day or night shooting schedules, looks a lot like Afghanistan and provides training support by veteran combat marksmen. <br />

The Cowtown Range is approximately 80 acres of hills and valleys located in Peoria just south of Lake Pleasant, adjacent to the Agua Fria River and surrounded by State land. The terrain is a mixture of washes, open spaces and hills which accommodates camouflage, tracking, K-9 exercises and advanced night vision exercises. None of these training missions are feasible on traditional flat shooting ranges.<br />

The property has a long history as a unique shooting facility.  In 1973, stuntman Ron Nix built Cowtown as a movie studio, general entertainment and shooting facility (mostly western style and fast draw competitions). Over the years, more than 200 movies were made here, including a few notable films such as Knight Rider 2010, Billy Jack and Dead Man with Johnny Depp.  The movie set buildings provide an environment much like an Afghan Village and the rough terrain permits �?real world�? challenges in the form of precision shooting at unusual angles and targeting in natural terrain. The range has been evaluated by GSA and approved as a federal shooting facility.
 In 1994 we acquired the property, in part as an outdoor resource for our Shooters World Range (founded in 1989) and as additional boat storage space for Lake Pleasant Marina which we developed in 1993. Throughout the 80’s and 90s and to the present,  Cowtown has hosted Movie and TV production, Western Shooting Clubs, Corporate, Shooting Competitions, Western Festivals and Tactical Firearms Training. <br />

Some of the best Cowboy Action Shooters in America have called Cowtown  home since the Cowtown Cowboy Shooters  held the First Arizona State Championship of Cowboy Shooting in 1981 (now members of SASS).<br />

The origins of tactical training begin approximately twelve years ago when Bill Graves (a former Shooter’s World instructor) formed GPS Defense to teach precision marksmanship and military snipers. Early customers included SEAL teams and FBI (HRT) units. <br />

The recognition of Cowtown as a significant contributor to Homeland Defense training is a significant point of pride for us and future training programs will include specialized Joint Operations Training for Disaster and Emergency Preparedness. <br />

Current regular users and trainers include the Cowtown Cowboy Shooters Assn, Cowtown Paintball, GPS Defense, and STA Tactical, Bullet Proof Security, Inc. (who provinces security for several public utility companies) and several periodic users, including local gun manufactures McMillan Rifle and POF.
Cowtown will continue to provide a safe and secure facility to accommodate a large diversity of shooting styles. Although we are not currently able to accommodate individual shooters (who are not members of an existing club or training group), all our training groups have programs that include civilian students, at all levels of experience. 
Ben Avery is 8 miles east of Cowtown and with over 250,000 shooters per year often gets pretty crowded.  While we do not aspire to compete with America’s premier shooting range (in fact Fish & Game executives have been supportive in every possible way) we are less busy and can offer more flexibility in scheduling and types of shooting uses. 
For further information, please contact Steve Simon or Paul Mueller at Cowtown Management______________.  <br /><br />



Richard Shaw is principal owner of Cowtown, a Co-founder of Shooters World, a lifetime member of NRA, past president of the Arizona Historical Society and an Arizona native.
<br/>                          -->
<!-- To schedule a day at the range, contact us at <strong>scheduling@azcowtown.com</strong>



</p>
      -->  

</div>


<div id="info2" style="display:none;" >
<img src="<?php echo yii::app()->getBaseUrl(true) ?>/uploads/content_image/thumb/<?php echo $this->getcontentByid(128,$res) ;  ?>" alt="#" style="width:100%; border:solid 1px #fff;"/>
</div>
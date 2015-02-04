<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

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
						speedOut : 20
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
				openSpeed  : 2,

				closeEffect : 'elastic',
				closeSpeed  : 2,

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
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />

<script type="text/javascript">
  		$(document).ready(function() {
		
		  $('#facebox').css('width','80%');
		
		});


</script>
<style type="text/css">
.contact-left ul{ margin:0; padding:0;}
.contact-left ul li{ list-style:none; font-size:14px; margin:0 0 10px 20px; background:url(images/tick.png) no-repeat left center; padding:5px 0 5px 40px;}
 
 .new-img-pat{ width:100%; margin:20px 0;}

.new-img-pat img{ display:block; margin:20px 0.8%; float:left; width:18%; border:solid 1px #fff;}

 @media screen and (max-width:884px){
 .new-img-pat img{ margin:10px auto; float:none; width:80%; border:solid 1px #fff;}
 
 
 }
 
 @media screen and (max-width:1024px) {
 .contact-left p{ text-align:center;}
  .contact-left{ padding-bottom:40px;}
  .contact-left ul li{  margin:0 0 10px 40px;}
 }
 
 .nwe-video-con{ width:450px; margin:0px auto; height:350px; margin:0 auto; overflow:hidden; border:solid 4px #fff; margin-top:20px;}
  @media screen and (max-width:1024px){
  .nwe-video-con{ width:80%; margin:0px auto; height:315px; margin:0 auto; overflow:hidden; border:solid 4px #fff; margin-top:20px;}
  }
  
    @media screen and (max-width:970px){
  .nwe-video-con{ width:80%; margin:0px auto; height:250px; margin:0 auto; overflow:hidden; border:solid 4px #fff; margin-top:20px;}
  }
  
    @media screen and (max-width:800px){
  .nwe-video-con{ width:80%; margin:0px auto; height:200px; margin:0 auto; overflow:hidden; border:solid 4px #fff; margin-top:20px;}
  }
  
  
    @media screen and (max-width:500px){
  .nwe-video-con{ width:80%; margin:0px auto; height:160px; margin:0 auto; overflow:hidden; border:solid 4px #fff; margin-top:20px;}
  }
  
   @media screen and (max-width:400px){
  .nwe-video-con{ width:80%; margin:0px auto; height:120px; margin:0 auto; overflow:hidden; border:solid 4px #fff; margin-top:20px;}
  }
</style>


   <?php $themeurl=yii::app()->theme->baseurl; ?> 
<!--banner-->

<div class="inner-banner"> <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(88,$res) ?>" alt="#" /> 
</div>
<!-- end banner-->
<div class="inner-body">
<p style="font-size:14px; color:#fd9b00; text-align:left; line-height:24px; font-family:Arial, Helvetica, sans-serif;">
<?php echo $this->GetcontentByid(114,$res) ?>  
</p>


<img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(115,$res) ?>" alt="#" style="display:block; margin:20px auto;" />

<p style="font-size:14px; color:#fff; text-align:left; line-height:24px; font-family:Arial, Helvetica, sans-serif;">

<?php echo $this->GetcontentByid(125,$res) ?> 

</p>



<div class="new-img-pat"> 

<a class="fancybox" href="/themes/cow/images/n1.jpg" data-fancybox-group="gallery"><img src="/themes/cow/images/n1.jpg"  alt="#"/></a>
<a class="fancybox" href="/themes/cow/images/n2.jpg" data-fancybox-group="gallery"><img src="/themes/cow/images/n2.jpg"  alt="#"/></a>
<a class="fancybox" href="/themes/cow/images/n3.jpg" data-fancybox-group="gallery"><img src="/themes/cow/images/n3.jpg"  alt="#"/></a>
<a class="fancybox" href="/themes/cow/images/n4.jpg" data-fancybox-group="gallery"><img src="/themes/cow/images/n4.jpg"  alt="#"/></a>
<a class="fancybox" href="/themes/cow/images/n5.jpg" data-fancybox-group="gallery"><img src="/themes/cow/images/n5.jpg"  alt="#"/></a>

<div class="clear"></div>

</div>

<p style="font-size:14px; color:#fff; text-align:left; line-height:24px; font-family:Arial, Helvetica, sans-serif; padding-bottom:10px;">
 <?php echo $this->GetcontentByid(126,$res) ?> 

</p>
  
  <div class="nwe-video-con">
<object width="100%" height="100%"><param name="movie" value="//www.youtube-nocookie.com/v/n8Jz0G0U5Ww?hl=en_US&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"><param name="wmode" value="transparent" /></param><embed src="//www.youtube-nocookie.com/v/n8Jz0G0U5Ww?hl=en_US&amp;version=3" type="application/x-shockwave-flash" width="100%" height="100%" allowscriptaccess="always" allowfullscreen="true"></embed></object>


</div>
<p style="font-size:14px; color:#fff; text-align:left; line-height:24px; font-family:Arial, Helvetica, sans-serif; padding-top:30px;">
<?php echo $this->GetcontentByid(116,$res) ?>	
</p>


</div>



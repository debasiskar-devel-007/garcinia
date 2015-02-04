<?php  $themeUrl = Yii::app()->theme->baseUrl;

$sess = Yii::app()->session['sess_user'];
  
    $cs = Yii::app()->getClientScript();
  
  $cs->registerCSSFile($themeUrl.'/css/jquery.simplyscroll.css');
 $cs->registerScriptFile($themeUrl.'/js/jquery.simplyscroll.js');



?> 

	




<script type="text/javascript">
$(document).ready(function() {
    $('.myParent').hover(function() {
        $(this).children('.hover_img').show();
    },
    function() {
        $(this).children('.hover_img').hide();
    });
	
	
	
	
});
</script>
    <script type="text/javascript">
    
    function show_comment()
    {
         //$.facebox('dsf dsf ds fdsf ds fds fdsfds f'); 
         $.facebox($('#showcomment').html()); 

    }
</script>
<script type="text/javascript">
(function($) {
	$(function() {
		$("#scroller").simplyScroll({
			customClass:'vert',
			orientation:'vertical',
			auto: true,
			manualMode: 'loop',
            frameRate: 95, //No of movements per second
            speed: 1, //No of pixels per frame
            pauseOnHover:true
		});
	});
})(jQuery);
</script>

<script>
    // You can also use "$(window).load(function() {"
    $(function () {

        // Slideshow 1
        $("#slider1").responsiveSlides({

            speed: 800
        });

        $('span.example1').hide();
        $('#moretext').toggle(function(){
            $('span.example1').show();
            $(this).html('&laquo;Close');
        },function(){
            $('span.example1').hide();
            $(this).html('More &raquo;');
        });



    });



</script>



<div class="experience-body">
  
   <div class="experience-wrapper">
      <!--top-contain-->
      <div class="top-contain" style="width: 98%;">
         <div class="logo">
         <a href="<?php echo yii::app()->getBaseUrl(true) ?>">
<img src="<?php echo $themeUrl;?>/images/logo.png"  alt="#" /></a></div>
          <div class="top-menu2">
         <ul id="menu" style="float: right;">
             <?php if(count($sess)){?>
          <li><a href="<?php echo yii::app()->getBaseUrl(true) ?>/profile">Profile</a>
              <?php } ?>
           <li><a href="<?php echo yii::app()->getBaseUrl(true) ?>/user/default/experience"> The Experience</a>
          <li><a href="#">Sports</a>
          
           <ul class="sub-menu">
            <?php $this->renderPartial('user.views.default.menu',array('model'=>new Sport())); ?>
             
           </ul>
          </li>
          <li>
              <?php if(count($sess) > 0){?>
                  <a href="<?php echo yii::app()->getBaseUrl(true) ?>/user/default/logout" style="color:#5a5b5d;"  onMouseOver="this.style.color='#f7931d'"
                     onMouseOut="this.style.color='#5a5b5d'">Logout</a>
              <?php }else{?>
                  <a href="<?php echo yii::app()->getBaseUrl(true) ?>/login" style="color:#5a5b5d;"  onMouseOver="this.style.color='#f7931d'"
                     onMouseOut="this.style.color='#5a5b5d'">Login</a>
              <?php }?>
          </li>
    <li>
   <a href="#">
<img src="<?php echo $themeUrl;?>/images/gear.png"  alt="#" /></a>
 </li>
          </ul>
              <?php if(count($sess) == 0){?>
          <div class="join-btn" style="margin-right: 0px;"><a href="<?php echo yii::app()->getBaseUrl(true) ?>/register">JOIN</a></div>
              <?php } ?>
          
          </div>
          
         <div class="clear"></div>
      </div>
      <!--top-contain end -->
      
       
       <div class="top-banner-contain" style="margin-bottom:0px;">

           <ul class="rslides" id="slider1">
           <?php foreach($res as $r)
           {     
    
                            ?>
               
               <li><img src="<?php echo yii::app()->getBaseUrl(true);?>/uploads/sports_image/banner/thumb/<? echo $r['image'] ?>"  alt="#" /></li>
              <?php
           }
?>
           </ul>


  <!-- <img src="<?php echo $themeUrl;?>/images/run_sport_hdr.jpg"  alt="#" />-->
         
         
         
          <div class="clear"></div>
       
       </div>
       
       <div class="people-div">PEOPLE</div>
       
       <div class="connect-div">CONNECT
       &nbsp;&nbsp;
       >&nbsp;&nbsp;
       TRACK 
       &nbsp;&nbsp;
       >&nbsp;&nbsp;
       EXPLORE </div>
      
      

    
    
    <div class="experience-leftcontain">
    
    
    <div class="sport-text-contain">
    <h2><?php
    echo $name;

        // echo $result['sport_name'];

    foreach($res1 as $result)
    {
?></h2>
    <?php echo $result['sport_desc'] ;?><a href="#" id="moretext">More&raquo;</a>
    <?php } ?>
    </div>
    
    
    
       <div class="mapcontain">
          <h2>Events</h2>
          
		  <style>
       #map-canvas {
            width: 100%;
            height: 320px;
            margin: 0px;
            padding: 0px
        }

       .sport-text-contain h2 a{
           font-family: 'veneerregular'!important;
           font-size: 29px;
           color: #f7941d;
           padding: 0;
           letter-spacing: 2px;
           font-weight: normal;
           float:none;
       }

       .sport-text-contain h2 a:hover{
           font-family: 'veneerregular'!important;
           font-size: 29px;
           color: #f7941d;
           padding: 0;
           letter-spacing: 2px;
           font-weight: normal;
       }


          </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
        // This example adds a marker to indicate the position
        // of Bondi Beach in Sydney, Australia
        var centerMap = new google.maps.LatLng(39.828175, -98.5795);
        function initialize() {
            var mapOptions = {
                zoom: 4,
                center: centerMap ,
                mapTypeId: google.maps.MapTypeId.HYBRID
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

            var image = '<?php echo Yii::app()->getBaseUrl(); ?>/images/small.jpg';
            var myLatLng = new google.maps.LatLng(39.828175, -98.5795);
            var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: "Run Like Hell!8661 So Sandy Parkway Sandy Utah US",
                icon: image
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>

    <div id="map-canvas"></div>
		  
         <!-- <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=latin+american+&amp;aq=&amp;sll=-37.71859,-45.966797&amp;sspn=41.583627,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Latin+America&amp;t=m&amp;z=2&amp;ll=-4.442038,-61.326854&amp;output=embed"></iframe>-->
       </div>
       
       <div class="tab-body">
       <?php
       
        $this->widget(
    'bootstrap.widgets.TbTabs',
    array(
    'type' => 'tabs',
    'tabs' => array(
    array(
    'label' => 'SOCIAL',
    'content' => '
<div class="event-body" style="border-bottom:none;">

<div style="text-align:center; line-height:80px;">No Activity Found</div> 

</div>

',
    'active' => true
    ),
    array('label' => 'EVENTS', 'content' => '
<div class="event-body" style="border-bottom:none;">

<div style="text-align:center; line-height:80px;">No Events Found !</div>

</div>
	 
	 '),
	 array('label' => 'GROUPS', 'content' => '
<div class="event-body" style="border-bottom:none;">

<div style="text-align:center; line-height:80px;">Please login to view your groups!</div>

</div>
	 '),
	  array('label' => 'STATS', 'content' => '
	  
<div class="event-body" style="border-bottom:none;">

<div style="text-align:center; line-height:80px;">There was no activity found</div>

</div>
	  
	  '),
 
    )
    )
    );
	?>
 </div>      
    
      <div class="tab-body">
      

        
     
      
      </div>
    
    </div>
     <div class="experience-rightcontain">



<ul id="scroller">
   <?php $this->renderPartial('sportsmanager.views.default.sportsidegal',array('model'=>new Sport(),'id'=>$id)); ?>
   
<!--    <li>   <img src="<?php echo $themeUrl;?>/assets/images/hqdefault.jpg"  alt="#" />
      <h2>HIKE</h2>
      <div class="more"><a href="#">MORE &raquo;</a> <div>
     </li>
    
       <li>   <img src="<?php echo $themeUrl;?>/assets/images/hqdefault.jpg"  alt="#" />
      <h2>HIKE</h2>
      <div class="more"><a href="#">MORE &raquo;</a> <div>
     </li>
     
     
       <li>   <img src="<?php echo $themeUrl;?>/assets/images/hqdefault.jpg"  alt="#" />
      <h2>HIKE</h2>
      <div class="more"><a href="#">MORE &raquo;</a> <div>
     </li>
     
     
     
       <li>   <img src="<?php echo $themeUrl;?>/assets/images/hqdefault.jpg"  alt="#" />
      <h2>HIKE</h2>
      <div class="more"><a href="#">MORE &raquo;</a> <div>
     </li>
     
     
      
        <li>   <img src="<?php echo $themeUrl;?>/assets/images/hqdefault.jpg"  alt="#" />
      <h2>HIKE</h2>
      <div class="more"><a href="#">MORE &raquo;</a> <div>
     </li>
     
     
      
       <li>   <img src="<?php echo $themeUrl;?>/assets/images/hqdefault.jpg"  alt="#" />
      <h2>HIKE</h2>
      <div class="more"><a href="#">MORE &raquo;</a> <div>
     </li>
     
      
       <li>   <img src="<?php echo $themeUrl;?>/assets/images/hqdefault.jpg"  alt="#" />
      <h2>HIKE</h2>
      <div class="more"><a href="#">MORE &raquo;</a> <div>
     </li>-->

</ul>



        <div class="link2" style="margin-bottom:0;"><a href="#">FORUMS</a></div>
        <div class="foroms-contain">
       <strong>  Deep Water Solo...</strong><br />
<a href="#">10/10/2013 (0 Replies)</a><br />

<strong>Demo Forum...</strong><br />
<a href="#">21/08/2013 (0 Replies)</a><br />
<strong>Best Spots...</strong><br />
<a href="#">06/09/2013 (0 Replies)</a> 
        </div>     
          
    
          
   
       <div class="adspace">
       <img src="<?php echo $themeUrl;?>/images/300X100.jpg"  alt="#"/>
        <img src="<?php echo $themeUrl;?>/assets/images/300X250.jpg"  alt="#"/> 
      </div>
      
      </div>
     <div class="clear"></div>
      
  
 <div class="clear"></div>
</div>


   <!-- Show video Popup //Start-->
<div id="showcomment" style="display:none">

   <div class="videoWrapper">
	<iframe class='sproutvideo-player' type='text/html' src="//www.youtube.com/embed/kkUZRGrF9Ig" frameborder="0" allowfullscreen ?rel=0' width='630' height='354' frameborder='0'> </iframe>
</div>             
      
    
</div>
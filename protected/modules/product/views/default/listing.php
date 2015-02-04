<script type="text/javascript">

$(document).ready(function(){
//alert(1);
$('.article').readmore({
speed: 75,
maxHeight: 25
});

});
</script>


<?php
    $baseUrl =  Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;
?>


<div class="home-banner">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">

           <?php
           $res=Banner::model()->findAll('isactive=1 AND pagename="home" ORDER BY priority asc');
           foreach($res as $r){


       ?>


               <img src="<?php echo yii::app()->getBaseUrl(true) ; ?>/uploads/banner/thumb/<?php echo $r['banner_img'] ?>" alt="">

<!--<img src="<?php /*echo $themeUrl*/?>/images/banner1.png" alt="">
<img src="<?php /*echo $themeUrl*/?>/images/banner2.png" alt="">
<img src="<?php /*echo $themeUrl*/?>/images/banner3.png" alt="">
<img src="<?php /*echo $themeUrl*/?>/images/banner4.png" alt="">
<img src="<?php /*echo $themeUrl*/?>/images/banner5.png" alt="">
<img src="<?php /*echo $themeUrl*/?>/images/banner6.png" alt="">
<img src="<?php /*echo $themeUrl*/?>/images/banner7.png" alt="">
<img src="<?php /*echo $themeUrl*/?>/images/banner8.png" alt="">-->


<?php

           }
?>




</div>
</div>
</div>

<div class="middle-img"><img src="<?php echo $themeUrl?>/images/middle-img.png" alt=""></div>

<div class="middle-body-wrapper">
<h2>Our Products</h2>

<!--<div class="productbody">
<div class="productrow">
<div class="pro-image">
<img src="<?php /*echo $themeUrl*/?>/images/pro1.png" alt="">
</div>

<strong>Lorem ipsum</strong><br />

Lorem ipsum dolor sit amet,<br />
consectetur adipiscing elit. Quisque lectus nunc.
<br />
<span>$0.00</span>

<div class="pro-btncon">
<a href="#" class="probtn1">Details</a>
<a href="#" class="probtn2">Buy Now</a>

<div class="clear"></div>
</div>

</div>
<div class="productrow">
<div class="pro-image">
<img src="<?php /*echo $themeUrl*/?>/images/pro1.png" alt="">
</div>

<strong>Lorem ipsum</strong><br />

Lorem ipsum dolor sit amet,<br />
consectetur adipiscing elit. Quisque lectus nunc.
<br />
<span>$0.00</span>

<div class="pro-btncon">
<a href="#" class="probtn1">Details</a>
<a href="#" class="probtn2">Buy Now</a>

<div class="clear"></div>
</div>

</div>

<div class="clear"></div>
</div>-->
<?php
$this->widget(
    'bootstrap.widgets.TbThumbnails',
    array(
        'dataProvider' => $model->frontList(),
        'template' => "{items}\n{pager}",
        'itemView' => 'application.modules.product.views.default.productList',
    )
);
?>

<div class="tab-contain">
<ul id="myTab" class="nav nav-tabs">
   <li class="active">
      <a href="#home" data-toggle="tab">
       Facebook
      </a>
   </li>
   <li><a href="#ios" data-toggle="tab">Twitter</a></li>
   
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="home">
     <div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-width="400" data-height="510" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
   </div>
   <div class="tab-pane fade" id="ios">
    <a class="twitter-timeline"  href="https://twitter.com/twitterapi"  data-widget-id="453873061431738368">Tweets by @twitterapi</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


   </div>
   
   
</div>
</div>

<div class=" videogallery">

    <div class="video-heding">Video Gallery</div>

  

   <div id="bigvideo"> <iframe  src="//www.youtube.com/embed/UrNSSYd1BEA?list=UUir4Q4qpp0YgWQGxenHvB2w" frameborder="0" allowfullscreen></iframe></div>

    

    <ul id="scroller">

    <?php
    $resvid=Video::model()->findAll('isactive=1');

    //if($v['type']==1){
    foreach($resvid as $v){
        if($v['type']==1){
    ?>

    <li><img src="http://img.youtube.com/vi/<?php echo $v['name']   ?>/2.jpg" videoid="<?php echo $v['name'] ?>" typevid="<?php echo $v['type'] ?>"  alt="Firehouse" class="thum-pic"/></li>

        <?php
    }

    else
    {
        ?>
     <li><img src="<?php echo $themeUrl ?>/images/download.jpg" videoid="<?php echo $v['name'] ?>" typevid="<?php echo $v['type'] ?>"   alt="Firehouse" class="thum-pic"/></li>


   <?php }



    }

        ?>


  

        

</ul>


   </div>
   
   <div class="clear"></div>

<div class="testimonials-body">
  <h4>Testimonials</h4>

    <?php
    $resblog=Blog::model()->findAll('pr_status=1 ORDER BY priority');
    foreach($resblog as $b){





    ?>
  
  <div class="testimonials-row">
  
  <div class="imgpart"><img src="<?php echo yii::app()->getBaseUrl(true)?>/uploads/proimage/thumb/<?php echo $b['user_image'] ?>" alt=""></div>
  
  <div class="text-div">
  <h5><?php echo $b['pr_date']  ?> | Posted By  "<?php  echo $b['postby'] ?>" </h5>
      <div class="article"><?php echo  $b['pr_desc']; ?></div>
  <!--<a href="<?php /*echo $baseUrl */?>/blog/default/details/id/<?/* echo $b['id'] */?>">View More</a>-->
  
  </div>
  
  <div class="clear"></div>
  </div>

    <?php
    }

    ?>
<!--  <div class="testimonials-row">

  <div class="imgpart"><img src="<?php /*echo $themeUrl*/?>/images/demo.png" alt=""></div>

  <div class="text-div">
  <h5>Monday, December 30, 2013 | Posted By  "Lorem Ipsum" </h5>

  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lectus nunc, ultrices eget lacinia non, interdum luctus massa. Nam vel metus augue. Vivamus molestie porta gravida. Vestibulum pharetra molestie ipsum, ac ultrices ipsum lacinia eget. Aliquam vitae viverra lectus, sed sagittis augue. Fusce blandit ipsum non arcu lacinia accumsan. Sed sodales nulla quis odio cursus volutpat. Ut tempus dui eget facilisis elementum. </p>

  <a href="#">View More</a>

  </div>

  <div class="clear"></div>
  </div>
  <div class="testimonials-row">

  <div class="imgpart"><img src="<?php /*echo $themeUrl*/?>/images/demo.png" alt=""></div>

  <div class="text-div">
  <h5>Monday, December 30, 2013 | Posted By  "Lorem Ipsum" </h5>

  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lectus nunc, ultrices eget lacinia non, interdum luctus massa. Nam vel metus augue. Vivamus molestie porta gravida. Vestibulum pharetra molestie ipsum, ac ultrices ipsum lacinia eget. Aliquam vitae viverra lectus, sed sagittis augue. Fusce blandit ipsum non arcu lacinia accumsan. Sed sodales nulla quis odio cursus volutpat. Ut tempus dui eget facilisis elementum. </p>

  <a href="#">View More</a>

  </div>

  <div class="clear"></div>
  </div>
  <div class="testimonials-row">
  
  <div class="imgpart"><img src="<?php /*echo $themeUrl*/?>/images/demo.png" alt=""></div>
  
  <div class="text-div">
  <h5>Monday, December 30, 2013 | Posted By  "Lorem Ipsum" </h5>
  
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lectus nunc, ultrices eget lacinia non, interdum luctus massa. Nam vel metus augue. Vivamus molestie porta gravida. Vestibulum pharetra molestie ipsum, ac ultrices ipsum lacinia eget. Aliquam vitae viverra lectus, sed sagittis augue. Fusce blandit ipsum non arcu lacinia accumsan. Sed sodales nulla quis odio cursus volutpat. Ut tempus dui eget facilisis elementum. </p>
  
  <a href="#">View More</a>
  
  </div>
  
  <div class="clear"></div>
  </div>-->
  
  
</div>


</div>



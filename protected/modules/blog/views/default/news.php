<?php
    $baseUrl =  Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;
    foreach($model as $r)
    {
?>

<script>
    $(document).ready(function(){
        var windowWidth = $(window).width(); 
        if(windowWidth <1024){
            var a= parseInt($("#main-text").height());
            $("#about-wrapper").css("margin-top", (parseInt(a)+20)+"px");
        }

    });
</script>

<div class="main-wrapper">
<div class="inner-wrapper">
                                                                                                                                                   
<div class="text" style="line-height: 22px;">
<div class="nleft-img"> <img src="<?php echo $baseUrl;?>/uploads/proimage/thumb/<? echo $r['user_image']; ?>" style="padding-right: 15px;" alt="#" /></div>   
<strong style="font-size: 14px; color: #1A5F88;"><?php echo $r['postby'] ?></strong><br/><br />
<strong style="font-size: 14px; color: #1A5F88;"><?php echo $r['pr_title'] ?></strong><br/> 
 <?php
    echo $r['pr_desc']
?>
            <div style="float:right"> <span class='st_sharethis_large' displayText='ShareThis'></span>
                <span class='st_facebook_large' displayText='Facebook'></span>
                <span class='st_twitter_large' displayText='Tweet'></span>
                <span class='st_linkedin_large' displayText='LinkedIn'></span>
                <span class='st_pinterest_large' displayText='Pinterest'></span>
                <span class='st_email_large' displayText='Email'></span>
            </div>


</div>
  </div>           
  </div>
<?php 
    }
?>
   <?php $themeurl=yii::app()->theme->baseurl;	
?>   
<style type="text/css">
.contact-left ul{ margin:0; padding:0;}
.contact-left ul li{ list-style:none; font-size:14px; margin:0 0 10px 20px; background:url(/images/tick.png) no-repeat left center; padding:5px 0 5px 40px;}
 @media screen and (max-width:1024px) {
 .contact-left p{ text-align:center;}
  .contact-left{ padding-bottom:40px;}
  .contact-left ul li{  margin:0 0 10px 40px;}
 }
</style>
<script type="text/javascript">

    $(document).ready(function(){


        var flag = '<?php echo @Yii::app()->session['contactsubmitvar']; ?>';
        //alert(flag);
        if(flag == 1)
            {

           bootbox.dialog("<div style=color:#000000>Thank You! We will Contact You Soon.</div>");
           // bootbox.dialog("Hello world!"); 
            $.get(base_url+'/ContactusManager/default/resetsession',function(res){


            });
        }


    });

</script>

<!--banner-->

<div class="inner-banner"> <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(89,$res) ?>" alt="#" /> 
</div>
<!-- end banner-->
<div class="inner-body">
        
<p style="font-size:12px; line-height:22px;"><?php echo $this->GetcontentByid(117,$res) ?></p>


<div class="image-contain">
 <ul>
 
 <li><img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(118,$res) ?>" alt="#" /></li>
 <li><img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(119,$res) ?>" alt="#" /></li>
 <li style="margin-right:0;"><img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(120,$res) ?>" alt="#" /> </li>
 </ul>

<div class="clear"></div>
</div>

  <?php echo $this->GetcontentByid(121,$res) ?>



<div class="contact-left" style=" margin-top:20px;">
  <?php echo $this->GetcontentByid(122,$res) ?>   
</div>


<div class="contact-right" style=" margin-top:20px;">

<strong style="font-weight:normal; font-size:18px; color:#fff; padding-bottom:20px; display:block;">Contact us to schedule an event!</strong>
 <?php $this->renderPartial('ContactusManager.views.default.contact',array('model'=>new Contact(),'pagename'=>2)); ?>     
 
 

</div>



<div class="clear"></div>







</div>



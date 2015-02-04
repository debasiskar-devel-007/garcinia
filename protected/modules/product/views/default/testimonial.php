<?php
    $baseUrl =  Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;
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

<div class="text">

<h1 style="padding-bottom: 0px; color: #1A5F88;">Dr. Edward Zimmerman</h1><br/>
 <img src="<?php echo $themeUrl;?>/images/edward.png"  alt="#" style="float: left; border: solid 4px #ddd; margin: 0 20px 20px 0;" />
Edward M. Zimmerman, MD, graduated with honors in Biology from The
Johns Hopkins University and has a Masters in Physiology from Georgetown
University, receiving his medical degree from The George Washington University
School of Medicine and Health Sciences. His three-year residency was completed
in Family Medicine in Beaver, Pennsylvania, with an emphasis on surgical
procedures, emergency room and urgent care. As faculty of that residency, he
introduced the first outpatient, CO2 laser to Western PA.<br/><br/>


For over a decade Dr. Zimmerman has served the cosmetic needs of the people
of Las Vegas, utilizing the latest technologies available in cosmetic procedures.
Currently a faculty member at Touro University School of Osteopathic Medicine
and the National Procedures Institute. A sought after consultant in the aesthetic
industry and well known national and international lecturer, hosting hundreds of
physicians for preceptorships in his state of the art office. He is a life-long
student, teacher and innovator with a passion for people and Cosmetic Surgery.<br/><br/><br/>
<br/>
<h1 style="padding-bottom: 0px; color: #1A5F88;">Professional Affiliations:</h1>
<ol>
<li> American Society of Laser Medicine and Surgery</li>
<li> American Society of Cosmetic Laser Surgery</li>
<li> American and European Academies of Cosmetic Surgery</li>
<li> American College of Phlebology.</li>


</ol><br/>
<h1 style="padding-bottom: 0px; color: #1A5F88;">
Accomplishments:</h1>

<ol>
<li> Award for Academic Excellence in Cosmetic Surgery Education from the
American Academy of Cosmetic Surgery.</li>
<li> Diplomate of, and currently serving as, the President of the American Board of
Laser Surgery</li>
<li> "Best of Las Vegas" award for Cosmetic Surgery for 2009</li>
<li> Selected as one of America's Top Surgeons-2010 by the Consumer's Research
Council of America
Elected as Lifetime member of the Cambridge Who's Who Registry.</li>

</ol>

<img src="<?php echo $themeUrl;?>/images/logo.png"  alt="#" style="margin: 5px auto; display: block;" />

 




</div>
  </div>           
  </div>

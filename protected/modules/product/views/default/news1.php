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

<div class="text" style="line-height: 22px;">
<strong style="font-size: 14px; color: #1A5F88;">BB-XT55 FORMULATIONS</strong><br/>
<span style="font-size: 11px;">PREVENTATIVE MEDICINE ----- GO BEYOND ----- WITH AN ULTIMATE SHIELD</span><br/>
<strong style="color: #1A5F88;">[City]- Valescere Cream,-</strong> A COMBINATION OF BB-XT55 INFUSED PRODUCTS AIDS YOUR SYSTEM IN DRAMATIC REDUCTION OR ELLIMINATION OF IMPURITIES THAT ARE POURING THROUGH OUR BODIES ON A DAILY BASIS. 

<br/><br/>
These incredible combination of products were developed in tandem with one focus in mind. To create one system as the ultimate foundation aimed at assisting us to maintain good health. This is accomplished by protecting our bodies from electro magnetic fields and assisting in the elimination of impurities such as Bacteria L's Bacteria Rod's, Lactic Acids and many other forms of impurities which damage our bodies. 
<br/><br/>


Modern science and x number of astounded medical practitioners are backing up this system of ultimate health.  Get what you need now.  Be protected. Put on the Ultimate Shield.  Here is what one doctor has to say about these products:


<img src="<?php echo $themeUrl;?>/images/logo.png"  alt="#" style="margin: 5px auto; display: block;" />
</div>
  </div>           
  </div>

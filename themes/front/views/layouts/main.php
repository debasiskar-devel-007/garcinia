   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?php echo   $this->pageTitle. ' | '.Yii::app()->params['site_url'];  ?></title>
    <link rel="icon" href="<?php echo Yii::app()->getBaseUrl(true) ?>/ficon.png" type="image/x-icon">

 


    <?php

        $themeUrl = Yii::app()->theme->baseUrl;

        $cs = Yii::app()->getClientScript();

       // $cs->registerCSSFile($themeUrl.'/css/bootstrap.min.css');
        $cs->registerCSSFile($themeUrl.'/css/style.css');
		$cs->registerCSSFile($themeUrl.'/css/media.css');
		$cs->registerCSSFile($themeUrl.'/css/facebox.css');
		$cs->registerCSSFile($themeUrl.'/css/jquery-ui.css');
		//$cs->registerScriptFile($themeUrl.'/js/facebox.js',CClientScript::POS_HEAD);
		
		$cs->registerScriptFile($themeUrl.'/js/jquery.screwdefaultbuttonsV2.js',CClientScript::POS_HEAD);
		//$cs->registerScriptFile($themeUrl.'/js/facebox.js',CClientScript::POS_HEAD);
    ?>


    <style>
        @font-face {
            font-family: MyriadProBold;
            src: url("<?php echo $themeUrl;?>/font/MyriadPro-Bold.otf");
        }

        @font-face {
            font-family: MyriadProRegular;
            src: url("<?php echo $themeUrl;?>/font/MyriadPro-Regular.otf");
        }



    </style>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-58395043-1', 'auto');
        ga('send', 'pageview');

    </script>

    <script type="text/javascript">

       theme_url = "<?php echo $themeUrl;?>";
       base_url = "<?php echo Yii::app()->getBaseUrl(true);?>";
       asset_url = "<?php echo $this->module->getAssetsUrl();?>";
       var actionid = '<?php echo Yii::app()->controller->action->id; ?>';
       var controllerid = '<?php echo Yii::app()->controller->id; ?>';

       function scheduled_terms()
  {
  $.facebox($('#termpopup').html());
      if($(window).width()<700)
      {
          $("#facebox").css('left','7%');
          //alert(9);

      }

      else
      {
          $("#facebox").css('left','18%');
          //alert(7);
      }
  $("#facebox .close").css('left','88%');
  }

function scheduled_ppolicy()
  {
      //alert($(window).width());


  $.facebox($('#policypopup').html());
   if($(window).width()<700)
   {
       $("#facebox").css('left','7%');
       //alert(9);

   }

    else
   {
       $("#facebox").css('left','18%');
       //alert(7);
   }

  $("#facebox .close").css('left','88%');
  }



       function ship_terms()
       {
           //alert($(window).width());


           $.facebox($('#shippopup').html());
           if($(window).width()<700)
           {
               $("#facebox").css('left','7%');
               //alert(9);

           }

           else
           {
               $("#facebox").css('left','18%');
               //alert(7);
           }

           $("#facebox .close").css('left','88%');
       }

</script>


<script type="text/javascript">
		$(function(){
		
			
			$('.autoship:checkbox').screwDefaultButtons({
				image: 'url("<?php echo $themeUrl;?>/images/checkboxSmall.jpg")',
				width: 43,
				height: 42
			});

			
		
		});
	</script>
<!--    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-54426434-1', 'auto');
        ga('send', 'pageview');

    </script>-->
</head>

<body>
  <?php $arr= Yii::app()->session['sess_user'];
    if(count(@$arr['role']))
    {
        foreach($arr['role'] as $res)
        {
            if($res==1 || $res == 12) 
            {   
            ?>
            <div class="admin-link-main"><div class="admin-link"><a href="<?php echo yii::app()->getBaseUrl(true) ?>/user/admin/dashboard">ADMIN</a></div>
            <div class="clear"></div>
            </div>
            <?php } } }?>



  
 <?php echo $content; ?>
 



 <?php require_once('footer.php'); ?>

  <div style="display: none" id="info1">

      <div style="position:relative;">
          <img src="<?php echo yii::app()->getBaseUrl(true);?>/images/home-popup.png" alt="#" style="width:100%" />
          <div>

          </div>



</body>
</html>










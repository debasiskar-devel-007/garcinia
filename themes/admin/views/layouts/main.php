<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?php //echo $this->pageTitle." || ".Yii::app()->params['site_url']." - Admin Console"; ?>
    <title><?php echo Yii::app()->params['site_url']." - Admin Console"; ?></title> 

<script type="text/javascript">

    base_url = "<?php echo Yii::app()->getBaseUrl(true);?>";
    asset_url = "<?php echo @$this->module->getAssetsUrl();?>";
    theme_url = "<?php echo  Yii::app()->theme->baseUrl;?>";
     var actionid = '<?php echo Yii::app()->controller->action->id; ?>';
    var controllerid = '<?php echo Yii::app()->controller->id; ?>';

    var product_imag_size = <?php echo json_encode(Yii::app()->params['product_image_size']);?>;
        
    $(function()
    {
        MakeStartEndPicker("#txtInp1", "#txtInp2");
        MakeStartEndPicker("#txtInp3", "#txtInp4");
         // collapse purpose
        jQuery("#Collapse").toggle(function(){
            jQuery("#bg_wrapper").addClass('bg_wrapper_collapse', 500);
            jQuery("#content").addClass('content_collapse', 500);
            jQuery("#sidebar").addClass('sidebar_collapse');
            jQuery(this).children('img').attr('src', 'icons/collapse-left.png');
            jQuery(this).children('img').css({margin:'0 19px'});
            jQuery(this).attr('title', 'Expand Left Menu');
        }, function(){
            jQuery("#bg_wrapper").removeClass('bg_wrapper_collapse');
            jQuery("#content").removeClass('content_collapse');
            jQuery("#sidebar").removeClass('sidebar_collapse');
            jQuery(this).children('img').attr('src', 'icons/collapse-right.png');
            jQuery(this).children('img').css({margin:'0px 0px 0 0px'});
            jQuery(this).attr('title', 'Collapse Left Menu');
        });
        //collapse purpose end
    });
    
    function MakeStartEndPicker(startElement, endElement)
    {
        $(startElement).datepicker({
            minDate: 0, 
            dateFormat: 'd M yy', 
            buttonText: 'Klik om een datum te kiezen', 
            showOn: 'both', buttonImage: 'icon_calender.gif',
            buttonImageOnly: true, showAnim: 'slideDown',
            duration: 0 ,
            beforeShow: function(input)
            {
            var date2 =  $(endElement).datepicker('getDate');
            if(date2 != undefined) return { maxDate: date2 };
            }
        });
    
        $(endElement).datepicker({
            minDate: 0, 
            dateFormat: 'd M yy', 
            showOn: 'both', buttonImage: 'icon_calender.gif',
            buttonImageOnly: true, showAnim: 'slideDown',
            duration: 0 ,
            beforeShow: function(input)
            {
            var date1 =  $(startElement).datepicker('getDate');
            if(date1 != undefined) return { minDate: date1 };
            }
        });
    }
    
    </script>
    <script type="text/javascript">
    $(function() {
        $('#design-gallery a').lightBox();
    });
    </script>
    
<script type="text/javascript">
  $(document).ready(function(){
  setTimeout("manage_nav()",500);
  

});
 function manage_nav()
 {
  var x=$("#dashbor").offset();
  $("#menu > li").each(function (i) {
      // alert("Top: " + x.top );
       var y= $(this).offset();
      // alert("top="+y.top+"left="+y.left);
      // alert($(this).text());
      if(y.top>x.top) 
      {
          $('#more').append('<li>'+$(this).html()+'</li>');
        $(this).remove();
      }
    
   
      });
      
      var morehtml=$('#more').html();
      $('#menu').append("<li> <a href='#'>More</a><ul style=visibility:hidden;display:block;id=more>"+morehtml+"</ul></li>");
      $('#more').parent().remove();
      mainmenu();
      
 
 }

</script>

<script type="text/javascript">
  $(document).ready(function(){
  
  
  
   var windowHeight = $(window).height();
 var headheight = $('#head').height();

var fooheight = $('.footerHolder').height();

 var mainheight = parseInt(windowHeight-headheight);
 
  var maincontain = parseInt(mainheight-fooheight);

  $('#main').css('min-height',maincontain)










var coinheight = $('#main').height();

 var divheight = parseInt(coinheight+80);
  
  $('#sidebar').css('height',divheight)
  
  
  
  



});

</script>






</head>
<?php
    $baseUrl = Yii::app()->theme->baseUrl;
    $base=yii::app()->baseurl;

    $cs = Yii::app()->getClientScript();

    
    $cs->registerCSSFile($baseUrl.'/css/style.css');
    $cs->registerCSSFile($baseUrl.'/css/media.css');
    $cs->registerCSSFile($baseUrl.'/css/layout.css');
    $cs->registerCSSFile($baseUrl.'/css/menu.css');
    $cs->registerCSSFile($baseUrl.'/css/jquery.lightbox-0.5.css');
   
    $cs->registerCSSFile($baseUrl.'/css/jquery-ui.css');
    $cs->registerCSSFile($baseUrl.'/css/jquery.wysiwyg.css');
	$cs->registerCSSFile($baseUrl.'/css/colpick.css');
    

    
    
    $cs->registerScriptFile($baseUrl.'/js/jquery-ui.js',CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl.'/js/jquery.wysiwyg.js',CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl.'/js/custom.js',CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl.'/js/jquery.lightbox-0.5.js',CClientScript::POS_HEAD);
	$cs->registerScriptFile($baseUrl.'/js/menu.js',CClientScript::POS_HEAD);

    $cs->registerScriptFile($base.'/common/js/common.js',CClientScript::POS_HEAD);



?>
 <?php $themeUrl = Yii::app()->theme->baseUrl; ?>  

 <?php require_once('top.tpl.php'); ?>
 <div id="bg_wrapper">
 
 <?php require_once('left.php'); ?>  
 
   <?php echo $content; ?>
    <div class="clear"></div>  
         
    <?php require_once('footer.tpl.php'); ?>  
  
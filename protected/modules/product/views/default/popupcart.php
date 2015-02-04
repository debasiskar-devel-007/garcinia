<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>popup</title>
    <script type="text/javascript" src="<?php echo $base;?>/themes/front/js/bootbox.min.js"></script>
    <script type="text/javascript" src="<?php echo $base;?>/themes/front/js/jquery-1.11.0.js"></script>



<script type="text/javascript">
    base_url = "<?php echo Yii::app()->getBaseUrl(true);?>";
    function offpopup(){
        //bootbox.hideAll()

       // alert(1);
        //window.onbeforeunload = null;
        //return '';
        $.post(base_url+'/product/default/setoffer',{val:1},function(res){

            setTimeout(function(){
         window.top.location.href = base_url+'/product/default/cart_page';
            },3000);
        });

    }
</script>



</head>


<body>



<div style="position:relative;">
<img src="<?php echo $base;?>/themes/front/images/home-popup.png" alt="#" style="width:100%" />
<a href="#" style="display:block; position:absolute;  width:28%; top:47%; left:37%;" onclick="offpopup()"><img src="<?php echo $base;?>/themes/front/images/home-apply-btn.png" id="popuphome" alt="#" style="width:100%" /></a>

<div>
</body>
</html>

<?php 

    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/jquery.Jcrop.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/jquery.color.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/facebox.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/jquery.uploadify.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/jquery.tinyscrollbar.min.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/fp.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/css/jquery.Jcrop.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/css/facebox.css'));  
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/css/uploadify.css'));  
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/css/website.css'));  
?>
<div style="height:270px;width:480px;margin-bottom:35px;">
    <script>
        $(function(){
            flowplayer("player_<?php echo $vid_name ?>", "<?php echo  Yii::app()->request->getBaseUrl(true);?>/swf/flowplayer.commercial-3.2.15.swf", {
                plugins: {
                    controls: {
                        fullscreen: false,
                        //       height: 30,
                        autoHide: false
                    }
                },
                clip: {          
                    autoPlay: false,
                    autoBuffering: false
                }
            });   
        });
    </script>
    <input type="hidden" id="" name="m_vid_type[]" value="Desktop">
    <input type="hidden" id="vid" name="press_vid[]" value='<?php echo $vid_name; ?>.flv'>
    <a id="player_<?php echo $vid_name ?>" style="display:block;width:480px;height:270px;" href="<?php echo Yii::app()->request->getBaseUrl(true);?>/uploads/blog_video/converted/<?php echo $vid_name; ?>.flv"></a>
    <img class="closeImg2" src="<?php echo  Yii::app()->request->getBaseUrl(true);?>/images/closebtn.png" title="Close Image" alt="ss" style="margin-bottom:180px;" onclick="removeVideo(this)">
</div>
<br />

 <?php

  //  Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('usermanager').'/skin/js/jquery.uploadify.min.js'), CClientScript::POS_HEAD);
    //Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('usermanager').'/skin/css/uploadify.css'));

    //Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('usermanager').'/skin/js/jquery.Jcrop.js'), CClientScript::POS_HEAD);
   // Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('usermanager').'/skin/js/facebox.js'), CClientScript::POS_HEAD);
    //Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('usermanager').'/skin/css/jquery.Jcrop.css'));
    //Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('usermanager').'/skin/css/facebox.css'));


?>
<?php
    $base=yii::app()->baseurl;
    
   
?>

<!--<style type="text/css">
    #SWFUpload_0{

    }
</style>
<script type="text/javascript">

    $(function()
    {
        var profileimage='<?php // echo $model->categoryimage ?>'
        // setTimeout(
        //        function(){
        //            alert($("#file_upload-button").height()+' '+$("#file_upload-button").width());
        //        },100);
        $( "#file_upload-button").click(function(){
            alert('bhobananda');
        });
        if(profileimage)
            {
            $("#show_thumb").children('div.jt').after("<div class=upload_thumb style=margin:0 auto;><input type='hidden' value='"+profileimage+"' name='img_name_val[]' id='img_name_val'><a href='javascript:void(0)'><img name="+profileimage+" src='"+base_url+"/uploads/category/thumb/"+profileimage+"' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><img class='closeImg2' src='"+base_url+"/images/closebtn.png' title='Close Image' alt='ss' style='margin:-140px 0 0 -20px;' onclick='removeImage(this)'><br /><input type='button' style='width:80px; border:1px solid #D88C00; box-shadow:0 0 3px #BCBCBC; text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 15px -2px; border:none; font: italic bold 18px/35px Arial,Helvetica,sans-serif; border:none; color:#fff; background:#69A905; height: 35px; border-radius:25px; padding: 0 0 0; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image('"+profileimage+"') value='Crop'></div><div class='clear:both'></div>");

        }


        $(document.getElementById('file_upload-button')).ready(function() {
            // do stuff when div is ready
            //   var height=$("#file_upload-button").height();
            //   var width=$("#file_upload-button").width();
            var file_div_off=$("#file_upload-button").offset();
            var left=(parseInt(file_div_off.left));
            // var top=(parseInt(file_div_off.top));
            //  var left1=$("#SWFUpload_0").offset().left;
            $("#SWFUpload_0").offset({'left':left});
            //  alert(left1+' '+left);
            //  $("#SWFUpload_0").css("top",top).css('left',left);
        });



    });

    function removeImage(e){
        $(e).parent('div').remove();
    }

    var base_url = '<?php echo Yii::app()->request->baseUrl;?>';
    <?php $timestamp = time();?>
    var aspect_ratio=parseFloat(1/1);             
    $(function() {



        //  $('#file_upload').uploadify({ 
        //            'formData'     : {
        //                'multi':false,
        //                'timestamp' : '<?php echo $timestamp;?>',
        //                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
        //            },
        //            'width': '121',
        //            'height': '32',
        //            'wmode': 'transparent',
        //            'swf'      :'<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/uploadify.swf',
        //            'uploader' : '<?php  echo Yii::app()->request->getBaseUrl(true); ?>/image/default/Uploadify_process/fold_name/user_image/aspect_ratio/'+aspect_ratio,
        //            'Default Value':'BROWES',
        //            'onUploadStart' : function(file) {
        //                $("#file_upload-queue").css('margin','40px 0 0 -50px'); 
        //                $.facebox('File Uploading Please Wait...<br/><img src="'+base_url+'/images/progress.gif">');   
        //  alert('Starting to upload ' + file.name);
        //            },
        // Some options
        //            'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
        //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

        //            },

        //            'onUploadSuccess' : function(file, data, response) {
        // alert('The file was saved to: ' + data);
        //                $(document).trigger('close.facebox');
        //                 
        //  console.log(file);    
        //$.facebox('Image processing Please Wait...<br/><img src="'+base_url+'/images/progress.gif">'); 
        //                alert(data+' '+data+' '+response);    
        //                console.log(response); 
        // $.post('<?php //echo Yii::app()->request->getBaseUrl(true); ?>/image/default/resize_cropImageprev/fold_name/user_image/aspect_ratio/'+aspect_ratio,
        //                {'image':data},
        //                function(res)
        //                {
        //                    alert(res);
        //                    $("#show_thumb").children('div.jt').after("<div class=upload_thumb><input type='hidden' value='"+data+"' name='img_name_val[]' id='img_name_val'><a href='javascript:void(0)'><img name="+data+" src='"+base_url+"/uploads/user_image/thumb/"+data+"' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><img class='closeImg2' src='"+base_url+"/images/closebtn.png' title='Close Image' alt='ss' style='margin:-140px 0 0 -20px;' onclick='removeImage(this)'><br /><input type='button' style='width:80px; border:1px solid #D88C00; box-shadow:0 0 3px #BCBCBC; text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 15px -2px; border:none; font: italic bold 18px/35px Arial,Helvetica,sans-serif; border:none; color:#fff; background:#69A905; height: 35px; border-radius:25px; padding: 0 0 0; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image('"+data+"') value='Crop'></div><div class='clear:both'></div>");
        //                }
        //                );

        //            },
        //            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
        //                alert(errorCode+' '+errorMsg);
        //            } 


        //        });

        $('#file_upload').uploadify({ 
            'formData'     : {
                'multi':true,
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
            },
            'width': '121',                                        
            'height': '32',
            'wmode': 'transparent',
            'swf'      :'<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/uploadify.swf',
            'uploader' : '<?php  echo Yii::app()->request->getBaseUrl(true); ?>/catagorymanagement/admin/uploadify_process',
            'Default Value':'BROWES',
            'onUploadStart' : function(file) {
                $("#file_upload-queue").css('margin','40px 0 0 -50px'); 
                $.facebox('File Uploading Please Wait...<br /><img src="'+base_url+'/images/progress.gif">');   
                //  alert('Starting to upload ' + file.name);
            },
            // Some options
            'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
                //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

            },

            'onUploadSuccess' : function(file, data, response) {
                alert(file+' '+data+' '+response);
                // alert('The file was saved to: ' + data);
                $('#imgname').val(data);
                $(document).trigger('close.facebox');
                $.get(base_url+"/catagorymanagement/admin/Resizeimage/file_name/"+data+"/aspect_ratio/1",{},function(res){
                    $.post(base_url+"/catagorymanagement/admin/cropprocesspriv",{'image':data},function(res){
                        alert(res);
                        $("#show_thumb").children('div.jt').after("<div style='position:relative; width:150px;margin:0 auto;'><input type='hidden' value='"+data+"' name='img_name_val[]' id='img_name_val'><a href='javascript:void(0)'><img name="+data+" src='"+base_url+"/uploads/category/original/"+data+"' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><img class='closeImg2' src='"+base_url+"/images/closebtn.png' title='Close Image' alt='ss' style='position:absolute;right:-10px;' onclick='removeImage(this)'><br /><input type='button' style='width:80px; border:1px solid #D88C00; box-shadow:0 0 3px #BCBCBC; text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 15px -2px; border:none; font: italic bold 18px/35px Arial,Helvetica,sans-serif; border:none; color:#fff; background:#69A905; height: 35px; border-radius:25px; padding: 0 0 0; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image('"+data+"') value='Crop'></div><div class='clear:both'></div>"); 
                    }); 
                });



                //$.post('<?php echo Yii::app()->request->getBaseUrl(true); ?>/Pressrelease/default/resize_cropImageprev',
                // {'image':data},
                // function(res)
                // {
                //     $("#show_thumb").children('div.jt').after("<div><input type='hidden' value='"+data+"' name='img_name_val[]' id='img_name_val'><a href='javascript:void(0)'><img name="+data+" src='"+base_url+"/uploads/blog_image/temp/"+foldname+"/"+data+"' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><img class='closeImg2' src='"+base_url+"/images/closebtn.png' title='Close Image' alt='ss' style='margin:-140px 0 0 -20px;' onclick='removeImage(this)'><br /><input type='button' style='width:80px; border:1px solid #D88C00; box-shadow:0 0 3px #BCBCBC; text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 15px -2px; border:none; font: italic bold 18px/35px Arial,Helvetica,sans-serif; border:none; color:#fff; background:#FEAB07; height: 35px; border-radius:25px; padding: 0 0 0; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image('"+data+"') value='Crop'></div><div class='clear:both'></div>");
                // }
                // );
                //$("#img_name_val").val(data);

                //$("#show_thumb").slideDown();
            } 

            //'debug'    : true,
        });

       $("#file_upload-button").removeAttr('style').removeClass('uploadify-button').addClass('button-md'); 

    });

    function crop_image(img)
    {
        //alert(img); 
        var base_url="<?php echo Yii::app()->request->getBaseUrl(true); ?>"; 

        //     $("#showmodal_img").click();
        $("#myModal-img").modal('show');
        $("#myModal-img").children('div.modal-body').html('<img img_val='+img+' id=cur_image src="'+base_url+"/uploads/category/original/"+img+'">');
        //alert($("#myModal-img").children('div.modal-body').html());
        // $.facebox('<div id="showImgPop2" style="width:100%;height:100%;"><div class="modal-header"><h3>Crop Image</h3></div><br /><br /><div id="imagePortion"><img img_val='+img+' id=cur_image src="'+base_url+"/uploads/user_image/temp/"+foldname+"/"+img+'" style="height:100%;width:100%;"><input id="sub_image" type="button" value="YES" /></div><div class="model-footer"><input type="button" onclick="jQuery(document).trigger(\'close.facebox\')" class="login_btn" value="NO" /></div></div>');  
        setTimeout(function(){
            $('#cur_image').Jcrop({

                onSelect:    showCoords,
                //bgColor:     'black',
                //bgOpacity:   .4,
                boxWidth: 900,
                boxHeight:900,
                setSelect:   [ 100, 500, 150, 150 ],
                minSize:   [ 200, 200 ],
                //maxSize:   [ 130, 100 ]
                aspectRatio: 322 / 191

            });
        },500); 
    }


    function showCoords(c)
    {
        // variables can be accessed here as
        // c.x, c.y, c.x2, c.y2, c.w, c.h
        //alert(c.w+'++'+c.h);

        console.log(c);
        var img_name=$('#cur_image').attr('img_val');
        //alert(img_name);
        $('#sub_image').attr('onclick',"crop_process('"+img_name+"','"+c.x2+"','"+c.y2+"','"+c.x+"','"+c.y+"')");
    };

    function crop_process(image,x2,y2,x1,y1,w,h)
    {
        $.post('<?php echo Yii::app()->request->getBaseUrl(true); ?>/catagorymanagement/admin/resize_cropImage',
        {'image':image,'x2':x2,'y2':y2,'x1':x1,'y1':y1,'w':w,'h':h},
        function(res)
        {
            //var img_data = image.split('.');     
            //alert(res);        
            //  alert(res);
            //            $.each($("#show_thumb").children('a'),function(i){
            //                alert($("#show_thumb").children('a').children('img').attr("src")) ;
            //            });   
            $.each($("#show_thumb").children('div').children('a').children('img'),function(i){    
                if($(this).attr('name')==image){
                    $(this).attr("src","<?=Yii::app()->request->getBaseUrl(true);?>/uploads/category/thumb/"+image+"?"+Math.random()+"");
                }
            });
            jQuery(document).trigger('close.facebox')
        });
    } 


</script>-->
<div id="main">
    <div id="content">
<h2 id="pageTitle">Edit Category</h2>
<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'bootstrap.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
'enableClientValidation' =>true, 
)
); ?>




 <?php echo $form->textFieldRow(
$model,
'categoryname'
); ?>

 <?php echo $form->ckEditorRow(
$model,
'categorydesc',
array(
'options' => array(
'fullpage' => 'js:true',
'width' => '640',
'resize_maxWidth' => '640',
'resize_minWidth' => '320'
)
)
); ?>

<!--  <div class="input-box" style="margin-top:20px;" >
                    <label for="profile_pr_image" class="control-label required">Image</label>
                    <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                        <input id="file_upload" name="file_upload" type="file" multiple="false">      
                    </div>

                    <div id="show_thumb" style="margin: 0 auto;">
                        <div class="jt"></div>
                    </div>
                </div>-->
                <?php //echo $form->hiddenField($model,'categoryimage',array('id'=>'imgname','value'=>'')); ?>

<?php echo $form->dropDownListRow(
$model,
'parentcategoryid',$res
); ?>

<?php echo $form->toggleButtonRow($model, 'isactive'); ?>

<?php echo $form->toggleButtonRow($model, 'isfeatured'); ?>

<?php echo $form->textFieldRow(
$model,
'priority'
); ?>


 <?php $this->widget(
'bootstrap.widgets.TbButton',
array(
'buttonType' => 'submit',
'type' => 'primary',
'label' => 'Submit',
'htmlOptions' => array('class'=>'btn1'),
) 
); ?>
<?php 

$this->widget(
'bootstrap.widgets.TbButton',
array('buttonType' => 'link','url'=>$base.'/product/admin/category/listing', 'label' => 'Cancel')
); ?>

<?php
$this->endWidget(); ?>

<?php //$this->beginWidget(
    //'bootstrap.widgets.TbModal',
    //array('id' => 'myModal-img')
//); ?>
 
<!--    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>Image</h4>
    </div>
 
    <div class="modal-body">
        
    </div>
 
    <div class="modal-footer">
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'type' => 'primary',
                'label' => 'Crop',
                'id' =>'sub_image',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'label' => 'Close',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>-->
    
 
<?php //$this->endWidget(); ?>
</div>
    </div>


<script type="text/javascript">

    $(document).ready(function () {


        flowplayer("a.player", "<?php echo Yii::app()->request->baseUrl; ?>/swf/flowplayer.commercial-3.2.15.swf",{clip:{autoPlay:false}}); 
    }) 
</script> 

<script type="text/javascript">

    var fold_name="<?php echo date("dmY"); ?>";
    var foldname='<?php echo date('dmY'); ?>';

    <?php $timestamp = time();?>
    //   var base_url="<?php //echo Yii::app()->assetManager->publish(Yii::getPathOfAlias('BlogManagement')); ?>";
    var base_url="<?php echo Yii::app()->request->getBaseUrl(true); ?>"; 

    $(function() {

        var xx = '<?php echo $model->user_image; ?>';

        //alert(xx);
        $("#img_name").val(xx);
        $(".input-box").css("margin-bottom","25px");
        $(".input-box").css("display","block");

        $("#upImage1").hide();


        function fun()
        {
            alert($(this).val()); 
        }

        // alert(parseInt($(window).width()/2));
        // $('#example').tooltip(options)
        $("#file_upload-queue").css('margin','40px 0 0 -50px'); 
        // $("#horizontalForm div:nth-child(12)").css('margin','0 0 0 25px')
        $(".control-group").css('margin-bottom','0px');
        $(".jt").css('height','0px'); 
        $("#showPriv").click(function(){
            $.facebox($("#Privacycon").html()); 
            setTimeout("openscroll()", 2000); 
        });

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
            'uploader' : '<?php  echo Yii::app()->request->getBaseUrl(true); ?>/Blog/default/uploadify_process',
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
                //alert(file+' '+data+' '+response);
                // alert('The file was saved to: ' + data);
                $(document).trigger('close.facebox');
                var height=parseFloat(133);
                var width=240;
                //alert(aspectratio);
                //alert(8);
                $.post(base_url+"/Blog/default/Resizeimage/",{'filename':data,'width':width,'height':height},function(res){
                    //$.post(base_url+"/Blog/default/cropprocesspriv",{'image':data},function(res){
                    //alert(res);
                    bootbox.alert(res);
                    $("#show_thumb").children('div.jt').after("<div style='position:relative; width:150px;'><input type='hidden' value='"+data+"' name='img_name_val[]' id='img_name_val'><a href='javascript:void(0)'><img name="+data+" src='"+base_url+"/uploads/blog_image/thumb/"+data+"' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><img class='closeImg2' src='"+base_url+"/images/closebtn.png' title='Close Image' alt='ss' style='position:absolute;right:-10px;' onclick='removeImage(this)'><br /><input type='button' style='width:80px; border:1px solid #D88C00; box-shadow:0 0 3px #BCBCBC; text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 15px -2px; border:none; font: italic bold 18px/35px Arial,Helvetica,sans-serif; border:none; color:#fff; background:#284312; height: 35px; border-radius:25px; padding: 0 0 0; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image('"+data+"') value='Crop'></div><div class='clear:both'></div>"); 
                    //}); 
                });



                //$.post('<?php echo Yii::app()->request->getBaseUrl(true); ?>/Blog/default/resize_cropImageprev',
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


        $('#file_upload1').uploadify({ 
            'formData'     : {
                'multi':true,
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
            },
            'width': '121',
            'height': '32',
            'wmode': 'transparent',
            'swf'      :'<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/uploadify.swf',
            'uploader' : '<?php  echo Yii::app()->request->getBaseUrl(true); ?>/Blog/default/uploadify_process',
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
                //alert(file+' '+data+' '+response);
                // alert('The file was saved to: ' + data);
                $(document).trigger('close.facebox');
                $(document).trigger('close.facebox');
                var height=parseFloat(50);
                var width=45;
                //alert(aspectratio);
                //alert(8);
                $.post(base_url+"/Blog/default/Resizeimage1/",{'filename':data,'width':width,'height':height,'type':1},function(res){
                    //$.post(base_url+"/Blog/default/cropprocesspriv",{'image':data},function(res){
                    //alert(res);
                    bootbox.alert(res);
                    $(".author_image").remove(); 
                    $("#show_thumb2").children('div.jt').after("<div style='position:relative; width:150px;'><input type='hidden' value='"+data+"' name='img_name_val1' id='img_name_val'><a href='javascript:void(0)'><img name="+data+" src='"+base_url+"/uploads/blog_image/thumb/1_"+data+"' style='max-height:50px;max-width:50px;border:solid 1px #979797'></a><img class='closeImg2' src='"+base_url+"/images/closebtn.png' title='Close Image' alt='ss' style='position:absolute;right:-10px;' onclick='removeImage(this)'><br /><input type='button' style='width:80px; border:1px solid #D88C00; box-shadow:0 0 3px #BCBCBC; text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 15px -2px; border:none; font: italic bold 18px/35px Arial,Helvetica,sans-serif; border:none; color:#fff; background:#284312; height: 35px; border-radius:25px; padding: 0 0 0; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image_edit('"+data+"',1) value='Crop'></div><div class='clear:both'></div>"); 
                    //}); 
                });

                $.post(base_url+"/Blog/default/Resizeimage1/",{'filename':data,'width':124,'height':138,'type':2},function(res){                     $("#show_thumb3").children('div.jt').after("<div style='position:relative; width:150px;'><input type='hidden' value='"+data+"' name='img_name_val2' id='img_name_val2'><a href='javascript:void(0)'><img name="+data+" src='"+base_url+"/uploads/blog_image/thumb/2_"+data+"' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><img class='closeImg2' src='"+base_url+"/images/closebtn.png' title='Close Image' alt='ss' style='position:absolute;right:-10px;' onclick='removeImage(this)'><br /><input type='button' style='width:80px; border:1px solid #D88C00; box-shadow:0 0 3px #BCBCBC; text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 15px -2px; border:none; font: italic bold 18px/35px Arial,Helvetica,sans-serif; border:none; color:#fff; background:#284312; height: 35px; border-radius:25px; padding: 0 0 0; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image_edit1('"+data+"',2) value='Crop'></div><div class='clear:both'></div>"); 
                    //}); 
                });



                //$.post('<?php echo Yii::app()->request->getBaseUrl(true); ?>/Blog/default/resize_cropImageprev',
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

        $('#vid_upload').uploadify({ 
            'formData'     : {
                'multi':true,
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
            },
            'width': '121',
            'height': '32',
            'wmode': 'transparent',
            'swf'      :'<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/uploadify.swf',
            'uploader' : '<?php  echo Yii::app()->request->getBaseUrl(true); ?>/Blog/default/uploadvid',
            'Default Value':'BROWES',
            'onUploadStart' : function(file) {
                $("#vid_upload-queue").css('margin','40px 0 0 -50px'); 
                $.facebox('File Uploading Please Wait...<br /><img src="'+base_url+'/images/progress.gif">'); 
                //  alert('Starting to upload ' + file.name);
            },
            // Some options
            'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
                //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

            },

            'onUploadSuccess' : function(file, data, response) {
                //  alert('The file was saved to: ' + data);
                $(document).trigger('close.facebox');

                $.post('<?php echo Yii::app()->request->getBaseUrl(true); ?>/Blog/default/videoshow',
                {'vid_name':data},
                function(html)
                {
                    //alert(res);
                    $("#show_thumb1").children('div.vid').after(html);
                    // $("#show_thumb").children('div.jt').after("<input type='hidden' value='"+data+"' name='img_name_val[]' id='img_name_val'><a href='javascript:void(0)'><img name="+data+" src='"+base_url+"/uploads/blog_image/temp/"+foldname+"/"+data+"' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><br /><input type='button' style='width:100px;  text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 0 -2px; border:none; font: italic bold 18px/22px Arial,Helvetica,sans-serif; border:none; color:#fff; background: url(\"http://192.168.1.71/kidsfaith/themes/kiftheme/images/btn.png\") no-repeat; height: 52px; padding: 0 0 5px; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image('"+data+"') value='Crop'><div class='clear:both'></div>");
                }
                );

                //    $("#show_thumb1").children('div.vid').after("<input type='hidden' value='"+data+"' name='img_name_val[]' id='img_name_val'><a href='javascript:void(0)'><img name="+data+" src='"+base_url+"/uploads/blog_image/temp/"+foldname+"/"+data+"' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><br /><input type='button' style='width:100px;  text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 0 -2px; border:none; font: italic bold 18px/22px Arial,Helvetica,sans-serif; border:none; color:#fff; background: url(\"http://192.168.1.71/kidsfaith/themes/kiftheme/images/btn.png\") no-repeat; height: 52px; padding: 0 0 5px; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image('"+data+"') value='Crop'><div class='clear:both'></div>");
                //$("#img_name_val").val(data);

                //$("#show_thumb").slideDown();
            }



            //'debug'    : true,
        });

        $("#file_upload-button").removeAttr('style').removeClass('uploadify-button').addClass('button-md');
        $("#vid_upload-button").removeAttr('style').removeClass('uploadify-button').addClass('button-md');

        $(".checkbox").css('width','450px').css('text-align','left');

    });

    function crop_image(img)
    {
        // alert(img); 
        var base_url="<?php echo Yii::app()->request->getBaseUrl(true); ?>"; 
        // $("<div id="showImgPop1" style="display:none;">")
        //   $("#imagePortion").html('<img img_val='+img+' id=cur_image src="'+base_url+"/uploads/Blog_image/temp/"+foldname+"/"+img+'">');
        //     $.facebox($("#showImgPop1").html());   

        //  $.facebox({ajax:base_url+'/BlogMangement/default/imageshow/img/'+img});    
        //For Modal


        $("#showmodal_img").click();
        $("#myModal-img").children('div.modal-body').html('<img img_val='+img+' id=cur_image src="'+base_url+"/uploads/blog_image/original/"+img+'">');
        //alert($("#myModal").width());
        //For Facebox
        // $.facebox('<div id="showImgPop2" style="width:100%;height:100%;"><div class="modal-header"><h3>Crop Image</h3></div><br /><br /><div id="imagePortion"><img img_val='+img+' id=cur_image src="'+base_url+"/uploads/user_image/temp/"+foldname+"/"+img+'" style="height:100%;width:100%;"><input id="sub_image" type="button" value="YES" /></div><div class="model-footer"><input type="button" onclick="jQuery(document).trigger(\'close.facebox\')" class="login_btn" value="NO" /></div></div>');  
        $('#cur_image').Jcrop({

            onSelect:    showCoords,
            //bgColor:     'black',
            //bgOpacity:   .4,
            //setSelect:   [ 100, 550, 150, 150 ],
            minSize:   [ 240, 133 ],
            //maxSize:   [ 130, 100 ]
            aspectRatio: 240 / 133

        });
    }



    function crop_image_edit(img,n)
    {
        // alert(img); 
        var base_url="<?php echo Yii::app()->request->getBaseUrl(true); ?>"; 
        // $("<div id="showImgPop1" style="display:none;">")
        //   $("#imagePortion").html('<img img_val='+img+' id=cur_image src="'+base_url+"/uploads/Blog_image/temp/"+foldname+"/"+img+'">');
        //     $.facebox($("#showImgPop1").html());   

        //  $.facebox({ajax:base_url+'/BlogMangement/default/imageshow/img/'+img});    
        //For Modal


        $("#showmodal_img").click();
        $("#myModal-img").children('div.modal-body').html('<img img_val='+img+' id=cur_image src="'+base_url+"/uploads/blog_image/original/"+img+'">');
        //alert($("#myModal").width());
        //For Facebox
        // $.facebox('<div id="showImgPop2" style="width:100%;height:100%;"><div class="modal-header"><h3>Crop Image</h3></div><br /><br /><div id="imagePortion"><img img_val='+img+' id=cur_image src="'+base_url+"/uploads/user_image/temp/"+foldname+"/"+img+'" style="height:100%;width:100%;"><input id="sub_image" type="button" value="YES" /></div><div class="model-footer"><input type="button" onclick="jQuery(document).trigger(\'close.facebox\')" class="login_btn" value="NO" /></div></div>');  
        $('#cur_image').Jcrop({

            onSelect:    function(c){showCoords1(c,n);},
            //bgColor:     'black',
            //bgOpacity:   .4,
            //setSelect:   [ 100, 500, 150, 150 ],
            minSize:   [ 45, 50 ],
            //maxSize:   [ 130, 100 ]
            aspectRatio: 45 / 50

        });
    }

    function crop_image_edit1(img,n)
    {
        // alert(img); 
        var base_url="<?php echo Yii::app()->request->getBaseUrl(true); ?>"; 
        // $("<div id="showImgPop1" style="display:none;">")
        //   $("#imagePortion").html('<img img_val='+img+' id=cur_image src="'+base_url+"/uploads/Blog_image/temp/"+foldname+"/"+img+'">');
        //     $.facebox($("#showImgPop1").html());   

        //  $.facebox({ajax:base_url+'/BlogMangement/default/imageshow/img/'+img});    
        //For Modal


        $("#showmodal_img").click();
        $("#myModal-img").children('div.modal-body').html('<img img_val='+img+' id=cur_image3 src="'+base_url+"/uploads/blog_image/original/"+img+'">');
        //alert($("#myModal").width());
        //For Facebox
        // $.facebox('<div id="showImgPop2" style="width:100%;height:100%;"><div class="modal-header"><h3>Crop Image</h3></div><br /><br /><div id="imagePortion"><img img_val='+img+' id=cur_image src="'+base_url+"/uploads/user_image/temp/"+foldname+"/"+img+'" style="height:100%;width:100%;"><input id="sub_image" type="button" value="YES" /></div><div class="model-footer"><input type="button" onclick="jQuery(document).trigger(\'close.facebox\')" class="login_btn" value="NO" /></div></div>');  
        $('#cur_image3').Jcrop({

            onSelect:    function(c){showCoords3(c,n);},
            //bgColor:     'black',
            //bgOpacity:   .4,
            //setSelect:   [ 100, 500, 150, 150 ],
            minSize:   [ 124, 138 ],
            //maxSize:   [ 130, 100 ]
            aspectRatio: 110 /133

        });
    } 



    function removeImage(e){
        $(e).parent('div').remove();
    }


    function showCoords(c)
    {
        // variables can be accessed here as
        // c.x, c.y, c.x2, c.y2, c.w, c.h
        //alert(c.w+'++'+c.h);

        console.log(c);
        var img_name=$('#cur_image').attr('img_val');
        //alert(img_name);
        $('#sub_image').attr('onclick',"crop_process('"+img_name+"','"+c.x2+"','"+c.y2+"','"+c.x+"','"+c.y+"','"+c.h+"','"+c.w+"')");
    };

    function showCoords1(c,n)
    {
        // variables can be accessed here as
        // c.x, c.y, c.x2, c.y2, c.w, c.h
        alert(c.w+'++'+c.h);

        console.log(c);
        var img_name=$('#cur_image').attr('img_val');
        //alert(img_name);
        $('#sub_image').attr('onclick',"crop_process1('"+img_name+"','"+c.x2+"','"+c.y2+"','"+c.x+"','"+c.y+"','"+c.h+"','"+c.w+"','"+n+"')");
    };

    function showCoords3(c,n)
    {
        // variables can be accessed here as
        // c.x, c.y, c.x2, c.y2, c.w, c.h
        alert(c.w+'++'+c.h);

        console.log(c);
        var img_name=$('#cur_image3').attr('img_val');
        //alert(img_name);
        $('#sub_image').attr('onclick',"crop_process2('"+img_name+"','"+c.x2+"','"+c.y2+"','"+c.x+"','"+c.y+"','"+c.h+"','"+c.w+"','"+n+"')");
    };

    function crop_process(image,x2,y2,x1,y1,h,w)
    {
        $.post('<?php echo Yii::app()->request->getBaseUrl(true); ?>/Blog/default/crop_process',
        {'image':image,'x2':parseInt(x2),'y2':parseInt(y2),'x1':parseInt(x1),'y1':parseInt(y1),'h':parseInt(h),'w':parseInt(w)},
        function(res)
        {
            //alert(x1+'-'+x2+'-'+'_'+y1+'-'+y2);
            //var img_data = image.split('.');     
            //alert(res);        
            //  alert(res);
            //            $.each($("#show_thumb").children('a'),function(i){
            //                alert($("#show_thumb").children('a').children('img').attr("src")) ;
            //            });   
            $.each($("#show_thumb").children('div').children('a').children('img'),function(i){    
                if($(this).attr('name')==image){
                    $(this).attr("src","<?=Yii::app()->request->getBaseUrl(true);?>/uploads/blog_image/thumb/"+image+"?"+Math.random()+"");
                }
            });
            jQuery(document).trigger('close.facebox')
        });
    }     

    function crop_process1(image,x2,y2,x1,y1,h,w,n)
    {
        $.post('<?php echo Yii::app()->request->getBaseUrl(true); ?>/Blog/default/Crop_process1',
        {'image':image,'x2':x2,'y2':y2,'x1':x1,'y1':y1,'h':h,'w':w,'type':n},
        function(res)
        {
            //var img_data = image.split('.');
            //bootbox.alert(res);
            //alert(res);        
            //  alert(res);
            //            $.each($("#show_thumb").children('a'),function(i){
            //                alert($("#show_thumb").children('a').children('img').attr("src")) ;
            //            });   
            $.each($("#show_thumb2").children('div').children('a').children('img'),function(i){    
                if($(this).attr('name')==image){
                    $(this).attr("src","<?=Yii::app()->request->getBaseUrl(true);?>/uploads/blog_image/thumb/1_"+image+"?"+Math.random()+"");
                }
            });
            jQuery(document).trigger('close.facebox')
        });
    }  

    function crop_process2(image,x2,y2,x1,y1,h,w,n)
    {
        $.post('<?php echo Yii::app()->request->getBaseUrl(true); ?>/Blog/default/Crop_process2',
        {'image':image,'x2':x2,'y2':y2,'x1':x1,'y1':y1,'h':h,'w':w,'type':n},
        function(res)
        {
            //var img_data = image.split('.');
            //bootbox.alert(res);
            //  alert(res);
            //            $.each($("#show_thumb").children('a'),function(i){
            //                alert($("#show_thumb").children('a').children('img').attr("src")) ;
            //            });  

            $.each($("#show_thumb3").children('div').children('a').children('img'),function(i){    
                if($(this).attr('name')==image){
                    $(this).attr("src","<?=Yii::app()->request->getBaseUrl(true);?>/uploads/blog_image/thumb/2_"+image+"?"+Math.random()+"");
                }
            });
            jQuery(document).trigger('close.facebox')
        });
    }   

    /**Youtube Video portion[Start]**/
    function showVid(e){
        var base_url="<?php echo Yii::app()->request->getBaseUrl(true); ?>";
        var val=$("#press_video").val();

        if(val!=""){
            val1=encodeURIComponent(val);
            //   window.location.href=baseurl+"/updateManagement/default/add?id="+id; 
            var url=base_url+"/Blog/default/youtube";
            $.post(url,{'data':val1},function(res){
                //alert(res); exit;
                $("#vid_portion").html(res);
            });
        }
        else{
            alert('Please Enter a value');
        }
    }

    function selectVideo(e){

        var vid_id=($(e).attr("vid_id"));

        html='<div class="video_contain_left" style="width:480px;height:320px"><input type="hidden" id="vid_type" name="m_vid_type[]" value="Youtube"><input type="hidden" id="vid_type" name="vid_type[]" value="Youtube"><input type="hidden" id="vid" name="press_vid[]" value='+vid_id+'><object width="480" height="320"><param value="http://www.youtube-nocookie.com/v/'+vid_id+'?version=3&hl=en_US" name="movie"><param value="true" name="allowFullScreen"><param value="always" name="allowscriptaccess"><embed width="480" height="320" wmode="opaque" allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="http://www.youtube-nocookie.com/v/'+vid_id+'?version=3&hl=en_US"></object><img class="closeImg2" src="'+base_url+'/images/closebtn.png" title="Close Image" alt="ss" style="margin-bottom:20px;" onclick="removeVideo(this)"></div><br /><br /><br />';
        $("#show_thumb1").children("div.vid").after(html);   

    }

    function removeVideo(e){
        $(e).parent('div').remove();
    }

    /**Youtube Video portion[End]**/

</script>

<?php 

    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/jquery.Jcrop.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/jquery.color.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/facebox.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/custom.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/jquery.uploadify.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/jquery.tinyscrollbar.min.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/js/fp.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/css/jquery.Jcrop.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/css/facebox.css'));  
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/css/uploadify.css'));  
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('Blog').'/css/website.css'));  


?>


<div class="newform">
    <legend>Edit Blog</legend>

    <?php /** @var BootActiveForm $form */
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'horizontalForm',
        'type'=>'horizontal',
        )); ?>
    <div class="input-box" >
        <?php echo $form->textFieldRow($model, 'pr_title',array('class'=>'firstname')); ?><br />     
    </div>


    <?php echo $form->ckEditorRow($model, 'pr_desc', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));?>
    <div class="input-box" style="margin-top:25px;" >
        <label for="Pressrelease_pr_image" class="control-label required">Blog Image(s)</label>
        <div id="upImage" style="margin-left: 235px; ">
            <input id="file_upload" name="file_upload" type="file" multiple="true">      
        </div>

        <div id="show_thumb" style="margin-left: 190px;">
            <div class="jt"></div>
            <?php if(!empty($model1)){
                    foreach($model1 as $row){        
                        if($row->pr_con_type=="Image"){    
                        ?>
                        <div style="clear:both;"></div> <br />
                        <div><input type='hidden' value='<?php echo $row->pr_cont; ?>' name='img_name_val[]' id='img_name_val'><a href='javascript:void(0)'><img name="<?php echo $row->pr_cont; ?>" src='<?php echo Yii::app()->request->getBaseUrl(true); ?>/uploads/blog_image/thumb/<?php echo $row->pr_cont; ?>' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><img class='closeImg2' src='<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/closebtn.png' title='Close Image' alt='ss' style='margin:-140px 0 0 -20px;' onclick='removeImage(this)'><br /><input type='button' style='width:100px;  text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 0 -2px; border:none; font: italic 18px/30px Arial,Helvetica,sans-serif; border:none; color:#fff; background-color: #2C4914; border-radius:30px; height: 35px; padding:0px 0; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image('<?php echo $row->pr_cont; ?>') value='Crop'></div>
                        <div class='clear:both'></div>

                        <?php 
                        }
                    }
                }
            ?>
        </div>
    </div>

    <div class="input-box" >
        <?php echo $form->toggleButtonRow($model, 'pr_vid',array('options'=>array('enabledLabel'=>'Upload from Youtube' , 'disabledLabel'=>'Upload from Desktop','width' => '350','id'=>'pr_v'),
            'onChange'=>'js:
            if($("#Blog_pr_vid").is(":checked")==true){
            //alert(1);
            $("#upImage1").hide();

            $("#showmodal").click();
            }
            else{
            //alert(2);
            $("#upImage1").show();
            }

            ')) ?> 

    </div> 

    <div id="upImage1" style="margin-left: 235px; ">
        <input id="vid_upload" name="file_upload" type="file" multiple="true">      




    </div>
    <div id="show_thumb1" style="margin-left:185px;">
        <div class="vid"></div>
        <div style="clear:both;"></div> 
        <?php if(!empty($model1)){
                foreach($model1 as $row){        
                    if($row->pr_con_type=="Video"){
                        if($row->pr_subcon_type=="Youtube"){      
                        ?>
                        <div class="video_contain_left" style="width:480px;height:385px;margin-top:40px;">
                            <input type="hidden" id="vid_type" name="m_vid_type[]" value="Youtube">
                            <input type="hidden" id="vid" name="press_vid[]" value='<?php echo $row->pr_cont ?>'><object width="480" height="320"><param value="http://www.youtube-nocookie.com/v/<?php echo $row->pr_cont ?>?version=3&hl=en_US" name="movie"><param value="true" name="allowFullScreen"><param value="always" name="allowscriptaccess"><embed width="480" height="320" wmode="opaque" allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="http://www.youtube-nocookie.com/v/<?php echo $row->pr_cont ?>?version=3&hl=en_US"></object><img class="closeImg2" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/closebtn.png" title="Close Image" alt="ss" style="margin-bottom:40px;" onclick="removeVideo(this)"></div>


                        <?php 
                        }else if($row->pr_subcon_type=="Desktop")
                            { 
                                //echo "<pre>";
                                //var_dump($row);
                                //exit;
                            ?>
                            <div style="margin-top:40px;">
                                <?php $base = Yii::app()->request->baseUrl;?>



                                <input type="hidden" id="vid_type" name="m_vid_type[]" value="Desktop">
                                <input type="hidden" id="vid" name="press_vid[]" value='<?php echo $row->pr_cont ?>'>
                                <a  
                                    href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/uploads/blog_video/converted/<?php echo $row->pr_cont; ?>"
                                    style="display:block;width:480px;height:270px"  
                                    class="player" autoplay="false"> 
                                </a> 
                                <br />
                                <!-- this will install flowplayer inside previous A- tag. -->

                                <img class="closeImg2" src="<?php echo Yii::app()->request->getBaseUrl(true);s ?>/images/closebtn.png" title="Close Image" alt="ss" style="margin-bottom:40px;" onclick="removeVideo(this)">
                            </div>
                            <?php }
                    }
                }
            }
        ?>
    </div>
    <?php echo $form->textFieldRow($model, 'postby',array('class'=>'firstname')); ?><br />  
    <div class="input-box" style="margin-top:25px;" >
    <label for="Pressrelease_pr_image" class="control-label required">User Image</label>
    <div id="upImage" style="margin-left: 235px; ">
        <input id="file_upload1" name="img_name_val1" type="file" multiple="false">      
    </div>

    <div id="show_thumb2" style="margin-left: 190px;">
        <div class="jt"></div>
        <?php  
            //var_dump($model->user_image);   
            if(!empty($model)){
                //foreach($model as $row){        

            ?>
            <?php echo $form->hiddenField($model,'user_image',array('id'=>'img_name')); ?>
            <div style="clear:both;"></div> <br />
            <div class=author_image><input type='hidden' value="<?php echo $model->user_image; ?>" name='img_name_val1' id='img_name_va1l'><a href='javascript:void(0)'><img name="<?php echo $model->user_image; ?>" src='<?php echo Yii::app()->request->getBaseUrl(true); ?>/uploads/blog_image/thumb/1_<?php echo $model->user_image; ?>' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><img class='closeImg2' src='<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/closebtn.png' title='Close Image' alt='ss' style='margin:-40px 0 0 -20px;' onclick='removeImage(this)'><br /><input type='button' style='width:100px;  text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 0 -2px; border:none; font: italic 18px/30px Arial,Helvetica,sans-serif; border:none; color:#fff; background-color: #2C4914; border-radius:30px; height: 35px; padding:0px 0; text-align: center; text-transform: uppercase; width: 157px;'onclick=crop_image_edit('<?php echo $model->user_image; ?>',1) value='Crop'></div>
        </div>
</div>

            <div class='clear:both'></div>

        <div id="show_thumb3" style="margin-left: 190px;">
            <div class="jt"></div>

            <div class=author_image><input type='hidden' value="<?php echo $model->user_image; ?>" name='img_name_val2' id='img_name_va12'><a href='javascript:void(0)'><img name="<?php echo $model->user_image; ?>" src='<?php echo Yii::app()->request->getBaseUrl(true); ?>/uploads/blog_image/thumb/2_<?php echo $model->user_image; ?>' style='max-height:150px;max-width:150px;border:solid 1px #979797'></a><img class='closeImg2' src='<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/closebtn.png' title='Close Image' alt='ss' style='margin:-140px 0 0 -20px;' onclick='removeImage(this)'><br /><input type='button' style='width:100px;  text-shadow:1px 0px 0px #333; box-shadow:0 1px 3px #fff; margin:5px 0 0 -2px; border:none; font: italic 18px/30px Arial,Helvetica,sans-serif; border:none; color:#fff; background-color: #2C4914; border-radius:30px; height: 35px; padding:0px 0; text-align: center; text-transform: uppercase; width: 157px;' onclick=crop_image_edit1('<?php echo $model->user_image; ?>',2) value='Crop'></div>
            <div class='clear:both'></div>

            <?php 

                //}
            }
        ?>
    </div>
</div>


<div class="input-box">
    <?php echo $form->toggleButtonRow($model, 'pr_status',array('options'=>array('enabledLabel'=>'Active' , 'disabledLabel'=>'Inactive','width' => '150'))); ?>  
</div>
<div id="vid">
</div>


<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>

<?php //MODAL FOR IMAGES[START] ?>
<?php  $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'myModal-img','htmlOptions'=>array('style'=>'height:auto;left:30%;width:80%%;display:none;'))); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Image</h4>
</div>

<div class="modal-body">
    <p>One fine body...</p>
</div>

<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => 'Done',
        'url' => '#',
        'htmlOptions' => array('id'=>'sub_image','data-dismiss' => 'modal'),        
        //  'htmlOptions' => array('data-dismiss' => 'modal'),
        )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
        )); ?>
</div>

<?php $this->endWidget(); ?>


<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Click me',
    'type' => 'primary',
    'htmlOptions' => array(
    'id' => 'showmodal_img',
    'style'=>'display:none',
    'data-toggle' => 'modal',
    'data-target' => '#myModal-img',
    ),
    )); ?>

<?php //MODAL FOR IMAGES[END] ?>    

<?php //MODAL FOR YOUTUBE[START] ?>    

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'myModal')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Search in Youtube</h4>
</div>

<div class="modal-body">
    <input type="text" id="press_video" 'class'='input-medium' 'prepend'='<i class="icon-search"></i>' 'placeholder'='Search Youtube Video'>

    <?php // echo $form->hiddenField($model,'bl_videos',array('value'=>'','id'=>'hid1')); ?>
    <?php
        // echo $form->textFieldRow($model, 'bl_video',
        // array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>','placeholder'=>'Search Youtube Video'));      

    ?>

    <div id="vid_portion">
    </div>
</div>

<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => 'Search',
        'url' => 'javascript:void(0)',
        'htmlOptions'=>array('onClick'=>'showVid(this)'),
        //'htmlOptions' => array('data-dismiss' => 'modal'),
        )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
        )); ?>
</div>

<?php $this->endWidget(); ?>



<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Click me',
    'type' => 'primary',
    'htmlOptions' => array(
    'id' => 'showmodal',
    'style'=>'display:none',
    'data-toggle' => 'modal',
    'data-target' => '#myModal',
    ),
    )); ?>

    <?php //MODAL FOR YOUTUBE[END] ?>    
 </div>   

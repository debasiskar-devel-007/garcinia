
 var val_wid=$('#file_upload1').attr('img_width');
 var val=$('#file_upload1').attr('img_height');
var sigle_wid=$('#file_upload').attr('img_width');
var sigle_hig=$('#file_upload').attr('img_height');


$(function(){
     //alert(sigle_wid);  
    $('#file_upload').uploadify({ 
        'multi':false,
        'width': '121',                                        
        'height': '32',
        'wmode': 'transparent',
        'swf'      :asset_url+'/swf/uploadify.swf',
        'uploader' : base_url+'/cms/admin/contentmanager/uploadify_process',
        'Default Value':'BROWES',
        'onUploadStart' : function(file) {
            $.facebox('File Uploading...<img src="'+base_url+'/images/ajax_loading.gif">');   
        },
        // Some options
        'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
            //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

        },

        'onUploadSuccess' : function(file, data, response) {
            
            
            
            $.facebox('Resizing Uploaded File...<img src="'+base_url+'/images/ajax_loading.gif">');
            $.post(base_url+"/cms/admin/contentmanager/resizeimage/",{'filename':data,height:sigle_hig,width:sigle_wid,foldername:'thumb'},function(res){ 
                $('#show_thumb').html('<div class="imglist" style="position:relative; width:150px; margin-bottom:10px;"><a href="javascript:void(0);"><img name="'+data+'" src="'+base_url+'/uploads/content_image/thumb/'+data+'" style="max-height:300px;max-width:300px; border:solid 1px #979797;margin-left:50px" /></br></a><input type="button" class="crop_btn" onclick="crop_image(\''+data+'\')" value="Crop"><input type="button" style="margin-left:5px;" class="crop_btn" onclick="del_up_image(this)" value="Delete"><input type="hidden" name="ContentInfo" value="'+data+'" /></div><div class="clear"></div>');
                //alert(res);
                $(document).trigger('close.facebox');
            });



        } 


    });
    
        $('#file_upload1').uploadify({ 
        'multi':true,
        'width': '121',                                        
        'height': '32',
        'wmode': 'transparent',
        'swf'      :asset_url+'/swf/uploadify.swf',
        'uploader' : base_url+'/cms/admin/contentmanager/uploadify_process1',
        'Default Value':'BROWES',
        'onUploadStart' : function(file) {
            //$.facebox('File Uploading...<img src="'+base_url+'/images/ajax_loading.gif">');
        },
        // Some options
        'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
            //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

        },

        'onUploadSuccess' : function(file, data, response) {
           // bootbox.alert(data);
            $.facebox('Resizing Uploaded File...<img src="'+base_url+'/images/ajax_loading.gif">');
            $.post(base_url+"/cms/admin/contentmanager/resizeimage1/",{'filename':data,height:val,width:val_wid,foldername:'thumb'},function(res){
               // bootbox.alert(res);
                $('#show_thumb1').find('#clr').before('<div class="imglist1" style="position:relative; width:150px; margin-bottom:10px;"><a href="javascript:void(0);"><img name="'+data+'" src="'+base_url+'/uploads/content_image/thumb/'+data+'" style="max-height:300px;max-width:300px; border:solid 1px #979797;" /></br></a><input type="button" class="crop_btn" onclick="crop_image1(\''+data+'\')" value="Crop"><input type="button" style="margin-left:5px;" class="crop_btn" onclick="del_up_image1(this)" value="Delete"><input type="hidden" name="imageval[]" value="'+data+'" /></div><div class="clear"></div>');
                $(document).trigger('close.facebox');
            });



        } 


    });       
    
    $('#file_upload2').uploadify({ 
        'multi':false,
        'width': '121',                                        
        'height': '32',
        'wmode': 'transparent',
        'swf'      :asset_url+'/swf/uploadify.swf',
        'uploader' : base_url+'/sportsmanager/admin/sports/uploadify_process2',
        'Default Value':'BROWES',
        'onUploadStart' : function(file) {
            $.facebox('File Uploading...<img src="'+base_url+'/images/ajax_loading.gif">');   
        },
        // Some options
        'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
            //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

        },

        'onUploadSuccess' : function(file, data, response) {
            $.facebox('Resizing Uploaded File...<img src="'+base_url+'/images/ajax_loading.gif">');
            $.post(base_url+"/sportsmanager/admin/sports/resizeimage2/",{'filename':data,height:297,width:480,foldername:'thumb'},function(res){ 
                $('#show_thumb2').html('<div class="imglist" style="position:relative; width:150px; margin-bottom:10px;"><a href="javascript:void(0);"><img name="'+data+'" src="'+base_url+'/uploads/sports_image/additional/thumb/'+data+'" style="max-height:300px;max-width:300px; border:solid 1px #979797;" /></br></a><input type="button" class="crop_btn" onclick="crop_image2(\''+data+'\')" value="Crop"><input type="button" style="margin-left:5px;" class="crop_btn" onclick="del_up_image2(this)" value="Delete"><input type="hidden" name="Sport[additional_image]" value="'+data+'" /></div><div class="clear"></div>');
                $(document).trigger('close.facebox');
            });



        } 


    });
    
   

    $("#file_upload-button").removeAttr('style').removeClass('uploadify-button').addClass('button-md');
    $("#file_upload1-button").removeAttr('style').removeClass('uploadify-button').addClass('button-md');
    $("#file_upload2-button").removeAttr('style').removeClass('uploadify-button').addClass('button-md');



});


function crop_image(img)
{
    var width = sigle_wid;
    var height = sigle_hig;

    $("#myModal-img").modal('show');
    $("#myModal-img").children('div.modal-body').html('<img img_val='+img+' id=cur_image src="'+base_url+"/uploads/content_image/"+img+'">');

    setTimeout(function(){
        $('#cur_image').Jcrop({

            onSelect:    showCoords,
            //bgColor:     'black',
            //bgOpacity:   .4,
            //boxWidth: 900,
            //boxHeight:900,
            //setSelect:   [ 100, 500, 150, 150 ],
            minSize:   [ width, height ],
            //maxSize:   [ 130, 100 ]
            aspectRatio: width / height

        });
    },500); 
}

function crop_image1(img)
{
    var width = val_wid;
    var height = val;

    $("#myModal-img").modal('show');
    $("#myModal-img").children('div.modal-body').html('<img img_val='+img+' id=cur_image1 src="'+base_url+"/uploads/content_image/"+img+'">');

    setTimeout(function(){
        $('#cur_image1').Jcrop({

            onSelect:    showCoords1,
            //bgColor:     'black',
            //bgOpacity:   .4,
            //boxWidth: 900,
            //boxHeight:900,
            //setSelect:   [ 100, 500, 150, 150 ],
            minSize:   [ width, height ],
            //maxSize:   [ 130, 100 ]
            aspectRatio: width / height

        });
    },500); 
}

function crop_image2(img)
{
    var width = 480;
    var height = 297;

    $("#myModal-img").modal('show');
    $("#myModal-img").children('div.modal-body').html('<img img_val='+img+' id=cur_image2 src="'+base_url+"/uploads/sports_image/additional/"+img+'">');

    setTimeout(function(){
        $('#cur_image2').Jcrop({

            onSelect:    showCoords2,
            //bgColor:     'black',
            //bgOpacity:   .4,
            //boxWidth: 900,
            //boxHeight:900,
            //setSelect:   [ 100, 500, 150, 150 ],
            minSize:   [ width, height ],
            //maxSize:   [ 130, 100 ]
            aspectRatio: width / height

        });
    },500); 
}
function showCoords(c)
{

    var img_name=$('#cur_image').attr('img_val');

    $('#sub_image').attr('onclick',"crop_process('"+img_name+"','"+c.x2+"','"+c.y2+"','"+c.x+"','"+c.y+"','"+c.w+"','"+c.h+"')");
}

function showCoords1(c)
{

    var img_name=$('#cur_image1').attr('img_val');

    $('#sub_image').attr('onclick',"crop_process1('"+img_name+"','"+c.x2+"','"+c.y2+"','"+c.x+"','"+c.y+"','"+c.w+"','"+c.h+"')");
}

function showCoords2(c)
{

    var img_name=$('#cur_image2').attr('img_val');

    $('#sub_image').attr('onclick',"crop_process2('"+img_name+"','"+c.x2+"','"+c.y2+"','"+c.x+"','"+c.y+"','"+c.w+"','"+c.h+"')");
}

function crop_process(image,x2,y2,x1,y1,w,h)
{
    $.facebox('Resizing Crop File...<img src="'+base_url+'/images/ajax_loading.gif">');
    $.post(base_url+'/cms/admin/contentmanager/resize_cropImage', {'image':image,'x2':x2,'y2':y2,'x1':x1,'y1':y1,'w':w,'h':h,height:sigle_hig,width:sigle_wid,foldername:'thumb'}, function(res) {
        $('.imglist').find('img[name="'+image+'"]').attr('src',base_url+"/uploads/content_image/temp/"+res);
        
        setTimeout('delTempImage(\''+res+'\')',10000);
        
        $(document).trigger('close.facebox');
    });
    
} 

function crop_process1(image,x2,y2,x1,y1,w,h)
{
    $.facebox('Resizing Crop File...<img src="'+base_url+'/images/ajax_loading.gif">');
    $.post(base_url+'/cms/admin/contentmanager/resize_cropImage1', {'image':image,'x2':x2,'y2':y2,'x1':x1,'y1':y1,'w':w,'h':h,height:val,width:val_wid,foldername:'thumb'}, function(res) {
        $('.imglist1').find('img[name="'+image+'"]').attr('src',base_url+"/uploads/content_image/temp/"+res);
        
        setTimeout('delTempImage1(\''+res+'\')',10000);
        
        $(document).trigger('close.facebox');
    });
    
} 

function crop_process2(image,x2,y2,x1,y1,w,h)
{
    $.facebox('Resizing Crop File...<img src="'+base_url+'/images/ajax_loading.gif">');
    $.post(base_url+'/sportsmanager/admin/sports/resize_cropImage2', {'image':image,'x2':x2,'y2':y2,'x1':x1,'y1':y1,'w':w,'h':h,height:297,width:480,foldername:'thumb'}, function(res) {
        $('.imglist').find('img[name="'+image+'"]').attr('src',base_url+"/uploads/sports_image/additional/temp/"+res);
        
        setTimeout('delTempImage2(\''+res+'\')',10000);
        
        $(document).trigger('close.facebox');
    });
    
} 

function del_up_image(obj){
    var image_name = $(obj).parent().find('img').attr('name');
    delImage(image_name);
    $(obj).parent().remove();
}
function del_up_image1(obj){
    alert(obj);
    var image_name = $(obj).parent().find('img').attr('name');
    delImage1(image_name);
    $(obj).parent().remove();
}

function del_up_image2(obj){
    var image_name = $(obj).parent().find('img').attr('name');
    delImage2(image_name);
    $(obj).parent().remove();
}

function delImage(image){
        $.post(base_url+"/cms/admin/contentmanager/delimage",{'image':image},function(res){ });
    }
    function delImage1(image){
        $.post(base_url+"/cms/admin/contentmanager/delimage1",{'image':image},function(res){ });
    }
    
        function delImage2(image){
        $.post(base_url+"/cms/admin/contentmanager/delimage2",{'image':image},function(res){ });
    }
    
function delTempImage(image){
        $.post(base_url+"/cms/admin/contentmanager/delimage",{'image':image,'path':'./uploads/content_image/temp/'},function(res){ });
    }
    
    function delTempImage1(image){
        $.post(base_url+"/cms/admin/contentmanager/delimage1",{'image':image,'path':'./uploads/content_image/temp/'},function(res){ 
            
            alert(res);
            
        });
    }
    
        function delTempImage2(image){
        $.post(base_url+"/cms/admin/contentmanager/delimage2",{'image':image,'path':'./uploads/content_image/temp/'},function(res){ 
            
            
        });
    }
    

    
    
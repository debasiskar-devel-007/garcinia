$(function(){

    $('#file_upload').uploadify({ 
        'multi':false,
        'width': '121',                                        
        'height': '32',
        'wmode': 'transparent',
        'swf'      :asset_url+'/swf/uploadify.swf',
        'uploader' : base_url+'/blog/admin/blog/uploadify_process',
        'Default Value':'BROWES',
        'onUploadStart' : function(file) {
            $.facebox('File Uploading...<img src="'+base_url+'/images/ajax_loading.gif">');   
        },
        // Some options
        'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
            //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

        },

        'onUploadSuccess' : function(file, data, response) {
            alert(data);
            $.facebox('Resizing Uploaded File...<img src="'+base_url+'/images/ajax_loading.gif">');
            $.post(base_url+"/blog/admin/blog/resizeimage/",{'filename':data,width:95,height:95,foldername:'thumb'},function(res){
                $('#show_thumb').html('<div class="imglist" style="position:relative; width:130px; margin-bottom:10px;"><a href="javascript:void(0);"><img name="'+data+'" src="'+base_url+'/uploads/proimage/thumb/'+data+'" style="max-height:181px;max-width:130px; border:solid 1px #979797;" /></a><input type="button" class="crop_btn" onclick="crop_image(\''+data+'\')" value="Crop"><input type="button" style="margin-left:5px;" class="crop_btn" onclick="del_up_image(this)" value="Delete"><input type="hidden" name="Blog[user_image]" value="'+data+'" /></div>');
                $(document).trigger('close.facebox');
            });



        } 


    });

    $("#file_upload-button").removeAttr('style').removeClass('uploadify-button').addClass('button-md');



});


function crop_image(img)
{
     alert(img);  
    var width = 95;
    var height = 95;

    $("#myModal-img").modal('show');
    $("#myModal-img").children('div.modal-body').html('<img img_val='+img+' id=cur_image src="'+base_url+"/uploads/proimage/"+img+'">');

    setTimeout(function(){
        $('#cur_image').Jcrop({

            onSelect:    showCoords,
            //bgColor:     'black',
            //bgOpacity:   .4,
            //boxWidth: 900,
            //boxHeight:900,
            //setSelect:   [ 100, 500, 150, 150 ],
            //minSize:   [ width, height ],
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

function crop_process(image,x2,y2,x1,y1,w,h)
{
    $.facebox('Resizing Crop File...<img src="'+base_url+'/images/ajax_loading.gif">');
    $.post(base_url+'/blog/admin/blog/resize_cropImage', {'image':image,'x2':x2,'y2':y2,'x1':x1,'y1':y1,'w':w,'h':h,width:95,height:95,foldername:'thumb'}, function(res) {
        $('.imglist').find('img[name="'+image+'"]').attr('src',base_url+"/uploads/proimage/temp/"+res);
        
        setTimeout('delTempImage(\''+res+'\')',10000);
        
        $(document).trigger('close.facebox');
    });

} 


function del_up_image(obj){
    var image_name = $(obj).parent().find('img').attr('name');
    delImage(image_name);
    $(obj).parent().remove();
}

function delImage(image){
        $.post(base_url+"/blog/admin/blog/delimage",{'image':image},function(res){ });
    }
    
function delTempImage(image){
        $.post(base_url+"/blog/admin/blog/delimage",{'image':image,'path':'./uploads/proimage/temp/'},function(res){ });
    }
    
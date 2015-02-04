$(function(){




    $('#file_upload1').uploadify({

        'multi':false,

        'width': '121',

        'height': '32',

        'wmode': 'transparent',

        'swf'      :asset_url+'/swf/uploadify.swf',

        'uploader' : base_url+'/banner/admin/banner/uploadify_process',

        'Default Value':'BROWES',

        'buttonText':'Select Files',

        'onUploadStart' : function(file) {

            bootbox.dialog('File Uploading...<img src="'+base_url+'/images/ajax_loading.gif">');

        },

        // Some options

        'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {

            //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');



        },



        'onUploadSuccess' : function(file, data, response) {

            bootbox.dialog('Resizing Uploaded File...<img src="'+base_url+'/images/ajax_loading.gif">');

            $.post(base_url+"/banner/admin/banner/resizeimage/",{'filename':data,width:1000,height:380,foldername:'thumb'},function(res){

                $('#show_thumb').html('<div class="imglist" style="position:relative; width:250px; margin-bottom:10px;"><a href="javascript:void(0);"><img name="'+data+'" src="'+base_url+'/uploads/banner/thumb/'+data+'" style="max-height:150px;max-width:150px; border:solid 1px #979797;margin-left:50px" /></br></a><input type="button" style="margin-top:10px" class="btn" onclick="crop_image1(\''+data+'\')" value="Crop"><input type="button" style="margin-left:15px;margin-top: 10px" class="btn" onclick="del_up_image1(this)" value="Delete"><input type="hidden" name="Banner[banner_img]" value="'+data+'" /></div><div class="clear"></div>');

                bootbox.hideAll();

            });







        }





    });











    $("#file_upload1-button").removeAttr('style').removeClass('uploadify-button').addClass('md-btn');









});












function crop_image1(img)

{

    var width = 1000;

    var height = 380;



    $("#myModal-img").modal('show');

    $("#myModal-img").children('div.modal-body').html('<img img_val='+img+' id=cur_image1 src="'+base_url+"/uploads/banner/"+img+'">');



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





function showCoords1(c)

{



    var img_name=$('#cur_image1').attr('img_val');



    $('#sub_image').attr('onclick',"crop_process1('"+img_name+"','"+c.x2+"','"+c.y2+"','"+c.x+"','"+c.y+"','"+c.w+"','"+c.h+"')");

}







function crop_process1(image,x2,y2,x1,y1,w,h)

{

    bootbox.dialog('Resizing Crop File...<img src="'+base_url+'/images/ajax_loading.gif">');

    $.post(base_url+'/banner/admin/banner/resize_cropImage', {'image':image,'x2':x2,'y2':y2,'x1':x1,'y1':y1,'w':w,'h':h,width:1000,height:380,foldername:'thumb'}, function(res) {

        $('.imglist').find('img[name="'+image+'"]').attr('src',base_url+"/uploads/banner/temp/"+res);



        setTimeout('delTempImage1(\''+res+'\')',10000);



        bootbox.hideAll();

    });



}







function del_up_image(obj){

    var image_name = $(obj).parent().find('img').attr('name');

    delImage(image_name);

    $(obj).parent().remove();

}



function del_up_image1(obj){

    var image_name = $(obj).parent().find('img').attr('name');

    delImage1(image_name);

    $(obj).parent().remove();

}









function delImage1(image){

    $.post(base_url+"/banner/admin/banner/delimage",{'image':image},function(res){ });

}



function delTempImage1(image){

    $.post(base_url+"/banner/admin/banner/delimage",{'image':image,'path':'./uploads/banner/temp/'},function(res){ });

}

    

 

    



    

    
$(function(){



    $('#file_upload').uploadify({


        'multi':false,
        'width': '121',
        'height': '32',
        'wmode': 'transparent',
        'swf'      :asset_url+'/swf/uploadify.swf',
        'uploader' : base_url+'/product/admin/product/uploadify_process',
        'Default Value':'BROWES',
        'onUploadStart' : function(file) {
            $.facebox('File Uploading...<img src="'+theme_url+'/images/ajax_loading.gif">');
        },
        // Some options
        'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
            //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

        },

        'onUploadSuccess' : function(file, data, response) {
            var arr = product_imag_size;

            $.facebox('Resizing Uploaded File...<img src="'+theme_url+'/images/ajax_loading.gif">');
            $.post(base_url+"/product/admin/product/resizeimage/",{'filename':data,imgarr:arr},function(res){

                var d = new Date();
                var t = d.getTime();



                var imghtm = '';
                for(n in arr){
                    imghtm += '<div class="image-main-div">' +
                        '<img style="max-height:150px;max-width:150px; border:solid 1px #979797;" src="'+base_url+'/uploads/product_image/thumb/'+arr[n][0]+'X'+arr[n][1]+'/'+data+'?version='+t+'" name="'+data+'" folder="'+arr[n][0]+'X'+arr[n][1]+'">' +
                        '<div class="crop-img"><img src="'+asset_url+'/images/crop.png" onclick="crop_image(\''+data+'\','+arr[n][0]+','+arr[n][1]+')"></div>' +
                        '</div>';

                }

                $('#show_thumb').find('#clr').before('<div class="imglist-box2">'+
                    '<img src="'+asset_url+'/images/closenew.png" class="closediv" onclick="delImage(\''+data+'\',this)">' +
                    imghtm+
                    '<input type="hidden" name="Product[image][]" value="'+data+'" />' +
                    '<div style="clear: both;"></div>' +
                    '</div>');

                showcropbtn();
                $(document).trigger('close.facebox');
            });
        }




    });

    $('#file_upload1').uploadify({


        'multi':false,
        'width': '121',
        'height': '32',
        'wmode': 'transparent',
        'swf'      :asset_url+'/swf/uploadify.swf',
        'uploader' : base_url+'/product/admin/product/uploadify_process',
        'Default Value':'BROWES',
        'onUploadStart' : function(file) {
            $.facebox('File Uploading...<img src="'+theme_url+'/images/ajax_loading.gif">');
        },
        // Some options
        'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
            //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

        },

        'onUploadSuccess' : function(file, data, response) {
            var arr = product_imag_size;

            $.facebox('Resizing Uploaded File...<img src="'+theme_url+'/images/ajax_loading.gif">');
            $.post(base_url+"/product/admin/product/resizeimage/",{'filename':data,imgarr:arr},function(res){

                var d = new Date();
                var t = d.getTime();



                var imghtm = '';
                for(n in arr){
                    imghtm += '<div class="image-main-div">' +
                        '<img style="max-height:150px;max-width:150px; border:solid 1px #979797;" src="'+base_url+'/uploads/product_image/thumb/'+arr[n][0]+'X'+arr[n][1]+'/'+data+'?version='+t+'" name="'+data+'" folder="'+arr[n][0]+'X'+arr[n][1]+'">' +
                        '<div class="crop-img"><img src="'+asset_url+'/images/crop.png" onclick="crop_image(\''+data+'\','+arr[n][0]+','+arr[n][1]+')"></div>' +
                        '</div>';

                }

                $('#show_thumb').find('#clr').before('<div class="imglist-box2">'+
                    imghtm+
                    '<input type="hidden" value="'+data+'" />' +
                    '<input type="button" value="Select" onclick="selectimage(\''+data+'\')" />' +
                    '<div style="clear: both;"></div>' +
                    '</div>');

                showcropbtn();
                $(document).trigger('close.facebox');
            });
        }




    });

    $("#file_upload-button").removeAttr('style').removeClass('uploadify-button').addClass('button-md');
    $("#file_upload1-button").removeAttr('style').removeClass('uploadify-button').addClass('button-md');



    showcropbtn();



});


function crop_image(img,width,height)
{
    $("#myModal-img").modal('show');
    $("#myModal-img").children('div.modal-body').html('<img img_val='+img+' id=cur_image src="'+base_url+"/uploads/product_image/"+img+'">');

    setTimeout(function(){
        $('#cur_image').Jcrop({

            //onSelect:    showCoords(c,width,height),
            onSelect:    function(c) { showCoords(c,width,height); },
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

function showCoords(c,width,height)
{

    var img_name=$('#cur_image').attr('img_val');
    //alert(img_name);

    $('#sub_image').attr('onclick',"crop_process('"+img_name+"','"+c.x2+"','"+c.y2+"','"+c.x+"','"+c.y+"','"+c.w+"','"+c.h+"',"+width+","+height+")");
}

function crop_process(image,x2,y2,x1,y1,w,h,width,height)

{

    // alert(image);

    $.facebox('Resizing Crop File...<img src="'+theme_url+'/images/ajax_loading.gif">');
    $.post(base_url+'/product/admin/product/resize_cropImage', {'image':image,'x2':x2,'y2':y2,'x1':x1,'y1':y1,'w':w,'h':h,width:width,height:height}, function(res) {

        var d = new Date();
        var n = d.getTime();

        $('img[name="'+image+'"][folder="'+width+'X'+height+'"]').attr('src',base_url+"/uploads/product_image/thumb/"+width+"X"+height+"/"+res+"?version="+n);

        $(document).trigger('close.facebox');

    });
}

function delImage(image,obj){

    $.post(base_url+"/product/admin/product/delimage",{'image':image},function(res){
        $(obj).parent().remove();
    });
}




function showcropbtn(){
    $(".crop-img").hide();
    $('.image-main-div').hover(
        function () {
            $(this).find(".crop-img").show();
        },
        function () {
            $(this).find(".crop-img").hide();
        }
    );

}
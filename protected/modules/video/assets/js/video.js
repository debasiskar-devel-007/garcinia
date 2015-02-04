$(function(){

        if($('#wrapper-Video_type').find('#Video_type').is(':checked')){
            $('#desktop_video').hide();
            $('#youtube_video').show();
        }

    
    $('#wrapper-Video_type').find('#Video_type').change(function(){
        if($(this).is(':checked')){
            $('#desktop_video').hide();
            $('#youtube_video').show();
        }else{
            $('#youtube_video').hide();
            $('#desktop_video').show();
        }
    });
    

    $('#file_upload_video').uploadify({ 
        'multi':false,
        'wmode': 'transparent',
        'fileExt':'*.flv',
        'fileSizeLimit': '1073741824', 
        'swf'      :asset_url+'/swf/uploadify.swf',
        'uploader' : base_url+'/video/admin/video/uploadify_process',
        'Default Value':'BROWES',
        'onUploadStart' : function(file) {
            $.facebox('File Uploading...<img src="'+base_url+'/images/ajax_loading.gif">');   
        },
        // Some options
        'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
            //$('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

        },

        'onUploadSuccess' : function(file, data, response) {
            $(document).trigger('close.facebox');

            if(data!='123'){
                $('#d_vid_name').val(data);
                $('#show_thumb').text(data);
            }

            $("#show_thumb1").find(".vid1").after('<div><div style="margin-top:-20px;margin-left:5px;position:relative"><a href="'+base_url+'/uploads/video/converted/'+data+'" target="_blank"></a><a href="'+base_url+'/uploads/video/converted/'+data+'" id="player" style="display:block;width:400px;height:300px;margin:10px;padding:1px;border:2px solid #ccc" > </a> </div></div>');
            flowplayer("player" ,base_url+'/swf/flowplayer.commercial-3.2.15.swf',{clip:{autoPlay:false}});


        } 


    });


    $('#file_upload_video-button1').click(function(){
        $('#selyoutubevid').modal('show'); 
    });
    
    $('#youtube_txt').keyup(function(event){
            if(event.keyCode == 13){
                 var search_key = $(this).val();
                if(search_key == ''){
                    alert('Please enter search key');
                    return false;
                }else{
                    var isyouTubeUrl = /((http|https):\/\/)?(www\.)?(youtube\.com)(\/)?([a-zA-Z0-9\-\.]+)\/?/.test(search_key);

                    searchyoutube(search_key);
                    
                }


            }
        });


});


//youtube search
function searchyoutube(search_input)
{
    if(search_input != ''){
        var keyword= encodeURIComponent(search_input);
        // Youtube API
        var yt_url='http://gdata.youtube.com/feeds/api/videos?q='+keyword+'&format=5&max-results=15&v=2&alt=jsonc';

        $.ajax
        ({
            type: "GET",
            url: yt_url,
            dataType:"jsonp",
            success: function(response)
            {
                if(response.data.items)
                    {
                    var final='';
                    for(s in response.data.items)
                        {
                        var c=response.data.items[s];

                        var video_id=c['id'];
                        var video_title=c['title'];
                        var video_viewCount=c['viewCount'];
                        // IFRAME Embed for YouTube


                        var video_framef="<iframe width='90%' height='206' src='http://www.youtube.com/embed/"+video_id+"' frameborder='0' type='text/html'></iframe>";

                        var video_frame='<div class="video_contain"><div class="video_contain_left">' + video_framef + '</div><div class="video_contain_right"><h1>'+ video_title+ '</h1><div class="btn btn-primary addbut" style=" margin:20px auto; display:block; float:none; width:60px;"><a  id="'+ c['id'] +'" videoid="' + c['id']+'" v_title="'+ video_title +'" v_desc="'+ c['description'] +'" style="cursor:pointer;">ADD</a></div></div><div style="clear:both"></div></div>';

                        var final=final+"<div>"+video_frame+"</div>";
                    }
                    $('#selyoutubevid').find('#videos2').html(final);
                    $('#selyoutubevid').modal('show');

                    $(".addbut").click(function(){
                        var video_id=$(this).children('a').attr('videoid');

                        $('#y_vid_name').val(video_id);
                        $('#show_thumb').html('<div style="width:480px;height:320px"><object width="480" height="320"><param value="http://www.youtube-nocookie.com/v/'+video_id+'?version=3&hl=en_US" name="movie"><param value="true" name="allowFullScreen"><param value="always" name="allowscriptaccess"><embed width="480" height="320" wmode="opaque" allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="http://www.youtube-nocookie.com/v/'+video_id+'?version=3&hl=en_US"></object><img class="closeImg2" src="'+base_url+'/images/close.png" title="Close Image"  style="margin-bottom:180px;" onclick="removeVideo(this)"></div><br /><br /><br />');
                        $('#selyoutubevid').modal('hide');

                        //selectVideo(video_id);


                    });




                }
                else
                    {
                    //$("#result").html("<div id='no'>No Video</div>");
                }
            }
        });
    }else{
        alert('Enter search keyword');
    }


}

function selectVideo(vid_id){

    //var vid_id=($(e).attr("vid_id"));
alert(vid_id);
    html='<div style="width:480px;height:320px"><object width="480" height="320"><param value="http://www.youtube-nocookie.com/v/'+vid_id+'?version=3&hl=en_US" name="movie"><param value="true" name="allowFullScreen"><param value="always" name="allowscriptaccess"><embed width="480" height="320" wmode="opaque" allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="http://www.youtube-nocookie.com/v/'+vid_id+'?version=3&hl=en_US"></object><img class="closeImg2" src="'+base_url+'/images/closebtn.png" title="Close Image"  style="margin-bottom:180px;" onclick="removeVideo(this)"></div><br /><br /><br />';
    $("#show_thumb").children("div.vid").after(html);
    //$("#show_thumb1").show();

}
function removeVideo(e){

    $("#y_vid_name").val('');
    $(e).parent('div').remove();
    //$('#hidden').val('');
    //alert($('#hidden').val());
    //$("#show_thumb").hide();
}
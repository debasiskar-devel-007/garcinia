
    var sel;
    var bulkstatus=0;
    function toggle(el)
    {
        //alert(el);
        if(bulkstatus!=1)
            {
            bootbox.dialog('Processing.. Please wait');
            sel=el;
        }
    }
 

    
$(function(){
    $('#scroller').find('img').css('cursor','pointer');

    $('#scroller').find('img').click(function()
     {
         var newlocation=($(this).parent().find('.slink').attr('href'));
         //var newlocation=$(this).parent().parent().find('.slink').click();
         window.location=newlocation;

     });
   // alert(2);s
    //setTimeout(function(){alert("Hello")},3000);

                
                setTimeout(function(){
                    //alert(1);
                   $('.simply-scroll-back').hover();
                   //alert($('.simply-scroll-back').lenght);

                },5000);
                
                

    $('#refresh').click(function(e)
    {
        //alert(9);
        var id='user-grid';
        var inputSelector='#'+id+' .filters input, '+'#'+id+' .filters select';
        
        $(inputSelector).each( function(i,o) {
            
            $(o).val('');
        });
        var data=$.param($(inputSelector));
        //alert($.param($(inputSelector)));
        $.fn.yiiGridView.update(id, {data: data});
        return false;
        });




/*This is for showing additional image in listing page */
    //alert(9);
    $(".additonal-image >img").click(function( index ) {
        var some_html="<h4>The tag for : "+$(this).parent().next().find('a').html()+"</h4></br>";
        some_html  += "<div style='display: table-cell;text-align: center;vertical-align: middle;height: 203px;width: 550px; margin:0 auto; float: none'><img src="+$(this).attr("src")+" width=auto align=center/></div>";
        /*some_html += '<h2>You can use custom HTML too!</h2><br />';
        some_html += '<h4>Just be sure to mind your quote marks</h4>';*/
        bootbox.alert(some_html);
    });

    $(".tag").click(function( index ) {
        var some_html="<h4>The tag for : "+$(this).parent().prevAll().eq(4).find('a').html()+"</h4></br>";
        //some_html  += "<div style='display: table-cell;text-align: center;vertical-align: middle;height: 203px;width: 550px; margin:0 auto; float: none'><img src="+$(this).attr("src")+" width=auto align=center/></div>";
        /*some_html += '<h2>You can use custom HTML too!</h2><br />';
         some_html += '<h4>Just be sure to mind your quote marks</h4>';*/
        some_html +="<div>"+$(this).attr('id')+"</div>";
        bootbox.alert(some_html);
    });
    
});

    function upgradegridjs()
    {
        /*$('*').tooltip();
        $(".additonal-image >img").click(function( index ) {
            var some_html="<h4>The additional image for : "+$(this).parent().next().find('a').html()+"</h4></br>";
            some_html  += "<div style='display: table-cell;text-align: center;vertical-align: middle;height: 203px;width: 550px; margin:0 auto; float: none'><img src="+$(this).attr("src")+" width=auto align=center/></div>";
            /*some_html += '<h2>You can use custom HTML too!</h2><br />';
             some_html += '<h4>Just be sure to mind your quote marks</h4>';*//*
            bootbox.alert(some_html);
        });*/

        $(".tag").click(function( index ) {
            var some_html="<h4>The tag for : "+$(this).parent().prevAll().eq(4).find('a').html()+"</h4></br>";
            //some_html  += "<div style='display: table-cell;text-align: center;vertical-align: middle;height: 203px;width: 550px; margin:0 auto; float: none'><img src="+$(this).attr("src")+" width=auto align=center/></div>";
            /*some_html += '<h2>You can use custom HTML too!</h2><br />';
             some_html += '<h4>Just be sure to mind your quote marks</h4>';*/
            some_html +="<div>"+$(this).attr('id')+"</div>";
            bootbox.alert(some_html);
        });
    }
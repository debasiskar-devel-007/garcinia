$(document).ready(function()
{
 
    

 $( "a[href^='#']" ).each(function( index ) {
     if($(this).attr('data-toggle')!='tab' && $(this).attr('href')!='#nav' && $(this).attr('title')!='Hide navigation')
        $(this).attr('href','javascript:void(0);');
    });
    
    

    var pageTitle = $(document).find("title").text();
    var actionTitle= "";
    actionTitle=$("h2#pageTitle").text();
    if(actionTitle != ""){
        $(document).find("title").text(actionTitle+" | "+pageTitle);
    }else{
        $(document).find("title").text(pageTitle);
    }

}
);
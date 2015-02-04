$(function(){

        var x=new Array();
        $("a[page_ink_id]").each(function(){
            
           x.push($(this).attr('page_ink_id')); 
    
        });
       $.post(base_url+'/cms/page/pagelink',
        {data:x},function(res){
            
            res =jQuery.parseJSON(res);
             for(x in res)
             {
                $( "a[page_ink_id*="+res[x]['id']+"]" ).attr( "href",base_url+"/"+res[x]['page_name'].replace(" ","-")); 
                
                 
             }
            
        }
        
        
        
        );               
                setTimeout(function(){
                   
                   $('.simply-scroll-back').hover();
                 

                },5000);
                

    
});
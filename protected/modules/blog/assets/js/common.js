
var sel;
 var bulkstatus=0;
    function toggle(el)
    {
        if(bulkstatus!=1)
            {
            bootbox.dialog('Processing.. Please wait');
            sel=el;
        }
    }
$(function(){

    if($('#UserManager_country').length ==1 ){
        getState($('#UserManager_country'),'UserManager_state',$('#sel_state').val());
    }

    if($('#UserManager_role').length ==1 ){
        isAffliate($('#UserManager_role'));
    }
    



        // Dock each summary as it arrives just below the docked header, pushing the
        // previous summary up the page.



    //$('.datepicker').find('.table-condensed').find('th.switch').css('background-color','#0879D1');

});

function getState(obj,sel_state_id,state_id){

  
    if(typeof(state_id) == 'undefined'){
        state_id = 0;
    }

    var con = $(obj).val();
    $('#'+sel_state_id).html("<option value=\"\">Select A State</option>");

    $.post(base_url+'/user/admin_user/getState',
    {con:con,state_id:state_id},
    function(res){
        $('#'+sel_state_id).html(res);
    });
}

function toggleloader(obj){
    var sel = obj;
    bootbox.dialog("Please Wait...");
}

$(function(){

    $( "#user-grid" ).find( "tbody").find('.empty').hide();
    $('#refresh').click(function(e)
    {
        //alert(9);
        var id='user-grid';
        var inputSelector='#'+id+' .filters input, '+'#'+id+' .filters select';
        $(inputSelector).each( function(i,o) {
            $(o).val('');
        });
        var data=$.param($(inputSelector));
        $.fn.yiiGridView.update(id, {data: data});
        return false;
    });
});


function isAffliate(obj){
    $('#UserManager_cpa').attr('readonly',true);
    $('#UserManager_cpl').attr('readonly',true);
    $('#UserManager_cpc').attr('readonly',true);

    var rolelist = $(obj).val();
    var role1=[];
    role1[0] = "1";
    role1[1] = "9";

    var is_affiliate = $.inArray( "9", rolelist );

    if(is_affiliate > -1){
        $('#UserManager_cpa').attr('readonly',false);
        $('#UserManager_cpl').attr('readonly',false);
        $('#UserManager_cpc').attr('readonly',false);
    }

}

//This is function to change password in admin user listing
function cngpass(obj){
    var uid = $(obj).attr('id');

    $("#cngpassModal").find('input#userid').val(uid);

    $("#cngpassModal").modal('show');

}

//This is function change password form validation
function formvalidate(){
    var pass = $("#cngpassModal").find('input#UserManager_password').val();
    var pass2 = $("#cngpassModal").find('input#UserManager_password2').val();

    if($.trim(pass) == ''){
        alert('Password cannot be blank.');
    }else if($.trim(pass).length < 6){
        alert('Password is too short (minimum is 6 characters)..');
    }else if($.trim(pass2) == ''){
        alert('Confirm Password cannot be blank.');
    }else if($.trim(pass2) != $.trim(pass)){
        alert('Passwords don\'t match');
    }else{
        $('#cngpassform').submit();
    }    
}

//This is function to show notes in admin user listing
function shownote(obj){
    var uid = $(obj).attr('id');
    
    $("#allloadingModal").modal('show');
    
    $.post(base_url+'/user/admin/user/renderNote',{'id':uid},function(res){
        
        $("#shownotesModal").find('.modal-body').html(res);
        
        $("#allloadingModal").modal('hide');
        
        $("#shownotesModal").modal('show');
    });

}
//this function for add note in admin user listing
function addnote(uid){
    
$("#addnotesModal").find('input#userid').val(uid);

    $("#shownotesModal").modal('hide');

    $("#addnotesModal").modal('show');
}

//This is function add note form validation
function formvalidate1(){
    var note = $("#addnotesModal").find('textarea#UserNotes_notes').val();

    if($.trim(note) == ''){
        alert('Note cannot be blank.');
    }else{
        $('#addnotesform').submit();
    }    
}


    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner.
        // This is the default behavior.


    });

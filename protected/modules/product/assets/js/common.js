$(function(){





    $('#vcode').tooltip({html:true});


    //if(x==1){
        //alert(x);
       // document.getElementById("#chk_bill_ship").checked = true;

    //}

  jQuery('div[rel="tooltip"]').tooltip();

    $('#chk_bill_ship').click(function(){

        if($(this).is(':checked')){

            //$('.ckbox').attr('attr',1);
            if($('#TransactionOrderDetails_shipping_fname').val() != '')
                $('#TransactionOrderDetails_billing_fname').val($('#TransactionOrderDetails_shipping_fname').val());
            if($('#TransactionOrderDetails_shipping_lname').val() != '')
                $('#TransactionOrderDetails_billing_lname').val($('#TransactionOrderDetails_shipping_lname').val());
            if($('#TransactionOrderDetails_shipping_add').val() != '')
                $('#TransactionOrderDetails_billing_add').val($('#TransactionOrderDetails_shipping_add').val());
            if($('#TransactionOrderDetails_shipping_state').val() != '')
                $('#TransactionOrderDetails_billing_state').val($('#TransactionOrderDetails_shipping_state').val());
            if($('#TransactionOrderDetails_shipping_city').val() != '')
                $('#TransactionOrderDetails_billing_city').val($('#TransactionOrderDetails_shipping_city').val());
            if($('#TransactionOrderDetails_shipping_zip').val() != '')
                $('#TransactionOrderDetails_billing_zip').val($('#TransactionOrderDetails_shipping_zip').val());
            if($('#TransactionOrderDetails_shipping_phone').val() != '')
                $('#TransactionOrderDetails_billing_phone').val($('#TransactionOrderDetails_shipping_phone').val());

              
        }
        else{


                $('#TransactionOrderDetails_billing_fname').val('');

                $('#TransactionOrderDetails_billing_lname').val('');;

                $('#TransactionOrderDetails_billing_add').val('');

                $('#TransactionOrderDetails_billing_state').val('');

                $('#TransactionOrderDetails_billing_city').val('');

                $('#TransactionOrderDetails_billing_zip').val('');

                $('#TransactionOrderDetails_billing_phone').val('');


        }
    });


    /*for(x in res){

      // alert(res[x]);
    }*/


/*write to select the product type and then on change bring the next drop down  as per selected type*/
  $('#LandingProductRelation_product_type').on('change',function(){
        //alert(1);

      var res=JSON.parse(arr);

      $('#LandingProductRelation_product_id').val('')
    $('#LandingProductRelation_product_id').attr('disabled',false);
      $('#LandingProductRelation_product_id').find('option').each(function()
      {

          var currentval=($(this).attr('value'));
          if(currentval!='')$(this).css('display','none');
            var currentproductval=$('#LandingProductRelation_product_type').val();
          for(x in res)
          {

              if(x==currentval)
              {
                  if(currentproductval==res[x]) $(this).css('display','block');
              }
          }


      });


     });


/*this function is fetch data according to the product id */
    $('#LandingProductRelation_product_id').change(function(){



        var proid=$(this).val();
         $('.input-box').show();
        $.post(base_url+'/product/landing_product/fetchpro',{proid:proid},function(res){

             var respro=JSON.parse(res);

          $('#LandingProductRelation_product_price').val(respro['productprice']);
          $('#LandingProductRelation_product_name').val(respro['productname']);
            CKEDITOR.instances['prodesc'].setData(respro['productdesc']);
          //$('#LandingProductRelation_product_desc').val(respro['productdesc']);

         //alert(respro['productprice']);


        });

        showimage(proid);

    });


   /* $("#mySelect").bind("click", function(){
        $("#myOtherSelect").children().remove();
        var myArray = [ "value1", "value2", "value3" ];
        for (var i = 0; i < myArray.length; i++) {
            $("#myOtherSelect").append( '<option value="' + myArray[i] + '">' + myArray[i] + '</option>' );
        }
        $("#myOtherSelect").attr( "size", myArray.length );
    });
*/


    /*To manage css of cart */

    /*To manage the inner-wraper width for adding buttons like continue shopping and checkout */

    if(controllerid=='shopping_cart' && actionid=='index') 
        { var divwidth=($('.inner-wrapper').height());
        $('.inner-wrapper').height(parseInt(divwidth+15));
    }
    /*end of inner - wrapper modification code block*/
    /*to manage the button css of cart page  */
    $('.btn2').find('a').css('color','#ffffff');
    $('.btn2').css('width','auto');
    $('.btn2').find('a').css('padding','0 10px 0 10px');


    $('a#coderefresh').click(function(){
        $.post(base_url+'/product/admin/promocode/refcode',{},function(res){
            $('#PromoCodeDetails_code_text').val(res);
        });
    });



});


$(function(){

    if($('#LandingProductRelation_product_type').length >0){
        ptype = $('#LandingProductRelation_product_type').val();
        ptype = parseInt(ptype);
        if(!isNaN(ptype)){
            $('#LandingProductRelation_product_id').attr('disabled',false);

            var res=JSON.parse(arr);
            $('#LandingProductRelation_product_id').find('option').each(function()
            {

                var currentval=($(this).attr('value'));
                if(currentval!='')$(this).css('display','none');
                var currentproductval=$('#LandingProductRelation_product_type').val();
                for(x in res)
                {

                    if(x==currentval)
                    {
                        if(currentproductval==res[x]) $(this).css('display','block');
                    }
                }


            });


            pid = $('#LandingProductRelation_product_id').val();
            pid = parseInt(pid);
            if(!isNaN(pid)){
                $('#show_thumb').parent().css('display','block');
                showimage(pid);
            }
        }
    }

});

function showimage(proid){

    $('#show_thumb').html('<div id="clr" class="clear:both;"></div>');

    var arr = product_imag_size;
    $.post(base_url+'/product/landing_product/fetchimg',{proid:proid},function(resimg){

        var d = new Date();
        var t = d.getTime();


        var imgarr=JSON.parse(resimg);
        if(imgarr.length > 0){

            for(m in imgarr){
                data = imgarr[m];
                var imghtm = '';
                for(n in arr){
                    imghtm += '<div class="image-main-div">' +
                        '<img style="max-height:150px;max-width:150px; border:solid 1px #979797;" src="'+base_url+'/uploads/product_image/thumb/'+arr[n][0]+'X'+arr[n][1]+'/'+data+'?version='+t+'" name="'+data+'" folder="'+arr[n][0]+'X'+arr[n][1]+'">' +
                        '<div class="crop-img" style="display: none;"><img src="'+asset_url+'/images/crop.png" onclick="crop_image(\''+data+'\','+arr[n][0]+','+arr[n][1]+')"></div>' +
                        '</div>';

                }

                $('#show_thumb').find('#clr').before('<div class="imglist-box2">'+
                    imghtm+
                    '<input type="hidden" value="'+data+'" />' +
                    '<input type="button" value="Select" onclick="selectimage(\''+data+'\')" />' +
                    '<div style="clear: both;"></div>' +
                    '</div>');

            }
        }
    });


}

function selectimage(imagename){
    $('#LandingProductRelation_product_image').val(imagename);
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

function addstock(obj){
    var id = $(obj).attr('id');
    window.location.href = base_url+'/product/admin/stock/add/id/'+id;
}

function checklogin(id){
    if(id != 0){
        window.location.href = base_url+'/product/checkout';
    }else{
        $("#showchecklogin").modal('show');
    }
}

function chk_promo_code(obj,total){
    $(obj).parent().children('div#err').text('');
    var promocode = $(obj).parent().children('input[type="text"]').val();
    if(promocode == ''){
        $(obj).parent().children('div#err').text('Please Enter Your Promocode');
    }else{
        $.post(base_url+'/product/checkout/checkpromo',{promocode:promocode,total:total},function(res){
            if(res == 1){
                $(obj).parent().children('div#err').text('This is Invalid Promocode');
            }
            if(res == 3){
                $(obj).parent().children('div#err').text('This Promocode is not valid in this purchase');
            }
            if(res == 2){
                window.location.reload();
            }
        });
    }
}

function hav_pcode(obj){

    saveformdata();
    if($(obj).is(":checked")){
        //$(obj).parent().parent().next('tr').show();
    }else{
        // $(obj).parent().parent().next('tr').hide();
        $.post(base_url+'/product/checkout/uncheckpromo',{},function(res){
            window.location.reload();
        });
    }
}
var attrarray= new Array();
var attrarrayvalue= new Array();
var val;
function saveformdata()
{
    $('#horizontalForm').find('input').each(function()
    {
        if(typeof($(this).attr('name'))!='undefined')
            {
            var attrname=$(this).attr('name').replace("TransactionOrderDetails","");
            attrname=attrname.replace("[","");
            attrname=attrname.replace("]","");
        }
        //alert(attrname+$(this).val());
        if(attrname!='on' && attrname!='' && typeof(attrname)!='undefined')
            {
            attrarray.push(attrname);
            //alert(attrname.length);
            attrarrayvalue.push($(this).val());
        }
        //alert(attrarray);
        //alert(attrname);


    });

    $('#horizontalForm').find('select').each(function()
    {
        //alert(9);
        if(typeof($(this).attr('name'))!='undefined')
            {
            var attrname=$(this).attr('name').replace("TransactionOrderDetails","");
            attrname=attrname.replace("[","");
            attrname=attrname.replace("]","");
        }
        //alert(attrname+$(this).val());
        if(attrname!='on' && attrname!='' && typeof(attrname)!='undefined')
            {
            attrarray.push(attrname);
            //alert(attrname.length);
            attrarrayvalue.push($(this).val());
        }
        //alert(attrarray);
        //alert(attrname);


    });

    $('#horizontalForm').find('textarea').each(function()
    {
        if(typeof($(this).attr('name'))!='undefined')
            {
            var attrname=$(this).attr('name').replace("TransactionOrderDetails","");
            attrname=attrname.replace("[","");
            attrname=attrname.replace("]","");
        }
        //alert(attrname+$(this).val());
        if(attrname!='on' && attrname!='' && typeof(attrname)!='undefined')
            {
            attrarray.push(attrname);
            //alert(attrname.length);
            attrarrayvalue.push($(this).val());
        }
        //alert(attrarray);
        //alert(attrname);


    });
    //alert(attrarray);
    $.post(base_url+'/product/checkout/saveformdata',{val:attrarray,value:attrarrayvalue},function(res){
        //window.location.reload();
        //alert(res);
    });
}


$(function()
{
   // alert($('#TransactionOrderDetails_shipping_country').val());
});


function changeType(obj){
    var typeval2 = $(obj).val();
    var divobj = $('#PromoCodeDetails_dis_value').parent().parent();
    $('#PromoCodeDetails_dis_value').val('0.00');
    if(typeval2 == 2){
        divobj.hide();
    }else{
        divobj.show();
    }
}

function autoship(obj,total){
    if($(obj).is(":checked")){

        $('#autoship_').find('input#totalval').val(total);
        $('#autoship_').modal('show');
        //        $.post(base_url+'/product/checkout/addautodis',{total:total},function(res){
        //            window.location.reload();
        //        });
    }else{
        $.post(base_url+'/product/checkout/removeautodis',{total:total},function(res){
            window.location.reload();
        });
    }
}

function settotalocc(obj){
    var total = $(obj).parent().find('input#totalval').val();
    var total_occ = $(obj).parent().find('select#total_occurrences').val();
    var occ_interval = $(obj).parent().find('select#occ_interval').val();
    $.post(base_url+'/product/checkout/addautodis',{total:total,total_occ:total_occ,occ_interval:occ_interval},function(res){
        window.location.reload();
    });
}

function cancel_subscription(obj){


    //var autoship_id = $(obj).attr('id');
    $('#autoshipModal').modal('hide');
    bootbox.dialog('Processing Please Wait...');
    $.ajax({
        url:base_url+'/product/admin/order/canSubscription',
        type: "POST",
        data:{autoship_id:obj},
        async:   true,
        success: function(res) {

            bootbox.hideAll();
            bootbox.alert('Your Chosen Transaction Has Been Canceled');


        }
    });

}

function buynow(pro_id){
    
    if($('#autoship_chk').is(':checked')){
        $.post(base_url+'/product/shopping-cart/add',{'id':pro_id,'quan':$('#quan').val(),'autoship':1},function(res){
            if(res > 0){
                            //window.location.href = base_url+'/product/checkout';
                            $('#nocart').text('('+res+')');
            }
        });
    }
    else{
        $('#myModal').modal('show');
    }
}

function buynow1(pro_id){
    //alert(1);
    
    if($('#autoship_chk'+pro_id).is(':checked')){
        $.post(base_url+'/product/shopping-cart/add',{'id':pro_id,'quan':$('#quan').val(),'autoship':1},function(res){
            if(res > 0){
                            window.location.href = base_url+'/product/checkout';
                            $('#nocart').text('('+res+')');
            }
        });
    }
    else{
        $('#myModal').find('.btn_isauto').attr('product_id',pro_id);
        $('#myModal').find('.btn_isauto1').attr('product_id',pro_id);
        $('#myModal').modal('show');
    }
}

//new function to buy a product

function buypro(pro_id,user_id,obj){
//alert(99);
    var productname = $(obj).attr('product-name');
    $('#anindiv').text(productname);

    $.post(base_url+'/product/shopping-cart/add',{'id':pro_id,'quan':$('#quan').val()},function(res){
            if(res > 0){

                $('#anindiv').show();
                $('#anindiv').css({position:'absolute',top:$(obj).offset().top,left:$(obj).offset().left})
                    .animate({top:$('#nocart').offset().top,left:$('#nocart').offset().left,scrollTop:$('#nocart').offset().top},2000,
                    function()
                    {
                        $('#anindiv').hide();
                    }
                );

                $('html,body').animate({ scrollTop: $("#nocart").offset().top},2000);

                window.locationeout(function(){
                    $('#nocart').text('('+res+')');
                    $('#myModal').modal('show');
                },2000);
            }
        });
        
        
       // $('#myModal').modal('show');
 
    
}
function buypro1(pro_id,user_id,obj){

        var productname = $(obj).attr('product-name');
        $('#anindiv').text(productname);

        $.post(base_url+'/product/shopping-cart/add',{'id':pro_id,'quan':1},function(res){
            if(res > 0){

                $('#anindiv').show();
                $('#anindiv').css({position:'absolute',top:$(obj).offset().top,left:$(obj).offset().left})
                    .animate({top:$('#nocart').offset().top,left:$('#nocart').offset().left,scrollTo:$('#nocart').offset().top},2000,
                    function()
                    {
                        $('#anindiv').hide();
                    }
                );

                $('html,body').animate({ scrollTop: $("#nocart").offset().top},2000);

                setTimeout(function(){
                    $('#nocart').text('('+res+')');
                    $('#myModal').modal('show');
                },2000);
            }
        });
        
        

        
}

function buywish(pro_id,user_id){
    if(user_id != 0){
           $.post(base_url+'/product/wishlist/add',{'id':pro_id,'user':user_id},function(res){
             if(res==0)
             {
                alert('item is already added'); 
                 
             }
             else
             {
                 
                 $('#nowish').text('('+res+')');  
             }
        });
        
        }
    
    else
    {
        $("#showcheckinglogin").modal('show');
    }
 
   
}
function delwish(obj,pro_id,user_id,wishlistid){
    var w_div = $(obj).parent().parent().parent();
    if(user_id != 0){
           $.post(base_url+'/product/wishlist/del',{'id':pro_id,'user':user_id,wishlistid:wishlistid},function(res){
               w_div.slideUp('slow');
             $('#nowish').text('('+res+')');  
        });
        
        }
    
    else
    {
        $("#showcheckinglogin").modal('show');
    }
 
   
}
//end of this
//cart edit

$(function(){
   
   $('.cart_quan').blur(function(){
      var quan = parseInt($(this).val());
      var pro_id = $(this).attr('product_id');
      if(!isNaN(quan)){
          if(quan > 0){
            $.post(base_url+'/product/shopping-cart/update',{'id':pro_id,'quan':quan},function(res){
                //alert(res);
                if(res ==1){
                    window.location.reload();
                }else{
                    outofstockmsg1(res);
                    window.location.reload();
                }
            });              
          }else{
            $.post(base_url+'/product/shopping-cart/del',{'id':pro_id},function(res){
                window.location.reload();
            }); 
          }             
      }else{
          window.location.reload();
      }
   });
   
    $(".cart_quan").keydown(function(event) {
       // alert(event.keyCode);
               // Allow only backspace and delete
        if ( event.keyCode == 46 || event.keyCode == 8 ) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.keyCode < 48 || event.keyCode > 57 && event.keyCode < 96 || event.keyCode >105) {
                event.preventDefault();    
            }

        }
    });
    
});


$(function(){
    $('#myModal').find('.btn_isauto').click(function(){
       // var autoship = $(this).attr('autoval');
        var product_id = $(this).attr('product_id');
        $.post(base_url+'/product/shopping-cart/add',{'id':product_id,'quan':$('#quan').val(),'autoship':autoship},function(res){
            if(res > 0){
                   
                            //window.location.href = base_url+'/product/checkout';
                            $('#nocart').text('('+res+')');
            }
        });
        
        $('#myModal').modal('hide'); 
    })
    
    
    //for checkout
        $('#myModal').find('.btn_isauto1').click(function(){
       // var autoship = $(this).attr('autoval');
        var product_id = $(this).attr('product_id');
        $.post(base_url+'/product/shopping-cart/add',{'id':product_id,'quan':$('#quan').val(),'autoship':autoship},function(res){
            if(res > 0){
                //alert(res);
                 $('#myModal').modal('hide');   
                            window.location.href = base_url+'/product/checkout';
                            $('#nocart').text('('+res+')');
            }
        });
    })
    
    
});

function setunsetauto(obj){
    saveformdata();
    var pro_id = $(obj).attr('product_id');
    if($(obj).is(':checked'))
        var status = 1;
    else
        var status=0;
    $.post(base_url+'/product/checkout/setunsetauto',{'id':pro_id,'type':status},function(res){
             window.location.reload();
             //$('#chk_promo_btn').click();
        });
}


function view_subscription(obj){
    var transcation_id = $(obj).attr('id');
    
        $('#autoshipModal').find('.modal-body').html('<div style="text-align:center;"><img src="'+base_url+'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>');
        $('#autoshipModal').modal('show');
    
    $.post(base_url+'/product/admin/order/viewautoshipdet',{transcation_id:transcation_id},function(res){
        $('#autoshipModal').find('.modal-body').html(res);
//        $('#autoshipModal').modal('show');
    });
}

function print_invoice(obj){
    var orderid = $(obj).attr('id');
    
    
        $('#autoshipModal').find('.modal-body').html('<div style="text-align:center;"><img src="'+base_url+'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>');
        $('#autoshipModal').modal('show');
    
    $.post(base_url+'/product/admin/order/printinvoice',{orderid:orderid},function(res){
        var url = base_url+'/images/pdf/'+res;
        $('#autoshipModal').modal('hide');
        window.open(url,'_blank');
    });
}

function send_duplicate(obj){
    var orderid = $(obj).attr('id');
    
    $('#autoshipModal').find('.modal-body').html('<div style="text-align:center;">Sending Mail <img src="'+base_url+'/images/ajax_loading.gif" alt="Loading..." /></div>');
        $('#autoshipModal').modal('show');
    
    $.post(base_url+'/product/admin/order/duplicatesend',{orderid:orderid},function(res){
        $('#autoshipModal').modal('hide');
    });
}

function update_subscription_form(obj){
    var autoship_id = $(obj).attr('id');
     $('#autoshipModal').find('.modal-body').html('<div style="text-align:center;"><img src="'+base_url+'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>');
        $('#autoshipModal').modal('show');
    $.post(base_url+'/product/admin/order/autoshipdetupform',{autoship_id:autoship_id},function(res){
         $('#autoshipModal').find('.modal-body').html(res);
    });
}

function send(){

   var data=$("#autoupForm").serialize();
 
 
  $.ajax({
   type: 'POST',
    url: base_url+'/product/admin/order/autoshipupdate',
   data:data,
success:function(data){
                alert(data); 
              },
   error: function(data) { // if error occured
         alert("Error occured.please try again");
         alert(data);
    },
 
  dataType:'html'
  });
 
}


function updategrid()
{
    var id='user-grid';
    var inputSelector=' input,  select';
    $(inputSelector).each( function(i,o) {
        $(o).val('');
    });
    var data=$.param($(inputSelector));
    $.fn.yiiGridView.update(id, {data: data});


    return false;

}

function updategrid1()
{
    var id='user-grid';
    var inputSelector=' input, select';
    $(inputSelector).each( function(i,o) {
       // $(o).val('');
    });
    var data=$.param($(inputSelector));
    $.fn.yiiGridView.update(id, {data: data});


    return false;

}


function outofstockmsg(){
    bootbox.dialog('This product is out of stock');
    setTimeout(function(){bootbox.hideAll();},2000);
}

function outofstockmsg1(res){
    //alert(res);
    bootbox.dialog('only '+res+' numbers of stock is avaliable');
    setTimeout(function(){bootbox.hideAll();},7500000);
}


$(function(){
    $('.notifyme').click(function(){
        $('#notifyemailModal').find('#notifyemail_em_').text('');
        $('#notifyemailModal').find('#notifyemail_em_').hide();
        $('#notifyemailModal').find('#proid_text').val(0);
        $('#notifyemailModal').find('#notifyemail').val('');

        var product_id = $(this).attr('product-id');
        var user_email = $(this).attr('user-email');

        if(user_email != ''){
            addnotify(user_email,product_id);
        }else{
            $('#notifyemailModal').find('#proid_text').val(product_id);
            $('#notifyemailModal').modal('show');
        }

    });
    $('#submitbtn').click(function(){
        var n_email = $('#notifyemailModal').find('#notifyemail').val();

        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

        if(n_email == ''){
            $('#notifyemailModal').find('#notifyemail_em_').text('Email cannot be blank.');
            $('#notifyemailModal').find('#notifyemail_em_').show();
        }else if(!filter.test(n_email)){
            $('#notifyemailModal').find('#notifyemail_em_').text('The email is not valid.');
            $('#notifyemailModal').find('#notifyemail_em_').show();
        }else{
            var n_proid = $('#notifyemailModal').find('#proid_text').val();

            addnotify(n_email,n_proid);

        }
    });
});

function addnotify(n_email,n_proid){
    $('.modal').modal('hide');
    bootbox.dialog('Sending...<img src="'+theme_url+'/images/ajax_loading.gif" alt="" />');
    $.post(base_url+'/product/default/addnotify',{email:n_email,product_id:n_proid},function(res){
        //bootbox.hide();
        bootbox.dialog('You will be notified soon when stock arise.');
        setTimeout(function(){ bootbox.hideAll(); },2000);
    });
}



$(document).ready(function() {
    
    if($('#colordiv').find('.colorhid').length > 0){
         $("#Product_is_color").attr("checked",true);
         $("#colordiv").show();
    }
    
    if($('#sizedivList').children('div').length > 0 && $('#sizedivList').children('div:first').find('input[name="size[]"]').val() != ''){
         $("#Product_is_size").attr("checked",true);
         $("#sizediv").show();
    }
    
    if($("#Product_is_color").is(":checked")==true){
                $("#colordiv").show();                                                                                    
            }
            else{
                $("#colordiv").hide();
            }
            
            if($("#Product_is_size").is(":checked")==true){
                $("#sizediv").show();                                                                                    
            }
            else{
                $("#sizediv").hide();
            }


    
        $('#picker').colpick({
            onSubmit:function(hsb,hex,rgb,el) {
                //$(el).css('background-color', '#'+hex);
                $(el).colpickHide();
                $('#picker').next('#colorlist').find('.clrs').before('<div style="height:30px; width:30px; border:#000 1px solid; background-color: #'+hex+'; margin:5px; float:left; cursor:pointer;" title="Click To Delete This Color" onclick="delcol(this,\''+hex+'\')">&nbsp;</div><input type="hidden" name="color[]" class="colorhid" value="'+hex+'" />');
            }
        });
    });

    function delcol(obj,col){
        $('input.colorhid[value="'+col+'"]').remove();
        $(obj).remove();
    }
    
    function addsizediv(obj){
       var divhtm = $(obj).parent().html();
          $('#sizedivList').append('<div>'+divhtm+'</div>'); 
    }
    
    
    function delsizediv(obj){
        if($('#sizedivList').children('div').length > 1){
            $(obj).parent().remove();
        }else{
            alert('Enter atleast 1 size.');
        }
    }
    
    $(function(){
        $('.sizesel').change(function(){
            var product_id = $(this).attr('product_id');
            var price =$(this).val();
            var size =$(this).find('option:selected').text();
            $.post(base_url+'/product/shopping_cart/addsize',{product_id:product_id,price:price,size:size},function(res){
                window.location.reload();
            });
        });
    });

function shipval(){

 var ship=$('#ship').val();
    $.post(base_url+'/product/checkout/addship',{ship:ship},function(res){
       window.location.reload();
        $('#ship').val('ship');
    });
}

function scrolltoform(){
    $('html, body').animate({ scrollTop: $("#horizontalForm").offset().top-100 }, 1000);
    $('#UserManager_fname').focus();
}


function scrolltoform1(){
    $('html, body').animate({ scrollTop: $(".top-header").offset().top-100 }, 1000);
    $('.top-header').focus();
}

function selship(obj){
    $.post(base_url+'/product/landing_product/fetchshipcharge',{id:$(obj).val()},function(res){
        alert(res);
    });
}

function selectproduct(obj){

    //alert(2);


    $('.buynow').css('background','none repeat scroll 0 0 #1699e4')
    $(".rightprice1").each(function(){

        $('.rightprice1').find('a').attr('s_pro',0);

        //$('.ck1').attr('checked', false);
    })

    var problock = $(obj).closest('.problock1');
    var pro_chk = problock.find('div.ck1');

    $('div.ck1').find('input').attr('checked',false);
    $('div.ck1').css('background-position','0 0');

    s_pro = $(obj).attr('s_pro');

    if(s_pro==0)
    {
        //$(obj).attr('s_pro',1);
        //s_pro1 = $(obj).attr('s_pro');

    if(pro_chk.length){
    pro_chk.find('input').attr('checked',true);
    pro_chk.css('background-position','0 -30px');
    }else{
        problock.find('input:checkbox').attr('checked',true);
    }

        $.post(base_url+'/product/landing_product/fetchlanding',{id:$(obj).attr('l_id')},function(res){

             var result=JSON.parse(res);

         if($(obj).attr('l_id')==12)
         {//alert(1);
             $('#TransactionOrderDetails_autoship_id').val(1);
             $('#TransactionOrderDetails_shiping_charge').val(result['modified_ship_charge']);
         }
            else
         {
             $('#TransactionOrderDetails_shiping_charge').val(result['ship_charge']);

         }

        $('#TransactionOrderDetails_landing_product_id').val($(obj).attr('l_id'));
        $('#TransactionOrderDetails_product_id').val(result['id']);
        $('#TransactionOrderDetails_subtotal').val(result['price']);

        $('#TransactionOrderDetails_product_name').val(result['name']);
        $('#TransactionOrderDetails_product_desc').val(result['desc']);
        $('#TransactionOrderDetails_product_quan').val(result['quan']);



            $('table#itemtbl').find('#proname').text(result['name']);
            if($(obj).attr('l_id')==12)
            {
            $('table#itemtbl').find('#proship').text("$"+parseFloat(result['modified_ship_charge']).toFixed(2));
                $('table#itemtbl').find('#prototal').text("$"+(parseFloat(result['price'])+parseFloat(result['modified_ship_charge'])).toFixed(2));
            }
           else
            {
                $('table#itemtbl').find('#proship').text("$"+parseFloat(result['ship_charge']).toFixed(2));
                $('table#itemtbl').find('#prototal').text("$"+(parseFloat(result['price'])+parseFloat(result['ship_charge'])).toFixed(2));

            }
            $('table#itemtbl').find('#proprice').text("$"+parseFloat(result['price']).toFixed(2));



            //if(s_pro1==1)
            $(obj).attr('s_pro',1);
            $(obj).css('background','none repeat scroll 0 0 #5cc316');


        });

    }
    else
    {

        if(pro_chk.length){
            pro_chk.find('input').attr('checked',true);
            pro_chk.css('background-position','0 -30px');
        }else{
            problock.find('input:checkbox').attr('checked',true);
        }

        $.post(base_url+'/product/landing_product/fetchlanding',{id:$(obj).attr('l_id')},function(res){

            var result=JSON.parse(res);

            if($(obj).attr('l_id')==12)
            {//alert(1);
                $('#TransactionOrderDetails_autoship_id').val(1);
            }

            $('#TransactionOrderDetails_landing_product_id').val($(obj).attr('l_id'));
            $('#TransactionOrderDetails_product_id').val(result['id']);
            $('#TransactionOrderDetails_subtotal').val(result['price']);
            $('#TransactionOrderDetails_shiping_charge').val(result['ship_charge']);
            $('#TransactionOrderDetails_product_name').val(result['name']);
            $('#TransactionOrderDetails_product_desc').val(result['desc']);
            $('#TransactionOrderDetails_product_quan').val(result['quan']);



            $('table#itemtbl').find('#proname').text(result['name']);
            $('table#itemtbl').find('#proship').text("$"+parseFloat(result['ship_charge']).toFixed(2));
            $('table#itemtbl').find('#proprice').text("$"+parseFloat(result['price']).toFixed(2));
            $('table#itemtbl').find('#prototal').text("$"+(parseFloat(result['price'])+parseFloat(result['ship_charge'])).toFixed(2));

            $(obj).attr('s_pro',0);
            $(obj).css('background','none repeat scroll 0 0 #1699e4')

        });

    }


}

function cng_chk(obj){
    if($(obj).is(':checked')){
        var btn_img = $(obj).closest('.problock1').find('a.buynow');
        selectproduct(btn_img);
    }else{
        $('#TransactionOrderDetails_landing_product_id').val("");
        $('#TransactionOrderDetails_product_id').val("");
        $('#TransactionOrderDetails_subtotal').val(0);
        $('#TransactionOrderDetails_shiping_charge').val(0);
        $('#TransactionOrderDetails_product_name').val("");
        $('#TransactionOrderDetails_product_desc').val("");
        $('#TransactionOrderDetails_product_quan').val(0);


        $('table#itemtbl').find('#proname').text("No Product");
        $('table#itemtbl').find('#proship').text("$0.00");
        $('table#itemtbl').find('#proprice').text("$0.00");
        $('table#itemtbl').find('#prototal').text("$0.00");
        $(obj).parent().parent().next().attr('s_pro',0);
        $(obj).parent().parent().next().find('a').css('background','none repeat scroll 0 0 #1699e4');
        //$(obj).css('background','none repeat scroll 0 0 #1699e4')

    }

}

$(function(){

    $('div.autoship_chk').click(function(){
        alert(1);

        var chk = $(this).find('input');
        if(chk.val() == $('#TransactionOrderDetails_landing_product_id').val()){
            if(chk.is(':checked')){
                $('#TransactionOrderDetails_autoship_id').val(1);
            }else{
                $('#TransactionOrderDetails_autoship_id').val(0);
            }
        }
    });





    if($('#TransactionOrderDetails_landing_product_id').length > 0){
        if($('#TransactionOrderDetails_landing_product_id').val() > 0){
            l_id = $('#TransactionOrderDetails_landing_product_id').val();

            selectproduct($(".buynow[l_id="+l_id+"]"));


        }
    }


});

var dataarr=new Array();
var dataarr1=new Array();

function getcsv()
{
    var id='user-grid';
    dataarr.length = 0;
    dataarr1.length = 0;

    var inputSelector=' input,  select';
    $(inputSelector).each( function(i,o) {


        var inputval =  $(o).val();


        var inputid= $(this).attr('id');
        inputid=inputid.replace("TransactionOrderDetails_","");

        dataarr.push(inputid);
        dataarr1.push(inputval);

    });


    $.post(base_url+'/product/admin/order/exporting',{data:dataarr,data1:dataarr1},function(res){
        //alert(res);
        window.location.href=base_url+'/product/admin/order/expcsv';
    });



}
function savenewsletter(id){
   //alert(id);
    var remember = document.getElementById('newsletter');
    if (remember.checked){
        var is_check=1;
    }else{
        is_check=0;
    }

    $.post(base_url+'/product/default/savenews',{user:id,is_check:is_check},function(res){
        if(res==1)
        {

            $.facebox($('#newsmsg').html());
            $("#facebox").css('left','18%');
            $("#facebox .close").css('left','88%');

            $('#newsletter').val('');
            $('.thkinput').val('');

        }
    });

}

function formerrorshow(form2,errors){
    errorL = eval('('+errors+')');

    $(form2).find('span.error').text('');

    for(n in errorL){
        $(form2).find('span#'+n+'_em_').text(errorL[n]);
        $(form2).find('span#'+n+'_em_').show();
    }
}

$(function(){
    $("#refundModal").find("#TransactionOrderDetails_rprolist").change(function(){
        if($(this).find('option:selected').attr('is_ref') ==1){
            $("#refundModal").modal("hide");
            bootbox.dialog("Already Refunded");
            setTimeout(function(){bootbox.hideAll();},10000);
            $(this).val("");
        }else{
            $("#refundModal").find("#TransactionOrderDetails_refundprovalue").val($(this).val());
            $("#refundModal").find("#TransactionOrderDetails_card_no").val($(this).find('option:selected').attr('card_no'));
            $("#refundModal").find("#TransactionOrderDetails_card_exp_mon").val($(this).find('option:selected').attr('exp_date'));
            $("#refundModal").find("#TransactionOrderDetails_card_exp_year").val($(this).find('option:selected').attr('exp_year'));
            $("#refundModal").find("#TransactionOrderDetails_transaction_id").val($(this).find('option:selected').attr('tran_id'));

            $("#refundModal").find("#poid").val($(this).find('option:selected').attr('poid'));
        }
    })
})


$(function(){

    $('#popuphome').click(function(){

        alert(1);
    })

if($('.ck1').length > 0){
    $('.ck1:checkbox').screwDefaultButtons({
        image: 'url("'+theme_url+'/images/checkboxSmall.png")',
        width: 26,
        height: 30
    });
}
if($('.ck2').length > 0){
    $('.ck2:checkbox').screwDefaultButtons({
        image: 'url("'+theme_url+'/images/checkboxSmall2.png")',
        width: 15,
        height: 16
    });
}


});


function upsellpro(orderid,ship,obj){

//alert(ship);
    var price=$(obj).attr('price');
    var proid=$(obj).attr('productid');
    var landingidid=$(obj).attr('landingidid');
    var name=$(obj).attr('name');
    var desc=$(obj).attr('desc');
    var quan=$(obj).attr('quan');
    var cardno=$(obj).attr('cardno');
    var cardmon=$(obj).attr('cardmon');
    var cardyear=$(obj).attr('cardyear');
    var type=$(obj).attr('type');

    $.post(base_url+'/product/default/savepro',{orderid:orderid,ship:ship,price:price,proid:proid,landingidid:landingidid,name:name,desc:desc,quan:quan,type:type,cardno:cardno,cardmon:cardmon,cardyear:cardyear},function(res){
        if(res==1)
        {

            $.facebox("<div id=success><div class=popup-wrapper><div style='color:#898989; font-family:lane_-_narrowregular;font-size:34px;text-align:center;'>Transaction was successful<br /><a  href="+base_url+"/product/default/bill/orderid/"+orderid+" style='font-size:16px; color:#eeeeee; text-align:center; display: inline-block; background: #262729;border-radius:4px; font-family:Arial, Helvetica, sans-serif; padding:5px 8px; margin-top:20px;'>Checkout</a></div></div>");
            $("#facebox").css('left','18%');
            $("#facebox .close").css('left','88%');
            setTimeout(function(){

                window.location.href = base_url+'/product/default/bill/orderid/'+orderid;
            },2000);





        }
        else{

            $.facebox("<div id=success><div class=popup-wrapper><div style='color:#000; font-family:lane_-_narrowregular;font-size:20px;text-align:center;'>"+res+"</div></div></div>")

        }

    });

}
function faceboxoff(){

    $.facebox.close();


}

function formerrorshow1(form2,errors){
    errorL = eval('('+errors+')');

    for(n in errorL){
        alert(errorL[n]);

    }
}






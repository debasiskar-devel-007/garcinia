

  <?php 
  
 $themeurl=yii::app()->theme->baseurl; 
  
  
  ?>  
<!--banner-->
<!--<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" /> -->

<!--<script src="js/facebox.js" type="text/javascript"></script> -->
<script type="text/javascript">
    function viewmap()
    {


        //$('#facebox').find('.content').css("height","600px");
        $.facebox($('#info1').html()); 
        $('#facebox').find('.content').css("height","600px"); 




    }

    /*function send()
    {
    $('.input1').val('');
    $('.input2').val('');
    bootbox.alert("Thank You! We will contact you soon");

    }  */

    $(document).ready(function(){


        var flag = '<?php echo @Yii::app()->session['contactsubmitvar']; ?>';
        //alert(flag);
        if(flag == 1)
            {

           bootbox.dialog("<div style=color:#000000>Thank You! We will Contact You Soon.</div>");
           // bootbox.dialog("Hello world!"); 
            $.get(base_url+'/ContactusManager/default/resetsession',function(res){


            });
        }


    });



    function viewmap1()
    {


        //$('#facebox').find('.content').css("height","600px");
        $.facebox($('#info2').html()); 
        $('#facebox').find('.content').css("height","600px"); 




    }
    
        function viewhotel()
    {


        //$('#facebox').find('.content').css("height","600px");
        $.facebox($('#info3').html()); 
        $('#facebox').find('.content').css("height","600px"); 




    }
    
            function viewBrochure()
    {


        //$('#facebox').find('.content').css("height","600px");
        $.facebox($('#info4').html()); 
        $('#facebox').find('.content').css("height","600px"); 




    }


</script>
<div class="inner-banner"> <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(87,$res) ?>" alt="#" /> </div>
<!-- end banner-->
<div class="inner-body">
    <h2 class="contact-text">CONTACT US INFORMATION</h2>
    <div class="contact-top-text">
        <!-- <p> For more information contact The Cowtown Management Team and one of our team will be happy to assist you to custom tailor your Range, Venue or Studio needs.</p>     -->
    </div>


    <div class="contact-left" style="line-height:24px;">
    
    <span style="color:#FD9B00;">Cowtown Hotels document</span><br />
     
        
        <input type="button" value="View Hotels" onclick="viewhotel()" class="btn"/><br />    
        
        
         <span style="color:#FD9B00;">Cowtown Brochure Document</span><br />
     
      
        <input type="button" value="View Brochure" onclick="viewBrochure()" class="btn"/><br />      
    
    
    
        <span style="color:#FD9B00;">Cowtown Management Group (Mailing Address)</span><br />

        28248 N. Tatum Blvd., B1-287<br />

        Cave Creek, Arizona 85331<br />
        <br />
        <input type="button" value="View in Google Map" onclick="viewmap()" class="btn"/><br />     


        <span style="color:#FD9B00;">Cowtown Range/Studios Facility (Physical Location)</span><br />

        10402 West Old Carefree Highway<br />

        Peoria, Arizona 85383<br />
        <br />
        <input type="button" value="View in Google Map" onclick="viewmap1()" class="btn"/><br />


        <span style="color:#FD9B00;">Are you interested in our range or facility? Please contact Steve:</span><br />

        Email:<a href="mailto:info@azcowtown.com" style="color:#FD9B00 ;">info@azcowtown.com</a><br />
        <br />


        <span style="color:#FD9B00;">To schedule range/studio time and check on availability contact John:</span><br />

        Email: <a href="mailto:scheduling@azcowtown.com" style="color:#FD9B00 ;">scheduling@azcowtown.com</a><br />
        <br />


        <span style="color:#FD9B00;">Are you interested in advertising at Cowtown or other marketing needs? Please <br />contact Paul:</span><br />

        Email: <a href="mailto:info@azcowtown.com" style="color:#FD9B00 ;">info@azcowtown.com</a><br />
        <br />


        <span style="color:#FD9B00;">General Information and Inquiries:</span><br />

        Email:<a href="mailto:info@azcowtown.com" style="color:#FD9B00 ;">info@azcowtown.com</a><br />



        <!--<div class="row-contain">
        <img src="images/c4.png" alt="#" />
        <div class="text-div">
        <h4>Craig Sawyer</h4>
        Cowtown Management Group - Director of Training Operations<br />
        <br />

        Craig "Sawman" Sawyer has an extensive tactical background including U.S. Marine Corps, U.S. Navy SEAL Team One and DEVGRU Operator, U.S. Federal Law Enforcement Agent and Manager, U.S. Government Tactical Contractor, Film and Television Producer, Host and Advanced Tactical Trainer.<div class="clear"></div>
        <a  href="#">Read More</a>
        </div>

        <div class="clear"></div>
        </div>-->

    </div>


    <div class="contact-right">
        <span style="color:#FD9B00;font-size:24px;display:block;padding-bottom:5px;">General Inquiry</span><br />


        <?php $this->renderPartial('ContactusManager.views.default.contact',array('model'=>new Contact(),'pagename'=>1)); ?>


    </div>



    <div class="clear"></div>


</div>
<div id="info1">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3317.71825215743!2d-111.97984100000002!3d33.742101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x872b7a4117f99423%3A0x2fa8680eb7417db7!2s28248+N+Tatum+Blvd!5e0!3m2!1sen!2sin!4v1393745721867" width="600" height="450" frameborder="0" style="border:0"></iframe>
</div>

<div id="info2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3315.453907542316!2d-112.28452499999999!3d33.80059765!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x872b5fa7c95fb17b%3A0x423ba7fbff6480f0!2sCowtown+Paintball!5e0!3m2!1sen!2sin!4v1393748113950" width="600" height="450" frameborder="0" style="border:0"></iframe>

</div>

<div id="info3" style="display: none;">
  <img src="<?php echo $themeurl ?>/images/pdfimg1.png" style="width: 99.7%; border: solid 2px #fff;" alt="#"/> 
</div>
<div id="info4" style="display: none;">
  <img src="<?php echo $themeurl ?>/images/pdfimg2.png" style="width: 99.7%; border: solid 2px #fff;" alt="#"/>  
</div>


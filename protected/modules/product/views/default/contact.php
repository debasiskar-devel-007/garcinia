<?php  $themeUrl = Yii::app()->theme->baseUrl;  

?>
<script type="text/javascript">
function send()
{
    $('.input1').val('');
    $('.input2').val('');
   bootbox.alert("Thank You! We will contact you soon");
    
}
</script>

<div class="main-wrapper">
  <div class="inner-wrapper">
  
      <div class="contact-contain">
      
      
        <div class="contact-left">
        
       

        
          <h2>Contact Info</h2>        
          
           <strong>Your comments, suggestions and inquiries are extremely important to us at RENUE COSMETICS LLC&trade;.</strong><br />

          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3222.6514653799513!2d-115.21848329999999!3d36.1263481!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c6c932dcbe13%3A0xa748949661132fb0!2s5600+W+Spring+Mountain+Rd+%23103!5e0!3m2!1sen!2s!4v1393484162670" width="600" height="450" frameborder="0" style="border:0"></iframe>
          
          <p>
          <strong>RENUE COSMETICS LLC HQ</strong><br />

<span>Corporate Office</span><br />

5600 West Spring Mountain Road Suite 103<br />

Las Vegas, Nevada 89146<br />

USA<br />

<span style="display:block; margin-top:15px;">Body Balance Office Phone</span>
 
<span>Main:</span> 1-702-818-4511<br />
<span>Toll Free Fax:</span>  1-855-854-3254<br /> 
<span>Email:</span>  info@valescere.com
          
          </p>
        
        </div>
        <div class="contact-right">
        <h2>Contact Form</h2>     
        <strong>Just complete the form below and a Valescere Representative will contact you shortly.</strong>        <br />
<br />

        <form>
        
     <label>Name:</label>           
     
     <input type="text" class="input1" />
       <label>Email Address: </label>           
     
     <input type="text" class="input1" />
       <label>Subject: </label>           
     
     <input type="text" class="input1" />
       <label>Message:</label> 
       <textarea  class="input2"></textarea>
        
<div class="clear"></div>
        
        <input type="button" value="Submit" class="btn1"  onclick="send()"/>
         <input type="submit" value="Cancel" " class="btn1" />
        </form>
        
        </div>
      
      
      
      <div class="clear"></div>
      </div>
  
  
    <div class="clear"></div>
  </div>
</div>

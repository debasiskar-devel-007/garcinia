<?php

class MailController extends MyController
{

    public function init(){
    }

    public function actionIndex()
    {
        $this->renderPartial('index');  
    }
    
    public function actionsendmail(){
            $type = intval($_POST['type']);
            
            $msg1 = '                     <p style="width:580px;margin:0 auto; margin-bottom: 10px; text-align: center;">If Images Are Not Displaying, Please <a href="https://purchasesecure.org/11006?affid=2021&subid=listname" target="_blank" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:16px;">Visit Here</a></p>
<div style=" width:580px;background:#edf7f9; box-shadow:0px 4px 11px #ccc; margin:0 auto; padding-bottom:20px;">

 <div style=" background:#0145ca; color:#fff; padding:15px 15px; font-family:Arial, Helvetica, sans-serif; font-size:34px; text-shadow:0 1px 2px #edf7f9; text-transform:uppercase; text-align:center;">Pure Garcinia Cambogia</div>
 
 <h1 style="font-size:25px; color:#0145ca; text-align:center; border-bottom:solid 1px #ddd; padding-bottom:30px;  width:80%; margin:25px auto;">Regarding Your Pending Order! </h1>
 
 <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:24px; width:90%; margin:30px auto; color:#0431a5; text-align:center;">As a friendly reminder, your FREE Pure Garcinia Cambogia is still in your cart and pending completion. To return to your cart and obtain your free package, please click on the button below. </p>

<a href="https://purchasesecure.org/11006?affid=2021&subid=listname" target="_blank" style="width:250px; background:#ffa000; margin:30px auto; display:block; text-align:center; color:#662602; text-decoration:none; padding:5px 15px; font-family:Arial, Helvetica, sans-serif; font-size:22px; border:solid 2px #fe9b03; border-radius:10px; box-shadow:0px 29px 46px #fddd00 inset; line-height:30px;">GET MY FREE Pure Garcinia Cambogia </a>

<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:24px; width:90%; margin:30px auto; color:#0431a5; text-align:center;">If the links in the email are not clickable, please move into inbox.  </p>


</div>
';

            $msg2 = '<p style="width:580px;margin:0 auto; margin-bottom: 10px; text-align: center;">If Images Are Not Displaying, Please <a href="https://purchasesecure.org/garstr101?affid=2021&subid=listname" target="_blank" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:16px;">Visit Here</a></p>
<div style=" width:580px;background:#fff1d4; box-shadow:0px 4px 11px #ccc; margin:0 auto; padding-bottom:20px;">
 <div style=" background:#edc52d; color:#7c3c00; padding:15px 15px; font-family:Arial, Helvetica, sans-serif; font-size:34px; text-shadow:0 1px 2px #edf7f9; box-shadow:3px 34px 35px #feeeb3 inset; text-transform:uppercase; text-align:center;">Pure Garcinia Cambogia</div>
 
 <h1 style="font-size:25px; color:#ff68b5; text-align:center; border-bottom:solid 1px #ff68b5; padding-bottom:30px;  width:80%; margin:25px auto;">Regarding Your Pending Order! </h1>
 
 <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:24px; width:90%; margin:30px auto; color:#000000; text-align:center;">As a friendly reminder, your FREE Pure Garcinia Cambogia is still in your cart and pending completion. To return to your cart and obtain your free package, please click on the button below. </p>

<a href="https://purchasesecure.org/garstr101?affid=2021&subid=listname" target="_blank" style="width:250px; background:#ffa000; margin:30px auto; display:block; text-align:center; color:#662602; text-decoration:none; padding:5px 15px; font-family:Arial, Helvetica, sans-serif; font-size:22px; border:solid 2px #fe9b03; border-radius:10px; box-shadow:0px 29px 46px #fddd00 inset; line-height:30px;">GET MY FREE Pure Garcinia Cambogia </a>

<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:24px; width:90%; margin:30px auto; color:#000000; text-align:center;">If the links in the email are not clickable, please move into inbox.  </p>


</div>
';

            $msg3 = '<p style="width:580px;margin:0 auto; margin-bottom: 10px; text-align: center;">If Images Are Not Displaying, Please <a href="http://smttrack.com/?a=33&c=342&s1=" target="_blank" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:16px;">Visit Here</a></p>
<div style=" width:580px;background:#eff6f9; box-shadow:0px 4px 11px #ccc; margin:0 auto; padding-bottom:20px;">
 <div style=" background:#008bd4; color:#fff; padding:15px 15px; font-family:Arial, Helvetica, sans-serif; font-size:34px; text-shadow:0 1px 2px #edf7f9; text-transform:uppercase; text-align:center;">Diabacor</div>
 
 <h1 style="font-size:25px; color:#008bd4; text-align:center; border-bottom:solid 1px #89d2f8; padding-bottom:30px;  width:80%; margin:25px auto;">Regarding Your Pending Order! </h1>
 
 <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:24px; width:90%; margin:30px auto; color:#008bd4; text-align:center;">As a friendly reminder, your FREE Diabacor is still in your cart and pending completion. To return to your cart and obtain your free package, please click on the button below. </p>

<a href="http://smttrack.com/?a=33&c=342&s1=" target="_blank" style="width:250px; background:#ecb647; margin:30px auto; display:block; text-align:center; color:#744404; text-decoration:none; padding:5px 15px; font-family:Arial, Helvetica, sans-serif; font-size:22px; border:solid 2px #e89325; border-radius:10px; box-shadow:0px 29px 46px #ede192 inset; line-height:30px;">GET MY FREE Diabacor </a>

<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:24px; width:90%; margin:30px auto; color:#008bd4; text-align:center;">If the links in the email are not clickable, please move into inbox.  </p>


</div>
';

            $msg4 = '<p style="width:580px;margin:0 auto; margin-bottom: 10px; text-align: center;">If Images Are Not Displaying, Please <a href="http://pacificmarketing.go2cloud.org/aff_c?offer_id=6&aff_id=1000&aff_sub=112" target="_blank" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:16px;">Visit Here</a></p>
<div style=" width:580px;background:#f5f8ed; box-shadow:0px 4px 11px #ccc; margin:0 auto; padding-bottom:20px;">
 <div style=" background:#457307; color:#fff; padding:15px 15px; font-family:Arial, Helvetica, sans-serif; font-size:34px; text-shadow:0 1px 2px #edf7f9; text-transform:uppercase; text-align:center;">Glycemate</div>
 
 <h1 style="font-size:25px; color:#ff7300; text-align:center; border-bottom:solid 1px #ff7300; padding-bottom:30px;  width:80%; margin:25px auto;">Regarding Your Pending Order! </h1>
 
 <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:24px; width:90%; margin:30px auto; color:#457307; text-align:center;">As a friendly reminder, your FREE Glycemate is still in your cart and pending completion. To return to your cart and obtain your free package, please click on the button below. </p>

<a href="http://pacificmarketing.go2cloud.org/aff_c?offer_id=6&aff_id=1000&aff_sub=112" target="_blank" style="width:250px; background:#62ce0c; margin:30px auto; display:block; text-align:center; color:#fff; text-decoration:none; padding:5px 15px; font-family:Arial, Helvetica, sans-serif; font-size:22px; border:solid 2px #68db0c; border-radius:10px; box-shadow:0px 29px 46px #70a944 inset; line-height:30px;">Get My Free Glycemate Trial </a>

<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:24px; width:90%; margin:30px auto; color:#457307; text-align:center;">If the links in the email are not clickable, please move into inbox.  </p>


</div>
';

switch ($type) {
    case 1:
        $msg = $msg1;
        $sub = "Email for Pure Garcinia Cambogia";
        break;
    case 2:
        $msg = $msg2;
        $sub = "Email for Pure Garcinia Cambogia";
        break;
    case 3:
        $msg = $msg3;
        $sub = "Email for Diabacor";
        break;
    case 4:
        $msg = $msg4;
        $sub = "Email for Glycemate";
        break;
    default:
        $msg = "Testing purpose";
        $sub = "Email for Test";
        break;
    
}            
            
                $mail = new YiiMailMessage();

                $content= $msg;
                $mail->addTo('betocparedes@gmail.com');
                $mail->addTo('lannahbpllc@gmail.com');
                $mail->addTo('debasiskar007@gmail.com');
                $mail->addTo('samsujj@gmail.com');
                $mail->from = ('info@azcowtown.com');
                $mail->setSubject($sub);
                $mail->setBody($content, 'text/html');

                Yii::app()->mail->send($mail);                  

    }



}

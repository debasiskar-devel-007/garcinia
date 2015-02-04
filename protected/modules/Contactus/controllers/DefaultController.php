<?php

class DefaultController extends Controller
{

    public function init(){
        yii::app()->theme='newfrontend';
        return true;
    }
        public function actionIndex()
    {
		
	$res =$_SERVER['HTTP_REFERER'];
	$r=explode("/",$res);
	
	
	
		
        $this->pageTitle = "Contactus || " .Yii::app()->params['site_url'];
        $model= new Contact('search');
        $res1 = 0;
        if(count($_POST)>0)
        {
            //var_dump($_POST);
            //exit;
            $model->attributes=$_POST['Contact'];

            if($model->validate())
            {
                $res1 = 1;
                $res="";
                $res=$model->insertdata();

                $arr['name']= $_POST['Contact']['name'];
                $arr['email']=   $_POST['Contact']['email'];
                $arr['subject']=   $_POST['Contact']['subject'];
                $arr['message']=   $_POST['Contact']['message'];
                $arr['phone']=   $_POST['Contact']['phone'];
              
                $this->actionSendMail($arr);      
                Yii::app()->session['contactsubmitvar'] = $res1;
                Yii::app()->session['arr'] = $arr;

            }
        }


        if(in_array('venue',$r))
	$this->redirect(Yii::app()->request->baseUrl.'/venue');
	else
        $this->redirect(Yii::app()->request->baseUrl.'/contact-us');
        
         

    }

    public function actionSendMail($studModel1)
    {

         //echo 1;
           
        $mail = new YiiMailer('contact');
         $model=new Mails();              
        $ad_mail=$model->fetchmail(); 
        //var_dump($ad_mail);
        //exit;              
                //set properties
                $mail->setFrom('info@azcowtown.com');
                $mail->setSubject('New Lead');
                //$mail->params(array('myMail'=>$studModel1));       
                  foreach($ad_mail as $r) {
           $r1[]=$r['email'];
                                                  

       }
           $mail->setAttachment((array('order.pdf'=>yii::app()->getBaseUrl(true).'/images/pdf/69.pdf')));
           $mail->setTo($r1);            
            var_dump($mail);
            exit;
                //send
                if ($mail->send()) {
                    
                    //echo "9999999999999999999999999999999";
                    Yii::app()->user->setFlash('newslettercon','Thank you for contacting us. We will respond to you as soon as possible.');
                } else {
                    Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
                }
                
         //$this->resetsession();
           unset(Yii::app()->session['arr']);
           
     /*   set_time_limit(0);
        $message=new YiiMailMessage;
        $model=new Mails();
        $ad_mail=$model->fetchmail();


        //this points to the file test.php inside the view path

        $message->view = "newslettercon";



        $params   = array('myMail'=>$studModel1);


        $message->subject    = 'New Lead';
        $message->setBody($params, 'text/html');
        foreach($ad_mail as $r) {
            $message->addTo($r['email']);
                                                   */

       // }
       // $message->from = 'support@azcowtown.com';
       // Yii::app()->mail->send($message);
    }
    public function actionResetsession()
    {

        unset(Yii::app()->session['contactsubmitvar']); 
        
        
    }
    


}
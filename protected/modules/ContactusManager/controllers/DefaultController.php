<?php

class DefaultController extends Controller
{

    public function init(){
        yii::app()->theme='newfrontend';
        return true;
    }
        public function actionIndex($pagename)
    {
		echo $pagename;
exit;
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

                $this->actionSendMail($arr);      
                Yii::app()->session['contactsubmitvar'] = $res1;

            }
        }


        if($pagename==1)
        $this->redirect(Yii::app()->request->baseUrl.'/contact-us');
        else
        $this->redirect(Yii::app()->request->baseUrl.'/venue');
         

    }


    public function actionSendMail($studModel1)
    {


        set_time_limit(0);
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


        }
        $message->from = 'support@azcowtown.com';
        Yii::app()->mail->send($message);
    }
    public function actionResetsession()
    {

        unset(Yii::app()->session['contactsubmitvar']); 

    }

}
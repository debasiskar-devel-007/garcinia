<?php

class DefaultController extends MyController
{

    public function init(){
        Yii::app()->theme = 'front';
        Yii::app()->setImport(array(
        'user.controllers.Admin_userController',
        ));
    }

    public function actionIndex()
    {
        $this->redirect(Yii::app()->getBaseUrl(true));
    }


    //This is sign up function for user and affiliate
    //URLManager : for user : user-sign-up
    //URLManager : for affiliate : affiliate-sign-up
    public function actionSign_up($role='user'){
        $model = new UserManager('add1');
         $this->PageTitle= ucfirst($role)." Sign Up";

        switch($role)
        {
            case 'user':
                $role_id = 2;
                break;
            case 'affiliate':
                $role_id = 9;
                break;
            default:
                $role_id = 2;
        }
        
        if(count($_POST)>0)
        {   

            $model->attributes=$_POST['UserManager'];
            if($model->validate())
            {
                $is_email = 1;
                $insertid = $model->saveproduct($is_email);

                $roleRel = new UserRoleRelation();

                $roleRel->addRole($insertid,$role_id);

                /*        this is for sending emails */
                $mail = new YiiMailMessage();

                $content= '<strong style="color:#167db3;">Successfully signed up as an User</strong><br /><br />Please <a href="'.Yii::app()->getBaseUrl(true).'/login">Click Here</a> to log in.<br /><br /><strong style="color:#167db3;">Your credentials are listed below:</strong><br /><br />E-Mail: <span style="color:#167db3;">'.@$_POST['UserManager']['email'].'</span><br />';

                $mail->addTo(@$_POST['UserManager']['email']);
                $mail->from = ('info@azcowtown.com');
                $mail->setSubject('User Sign Up');
                $mail->setBody($content, 'text/html');

                Yii::app()->mail->send($mail);                  

                Yii::app()->user->setFlash('success', "You have signed up successfully.");

                $this->redirect(Yii::app()->request->baseUrl."/login");
            }else{
                $val_error = $model->getErrors();
                print_r($val_error);
            }
        }

        $roleList = Admin_userController::getUserRole();
        $countryList = Admin_userController::getCountryList();

        $this->render('signup',array('model'=>$model,'roleList'=>$roleList,'countryList'=>$countryList,'role'=>$role));

    }

    //This is sign in function
    public function actionLogin($page=""){
        
        $model = new UserLogIn('login');

        $sess = Yii::app()->session['sess_user'];

        $this->PageTitle = "Login";
        if(!empty($sess)){
            $this->redirect(Yii::app()->getBaseUrl(true));
        }

        if(count($_POST)>0)
        {   
            $model->attributes=$_POST['UserLogIn'];   
            if($model->validate())
            {
                $data = $_POST['UserLogIn'];

                $res = $model->checkLogin($data);
                
               if(count($res) >0){

                    //if($res['info']['is_active'] == 1 && $res['info']['is_email_active'] == 2){
                    if($res['info']['is_active'] == 1){

                        $arr['id'] = $res['info']['id'];
                        $arr['email'] = $res['info']['email'];


                        if(count($res['role']) > 0){
                            foreach($res['role'] as $row){
                                $arr['role'][] = $row['role_id'];
                            }
                        }

                        Yii::app()->session['sess_user'] = $arr;

                        $redirect_page = Yii::app()->session['login_redirect_url'];



                        if(!empty($redirect_page)){
                            unset(Yii::app()->session['login_redirect_url']);
                            $this->redirect($redirect_page);
                        }

                        $this->redirect(Yii::app()->getBaseUrl(true));

                    }else{
                        Yii::app()->user->setFlash('error', "This User is not acivate.");
                    }

                }else{
                    Yii::app()->user->setFlash('error', "Username Password does not match");
                }
            }

        }

        $this->render('login',array('model'=>$model));

    }

    //This is function for log out
    public function actionLogout(){
        unset(Yii::app()->session['sess_user']);
        $this->redirect(Yii::app()->getBaseUrl(true));
    }


    //This is for forgot password
    public function actionForgot_password(){
        $this->PageTitle = "Forgot Password";
        $model = new ForgotPassword('fp');

        if(count($_POST) > 0){
            $model->attributes=$_POST['ForgotPassword'];
            if($model->validate()){
                $email = $_POST['ForgotPassword']['user_email'];
                $res = $model->checkMail($email);

                if(!empty($res['id'])){

                    $str=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',6)),0,6);
                    $data['active_code'] = $str;
                    $data['user_email'] = $email;
                    $data['time'] = time();

                    $model->savecode($data);

                    Yii::app()->session['sess_f_email'] = $email;

                    /*        this is for sending emails */

                    $content= '<strong style="color:#167db3;">Your activation code is :</strong><span style="color:#167db3;">'.$str.'</span><br /><br />';

                    $mail = new YiiMailMessage();


                    $mail->addTo(@$email);
                    $mail->from = ('info@azcowtown.com');
                    $mail->setSubject('Rest Your Password');
                    $mail->setBody($content, 'text/html');

                    Yii::app()->mail->send($mail);

                    Yii::app()->user->setFlash('success', "Check your mail. And enter code from mail.");
                    $this->redirect(Yii::app()->request->baseUrl."/user/default/forgot-password-second-step");
                }else{
                    Yii::app()->user->setFlash('error', "This email does not exist.");
                }
            }
        }

        $this->render('forgot_password',array('model'=>$model));
    }


    //This is for forgot password
    public function actionForgot_password_second_step(){
        $this->PageTitle = "Forgot Password";
        $model = new ForgotPassword('ss');

        if(count($_POST) > 0){
            $data['user_email'] = Yii::app()->session['sess_f_email'];
            $model->attributes=$_POST['ForgotPassword'];
            if($model->validate()){
                $data['active_code'] = $_POST['ForgotPassword']['active_code'];
                $res = $model->checkCode($data);
                if(!empty($res['id'])){
                    Yii::app()->session['sess_f_id'] = $res['id'];
                    $this->redirect(Yii::app()->request->baseUrl."/user/default/change-password");
                }else{
                    Yii::app()->user->setFlash('error', "Your code is invalid.");
                }
            }
        }

        $this->render('forgot_password2',array('model'=>$model));
    }

    //This is for forgot password
    public function actionChange_password(){
        $this->PageTitle = "Change Password";
        $model = new ForgotPassword('cp');

        $data['id'] = Yii::app()->session['sess_f_id'];
        $data['email'] = Yii::app()->session['sess_f_email'];

        if(count($_POST) > 0){
            $model->attributes=$_POST['ForgotPassword'];
            if($model->validate()){

                $pass = $_POST['ForgotPassword']['new_password'];
                $data['password'] = md5($pass);
                $res = $model->changePassword($data);

                unset(Yii::app()->session['sess_f_id']);
                unset(Yii::app()->session['sess_f_email']);

                /*        this is for sending emails */
                $mail = new YiiMailMessage();

                $content= '<strong style="color:#167db3;">Your password changed successfully.</strong><br />';

                $mail->addTo(@$data['email']);
                $mail->from = ('info@valescere.com');
                $mail->setSubject('Change Password Successfully');
                $mail->setBody($content, 'text/html');

                Yii::app()->mail->send($mail);

                Yii::app()->user->setFlash('success', "Your password changed successfully. Please Log in.");
                $this->redirect(Yii::app()->request->baseUrl."/login");
            }
        }

        $this->render('change_password',array('model'=>$model));
    }


    //This is function to activate user in email verification
    public function actionSetActivate($id){

        $model = new UserManager();

        $res = $model->findAll('id ='.$id);

        if(@$res[0]['is_email_active'] == 2){
            Yii::app()->user->setFlash('success', "Your email is already verified.");
        }else{
            $data['pk'] = $id;
            $data['name'] = 'is_email_active';
            $data['value'] = 2;

            $model->updatetable($data);

            Yii::app()->user->setFlash('success', "Your email is successfully verified.");
            Yii::app()->user->setFlash('notice', "Wait for admin approved");



        }

        $this->redirect(Yii::app()->request->baseUrl."/login");
    }

    //This function to set affiliate code
    public function actionset_affiliate_code($id=0,$page=0){

        Yii::app()->request->cookies['affliate_id'] = new CHttpCookie('affliate_id', intval($id),array('expire'=>time()+2592000));
        Yii::app()->request->cookies['landing_page_id'] = new CHttpCookie('landing_page_id', intval($page),array('expire'=>time()+2592000));

        if(intval($page) == 2){
            $this->redirect(Yii::app()->getBaseUrl(true).'/free-shipping');
        }

         $this->redirect(Yii::app()->getBaseUrl(true));

    }






}

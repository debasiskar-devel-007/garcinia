<?php

class Admin_accountController extends MyController
{
    public function init(){
        Yii::app()->theme = 'account';
        $this->PageTitle= "My Account";
        $c_url = Yii::app()->request->hostInfo . Yii::app()->request->url;

        $sess = Yii::app()->session['sess_user'];


        if(empty($sess)){
            Yii::app()->session['login_redirect_url'] = $c_url;
            $this->redirect(Yii::app()->getBaseUrl(true).'/login');

        }
    }

    public function actionAccountinfo()
    {
        $this->PageTitle= "My Account";
        
        $model= new AccountInfo();
        $sess = Yii::app()->session['sess_user'];

        $id = $sess['id'];
        $result=$model->fetch($id);
        if(!empty($sess))
        {

            if(count($_POST))
            {
                $result->attributes = $_POST['AccountInfo'];
                if($result->validate())
                {

                    $arr['fname']= $_POST['AccountInfo']['fname'];
                    $arr['lname']= $_POST['AccountInfo']['lname'];
                    $arr['phone']= $_POST['AccountInfo']['phone'];
                    $arr['dob']= $_POST['AccountInfo']['dob'];
                    $arr['city']= $_POST['AccountInfo']['city'];
                    $arr['state']= $_POST['AccountInfo']['state'];
                    $arr['country']= $_POST['AccountInfo']['country'];
                    $arr['address']= $_POST['AccountInfo']['address'];
                    $arr['gender']= $_POST['AccountInfo']['gender'];


                    $model->updatedetails($id,$arr);
                    Yii::app()->user->setFlash('success', "Your Account Information Has Been Changed.");
                    $this->redirect(Yii::app()->request->baseUrl."/user/admin/account/accountinfo");

                }
            }
            $countryList = Admin_accountController::getCountryList();

            $this->render('account',array('model'=>$result,'countryList'=>$countryList)); 
        }

        else
        {
            $this->redirect(Yii::app()->request->baseUrl."/user/default/login");

        }
    }

    public function actionChangepassword()
    {
        $this->PageTitle= "Change Password";
        
        $model= new Password();
        $sess = Yii::app()->session['sess_user'];

        $id = $sess['id'];
        if(!empty($sess))
        {
            if(count($_POST))
            {
                $model->attributes = $_POST['Password'];

                if($model->validate())
                {

                    $pass=($_POST['Password']['oldpassword']);
                    $r=$model->checkpass($pass,$id);


                    if(!empty($r['id']))
                    {
                        if($_POST['Password']['password']==$_POST['Password']['password2'])
                        {$arr['password']= md5($_POST['Password']['password']);
                            $model->updatedetails($id,$arr);
                            Yii::app()->user->setFlash('success', "Your Password Has Been Changed.");
                            $this->redirect(Yii::app()->request->baseUrl."/user/admin/account/changepassword");
                        } 
                        else
                        {
                            Yii::app()->user->setFlash('error', "Your Password and Confirm Password does not matched.");
                        }

                    }
                    else
                    {
                        Yii::app()->user->setFlash('error', "Your OLDPassword and Confirm Password does not matched.");
                    }

                }  


            }

            $this->render('changepass',array('model'=>$model)); 
        }
        else
        {
            $this->redirect(Yii::app()->request->baseUrl."/user/default/login");

        }
    }

    public function actionChangemail()
    {
        $this->PageTitle= "Change Email";
        
        $model= new Changemail();

        $sess = Yii::app()->session['sess_user'];

        $id = $sess['id'];
        if(!empty($sess))
        {
            if(count($_POST))
            {
                $model->attributes = $_POST['Changemail'];
                if($model->validate())
                {
                    if($_POST['Changemail']['email']==$_POST['Changemail']['reentermail'])
                    {$arr['email']= $_POST['Changemail']['email'];
                        $model->updatedetails($id,$arr);
                        Yii::app()->user->setFlash('success', "Your email Has Been Changed.");
                        $this->redirect(Yii::app()->request->baseUrl."/user/admin/account/changemail");
                    }
                    else

                        Yii::app()->user->setFlash('error', "Your Email and Confirm Email does not matched.");
                    $this->redirect(Yii::app()->request->baseUrl."/user/admin/account/changemail");

                }  

            }

            $this->render('mailchange',array('model'=>$model)); 
        }
        else
        {
            $this->redirect(Yii::app()->request->baseUrl."/user/default/login");

        }
    }


    public function actionDashboard()
    {

        $this->render('index'); 
    }

    public function actionWishlist()
    {
        $this->PageTitle= "My Wishlist";
        $this->render('wishlist'); 

    }
        public static function getCountryList(){
        $model = new Country();

        $res = $model->findAll();

        $arr[''] = "Select A Country";
        foreach($res as $row){
            $arr[$row['id']] = $row['s_name'];
        }

        return $arr;
    }
    
        public function actionGetState(){
        $con_id = intval($_POST['con']);
        $state_id = intval($_POST['state_id']);

        $res = $this->getStateList($con_id);


        $html = "<option value=\"\">Select A State</option>";


        foreach($res as $key=>$val){
            $str = "";
            if($state_id == $key){
                $str = "selected=\"selected\"";
            }
            $html .="<option ".$str." value=\"".$key."\">".$val."</option>";
        }

        echo $html;



    }
    
        public function getStateList($id=0){
        $model = new State();

        $res = $model->findAll('i_cnt_id = '.$id);

        $arr = array();
        foreach($res as $row){
            $arr[$row['id']] = $row['s_st_name'];
        }

        return $arr;
    }
    
    
        public function actionOrder()
    {
        $this->PageTitle= "My Order";
        
        $model= new TransactionOrderDetails('search');

        $sess = Yii::app()->session['sess_user'];

        $id = $sess['id'];
         if(isset($_GET['TransactionOrderDetails']))
        {
            $model->total=$_GET['TransactionOrderDetails']['total'];
            $model->order_time=$_GET['TransactionOrderDetails']['order_time'];
            $model->shipping_status=$_GET['TransactionOrderDetails']['shipping_status'];
            $model->transaction_id=$_GET['TransactionOrderDetails']['transaction_id'];
            $model->transaction_status=$_GET['TransactionOrderDetails']['transaction_status'];
            

        } 
        
        
        $ship_status = ShippingStatus::model()->findAll();
        $shiping_status_arr = array();
        foreach($ship_status as $row){
            $shiping_status_arr[$row['shipping_status_id']] = $row['shipping_status_val'];
        }
        
      $this->render('myorder',array('model'=>$model,'id'=>$id,'shiping_status_arr'=>$shiping_status_arr)); 

        
        
    }

    public function actiongrabcode(){
        $this->render('grabcode');
    }
}
<?php

class DefaultController extends MyController
{

    public function init(){
        Yii::app()->theme = 'front';
        $this->pageTitle = "Product";
        Yii::import('application.modules.user.models.UserManager');
        Yii::import('application.modules.gallery.models.Gallery');



    }

    public function actionIndex()
    {

        $this->pageTitle = "Home";

        $model= new UserManager('index');
        if(count($_POST) > 0){
            $model->attributes = $_POST['UserManager'];
            if($model->validate()){
                if(isset(Yii::app()->request->cookies['affliate_id'])){
                    $affiliate_id = Yii::app()->request->cookies['affliate_id'];
                    $model->affiliate_id = (string)$affiliate_id;
                }
                if(isset(Yii::app()->request->cookies['landing_page_id'])){
                    $landing_page_id = Yii::app()->request->cookies['landing_page_id'];
                    $model->landing_page_id = (string)$landing_page_id;
                }
                $model->is_partial =1;
                $model->save();
                $insert_id = $model->id;
                Yii::app()->session['last_insert_id'] = $insert_id;

                $this->redirect(Yii::app()->getBaseUrl(true).'/product/default/cart-page');
            }
        }



        $this->render('index',array('model'=>$model));
    }

    public function actionlanding2()
    {

        $this->pageTitle = "Home";

        $model= new UserManager('index');
        if(count($_POST) > 0){
            $model->attributes = $_POST['UserManager'];
            if($model->validate()){
                if(isset(Yii::app()->request->cookies['affliate_id'])){
                    $affiliate_id = Yii::app()->request->cookies['affliate_id'];
                    $model->affiliate_id = (string)$affiliate_id;
                }
                if(isset(Yii::app()->request->cookies['landing_page_id'])){
                    $landing_page_id = Yii::app()->request->cookies['landing_page_id'];
                    $model->landing_page_id = (string)$landing_page_id;
                }
                $model->is_partial =1;
                $model->save();
                $insert_id = $model->id;
                Yii::app()->session['last_insert_id'] = $insert_id;

                $this->redirect(Yii::app()->getBaseUrl(true).'/product/default/cart-page');
            }
        }



        $this->render('landing2',array('model'=>$model));
    }

    public function actioncart_page(){


        $last_insert_id =  Yii::app()->session['last_insert_id'];
        $uid=0;


        if(intval($last_insert_id) == 0){
            $model= new TransactionOrderDetails('submit');
            //$this->redirect(Yii::app()->getBaseUrl(true));

        }
        else{

            $usermodel = new UserManager();
            $res = $usermodel->model()->findAll('id='.$last_insert_id);

            $model= new TransactionOrderDetails('submit');

            $model->shipping_fname = @$res[0]['fname'];
            $model->shipping_lname = @$res[0]['lname'];
            $model->billing_email = @$res[0]['email'];
            $model->shipping_city = @$res[0]['city'];
            $model->shipping_zip = @$res[0]['zip'];
            $model->shipping_state = @$res[0]['state'];
            $model->shipping_phone = @$res[0]['phone'];
        }

        if(count($_POST) > 0){

            $strcard=base64_encode(substr($_POST['TransactionOrderDetails']['card_no'], -4));
            $strexpmon=base64_encode($_POST['TransactionOrderDetails']['card_exp_mon']);
            $strexpyear=base64_encode(substr($_POST['TransactionOrderDetails']['card_exp_year'],-2));
            $model->attributes = $_POST['TransactionOrderDetails'];
            if($model->validate()){
                //$model->save();

                if(isset(yii::app()->session['offerval'])){
                    if(yii::app()->session['offerval']==1){

                        //$price= $_POST['TransactionOrderDetails']['subtotal']/2;
                        $offertext='50%';
                    }
                    else if(yii::app()->session['offerval']==2){
                        //$price= $_POST['TransactionOrderDetails']['subtotal']/4;
                        $offertext='75%';
                    }
                    else{
                        $offertext='N/A';
                        //$price=$_POST['TransactionOrderDetails']['subtotal'];
                    }

                    unset(yii::app()->session['offerval']);
                }
                else{
                    $offertext='N/A';
                    //$price=$_POST['TransactionOrderDetails']['subtotal'];
                }




                $payable_amount = number_format(floatval($_POST['TransactionOrderDetails']['subtotal']+$_POST['TransactionOrderDetails']['shiping_charge']+$_POST['TransactionOrderDetails']['tax']),2);
                //$p_response = $this->payment($_POST['TransactionOrderDetails'],$payable_amount);

                $promod=new Product();
                $upsellamt=$promod->model()->findAll('productid=50');
                //echo $_POST['TransactionOrderDetails']['card_exp_mon'].$_POST['TransactionOrderDetails']['card_exp_year'];
                //exit;
                //echo $strexpmon;
                $authorization_amount=$payable_amount+10*$upsellamt[0]['productprice'];

                yii::app()->session['authorizationamt']=$authorization_amount;
                yii::app()->session['payable']=$payable_amount;

                $lastorderid=$model->fetchlastorder();
                // echo $lastorderid[0]['orderid'];
                //exit;
                require_once(Yii::app()->basePath.'/vendors/nmi/nmi.php');

                if(intval($_POST['TransactionOrderDetails']['autoship_id'])){


                    $recurring=1;
                    //$model->is_autoship = $_POST['TransactionOrderDetails']['autoship_id'];




                }
                else{
                    $model->is_autoship=0;

                    $recurring=0;

                }


                $gw = new nmi;

                $gw->setLogin("CDIMEDIA", "P@ss1234");
                $gw->setBilling($_POST['TransactionOrderDetails']['shipping_fname'],$_POST['TransactionOrderDetails']['shipping_lname'],"Acme, Inc.",$_POST['TransactionOrderDetails']['shipping_add'],"Suite 200",$_POST['TransactionOrderDetails']['shipping_city'],
                    $_POST['TransactionOrderDetails']['shipping_state'],"90210",254,$_POST['TransactionOrderDetails']['shipping_phone'],"555-555-5556",$_POST['TransactionOrderDetails']['billing_email'],"website"
                );
                $gw->setShipping($_POST['TransactionOrderDetails']['billing_fname'],$_POST['TransactionOrderDetails']['billing_lname'],"na",$_POST['TransactionOrderDetails']['billing_add'],"Suite Ship",$_POST['TransactionOrderDetails']['billing_city'],
                    $_POST['TransactionOrderDetails']['billing_state'],$_POST['TransactionOrderDetails']['billing_zip'],254,$_POST['TransactionOrderDetails']['billing_email']);


                $gw->setOrder($lastorderid[0]['orderid']+rand(5,10000000),"Order",0,0,$_POST['TransactionOrderDetails']['shipping_phone'],$this->getIP());

                //$r = $gw->doSale("150.00","4111111111111111","1225");
                $r = $gw->doAuth1($authorization_amount,$_POST['TransactionOrderDetails']['card_no'],$_POST['TransactionOrderDetails']['card_exp_mon'].$_POST['TransactionOrderDetails']['card_exp_year'],'',$recurring);
                //$gw->responses;
                //var_dump($gw->responses);
                //exit;

                yii::app()->session['transactionid']=$gw->responses['transactionid'];

                //var_dump($gw->responses);

                //$response=$gw->responses['response'];
                // $response=explode('&',$response);

                /* var_dump($gw->responses['response']);
                 var_dump($gw->responses['responsetext']);
                 var_dump($gw->responses['authcode']);
                 var_dump($gw->responses['transactionid']);
                 var_dump($gw->responses['response_code']);*/
                //exit;

                //var_dump($authorization_amount);


                if($gw->responses['response'] == 1){
                    $userArray['fname']=$_POST['TransactionOrderDetails']['shipping_fname'];
                    $userArray['lname']=$_POST['TransactionOrderDetails']['shipping_lname'];
                    $userArray['address']=$_POST['TransactionOrderDetails']['shipping_add'];
                    $userArray['city']=$_POST['TransactionOrderDetails']['shipping_city'];
                    $userArray['state']=$_POST['TransactionOrderDetails']['shipping_state'];
                    $userArray['country']=254;
                    $userArray['phone']=$_POST['TransactionOrderDetails']['shipping_phone'];
                    $userArray['email']=$_POST['TransactionOrderDetails']['billing_email'];
                    $userArray['is_partial']=0;
                    if($recurring==1){

                        $model->autoship_status=1;
                        $model->is_autoship=$gw->responses['subscription_id'];
                        $date=strtotime(date('Ymd'));
                        $newDate = date('m/d/Y',strtotime('+15 days',$date));
                        $model->autoship_startdate=$newDate;


                    }
                    else{

                        $model->autoship_status=0;
                        $model->is_autoship=0;
                        $model->autoship_startdate='N/A';

                    }

                    if(intval($last_insert_id) != 0){

                        $usermodel->updateByPk($last_insert_id,$userArray);
                        $order_user_id = $last_insert_id;
                    }
                    else
                    {
                        $modeluser= new UserManager;
                        $uid=$modeluser->savenewdata($userArray);
                        $order_user_id = $modeluser->id;

                    }

                    unset(Yii::app()->session['last_insert_id']);

                    $model->transaction_id = $gw->responses['transactionid'];
                    $model->transaction_status = "Success";
                    $model->billing_country = "US";
                    $model->shipping_country = "US";






                    $model->user_id = intval($order_user_id);
                    $model->order_time = $order['time'] = time();
                    $model->total = $order['total'] = $payable_amount;
                    if(isset(Yii::app()->request->cookies['affliate_id'])){
                        $affiliate_id = Yii::app()->request->cookies['affliate_id'];
                        $affiliate_id = (string)$affiliate_id;
                        $model->affiliate_code = $affiliate_id;
                        $aff_det = UserManager::model()->findAll('id='.$affiliate_id);
                        $model->cpa_rate = $aff_det[0]['cpa'];
                    }
                    if(isset(Yii::app()->request->cookies['landing_page_id'])){
                        $landing_page_id = Yii::app()->request->cookies['landing_page_id'];
                        $model->landing_id = (string)$landing_page_id;
                    }

                    $model->save();
                    $order_id = $order['id'] = $model->orderid;

                    $m_pro_dat['order_id'] = $order_id;
                    $m_pro_dat['landing_product_id'] = $_POST['TransactionOrderDetails']['landing_product_id'];
                    $m_pro_dat['product_id'] = $_POST['TransactionOrderDetails']['product_id'];
                    $m_pro_dat['product_name'] = $_POST['TransactionOrderDetails']['product_name'];
                    $m_pro_dat['product_desc'] = $_POST['TransactionOrderDetails']['product_desc'];
                    $m_pro_dat['product_price'] = $_POST['TransactionOrderDetails']['subtotal'];
                    $m_pro_dat['product_quantity'] = $_POST['TransactionOrderDetails']['product_quan'];
                    $m_pro_dat['card_last_four'] =$strcard;
                    $m_pro_dat['card_exp_month'] = $strexpmon;
                    $m_pro_dat['card_exp_year'] = $strexpyear;
                    $m_pro_dat['product_type'] = 1;
                    $m_pro_dat['offervalue'] = $offertext;
                    $m_pro_dat['shipping_cost']=@$_POST['TransactionOrderDetails']['shiping_charge'];

                    $pro_mod = new TransactionProductDetails();
                    $pro_mod->attributes = $m_pro_dat;

                    $pro_mod->card_last_four=$m_pro_dat['card_last_four'];
                    $pro_mod->transaction_id= $model->transaction_id;
                    $pro_mod->card_exp_month=$m_pro_dat['card_exp_month'];
                    $pro_mod->card_exp_year=$m_pro_dat['card_exp_year'];

                    $pro_mod->save();



                   // if(intval($_POST['TransactionOrderDetails']['autoship_id'])){
                        /*$autoship_payable_amount = 69.95;
                        $autores = $this->autoshippayment($_POST['TransactionOrderDetails'],$autoship_payable_amount);

                        $auto_mod = new AutoshipManage();
                        $date=strtotime(date('Y-m-d'));

                        $newDate = date('Y-m-d',strtotime('+15 days',$date));
                        $auto_mod->amount = $autores['amount'];
                        $auto_mod->autoship_response_code = $autores['subscription_id'];
                        $auto_mod->autoship_response_text = $autores['response_text'];
                        $auto_mod->totalOccurrences = $autores['total_occ'];
                        $auto_mod->start_date = $newDate;
//
                        $auto_mod->sub_interval = $autores['sub_interval'];
                        $auto_mod->status = 1;
                        $auto_mod->transaction_id = $p_response->transaction_id;
                        $auto_mod->product_id = $m_pro_dat['landing_product_id'];
                        $auto_mod->product_name = $m_pro_dat['product_name'];

                        $auto_mod->save();*/
                 //   }





                    $mail = new YiiMailMessage();

                    $params              = array('order'=>$order,'order_ship_bill_details'=>$_POST['TransactionOrderDetails'],'order_product_details'=>$m_pro_dat,'autoship'=>intval($_POST['TransactionOrderDetails']['autoship_id']));

                    $mail->view = "orderlist";

                    if($_POST['TransactionOrderDetails']['billing_email']!='')$mail->addTo($_POST['TransactionOrderDetails']['billing_email']);
                    $mail->AddBCC('debasiskar007@gmail.com');
                    $mail->AddBCC('bhaskar.involutiontech@gmail.com');
                    //$mail->AddBCC('Gkelly@nutrikel.com');
                    //$mail->AddBCC('matt@strategicimprovementassociates.com');
                    //$mail->from = ('admin@buynaturalcurves.com');
                    $mail->setFrom(array('admin@garcinia-body.com' => 'garcinia-body.com'));
                    $mail->setSubject('Transaction Successful');
                    $mail->setBody($params, 'text/html');

                    //$swiftAttachment = Swift_Attachment::fromPath('./images/pdf/'.$file_name);
                    //$mail->attach($swiftAttachment);
                    // if(!empty($order_ship_bill_details['billing_email']))
                    Yii::app()->mail->send($mail);


                    if(intval($last_insert_id) != 0){
                        $userlanding=UserManager::model()->findAll('id='.$last_insert_id);

                    }
                    else
                    {

                        $userlanding=UserManager::model()->findAll('id='.$uid);

                    }
                    $modellanding= new LandingProductRelation();
                    $res=$modellanding->checkupsell($landing_page_id);
                    if($res==1)
                    {
                        //$paydata['profile_id'] = $this->tran_create_profile($_POST['TransactionOrderDetails']['billing_email']);
                        //$paydata['pay_profile_id'] = $this->tran_create_payment_profile($paydata['profile_id'],$_POST['TransactionOrderDetails']);
                        //$paydata['ship_profile_id'] = $this->tran_create_shipping_profile($paydata['profile_id'],$_POST['TransactionOrderDetails']);

                        //Yii::app()->session['paydata'] = $paydata;



                        $this->redirect(Yii::app()->getBaseUrl(true).'/product/default/upsell/id/'.$landing_page_id.'/orderid/'.$model->orderid);
                    }
                    else
                    {
                        $this->redirect(Yii::app()->getBaseUrl(true).'/product/default/bill/orderid/'.$model->orderid);
                    }


                    //  unset(Yii::app()->session['last_insert_id']);
                    //  Yii::app()->request->cookies->clear();
                    // $this->redirect(Yii::app()->getBaseUrl(true).'/product/default/thanks-page/id/'.$model->user_id);

                }else{
                    Yii::app()->user->setFlash('msg', $gw->responses['responsetext']);
                }
            }


        }


        $pro_res = Product::model()->findAll();
        $product_det = @$pro_res[0];


        $this->render('cart_page',array('model'=>$model,'product_det'=>$product_det));
    }

    public function actionthanks_page(){
        $user_id=$_GET['id'];
        $model= new Product();
        $this->render('thanks_page',array('model'=>$model,'id'=>$user_id));
    }


    //This is get State list in coutry wise aray from state table
    public function getStateList($id=0){
        $model = new State();

        $res = $model->findAll('i_cnt_id = '.$id.' order by s_st_name');

        $arr = array();
        $arr[""]="Select One";
        foreach($res as $row){
            $arr[$row['id']] = $row['s_st_name'];
        }

        return $arr;
    }

    public function getStateCode($id=0){
        $val ="";
        $model = new State();
        $res = $model->findAll('id = '.$id);

        if(count($res)){
            $val = $res[0]['s_st_iso'];
        }
        return $val;
    }



    public function payment($data,$payable_amount){

        require_once(Yii::app()->basePath . '/payment_anet/AuthorizeNet.php');

        $transaction = new AuthorizeNetAIM(yii::app()->params['g_loginname'], yii::app()->params['g_transactionkey']);


        $transaction->amount = number_format($payable_amount,2);
        $transaction->card_num = $data['card_no'];
        $transaction->exp_date = $data['card_exp_mon'].'/'.$data['card_exp_year'];

        $transaction1 = (object)array();
        $transaction1->first_name = $data['billing_fname'];
        $transaction1->last_name = $data['billing_lname'];
        $transaction1->company = "";
        $transaction1->address = $data['billing_add'];
        $transaction1->city = $data['billing_city'];
        $transaction1->state = $this->getStateCode($data['billing_state']);
        $transaction1->zip = $data['billing_zip'];
        $transaction1->country = "US";
        $transaction1->phone = $data['billing_phone'];
        $transaction1->fax = "";
        $transaction1->email = $data['billing_email'];
        $transaction1->ship_to_first_name=$data['shipping_fname'];
        $transaction1->ship_to_last_name=$data['shipping_lname'];
        $transaction1->ship_to_address=$data['shipping_add'];
        $transaction1->ship_to_city=$data['shipping_city'];
        $transaction1->ship_to_state=$this->getStateCode($data['shipping_state']);
        $transaction1->ship_to_zip=$data['shipping_zip'];
        $transaction1->ship_to_country="US";
        $transaction1->tax=$data['tax'];
        $transaction1->email_customer=FALSE;


        $transaction1->customer_ip = $this->getIP();


        $transaction->setFields($transaction1);

        if(!YII_MODE)
            $transaction->setSandbox(TRUE);
        else
            $transaction->setSandbox(TRUE);

        $response = $transaction->authorizeAndCapture();

        return $response;


    }


    public function autoshippayment($data,$autoship_payable_amount){


        $g_loginname = yii::app()->params['g_loginname']; // Keep this secure.
        $g_transactionkey = yii::app()->params['g_transactionkey']; // Keep this secure.
        $g_apihost =yii::app()->params['g_apihost'];
        $g_apipath = yii::app()->params['g_apipath'];

        require_once(Yii::app()->basePath . '/payment_anet/authnetfunction.php');

        $total_occ = 36;
        $occ_interval = 1;

        $date=strtotime(date('Y-m-d'));  // if today :2013-05-23

        $newDate = date('Y-m-d',strtotime('+15 days',$date));

        //define variables to send
        $amount = $autoship_payable_amount;
        $refId = "";
        $name = "test";
        $length = $occ_interval;
        $unit = "months";
        $startDate = $newDate;
        $totalOccurrences = $total_occ;
        $trialOccurrences = 0;
        $trialAmount = 0;
        $cardNumber = $data['card_no'];
        $expirationDate = $data['card_exp_year'].'-'.$data['card_exp_mon'];
        $firstName = "test";
        $lastName = "test";

//build xml to post
        $content =
            "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
            "<ARBCreateSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
            "<merchantAuthentication>".
            "<name>" . $g_loginname . "</name>".
            "<transactionKey>" . $g_transactionkey . "</transactionKey>".
            "</merchantAuthentication>".
            "<refId>" . $refId . "</refId>".
            "<subscription>".
            "<name>" . $name . "</name>".
            "<paymentSchedule>".
            "<interval>".
            "<length>". $length ."</length>".
            "<unit>". $unit ."</unit>".
            "</interval>".
            "<startDate>" . $startDate . "</startDate>".
            "<totalOccurrences>". $totalOccurrences . "</totalOccurrences>".
            "<trialOccurrences>". $trialOccurrences . "</trialOccurrences>".
            "</paymentSchedule>".
            "<amount>". $amount ."</amount>".
            "<trialAmount>" . $trialAmount . "</trialAmount>".
            "<payment>".
            "<creditCard>".
            "<cardNumber>" . $cardNumber . "</cardNumber>".
            "<expirationDate>" . $expirationDate . "</expirationDate>".
            "</creditCard>".
            "</payment>".
            "<billTo>".
            "<firstName>". $firstName . "</firstName>".
            "<lastName>" . $lastName . "</lastName>".
            "</billTo>".
            "</subscription>".
            "</ARBCreateSubscriptionRequest>";

        $response = send_request_via_curl1($g_apihost,$g_apipath,$content);

        $res_arr = array();

        if ($response)
        {
            /*
        a number of xml functions exist to parse xml results, but they may or may not be avilable on your system
        please explore using SimpleXML in php 5 or xml parsing functions using the expat library
        in php 4
        parse_return is a function that shows how you can parse though the xml return if these other options are not avilable to you
        */
            list ($refId, $resultCode, $code, $text, $subscriptionId) =parse_return($response);


            $res_arr['response_code'] = $resultCode;
            $res_arr['response_reason_code'] = $code;
            $res_arr['response_text']= $text;
            $res_arr['ref_id'] = $refId;
            $res_arr['subscription_id'] = $subscriptionId;
            $res_arr['amount'] = $amount;
            $res_arr['total_occ'] = $total_occ;
            $res_arr['start_date'] = date('m/d/Y',strtotime("+".$occ_interval." months"));
            $res_arr['sub_interval'] = $occ_interval;
        }


        return $res_arr;
    }

    public function actioncanSubscription(){
        $autoship_id = $_POST['autoship_id'];

        $autoship_det = AutoshipManage::model()->findByPK($autoship_id);
        $subs_id = $autoship_det['autoship_response_code'];
        $subscriptionId = intval($subs_id);

        $g_loginname = yii::app()->params['g_loginname']; // Keep this secure.
        $g_transactionkey = yii::app()->params['g_transactionkey']; // Keep this secure.
        $g_apihost =yii::app()->params['g_apihost'];
        $g_apipath = yii::app()->params['g_apipath'];

        require_once(Yii::app()->basePath . '/payment_anet/authnetfunction.php');

        $content =
            "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
            "<ARBCancelSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">".
            "<merchantAuthentication>".
            "<name>" . $g_loginname . "</name>".
            "<transactionKey>" . $g_transactionkey . "</transactionKey>".
            "</merchantAuthentication>" .
            "<subscriptionId>" . $subscriptionId . "</subscriptionId>".
            "</ARBCancelSubscriptionRequest>";

//send the xml via curl
        $response = send_request_via_curl1($g_apihost,$g_apipath,$content);
        if ($response)
        {
            AutoshipManage::model()->updateByPk($autoship_id,array('status'=>2,'cancel_date'=>date('m/d/Y')));
        }


    }


    public function getIP(){

        if (!empty($_SERVER['HTTP_CLIENT_IP'])){   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }









    //These are old function


    public function actionlisting(){

        yii::app()->params['pageactive']='home';
        $model= new Product();

        $this->render('listing',array('model'=>$model));
    }

    public function actionlisting1(){

        yii::app()->params['pageactive']='productlist';
        $model= new Product();

        $this->render('listingproduct',array('model'=>$model));
    }



    public function actionwishlist(){
        $c_url = Yii::app()->request->hostInfo . Yii::app()->request->url;

        $sess = Yii::app()->session['sess_user'];


        if(empty($sess)){
            Yii::app()->session['login_redirect_url'] = $c_url;
            $this->redirect(Yii::app()->getBaseUrl(true).'/login');
        }

        $this->pageTitle = 'Wishlist';
        $model= new Product();

        $this->render('wishlist',array('model'=>$model));
    }

    public function actiondetails($id=0,$name="",$catagoryid=0){
        yii::app()->params['pageactive']='productlist';
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/custom.js'), CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/elastislide.js'), CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/imagezoom.js'), CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/details.js'), CClientScript::POS_HEAD);

        $model= new Product();
        $result = $model->fetchSingle($id);
        $cat=new Category();
        $catname=$cat->fetchcatname($catagoryid);
        $catname=$catname[0]['categoryname'];
        $this->pageTitle = $result['productname']." || ".$catname." || products";
        $result1 = $model->fetchallbycat($id,$catagoryid);
        $model1=new ProductStock();
        $res=$model1->availstock($id);
        //echo "<pre>";
        $st=$res[0]['avail_stock'];
        //echo $st;
        //exit;




        /*
                foreach($res as $s)
                {
                  $stock[]=$s['stock'];

                }

                 echo  count($stock);
                exit;*/

        $this->render('details',array('result'=>$result,'result1'=>$result1,'st'=>$st));
    }


    public function actiondetailscat($id=0,$name=""){


        $model= new Product();
        //$result = $model->fetchSingle($id);
        $this->pageTitle = $name;

        $this->render('listing1',array('model'=>$model,'id'=>$id));
    }



    public function actionTerms()
    {

        $this->render('termscondition');

    }
    public function actionPolicy()
    {

        $this->render('pol');

    }

    public function actionAboutus()
    {
        $this->pageTitle = "About" ;
        $this->render('about');

    }


    public function actionContactus()
    {

        $this->render('contact');

    }

    public function actionGallery()
    {
        $this->pageTitle = "Gallery";
        $this->render('gal');

    }

    public function actionNews()
    {

        $this->render('news');

    }

    public function actionNews1()
    {

        $this->render('news1');

    }

    public function actionTestimonial()
    {

        $this->render('testimonial');

    }

    //Insert cookie id in Database in per click
    public function set_cookie_perclick($id=0,$page=1){
        $model = new AffiliatePerClick();

        $aff_id = (string)$id;

        $res = UserManager::model()->fetchdetail($aff_id);

        $cpc = $res['cpc'];



        $model->affiliate_code = $aff_id;
        $model->page_id = $page;
        $model->ip_address = Yii::app()->request->getUserHostAddress();
        $model->time = time();
        $model->cpc_rate = $cpc;

        $model->save();
    }

    public function actiondownload_product($id=0){
        $res = DownloadableProduct::model()->findAll('id = '.$id);
        $pro_id = $res[0]['product_id'];
        $validtime = $res[0]['time']+(72*60*60);
        $curtime = time();
        if($validtime > $curtime){

            $pro_res = Product::model()->findAll('productid ='.$pro_id);
            $filename = $pro_res[0]['file_name'];
            $origname = $pro_res[0]['original_name'];

            $path = Yii::app()->request->hostInfo . Yii::app()->request->baseURL . '/uploads/files/' . $filename;
            return Yii::app()->getRequest()->sendFile($origname, @file_get_contents($path));

        }else{
            echo 1;
        }
    }

    public function actionaddnotify(){
        $model = new NotifyList();
        $res=$model->checknotify($_POST);
        if($res!=0)
        {
            $model->attributes=$_POST;
            $model->time = time();

            $model->save();
        }


    }
    public function actionsavenews(){
        $user=$_POST['user'];
        $select=$_POST['is_check'];
        $model= new Newsletter();
        $model->user_id=$user;
        $model->has_select=$select;
        $model->time=time();
        $model->save();
        echo 1;


    }


    public function actionrefund(){

        $post_url = "https://test.authorize.net/gateway/transact.dll";

        $post_values = array(

            // the API Login ID and Transaction Key must be replaced with valid values
            "x_login"			=> "27BKdvPU8h",
            "x_tran_key"		=> "6H5Uennu7655d9M9",

            "x_version"			=> "3.1",
            "x_delim_data"		=> "TRUE",
            "x_delim_char"		=> "|",
            "x_relay_response"	=> "FALSE",

            "x_type"			=> "CREDIT",
            "x_trans_id"        => '2219638436',
            "x_method"			=> "CC",
            "x_card_num"		=> "4111111111111111",
            "x_exp_date"		=> "0115",

            "x_amount"			=> "1.00",
            "x_description"		=> "Sample Transaction",


            // Additional fields can be added here as outlined in the AIM integration
            // guide at: http://developer.authorize.net
        );


        $post_string = "";
        foreach( $post_values as $key => $value )
        { $post_string .= "$key=" . urlencode( $value ) . "&"; }
        $post_string = rtrim( $post_string, "& " );


        $request = curl_init($post_url); // initiate curl object
        curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
        $post_response = curl_exec($request); // execute curl post and store results in $post_response
        // additional options may be required depending upon your server configuration
        // you can find documentation on curl options at http://www.php.net/curl_setopt
        curl_close ($request); // close curl object

        $response_array = explode($post_values["x_delim_char"],$post_response);

        echo $response_array[3];


    }


    public function actionBill($orderid=0){
        $tid=$_GET['orderid'];

        $this->pageTitle = "Confirmation" ;

        // echo yii::app()->session['tran'];
        $arruser=yii::app()->session['paydata'];

        $payable_amount=yii::app()->session['payable'];
        $transactionid= yii::app()->session['transactionid'];
        $finalpayableamt=$payable_amount+0;

        require_once(Yii::app()->basePath.'/vendors/nmi/nmi.php');
        //var_dump($x);
        //exit;
        $gw = new nmi;
        $gw->setLogin("CDIMEDIA", "P@ss1234");
        $r1 = $gw->doCapture($transactionid,$finalpayableamt);
        $gw->responses;



        //if($gw->responses['response'] == 1){

        unset(yii::app()->session['paydata']);
        unset(yii::app()->session['payable']);
        unset(yii::app()->session['transactionid']);
        unset(yii::app()->session['authorizationamt']);


        $this->render('bill',array('tid'=>$tid));


    }

    public function actionUpsell($id=0){

        $this->render('upsell',array('id'=>$id));

    }


    public function tran_create_profile($email=""){

        $_ret = 0;

        //  if(!YII_MODE){
        // For sandbox account
        $g_loginname = yii::app()->params['g_loginname']; // Keep this secure.
        $g_transactionkey = yii::app()->params['g_transactionkey']; // Keep this secure.
        $g_apihost =yii::app()->params['g_apihost'];
        $g_apipath = yii::app()->params['g_apipath'];
        //  }else{
        //   $g_loginname="6L9Fsb5e";
        //    $g_transactionkey="722kf6DqRZ73y9NA";
        //  $g_apihost = "api.authorize.net";
        //   $g_apipath = "/xml/v1/request.api";
        //  }

        require_once(Yii::app()->basePath . '/payment_anet/util.php');

        $content =
            "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
            "<createCustomerProfileRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
            "<merchantAuthentication>".
            "<name>" . $g_loginname . "</name>".
            "<transactionKey>" . $g_transactionkey . "</transactionKey>".
            "</merchantAuthentication>".
            "<profile>".
            "<merchantCustomerId>12345</merchantCustomerId>". // Your own identifier for the customer.
            "<description></description>".
            "<email>" . $email . "</email>".
            "</profile>".
            "</createCustomerProfileRequest>";


        $response = send_xml_request($g_apihost,$g_apipath,$content);
        //var_dump($response);
        //exit;
        $parsedresponse = parse_api_response($response);
        if ("Ok" == $parsedresponse->messages->resultCode) {
            $_ret =  htmlspecialchars($parsedresponse->customerProfileId);
        }

        return $_ret;




    }
    public function tran_create_payment_profile($customerProfileId,$data=array()){

        $_ret = 0;

        //  if(!YII_MODE){
        // For sandbox account
        $g_loginname = yii::app()->params['g_loginname']; // Keep this secure.
        $g_transactionkey = yii::app()->params['g_transactionkey']; // Keep this secure.
        $g_apihost =yii::app()->params['g_apihost'];
        $g_apipath = yii::app()->params['g_apipath'];
        //  }else{
        //   $g_loginname="6L9Fsb5e";
        //    $g_transactionkey="722kf6DqRZ73y9NA";
        //  $g_apihost = "api.authorize.net";
        //   $g_apipath = "/xml/v1/request.api";
        //  }

        require_once(Yii::app()->basePath . '/payment_anet/util.php');

        $content =
            "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
            "<createCustomerPaymentProfileRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
            "<merchantAuthentication>".
            "<name>" . $g_loginname . "</name>".
            "<transactionKey>" . $g_transactionkey . "</transactionKey>".
            "</merchantAuthentication>".
            "<customerProfileId>" . $customerProfileId . "</customerProfileId>".
            "<paymentProfile>".
            "<billTo>".
            "<firstName>" . $data['billing_fname'] . "</firstName>".
            "<lastName>" . $data['billing_lname'] . "</lastName>".
            "<phoneNumber>" . $data['billing_phone'] . "</phoneNumber>".
            "</billTo>".
            "<payment>".
            "<creditCard>".
            "<cardNumber>" . $data['card_no'] . "</cardNumber>".
            "<expirationDate>" . $data['card_exp_year'] ."-".$data['card_exp_mon']. "</expirationDate>". // required format for API is YYYY-MM
            "</creditCard>".
            "</payment>".
            "</paymentProfile>".
            //"<validationMode>liveMode</validationMode>". // or testMode
            "<validationMode>testMode</validationMode>". // or testMode
            "</createCustomerPaymentProfileRequest>";

        $response = send_xml_request($g_apihost,$g_apipath,$content);
        $parsedresponse = parse_api_response($response);
        if ("Ok" == $parsedresponse->messages->resultCode) {
            $_ret = htmlspecialchars($parsedresponse->customerPaymentProfileId);
        }

        return $_ret;




    }

    public function tran_create_shipping_profile($customerProfileId,$data=array()){

        $_ret = 0;

        //  if(!YII_MODE){
        // For sandbox account
        $g_loginname = yii::app()->params['g_loginname']; // Keep this secure.
        $g_transactionkey = yii::app()->params['g_transactionkey']; // Keep this secure.
        $g_apihost =yii::app()->params['g_apihost'];
        $g_apipath = yii::app()->params['g_apipath'];
        //  }else{
        //   $g_loginname="6L9Fsb5e";
        //    $g_transactionkey="722kf6DqRZ73y9NA";
        //  $g_apihost = "api.authorize.net";
        //   $g_apipath = "/xml/v1/request.api";
        //  }

        require_once(Yii::app()->basePath . '/payment_anet/util.php');

        $content =
            "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
            "<createCustomerShippingAddressRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
            "<merchantAuthentication>".
            "<name>" . $g_loginname . "</name>".
            "<transactionKey>" . $g_transactionkey . "</transactionKey>".
            "</merchantAuthentication>".
            "<customerProfileId>" . $customerProfileId . "</customerProfileId>".
            "<address>".
            "<firstName>".$data['shipping_fname']."</firstName>".
            "<lastName>".$data['shipping_lname']."</lastName>".
            "<phoneNumber>".$data['shipping_phone']."</phoneNumber>".
            "</address>".
            "</createCustomerShippingAddressRequest>";

        $response = send_xml_request($g_apihost,$g_apipath,$content);
        $parsedresponse = parse_api_response($response);
        if ("Ok" == $parsedresponse->messages->resultCode) {
            $_ret = htmlspecialchars($parsedresponse->customerAddressId);
        }

        return $_ret;




    }

    public function actionSavepro(){

        $model= new TransactionProductDetails();
        $price=$_POST['price'];
        $orderid=$_POST['orderid'];
        $ship=$_POST['ship'];
        $proid=$_POST['proid'];
        $name=$_POST['name'];
        $desc=$_POST['desc'];
        $quan=$_POST['quan'];
        $type=$_POST['type'];
        $landingidid=$_POST['landingidid'];
        $cardno=$_POST['cardno'];
        $cardyear=$_POST['cardyear'];
        $cardmon=$_POST['cardmon'];


        yii::app()->session['upselldata']=$_POST;


        $arruser=yii::app()->session['paydata'];
        /*echo $arruser['profile_id'];
        echo $arruser['pay_profile_id'];
        echo $arruser['ship_profile_id'];*/

        $_ret = 0;




/*        $g_loginname = yii::app()->params['g_loginname'];
        $g_transactionkey = yii::app()->params['g_transactionkey'];
        $g_apihost =yii::app()->params['g_apihost'];
        $g_apipath = yii::app()->params['g_apipath'];

        require_once(Yii::app()->basePath . '/payment_anet/util.php');



        $content =
            "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
            "<createCustomerProfileTransactionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
            MerchantAuthenticationBlock($g_loginname,$g_transactionkey).
            "<transaction>".
            "<profileTransAuthOnly>".
            "<amount>".($price+$ship)."</amount>".
            "<shipping>".
            "<amount>".$ship."</amount>".
            "<name>standard Shipping</name>".
            "<description>Free UPS Ground shipping. Ships in 5-10 days.</description>".
            "</shipping>".

            "<lineItems>".
            "<itemId>".$proid."</itemId>".
            "<name>".$name."</name>".
            "<description>description</description>".
            "<quantity>".$quan."</quantity>".
            "<unitPrice>".$price."</unitPrice>".
            "<taxable>false</taxable>".
            "</lineItems>".
            "<customerProfileId>" . $arruser['profile_id'] . "</customerProfileId>".
            "<customerPaymentProfileId>" .$arruser['pay_profile_id']. "</customerPaymentProfileId>".
            "<customerShippingAddressId>" .$arruser['ship_profile_id']. "</customerShippingAddressId>".
            "<order>".
            "<invoiceNumber>".$orderid.rand(1,9999)."</invoiceNumber>".
            "</order>".
            "</profileTransAuthOnly>".
            "</transaction>".
            "</createCustomerProfileTransactionRequest>";


        $response = send_xml_request($g_apihost,$g_apipath,$content);

        $parsedresponse = parse_api_response($response);*/




        /*if (isset($parsedresponse->directResponse)) {

            $directResponseFields = explode(",", $parsedresponse->directResponse);
            $responseCode = $directResponseFields[0];
            $responseReasonCode = $directResponseFields[2];
            $responseReasonText = $directResponseFields[3];
            $approvalCode = $directResponseFields[4];
            $transId = $directResponseFields[6];


            if ("1" == $responseCode)
            {


                //htmlspecialchars($transId);
                $model = new TransactionProductDetails();
                $model->product_id=$proid;
                $model->order_id=$orderid;
                $model->product_name=$name;
                $model->product_desc=$desc;
                $model->landing_product_id=$proid;
                $model->product_id=$proid;
                $model->product_quantity=$quan;
                $model->product_price=$price;
                $model->shipping_cost=$ship;
                $model->transaction_id=$transId;
                $model->product_type=$type;
                $model->landing_product_id=$landingidid;
                $model->card_last_four=$cardno;
                $model->card_exp_month=$cardmon;
                $model->card_exp_year=$cardyear;
                $model->save();
                $mod=new TransactionOrderDetails();
                $reorders=TransactionOrderDetails::model()->findAll('orderid='.$orderid);

                $shiping=$ship+$reorders[0]['shiping_charge'];
                $subtotal=$price+$reorders[0]['subtotal'];
                $totalprice=$price+$reorders[0]['total']+$ship;

                $mod->updatetotal($shiping,$subtotal,$totalprice,$orderid);


                echo 1;
            }
            else{

                echo $responseReasonText;

            }
        }*/


        $authorization_amount=yii::app()->session['authorizationamt'];
        $payable_amount=yii::app()->session['payable'];
        $transactionid= yii::app()->session['transactionid'];
        $finalpayableamt=$payable_amount+$price+$ship;

        require_once(Yii::app()->basePath.'/vendors/nmi/nmi.php');
        //var_dump($x);
        //exit;
        $gw = new nmi;
        $gw->setLogin("CDIMEDIA", "P@ss1234");
        $r1 = $gw->doCapture($transactionid,$finalpayableamt);
        $gw->responses;

        if($gw->responses['response'] == 1){

        $model = new TransactionProductDetails();
        $model->product_id=$proid;
        $model->order_id=$orderid;
        $model->product_name=$name;
        $model->product_desc=$desc;
        $model->landing_product_id=$proid;
        $model->product_id=$proid;
        $model->product_quantity=$quan;
        $model->product_price=$price;
        $model->shipping_cost=$ship;
        $model->transaction_id=$transactionid;
        $model->product_type=$type;
        $model->landing_product_id=$landingidid;
        $model->card_last_four=$cardno;
        $model->card_exp_month=$cardmon;
        $model->card_exp_year=$cardyear;
        $model->save();
        $mod=new TransactionOrderDetails();
        $reorders=TransactionOrderDetails::model()->findAll('orderid='.$orderid);

        $shiping=$ship+$reorders[0]['shiping_charge'];
        $subtotal=$price+$reorders[0]['subtotal'];
        $totalprice=$price+$reorders[0]['total']+$ship;

        $mod->updatetotal($shiping,$subtotal,$totalprice,$orderid);

            echo 1;
        }




    }

    public function actionSavepro1(){

        $model= new TransactionProductDetails();
        $arr=yii::app()->session['upselldata'];
        $price=$arr['price'];
        $orderid=$arr['orderid'];
        $ship=$arr['ship'];
        $proid=$arr['proid'];
        $name=$arr['name'];
        $desc=$arr['desc'];
        $quan=$arr['quan'];
        $type=$arr['type'];
        $landingidid=$arr['landingidid'];











        $arruser=yii::app()->session['paydata'];
        /*echo $arruser['profile_id'];
        echo $arruser['pay_profile_id'];
        echo $arruser['ship_profile_id'];*/

        $_ret = 0;




        $g_loginname = yii::app()->params['g_loginname']; // Keep this secure.
        $g_transactionkey = yii::app()->params['g_transactionkey']; // Keep this secure.
        $g_apihost =yii::app()->params['g_apihost'];
        $g_apipath = yii::app()->params['g_apipath'];

        require_once(Yii::app()->basePath . '/payment_anet/util.php');



        $content =
            "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
            "<createCustomerProfileTransactionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
            MerchantAuthenticationBlock($g_loginname,$g_transactionkey).
            "<transaction>".
            "<profileTransAuthOnly>".
            "<amount>".($price+$ship)."</amount>". // should include tax, shipping, and everything.
            "<shipping>".
            "<amount>".$ship."</amount>".
            "<name>standard Shipping</name>".
            "<description>Free UPS Ground shipping. Ships in 5-10 days.</description>".
            "</shipping>".

            "<lineItems>".
            "<itemId>456789</itemId>".
            "<name>name of item sold</name>".
            "<description>Description of item sold</description>".
            "<quantity>1</quantity>".
            "<unitPrice>1.00</unitPrice>".
            "<taxable>false</taxable>".
            "</lineItems>".
            "<customerProfileId>" . $arruser['profile_id'] . "</customerProfileId>".
            "<customerPaymentProfileId>" .$arruser['pay_profile_id']. "</customerPaymentProfileId>".
            "<customerShippingAddressId>" .$arruser['ship_profile_id']. "</customerShippingAddressId>".
            "<order>".
            "<invoiceNumber>INV12345</invoiceNumber>".
            "</order>".
            "</profileTransAuthOnly>".
            "</transaction>".
            "</createCustomerProfileTransactionRequest>";

        //echo "Raw request: " . htmlspecialchars($content) . "<br><br>";
        $response = send_xml_request($g_apihost,$g_apipath,$content);
        // echo "Raw response: " . htmlspecialchars($response) . "<br><br>";
        $parsedresponse = parse_api_response($response);
        /*if ("Ok" == $parsedresponse->messages->resultCode) {
            echo "A transaction was successfully created for customerProfileId <b>"
                . htmlspecialchars($_POST["customerProfileId"])
                . "</b>.<br><br>";
        }*/
        if (isset($parsedresponse->directResponse)) {
            /* echo "direct response: <br>"
                 . htmlspecialchars($parsedresponse->directResponse)
                 . "<br><br>";*/

            $directResponseFields = explode(",", $parsedresponse->directResponse);
            $responseCode = $directResponseFields[0]; // 1 = Approved 2 = Declined 3 = Error
            $responseReasonCode = $directResponseFields[2]; // See http://www.authorize.net/support/AIM_guide.pdf
            $responseReasonText = $directResponseFields[3];
            $approvalCode = $directResponseFields[4]; // Authorization code
            $transId = $directResponseFields[6];

            //if ("1" == $responseCode) echo "The transaction was successful.<br>";
            /*else if ("2" == $responseCode) echo "The transaction was declined.<br>";
            else echo "The transaction resulted in an error.<br>";

            echo "responseReasonCode = " . htmlspecialchars($responseReasonCode) . "<br>";
            echo "responseReasonText = " . htmlspecialchars($responseReasonText) . "<br>";
            echo "approvalCode = " . htmlspecialchars($approvalCode) . "<br>";
            echo "transId = " . htmlspecialchars($transId) . "<br>";*/
            if ("1" == $responseCode)
            {





                $content =
                    "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
                    "<deleteCustomerProfileRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
                    MerchantAuthenticationBlock($g_loginname,$g_transactionkey).
                    "<customerProfileId>" . $arruser['profile_id'] . "</customerProfileId>".
                    "</deleteCustomerProfileRequest>";

                //echo "Raw request: " . htmlspecialchars($content) . "<br><br>";
                $response = send_xml_request($g_apihost,$g_apipath,$content);
                //echo "Raw response: " . htmlspecialchars($response) . "<br><br>";
                $parsedresponse = parse_api_response($response);





                //htmlspecialchars($transId);
                $model = new TransactionProductDetails();
                $model->product_id=$proid;
                $model->order_id=$orderid;
                $model->product_name=$name;
                $model->product_desc=$desc;
                $model->landing_product_id=$proid;
                $model->product_id=$proid;
                $model->product_quantity=$quan;
                $model->product_price=$price;
                $model->shipping_cost=$ship;
                $model->transaction_id=$transId;
                $model->product_type=$type;
                $model->landing_product_id=$landingidid;
                $model->save();
                $mod=new TransactionOrderDetails();

                //$mod->updatetotal($price,$ship,$orderid);
                $this->redirect(yii::app()->getBaseUrl(true).'/product/default/bill/orderid/'.$orderid);


            }
            else{

                $this->redirect(yii::app()->getBaseUrl(true).'/product/default/bill/orderid/'.$orderid);

            }
        }

        /* echo "<br><a href=index.php?customerProfileId="
             . urlencode($_POST["customerProfileId"])
             . "&customerPaymentProfileId="
             . urlencode($_POST["customerPaymentProfileId"])
             . "&customerShippingAddressId="
             . urlencode($_POST["customerShippingAddressId"])
             . ">Continue</a><br>";*/


        /*$paydata['profile_id'] = $this->tran_create_profile($_POST['TransactionOrderDetails']['billing_email']);
        $paydata['pay_profile_id'] = $this->tran_create_payment_profile($paydata['profile_id'],$_POST['TransactionOrderDetails']);
        $paydata['ship_profile_id'] = $this->tran_create_shipping_profile($paydata['profile_id'],$_POST['TransactionOrderDetails']);*/

    }

    public function actionSetoffer(){
        $val=$_POST['val'];
        yii::app()->session['offerval']=$val;


    }

    public function actionPop(){
        $base = Yii::app()->getBaseUrl(true);
        $this->renderpartial('popupcart',array('base'=>$base));

    }
    public function actionPopcart(){
        $base = Yii::app()->getBaseUrl(true);
        $this->renderpartial('popuphome',array('base'=>$base));

    }




}
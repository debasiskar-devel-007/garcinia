<?php

class CheckoutController extends MyController
{
    public function init(){
          Yii::app()->theme = 'cow';  

        $this->pageTitle = "Checkout";

        $c_url = Yii::app()->request->hostInfo . Yii::app()->request->url;

        $sess = Yii::app()->session['sess_user'];


        if(empty($sess)){
            Yii::app()->session['login_redirect_url'] = $c_url;
            $this->redirect(Yii::app()->getBaseUrl(true).'/login');
        }

    }

    public function actionindex(){

        $sess = Yii::app()->session['sess_user'];

        $this->pageTitle = "Checkout";

        $cart = Yii::app()->session['cart'];


        //$autoship = Yii::app()->session['autoship'];
        
        //print_r($autoship);

        if(count($cart) == 0){
            $this->redirect(Yii::app()->request->getBaseUrl(true).'/product');
        }

        //$processing_fee = ShippingCharge::model()->fetchdetail(2);

        $sess_arr = Yii::app()->session['sess_user'];

 /*       if($sess_arr['email'] == 'itplcc40@gmail.com'){
            $pro_fee = $processing_fee['shipping_charge'];
        }else{
            $pro_fee = 0;
        } */

       // if(!isset(Yii::app()->session['pross_fee'])){
       // Yii::app()->session['pross_fee']= $pro_fee;
       // }

        //$ship_charge = ShippingCharge::model()->fetchdetail(1);
        //echo 3;
        //exit;
        //$ship_charge = $ship_charge['shipping_charge'];
        //Yii::app()->session['shipping_charge']= $ship_charge;


        $order_ship_bill_details = Yii::app()->session['order_ship_bill_details'];

        $model = new TransactionOrderDetails();

        $cartdet = $model->getcartdetails($cart);



        if(count($_POST)){
            
                
            $model->attributes=$_POST['TransactionOrderDetails']; 
            if($model->validate())
            {
                 
                $m_order_ship_bill_details = $_POST['TransactionOrderDetails'];
                $s_c_res = Country::model()->findAll('id = '.$_POST['TransactionOrderDetails']['shipping_country']);
                $b_c_res = Country::model()->findAll('id = '.$_POST['TransactionOrderDetails']['billing_country']);
                $s_s_res = State::model()->findAll('id = '.$_POST['TransactionOrderDetails']['shipping_state']);
                $b_s_res = State::model()->findAll('id = '.$_POST['TransactionOrderDetails']['billing_state']);
                
                $m_order_ship_bill_details['shipping_country_name'] = $s_c_res[0]['s_name'];
                $m_order_ship_bill_details['billing_country_name'] = $b_c_res[0]['s_name'];
                $m_order_ship_bill_details['shipping_state_name'] = $s_s_res[0]['s_st_name'];
                $m_order_ship_bill_details['billing_state_name'] = $b_s_res[0]['s_st_name'];
                
                Yii::app()->session['order_ship_bill_details'] = $m_order_ship_bill_details;

                $i =0;
                foreach($cartdet as $row){
                    $i++;
                    $pro_arr[$i]['product_id'] = $row['productid'];
                    $pro_arr[$i]['product_name'] = $row['productname'];
                    $pro_arr[$i]['product_price'] = $row['productprice'];
                    $pro_arr[$i]['product_desc'] = $row['productdesc'];
                    $pro_arr[$i]['product_quantity'] = $cart[$row['productid']];
                    $pro_arr[$i]['product_image'] = $row['image_name'];
                    $pro_arr[$i]['product_type'] = $row['product_type'];

                }
                //This is for Order Product Details
                Yii::app()->session['order_product_details'] = $pro_arr;

                $this->redirect(Yii::app()->request->baseUrl.'/product/checkout/confirm');

           }
            

        }


        $state = $this->getStateList(254);
        //$state[""]="Select State";
        //$state =array_merge($state,$state1);
		$country = $this->getCountryList();
		
		//exit;
        //$country[""]="Select Country";
        //$country =array_merge($country,$country1);

        $total = 0;
        foreach($cartdet as $row){
            $price = number_format($row['productprice'],2);
            $quantity = $cart[$row['productid']];
            $subtotal = number_format($price*intval($quantity),2);
            $total += $subtotal;
        }
        Yii::app()->session['total'] = $total;

        $this->render('index',array('model'=>$model,'state'=>$state,'country'=>$country,'cartdet'=>$cartdet,'order_ship_bill_details'=>$order_ship_bill_details));
    }

    public function actionconfirm(){

        $this->pageTitle = "Checkout Confirmation";

        $cart = Yii::app()->session['cart']; 
        $sess_user = Yii::app()->session['sess_user'];

        $order_ship_bill_details = Yii::app()->session['order_ship_bill_details'];
        $order_product_details = Yii::app()->session['order_product_details'];
       // $dis_val =  Yii::app()->session['discount'];
        //$dis_code = Yii::app()->session['discount_code'];
        //$autoship_payable_amount = 0;


        $model = new TransactionOrderDetails('payment');
        $model_order_product = new TransactionProductDetails();
        $model_stock = new ProductStock();
        
        
        if(count($_POST)){

         /*   echo "<pre>";
            print_r($_POST);
            exit;*/

            
            $model->attributes=$_POST['TransactionOrderDetails']; 
            if($model->validate(array_keys($_POST['TransactionOrderDetails'])))
            {
                //
                $order_ship_bill_details['shiping_charge'] = Yii::app()->session['shipping_charge'];
                $order_ship_bill_details['total'] = $order_ship_bill_details['subtotal']+$order_ship_bill_details['shiping_charge'];
                $payable_amount = $order_ship_bill_details['total'];
                
                $order_ship_bill_details['order_time'] = time();
               // $order_ship_bill_details['discount_val'] = floatval($dis_val);
               // $order_ship_bill_details['discount_code'] = $dis_code;
                //
               Yii::app()->session['card_details']=$_POST;      
                //$post = $_POST;

                //$response = $this->payment($post,$payable_amount);
               
               //this paypal function is off foe local only
               //$paypal_return =$this->directPayment1();
                $paypal_return['TRANSACTIONID']=11111111;

             
               if($paypal_return['TRANSACTIONID']){

                    $order_ship_bill_details['transaction_id'] = @$paypal_return['TRANSACTIONID'];
                    $order_ship_bill_details['transaction_status'] = "Success";
                    $order_ship_bill_details['affiliate_code'] =  isset(Yii::app()->request->cookies['affliate_code']) ? Yii::app()->request->cookies['affliate_code']->value : '';
                    $order_ship_bill_details['user_id'] =  @$sess_user['id'];
                    $order_ship_bill_details['discount_val'] = 0;
                    $order_ship_bill_details['discount_code'] = 0;
                    //$autoship = Yii::app()->session['autoship']; 

                   $orderId = $model->saveorder($order_ship_bill_details);
                    
                   $model_order_product->saveorderproduct($order_product_details,$orderId);
                              
                   $model_stock->saveproductstock($cart); 
                   
                   $dmodel = new DownloadableProduct();
                   $dproduct = array();
                   
                   foreach($order_product_details as $pro5){
                       if($pro5['product_type']==0){ 
                            $dmodel->id =null;
                            $dmodel->isNewRecord =true;

                            $dmodel->orderid = $orderId;
                            $dmodel->product_id = $pro5['product_id'];
                            $dmodel->time = time();
                            
                            $dmodel->save();
                            
                            $dproduct[$pro5['product_id']] = $dmodel->id;
                       }
                   }
                     
                     
                   /* $file_name =$orderId.".pdf";


                    # HTML2PDF has very similar syntax
                   $html2pdf = Yii::app()->ePdf->HTML2PDF();
                    $html2pdf->WriteHTML($this->renderPartial('orderlist', array('orderId'=>$orderId,'order_ship_bill_details'=>$order_ship_bill_details,'order_product_details'=>$order_product_details), true)); 

                    $content_PDF = $html2pdf->Output('./images/pdf/'.$file_name, EYiiPdf::OUTPUT_TO_FILE);




                    $mail = new YiiMailMessage();

                    $params              = array('orderId'=>$orderId,'order_ship_bill_details'=>$order_ship_bill_details,'order_product_details'=>$order_product_details,'dproduct'=>$dproduct);

                    $mail->view = "orderlist";

                    $mail->addTo($order_ship_bill_details['billing_email']);

                    $mail->addTo('info@azcowtown.com');
                    $mail->from = ('orders@azcowtown.com');
                    $mail->setSubject('Transaction Successful');
                    $mail->setBody($params, 'text/html');

                    $swiftAttachment = Swift_Attachment::fromPath('./images/pdf/'.$file_name);
                    $mail->attach($swiftAttachment);

                       
                       Yii::app()->mail->send($mail);*/








                    $this->unsetsess();
                   //$this->redirect(Yii::app()->request->baseUrl.'/product/checkout/success');

                    $this->redsuc();
                   
               }
               else
               {
                   
                   $order_ship_bill_details['transaction_id'] = $paypal_return['TRANSACTIONID'];  
                    $order_ship_bill_details['transaction_status'] = "Failed";
                    $order_ship_bill_details['affiliate_code'] =  isset(Yii::app()->request->cookies['affliate_code']) ? Yii::app()->request->cookies['affliate_code']->value : '';
                    $order_ship_bill_details['user_id'] =  @$sess_user['id'];
                    $autoship = Yii::app()->session['autoship'];

                    $orderId = $model->saveorder($order_ship_bill_details);

                    $model_order_product->saveorderproduct($order_product_details,$orderId);

                    //$model_stock->saveproductstock($cart);
                    
                    
                     
                    $file_name =$orderId.".pdf";

                    /* This is for creating pdf from a html  */
                    # HTML2PDF has very similar syntax
                    $html2pdf = Yii::app()->ePdf->HTML2PDF();
                    $html2pdf->WriteHTML($this->renderPartial('orderlist', array('orderId'=>$orderId,'order_ship_bill_details'=>$order_ship_bill_details,'order_product_details'=>$order_product_details,'autoship'=>$autoship), true));
                    //$html2pdf->Output('', EYiiPdf::OUTPUT_TO_STRING);
                    $content_PDF = $html2pdf->Output('./images/pdf/'.$file_name, EYiiPdf::OUTPUT_TO_FILE);


                    /*        this is for sending emails */

                    
                    $mail = new YiiMailMessage();

                    $params              = array('orderId'=>$orderId,'order_ship_bill_details'=>$order_ship_bill_details,'order_product_details'=>$order_product_details,'autoship'=>$autoship);

                    $mail->view = "orderlist";

                    if($order_ship_bill_details['billing_email']!='')$mail->addTo($order_ship_bill_details['billing_email']);
                    $mail->addTo('info@valescere.com');
                    //$mail->addTo('jacalingabinga@gmail.com');
                    //$mail->addTo('jruston254@yahoo.com');
                    //$mail->addTo('makkmansupreme@hotmail.com');
                    $mail->from = ('orders@valescere.com');
                    $mail->setSubject('Transaction Not Successful');
                    $mail->setBody($params, 'text/html');

                    $swiftAttachment = Swift_Attachment::fromPath('./images/pdf/'.$file_name);
                    $mail->attach($swiftAttachment);
                   // if(!empty($order_ship_bill_details['billing_email']))
                        //Yii::app()->mail->send($mail);

                    

                    $this->unsetsess();

                    $this->redirect(Yii::app()->request->baseUrl.'/product/checkout/unsuccess');
                   
                   
               }

            
               
              
            }
        }


        $this->render('confirm',array('model'=>$model));
    }
    
    
    

    
    
    public function directPayment(){
     
     //echo '99999999999999999999' ;
    $order_ship_bill_details = Yii::app()->session['order_ship_bill_details'];
        $order_product_details = Yii::app()->session['order_product_details'];
        $m_card_details = Yii::app()->session['card_details'];
/*       echo "<pre>";
       print_r($order_ship_bill_details);
       exit;*/
       
        $total=$order_ship_bill_details['subtotal']+Yii::app()->session['shipping_charge'];   

 
        $paymentInfo = array('Member'=> 
            array( 
                'first_name'=>$order_ship_bill_details['billing_fname'],
                'last_name'=>$order_ship_bill_details['billing_lname'],
                'billing_address'=>$order_ship_bill_details['billing_add'],
                'billing_address2'=>'',
                'billing_country'=> $order_ship_bill_details['billing_country'],
                'billing_city'=>$order_ship_bill_details['billing_city'],
                'billing_state'=>$order_ship_bill_details['billing_state'],
                'billing_zip'=>$order_ship_bill_details['billing_zip']
            ), 
            'CreditCard'=> 
            array(
               // 'credit_type'=>'visa',
                'card_number'=>$m_card_details['TransactionOrderDetails']['card_no'],
                'expiration_month'=>$m_card_details['TransactionOrderDetails']['card_exp_mon'],
                'expiration_year'=>$m_card_details['TransactionOrderDetails']['card_exp_year'],
                'cv_code'=>$m_card_details['TransactionOrderDetails']['card_cvv'],
                //'credit_type'=>'master',
            ), 
            'Order'=> 
            array('theTotal'=>$total)
        ); 

       /* 
        * On Success, $result contains [AMT] [CURRENCYCODE] [AVSCODE] [CVV2MATCH]  
        * [TRANSACTIONID] [TIMESTAMP] [CORRELATIONID] [ACK] [VERSION] [BUILD] 
        *  
        * On Fail, $ result contains [AMT] [CURRENCYCODE] [TIMESTAMP] [CORRELATIONID]  
        * [ACK] [VERSION] [BUILD] [L_ERRORCODE0] [L_SHORTMESSAGE0] [L_LONGMESSAGE0]  
        * [L_SEVERITYCODE0]  
        */ 
      
        $result = Yii::app()->Paypal->DoDirectPayment($paymentInfo); 
        
		
		
        //Detect Errors 
        if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
            if(Yii::app()->Paypal->apiLive === true){
                //Live mode basic error message
                $error = 'We were unable to process your request. Please try again later';
            }else{
                //Sandbox output the actual error message to dive in.
                $error = $result['L_LONGMESSAGE0'];
            }
            echo $error;
            
        }else { 
            //Payment was completed successfully, do the rest of your stuff
            return $result;
            //return 1;
        }

        Yii::app()->end();
    }




    public function directPayment1(){

        //echo '99999999999999999999' ;
        $order_ship_bill_details = Yii::app()->session['order_ship_bill_details'];
        $order_product_details = Yii::app()->session['order_product_details'];
        $m_card_details = Yii::app()->session['card_details'];
        /*       echo "<pre>";
               print_r($order_ship_bill_details);
               exit;*/

        $total=$order_ship_bill_details['subtotal']+Yii::app()->session['shipping_charge'];


        $paymentInfo = array('Member'=>
            array(
                'first_name'=>$order_ship_bill_details['billing_fname'],
                'last_name'=>$order_ship_bill_details['billing_lname'],
                'billing_address'=>$order_ship_bill_details['billing_add'],
                'billing_address2'=>'',
                'billing_country'=> $order_ship_bill_details['billing_country'],
                'billing_city'=>$order_ship_bill_details['billing_city'],
                'billing_state'=>$order_ship_bill_details['billing_state'],
                'billing_zip'=>$order_ship_bill_details['billing_zip']
            ),
            'CreditCard'=>
                array(
                    // 'credit_type'=>'visa',
                    'card_number'=>$m_card_details['TransactionOrderDetails']['card_no'],
                    'expiration_month'=>$m_card_details['TransactionOrderDetails']['card_exp_mon'],
                    'expiration_year'=>$m_card_details['TransactionOrderDetails']['card_exp_year'],
                    'cv_code'=>$m_card_details['TransactionOrderDetails']['card_cvv'],
                    //'credit_type'=>'master',
                ),
            'Order'=>
                array('theTotal'=>$total)
        );



        //$result = Yii::app()->Paypal->DoDirectPayment($paymentInfo);




   /*     if(!Yii::app()->Paypal->isCallSucceeded($result)){
            if(Yii::app()->Paypal->apiLive === true){

                $error = 'We were unable to process your request. Please try again later';
            }else{

                $error = $result['L_LONGMESSAGE0'];
            }
            echo $error;

        }else {

            return $result;

        }*/

        Yii::app()->end();
    }



    public function redsuc(){
       // echo 2;
       // exit;

        $this->redirect(Yii::app()->request->baseUrl.'/product/checkout/success');
    }


    public function actionsuccess(){
        $this->pageTitle = "Checkout Success";

        $this->render('success');
    }

    public function actionunsuccess(){
        $this->pageTitle = "Checkout Failure";

        $this->render('unsuccess');
    }


    //This function for unset session value
    public function unsetsess(){



        unset(Yii::app()->session['cart']);

        unset(Yii::app()->session['order_ship_bill_details']);

        unset(Yii::app()->session['order_product_details']);

        unset(Yii::app()->request->cookies['affliate_code']);

        unset(Yii::app()->session['discount']);
        unset(Yii::app()->session['discount_code']);
        unset(Yii::app()->session['discount_type']);
        unset(Yii::app()->session['pross_fee']);
        unset(Yii::app()->session['shipping_charge']);
        unset(Yii::app()->session['total_occ']);
        unset(Yii::app()->session['occ_interval']);
        unset(Yii::app()->session['autoship']);


    }


    public function payment($data,$payable_amount){

        $data = $data['TransactionOrderDetails'];

        $order_ship_bill_details = Yii::app()->session['order_ship_bill_details'];

        require_once(Yii::app()->basePath . '/payment_anet/AuthorizeNet.php');

        if(YII_DEBUG){
            $transaction = new AuthorizeNetAIM('27BKdvPU8h', '6H5Uennu7655d9M9'); // For sandbox account
        }else{
            $transaction = new AuthorizeNetAIM('4HM8njuQ2f6Z', '6FwbfK3u8A534r7w');
        }


        $transaction->amount = number_format($payable_amount,2);
        $transaction->card_num = $data['card_no'];
        $transaction->exp_date = $data['card_exp_mon'].'/'.$data['card_exp_year'];

        $transaction1 = (object)array();
        $transaction1->first_name = $order_ship_bill_details['billing_fname'];
        $transaction1->last_name = $order_ship_bill_details['billing_lname'];
        $transaction1->company = "";
        $transaction1->address = $order_ship_bill_details['billing_add'];
        $transaction1->city = $order_ship_bill_details['billing_city'];
        $transaction1->state = $order_ship_bill_details['billing_state'];
        $transaction1->zip = $order_ship_bill_details['billing_zip'];
        $transaction1->country = "US";
        $transaction1->phone = $order_ship_bill_details['billing_phone'];
        $transaction1->fax = "";
        $transaction1->email = $order_ship_bill_details['billing_email'];
        $transaction1->ship_to_first_name=$order_ship_bill_details['shipping_fname'];
        $transaction1->ship_to_last_name=$order_ship_bill_details['shipping_lname'];
        $transaction1->ship_to_address=$order_ship_bill_details['shipping_add'];
        $transaction1->ship_to_city=$order_ship_bill_details['shipping_city'];
        $transaction1->ship_to_state=$order_ship_bill_details['shipping_state'];
        $transaction1->ship_to_zip=$order_ship_bill_details['shipping_zip'];
        $transaction1->ship_to_country="US";
        $transaction1->tax=0;
        $transaction1->email_customer=FALSE;


        $transaction1->customer_ip = $this->getIP();


        $transaction->setFields($transaction1);

        if(YII_DEBUG)
            $transaction->setSandbox(TRUE);
        else
            $transaction->setSandbox(FALSE);

        $response = $transaction->authorizeAndCapture(); 

        return $response;


    }

    public function autoshippayment($data,$autoship_payable_amount){

        $data = $data['TransactionOrderDetails'];

        if(YII_DEBUG){
            // For sandbox account
            $loginname="27BKdvPU8h";
            $transactionkey="6H5Uennu7655d9M9";
            $host = "apitest.authorize.net";
            $path = "/xml/v1/request.api";
        }else{
            $loginname="4HM8njuQ2f6Z";
            $transactionkey="6FwbfK3u8A534r7w";
            $host = "api.authorize.net";
            $path = "/xml/v1/request.api";
        }

        require_once(Yii::app()->basePath . '/payment_anet/authnetfunction.php');

        $total_occ = 24;
        $occ_interval = 1;

        //define variables to send
        $amount = $autoship_payable_amount;
        $refId = "";
        $name = "test";
        $length = $occ_interval;
        $unit = "months";
        $startDate = date('Y-m-d');
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
            "<name>" . $loginname . "</name>".
            "<transactionKey>" . $transactionkey . "</transactionKey>".
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

        $response = send_request_via_curl($host,$path,$content);

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

        if(YII_DEBUG){
            // For sandbox account
            $loginname="27BKdvPU8h";
            $transactionkey="6H5Uennu7655d9M9";
            $host = "apitest.authorize.net";
            $path = "/xml/v1/request.api";
        }else{
            $loginname="4HM8njuQ2f6Z";
            $transactionkey="6FwbfK3u8A534r7w";
            $host = "api.authorize.net";
            $path = "/xml/v1/request.api";
        }

        require_once(Yii::app()->basePath . '/payment_anet/authnetfunction.php');

        $content =
            "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
            "<ARBCancelSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">".
            "<merchantAuthentication>".
            "<name>" . $loginname . "</name>".
            "<transactionKey>" . $transactionkey . "</transactionKey>".
            "</merchantAuthentication>" .
            "<subscriptionId>" . $subscriptionId . "</subscriptionId>".
            "</ARBCancelSubscriptionRequest>";

//send the xml via curl
        $response = send_request_via_curl($host,$path,$content);
        if ($response)
        {
            AutoshipManage::model()->updateByPk($autoship_id,array('status'=>2,'cancel_date'=>date('m/d/Y')));
        }


    }

    public function mailandPdfgenerate($orderId,$order_ship_bill_details,$order_product_details)
    {   

        set_time_limit(0);

        /*const OUTPUT_TO_BROWSER = "I";
        const OUTPUT_TO_DOWNLOAD = "D";
        const OUTPUT_TO_FILE = "F";
        const OUTPUT_TO_STRING = "S"; */


        $base=Yii::app()->request->baseurl;


        $file_name =$orderId.".pdf";

        /* This is for creating pdf from a html  */
        # HTML2PDF has very similar syntax
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($this->renderPartial('orderlist', array('orderId'=>$orderId,'order_ship_bill_details'=>$order_ship_bill_details,'order_product_details'=>$order_product_details), true)); 
        //$html2pdf->Output('', EYiiPdf::OUTPUT_TO_STRING);
        $content_PDF = $html2pdf->Output('./images/pdf/'.$file_name, EYiiPdf::OUTPUT_TO_FILE);


        /*        this is for sending emails */

        $mail = new YiiMailMessage();

        $params              = array('orderId'=>$orderId,'order_ship_bill_details'=>$order_ship_bill_details,'order_product_details'=>$order_product_details);

        $mail->view = "orderlist";

        $mail->addTo('samsujj@gmail.com');
         $mail->addTo('info@valescere.com');   
        $mail->from = ('orders@valescere.com');
        $mail->setSubject('fgddf');
        $mail->setBody($params, 'text/html');

        $swiftAttachment = Swift_Attachment::fromPath('./images/pdf/'.$file_name);
        $mail->attach($swiftAttachment);
        Yii::app()->mail->send($mail);
        /*this is for downloading a file forcefully*/

        //return $file_name;


        $file = './images/pdf/'.$file_name;
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);



    }




    //This is get State list in coutry wise aray from state table 
    public function getStateList($id=0){
        $model = new State();

        $res = $model->findAll('i_cnt_id = '.$id);

        $arr = array();
        foreach($res as $row){
            $arr[$row['id']] = $row['s_st_name'];
        }

        return $arr;
    }
	
	public function getCountryList(){
        $model = new Country();

        $res = $model->findAll();

        $arr = array();
		
        foreach($res as $row){
			
            $arr[$row['id']] = $row['s_name'];
        }
		//exit;
		//var_dump( $arr );
        return $arr;
    }
	
	public function actiongetstatefromcountry(){
        $model = new State();

        $res = $model->findAll('i_cnt_id = '.$_POST['val']);

        $arr = array();
        foreach($res as $row){

            $arr[$row['id']] = $row['s_st_name'];
        }

        echo json_encode($arr);
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

    public function actioncheckpromo(){
        $promocode = $_POST['promocode'];
        $total = $_POST['total'];
        Yii::app()->session['discount'] = 0;
       
        Yii::app()->session['discount_code'] = "";

        $model = new PromoCodeDetails();

        $chk = $model->checkpromocode($promocode);

        if(count($chk) == 0){
            echo 1;
        }else{
            $chk = $chk[0];

            if($chk['type'] == 0){
                $disval = number_format(($total*($chk['dis_value']/100)),2);
                if($chk['dis_value']<100){
                    Yii::app()->session['discount'] = $disval;
                    Yii::app()->session['discount_code'] = $chk['code_text'];
                    Yii::app()->session['discount_type'] = $chk['type'];
                    echo 2;
                }else{
                    echo 3;
                }
            }
            if($chk['type'] == 1){
                $disval = $chk['dis_value'];
                if($disval<$total){
                    Yii::app()->session['discount'] = $disval;
                    Yii::app()->session['discount_code'] = $chk['code_text'];
                    Yii::app()->session['discount_type'] = $chk['type'];
                    echo 2;
                }else{
                    echo 3;
                }
            }
            if($chk['type'] == 2){
                $disval = 0.00;
                    Yii::app()->session['discount'] = $disval;
                    Yii::app()->session['discount_code'] = $chk['code_text'];
                    Yii::app()->session['discount_type'] = $chk['type'];
                    Yii::app()->session['shipping_charge']= 0.00;
                    echo 2;
            }
        }


    }

    public function actioncheckpromo1(){
        $promocode =  Yii::app()->session['discount_code'];
        $total = Yii::app()->session['total'];

        $model = new PromoCodeDetails();

        $chk = $model->checkpromocode($promocode);

        if(count($chk) == 0){
           // echo 1;
        }else{
            $chk = $chk[0];

            if($chk['type'] == 0){
                $disval = number_format(($total*($chk['dis_value']/100)),2);
                if($chk['dis_value']<100){
                    Yii::app()->session['discount'] = $disval;
                    Yii::app()->session['discount_code'] = $chk['code_text'];
                    Yii::app()->session['discount_type'] = $chk['type'];
                 }
            }
            if($chk['type'] == 1){
                $disval = $chk['dis_value'];
                if($disval<$total){
                    Yii::app()->session['discount'] = $disval;
                    Yii::app()->session['discount_code'] = $chk['code_text'];
                    Yii::app()->session['discount_type'] = $chk['type'];
                }
            }
            if($chk['type'] == 2){
                $disval =0.00;
                if($disval<$total){
                    Yii::app()->session['discount'] = $disval;
                    Yii::app()->session['discount_code'] = $chk['code_text'];
                    Yii::app()->session['discount_type'] = $chk['type'];
                    Yii::app()->session['shipping_charge']=0.00;
                }
            }
        }

    }

    public function actionaddautodis(){
        $total = floatval($_POST['total']);
        $total_occ = intval($_POST['total_occ']);
        $occ_interval = intval($_POST['occ_interval']);
        $dis1 = floatval(Yii::app()->session['discount']);
        $total = $total-$dis1;
        $dis = floatval(($total*15)/100);
        Yii::app()->session['autoship_dis'] = number_format(($dis),2);
        Yii::app()->session['total_occ'] = $total_occ;
        Yii::app()->session['occ_interval'] = $occ_interval;
    }

    public function actionremoveautodis(){
        unset(Yii::app()->session['autoship_dis']);
    }

    public function actionuncheckpromo(){
        unset(Yii::app()->session['discount']);
        unset(Yii::app()->session['discount_code']);
        unset(Yii::app()->session['discount_type']);
        unset(Yii::app()->session['pross_fee']);
    }
	    public function actionsaveformdata(){
        
		//var_dump($_POST['val']);
		//var_dump($_POST['value']);
		foreach($_POST['val'] as $k=>$v)
		{
		//echo $v."===".$k;
		$order_ship_bill_details[$v]=$_POST['value'][$k];
		}
		Yii::app()->session['order_ship_bill_details']=$order_ship_bill_details;
		var_dump(Yii::app()->session['order_ship_bill_details']);
    }

    public function actionupdateship(){
        $newshipc = $_POST['newshipc'];
        $newshipc = floatval($newshipc);
        $newshipc =  number_format($newshipc,2);
        Yii::app()->session['shipping_charge'] = $newshipc;
    }
    
    public function actionsetunsetauto(){
        $id= $_POST['id'];
        $type = $_POST['type'];
        $autoship = Yii::app()->session['autoship'];
        if($type == 1){
            $autoship[$id] = 1;
            Yii::app()->session['autoship'] = $autoship;
        }else{
            unset($autoship[$id]);
            Yii::app()->session['autoship'] = $autoship;
        } 
        
    }


    public function actionarbtest(){
        require_once(Yii::app()->basePath . '/payment_anet/AuthorizeNet.php');

        $subscription = new AuthorizeNet_Subscription;
        $subscription->name = "Short subscription";
        $subscription->intervalLength = "1";
        $subscription->intervalUnit = "months";
        $subscription->startDate = "2014-03-12";
        $subscription->totalOccurrences = "14";
        $subscription->amount = rand(1,100);
        $subscription->creditCardCardNumber = "6011000000000012";
        $subscription->creditCardExpirationDate = "2018-10";
        $subscription->creditCardCardCode = "123";
        $subscription->billToFirstName = "john";
        $subscription->billToLastName = "doe";

        // Create the subscription.
        $request = new AuthorizeNetARB('27BKdvPU8h', '6H5Uennu7655d9M9');
        $response = $request->createSubscription($subscription);
        //$subscription->assertTrue($response->isOk());
        $subscription_id = $response->getSubscriptionId();

    echo $subscription_id;
        var_dump($response);
    }

    public function actionAddship(){

       $ship=$_POST['ship'];
       unset(yii::app()->session['shipping_charge']) ;
        yii::app()->session['shipping_charge']=$ship;


    }

}

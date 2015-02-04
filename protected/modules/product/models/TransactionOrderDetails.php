<?php

/**
* This is the model class for table "transaction_order_details".
*
* The followings are the available columns in table 'transaction_order_details':
* @property string $orderid
* @property string $billing_fname
* @property string $billing_lname
* @property string $billing_add
* @property string $billing_phone
* @property string $billing_country
* @property string $billing_email
* @property string $billing_state
* @property string $billing_city
* @property string $billing_zip
* @property string $shipping_fname
* @property string $shipping_lname
* @property string $shipping_phone
* @property string $shipping_add
* @property string $shipping_country
* @property string $shipping_state
* @property string $shipping_city
* @property string $shipping_zip
* @property double $subtotal
* @property double $shiping_charge
* @property double $total
* @property string $order_time
* @property string $shipping_status
* @property string $transaction_id
* @property string $transaction_status
*/
class TransactionOrderDetails extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */

    public $autoship_startdate;
    public $autoship_status;
    public $card_no;
    public $check;
    public $card_exp_mon;
    public $card_exp_year;
    public $card_cvv;
    public $user_id;
    public $totalOccurrences;
    public $start_date;
    public $sub_interval;
    public $status;
    public $autoship_id;
    public $fullname;
    public $is_autoship;
    public $shipping_status_id;
    public $shipping_status1;
    public $purchase_from;
    public $landing_id;
    public $product_id;
    public $landing_product_id;
    public $product_name;
    public $product_desc;
    public $product_quan;
    public $affiliatename;
    public $landing_name;
    public $fromdate;
    public $todate;
    public $refundvalue;
    public $refundprovalue;
    public $rprolist;
    public $accept;
    public function tableName()
    {
        return 'transaction_order_details';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(

            array('accept', 'required', 'requiredValue' => 1, 'message' => 'You should accept term to use our service'),
            array('accept','safe'),
            array('landing_product_id','required','message'=>'Please Select Any Product','on'=>'submit'),

        array('billing_fname,billing_lname,billing_add,billing_phone,billing_state,billing_city,billing_zip,shipping_fname,shipping_lname,shipping_phone,shipping_add,shipping_state,shipping_city,shipping_zip,billing_email,card_no,card_exp_mon,card_exp_year,card_cvv', 'required','on'=>'submit'),
        array('card_no,card_exp_mon,card_exp_year,card_cvv', 'required', 'on'=>'payment'),
        array('refundvalue,rprolist,refundprovalue,card_no,card_exp_mon,card_exp_year', 'required', 'on'=>'refund'),
        array('refundvalue','compare','compareAttribute'=>'refundprovalue','operator'=>'<=','message'=>'refund value must less than product price','on'=>'refund'),
        array('billing_email', 'email'),
        array('check', 'safe'),
        array('subtotal, shiping_charge, total,cpa_rate', 'numerical'),
        array('billing_fname, billing_lname, billing_phone, billing_country, billing_email, billing_state, billing_city, billing_zip, shipping_fname, shipping_lname, shipping_phone, shipping_country, shipping_state, shipping_city, shipping_zip, transaction_id, transaction_status', 'length', 'max'=>255),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('orderid, billing_fname, billing_lname, billing_add, billing_phone, billing_country, billing_email, billing_state, billing_city, billing_zip, shipping_fname, shipping_lname, shipping_phone, shipping_add, shipping_country, shipping_state, shipping_city, shipping_zip, subtotal, shiping_charge, total, order_time, shipping_status, transaction_id, transaction_status,affiliate_code,user_id,shipping_status,purchase_from,affiliatename,is_refunded,is_autoship', 'safe', 'on'=>'search'),
        );
    }

    /**
    * @return array relational rules.
    */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
    * @return array customized attribute labels (name=>label)
    */
    public function attributeLabels()
    {
        return array(
        'orderid' => 'Orderid',
        'billing_fname' => 'First Name',
        'billing_lname' => 'Last Name',
        'billing_add' => 'Address',
        'billing_phone' => 'Phone',
        'billing_country' => 'Country',
        'billing_email' => 'Email',
        'billing_state' => 'State',
        'billing_city' => 'City',
        'billing_zip' => 'Zip',
        'shipping_fname' => 'First Name',
        'shipping_lname' => 'Last Name',
        'shipping_phone' => 'Phone',
        'shipping_add' => 'Address',
        'shipping_country' => 'Country',
        'shipping_state' => 'State',
        'shipping_city' => 'City',
        'shipping_zip' => 'Zip',
        'subtotal' => 'Subtotal',
        'shiping_charge' => 'Shiping Charge',
        'total' => 'Total',
        'order_time' => 'Order Time',
        'shipping_status' => 'Shipping Status',
        'transaction_id' => 'Transaction',
        'transaction_status' => 'Transaction Status',
        'card_no' => 'Card Number',
        'card_exp_mon' => 'Month',
        'card_exp_year' => 'Year',
        'card_cvv' => 'Card CVV No',
        'processing_fee' => 'Processing Fee',
        'cpa_rate' => 'CPA Rate',
        'rprolist' => 'Product List',
        'refundprovalue' => 'Product Price',
        'is_refunded' => 'Refund?',
        );
    }

    /**
    * Retrieves a list of models based on the current search/filter conditions.
    *
    * Typical usecase:
    * - Initialize the model fields with values from filter form.
    * - Execute this method to get CActiveDataProvider instance which will filter
    * models according to data in model fields.
    * - Pass data provider to CGridView, CListView or any similar widget.
    *
    * @return CActiveDataProvider the data provider that can return the models
    * based on the search/filter conditions.
    */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('orderid',$this->orderid,true);
        $criteria->compare('billing_fname',$this->billing_fname,true);
        $criteria->compare('billing_lname',$this->billing_lname,true);
        $criteria->compare('billing_add',$this->billing_add,true);
        $criteria->compare('billing_phone',$this->billing_phone,true);
        $criteria->compare('billing_country',$this->billing_country,true);
        $criteria->compare('billing_email',$this->billing_email,true);
        $criteria->compare('billing_state',$this->billing_state,true);
        $criteria->compare('billing_city',$this->billing_city,true);
        $criteria->compare('billing_zip',$this->billing_zip,true);
        $criteria->compare('shipping_fname',$this->shipping_fname,true);
        $criteria->compare('shipping_lname',$this->shipping_lname,true);
        $criteria->compare('shipping_phone',$this->shipping_phone,true);
        $criteria->compare('shipping_add',$this->shipping_add,true);
        $criteria->compare('shipping_country',$this->shipping_country,true);
        $criteria->compare('shipping_state',$this->shipping_state,true);
        $criteria->compare('shipping_city',$this->shipping_city,true);
        $criteria->compare('shipping_zip',$this->shipping_zip,true);
        $criteria->compare('subtotal',$this->subtotal);
        $criteria->compare('shiping_charge',$this->shiping_charge);
        $criteria->compare('total',$this->total);
        $criteria->compare('purchase_from',$this->purchase_from);
        $criteria->compare('order_time',$this->order_time,true);
        $criteria->compare('shipping_status',$this->shipping_status,true);
        $criteria->compare('transaction_id',$this->transaction_id,true);
        $criteria->compare('transaction_status',$this->transaction_status,true);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return TransactionOrderDetails the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getcartdetails($cart=array()){

        $pro_array = array_keys($cart);

        $idlist = implode(",",$pro_array);

       //$sql = "SELECT product.*,product_image.*,color_tbl.no_color,size_tbl.no_size FROM product INNER JOIN product_image ON product.productid=product_image.product_id LEFT JOIN (select count(*) as no_color,product_id FROM product_color WHERE product_color.product_id IN (".$idlist.") GROUP BY product_id) AS color_tbl ON color_tbl.product_id = product.productid LEFT JOIN (select count(*) as no_size,product_id FROM product_size WHERE product_size.product_id IN (".$idlist.") GROUP BY product_id) AS size_tbl ON size_tbl.product_id = product.productid WHERE productid IN (".$idlist.") GROUP BY productid" ;
       $sql = "SELECT product.*,product_image.* FROM product INNER JOIN product_image ON product.productid=product_image.product_id  WHERE productid IN (".$idlist.") GROUP BY productid" ;


        $result = yii::app()->db->createCommand($sql)->queryAll();

        return $result;
    }

    public function saveorder($billing_shipping_info){
        $this->billing_fname = $billing_shipping_info['billing_fname'];
        $this->billing_lname = $billing_shipping_info['billing_lname'];
        $this->billing_add = $billing_shipping_info['billing_add'];
        $this->billing_country = $billing_shipping_info['billing_country'];
        $this->billing_state = $billing_shipping_info['billing_state'];
        $this->billing_city = $billing_shipping_info['billing_city'];
        $this->billing_zip = $billing_shipping_info['billing_zip'];
        $this->billing_email = $billing_shipping_info['billing_email'];
        $this->billing_phone = $billing_shipping_info['billing_phone'];
        $this->shipping_phone = $billing_shipping_info['shipping_phone'];
        $this->shipping_fname = $billing_shipping_info['shipping_fname'];
        $this->shipping_lname = $billing_shipping_info['shipping_lname'];
        $this->shipping_add = $billing_shipping_info['shipping_add'];
        $this->shipping_country = $billing_shipping_info['shipping_country'];
        $this->shipping_state = $billing_shipping_info['shipping_state'];
        $this->shipping_city = $billing_shipping_info['shipping_city'];
        $this->shipping_zip = $billing_shipping_info['shipping_zip'];
        $this->subtotal = $billing_shipping_info['subtotal'];
        $this->shiping_charge = $billing_shipping_info['shiping_charge'];
        $this->total = $billing_shipping_info['total'];
        $this->discount_val = $billing_shipping_info['discount_val'];
        $this->discount_code = $billing_shipping_info['discount_code'];
        $this->order_time = $billing_shipping_info['order_time'];
        $this->shipping_status = 1;
        $this->transaction_id = $billing_shipping_info['transaction_id'];
        $this->transaction_status = $billing_shipping_info['transaction_status'];
        $this->affiliate_code = $billing_shipping_info['affiliate_code'];
        $this->user_id = $billing_shipping_info['user_id'];
        $this->processing_fee = floatval(Yii::app()->session['pross_fee']);

        $res =  $this->save();

        if(@$res){
            return  $this->orderid;
        }else{
            return 0;
        }
    }

    function getOrder($id){
        $res = $this->findAll("orderid = ".$id);

        return $res;
    }


    public function orderlist()
    {

        $criteria=new CDbCriteria;
        
        $criteria->join = 'LEFT JOIN  shipping_status_table stat ON stat.shipping_status_id=t.shipping_status LEFT JOIN user_manager u ON u.id=t.affiliate_code LEFT JOIN landing_page l ON l.id=t.landing_id';

        $criteria->select = 't.orderid,t.total as total,t.order_time,t.purchase_from,stat.shipping_status_val as shipping_status1,t.shipping_status as shipping_status,t.transaction_id,t.transaction_status,t.discount_val,CONCAT(t.billing_fname, " ", t.billing_lname) AS fullname,CONCAT(u.fname, " ", u.lname) AS affiliatename,l.name as landing_name, t.is_refunded,t.is_autoship';

        $criteria->group = 't.transaction_id';
        $criteria->addCondition('transaction_status ="Success"');
                
        $criteria->compare('t.total',$this->total);
        $criteria->compare('t.is_autoship',$this->is_autoship);
        $criteria->compare('order_time',$this->order_time,true);
        $criteria->compare('t.shipping_status',$this->shipping_status,true);
        $criteria->compare('t.transaction_id',$this->transaction_id,true);
        $criteria->compare('t.purchase_from',$this->purchase_from,true);
        $criteria->compare('t.transaction_status',$this->transaction_status,true);
        $criteria->compare('t.discount_val',$this->discount_val,true);
        $criteria->compare('t.is_refunded',$this->is_refunded,true);
        $criteria->compare('CONCAT(t.billing_fname, " ",t.billing_lname)',$this->fullname,true);
        $criteria->compare('CONCAT(u.fname, " ", u.lname)',$this->affiliatename,true);
        $criteria->compare('landing_id',$this->landing_id,true);
        if(!empty($_GET['TransactionOrderDetails']['fromdate']))
            $criteria->addCondition('t.order_time > '.$this->fromdate);
        if(!empty($_GET['TransactionOrderDetails']['todate']))
            $criteria->addCondition('t.order_time < '.$this->todate);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        'pagination' => array(
        'pageSize' => 100,
        ),
            'sort'=>array(
                'defaultOrder'=>'order_time DESC',
            ),
        ));
    }

    //for mail while status changed//
    public function orderlist1($id)
    {


      $criteria=new CDbCriteria;
        $criteria->join = 'LEFT JOIN  shipping_status_table stat ON stat.shipping_status_id=t.shipping_status';
        $criteria->select = 't.billing_email as billing_email,t.orderid as orderid,stat.shipping_status_val as shipping_status';

        $criteria->condition = 't.orderid='.$id;

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,

       ));



    }



    public function fetchbyorder($id){

        $conn = yii::app()->db;
        $sql="SELECT * FROM transaction_order_details WHERE orderid = ".$id;
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;

    }

    public function fetchprobyorder($id){

        $conn = yii::app()->db;
        $sql="SELECT transaction_product_details.*,landing_product_relation.product_image as imagename FROM transaction_product_details LEFT JOIN landing_product_relation ON landing_product_relation.id=transaction_product_details.landing_product_id WHERE order_id = ".$id;
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;

    }
    
    public function fetchorder($id)
    {
        

        
           /*    $conn = yii::app()->db;
        $sql="SELECT * FROM transaction_order_details WHERE user_id = ".$id;
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;*/
         $criteria=new CDbCriteria;
        $criteria->join = 'INNER JOIN  shipping_status_table stat ON stat.shipping_status_id=t.shipping_status';
        $criteria->select = 't.orderid,t.total as total,t.order_time,stat.shipping_status_val as shipping_status1,t.shipping_status as shipping_status,t.transaction_id,t.transaction_status,t.discount_val,CONCAT(t.billing_fname, " ", t.billing_lname) AS fullname';
        $criteria->order = 'order_time DESC';
        $criteria->group = 't.transaction_id';

        $criteria->condition = 'user_id='.$id.' AND transaction_status ="Success"';

        $criteria->order = 'order_time DESC';
        $criteria->compare('t.total',$this->total);
        $criteria->compare('order_time',$this->order_time,true);
        $criteria->compare('stat.shipping_status',$this->shipping_status,true);
        $criteria->compare('t.transaction_id',$this->transaction_id,true);
        $criteria->compare('t.transaction_status',$this->transaction_status,true);
        $criteria->compare('t.discount_val',$this->discount_val,true);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        'pagination' => array(
        'pageSize' => 10,
        ),
        ));
        
        
        
    }

    public function updatetable($post)

    {

        $this->updateByPk($post['pk'],array($post['name']=>$post['value']));

    }

    public function getallstatus(){
        $conn = yii::app()->db;
        $sql="SELECT * FROM shipping_status_table";
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute.
        return $result;

    }

    public function findgetval($cond){
        $conn = yii::app()->db;
        if($cond=='')
        $sql="SELECT t.*,p.*,DATE_FORMAT(FROM_UNIXTIME(t.order_time), '%d-%m-%Y') AS date,coalesce(stat.shipping_status_val,'') as shipping_status1,coalesce(t.shipping_status,'') as shipping_status,coalesce(CONCAT(t.billing_fname, ' ', t.billing_lname),'') AS fullname, coalesce(CONCAT(u.fname, ' ', u.lname),'') AS affiliatename,coalesce(l.name ,'') as landing_name FROM transaction_order_details t LEFT JOIN  shipping_status_table stat ON stat.shipping_status_id=t.shipping_status LEFT JOIN user_manager u ON u.id=t.affiliate_code LEFT JOIN landing_page l ON l.id=t.landing_id INNER JOIN transaction_product_details p ON p.order_id=t.orderid WHERE transaction_status =\"Success\" GROUP BY t.transaction_id ORDER BY order_time DESC";
        else
        $sql="SELECT t.*,p.*,DATE_FORMAT(FROM_UNIXTIME(t.order_time), '%d-%m-%Y') AS date,coalesce(stat.shipping_status_val,'') as shipping_status1,coalesce(t.shipping_status,'') as shipping_status,coalesce(CONCAT(t.billing_fname, ' ', t.billing_lname),'') AS fullname, coalesce(CONCAT(u.fname, ' ', u.lname),'') AS affiliatename,coalesce(l.name ,'') as landing_name FROM transaction_order_details t LEFT JOIN  shipping_status_table stat ON stat.shipping_status_id=t.shipping_status LEFT JOIN user_manager u ON u.id=t.affiliate_code LEFT JOIN landing_page l ON l.id=t.landing_id INNER JOIN transaction_product_details p ON p.order_id=t.orderid WHERE transaction_status =\"Success\" and ".$cond." GROUP BY t.transaction_id ORDER BY order_time DESC";
        //echo $sql;
        //exit;

        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute.
        //var_dump($result[0]['is_refunded']);
        //exit;

        if($result[0]['is_refunded']==1){

            //$result[0]['is_refunded']='';

            $result[0]['is_refunded']='Yes';

            //echo $result[0]['is_refunded'];
            //exit;
        }
        else
        {
            //echo 2;
            //exit;
            $result[0]['is_refunded']='No';

        }

        return $result;

    }


    public function updatetotal($s,$sub,$t,$orderid){
        $conn = yii::app()->db;
        //$s=Yii::app()->db->createCommand()->update('transaction_order_details',array('subtotal'=>'subtotal +'.$p,'total'=>'total +'.$p.' + '.$s),'orderid=:orderid',array(':orderid'=>$orderid));
        $sql='update transaction_order_details set shiping_charge='.$s.' ,subtotal='.$sub.' , total='.$t.' Where orderid='.$orderid;
        $res=$conn->createCommand($sql);
        $res=$res->execute();

    }

    public function fetchlastorder(){

        $conn = yii::app()->db;
        //$s=Yii::app()->db->createCommand()->update('transaction_order_details',array('subtotal'=>'subtotal +'.$p,'total'=>'total +'.$p.' + '.$s),'orderid=:orderid',array(':orderid'=>$orderid));
        $sql='SELECT MAX(orderid) as orderid from transaction_order_details';
        $res=$conn->createCommand($sql);
        $res=$res->queryAll();
        return $res;


    }




}

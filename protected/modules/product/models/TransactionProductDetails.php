<?php

/**
* This is the model class for table "transaction_product_details".
*
* The followings are the available columns in table 'transaction_product_details':
* @property integer $id
* @property integer $order_id
* @property integer $product_id
* @property string $product_name
* @property string $product_image
* @property double $product_price
* @property integer $product_quantity
*/
class TransactionProductDetails extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'transaction_product_details';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('order_id, product_id, product_quantity,landing_product_id', 'numerical', 'integerOnly'=>true),
        array('product_price', 'numerical'),
        array('product_name, product_image', 'length', 'max'=>255),
        array('product_desc,product_type,shipping_cost,offervalue', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, order_id, product_id, product_name, product_image, product_price, product_quantity,product_desc', 'safe', 'on'=>'search'),
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
        'id' => 'ID',
        'order_id' => 'Order',
        'product_id' => 'Product',
        'product_name' => 'Product Name',
        'product_image' => 'Product Image',
        'product_price' => 'Product Price',
        'product_quantity' => 'Product Quantity',
        'product_desc' => 'Product Description',
        'landing_product_id' => 'Landing Product Id',
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

        $criteria->compare('id',$this->id);
        $criteria->compare('order_id',$this->order_id);
        $criteria->compare('product_id',$this->product_id);
        $criteria->compare('product_name',$this->product_name,true);
        $criteria->compare('product_image',$this->product_image,true);
        $criteria->compare('product_price',$this->product_price);
        $criteria->compare('product_quantity',$this->product_quantity);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return TransactionProductDetails the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveorderproduct($pro_arr1,$orderId)
    {

        foreach($pro_arr1 as $pro_arr){
            $this->id =null;
            $this->isNewRecord =true;

            $this->order_id = $orderId;
            $this->product_id = $pro_arr['product_id'];
            $this->product_name = $pro_arr['product_name'];
            $this->product_price = $pro_arr['product_price'];
            $this->product_desc = $pro_arr['product_desc'];
            $this->product_quantity = $pro_arr['product_quantity'];
            $this->product_image = $pro_arr['product_image'];

            //$this->attributes = $pro_arr;

            $this->save();
        }
    }

    function getOrderPro($id){
        $res = $this->findAll("order_id = ".$id);

        return $res;

    }

}

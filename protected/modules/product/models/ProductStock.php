<?php

/**
* This is the model class for table "product_stock".
*
* The followings are the available columns in table 'product_stock':
* @property integer $id
* @property integer $product_id
* @property integer $stock
* @property string $time
*/
class ProductStock extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public $product;
    public $avail_stock;
    public function tableName()
    {
        return 'product_stock';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('product_id, stock', 'required'),
        array('product_id, stock', 'numerical', 'integerOnly'=>true),
        array('time', 'length', 'max'=>255),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('product_id,product, stock, time,type', 'safe', 'on'=>'search'),
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
        'product_id' => 'Product',
        'product' => 'Product Name',
        'stock' => 'Stock',
        'avail_stock' => 'Available Stock',
        'time' => 'Time',
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
        $criteria->join = 'INNER JOIN product  ON product.productid = t.product_id'; 
        $criteria->select = 't.*,product.productname as product,((SELECT SUM(stock) FROM product_stock as p WHERE p.type=1 GROUP BY p.product_id HAVING p.product_id = t.product_id)-(SELECT SUM(stock) FROM product_stock as p WHERE p.type=2 GROUP BY p.product_id HAVING p.product_id = t.product_id)) as avail_stock';
        $criteria->group  = 'product_id'; 
        $criteria->together = true; 


        $criteria->compare('id',$this->id);
        $criteria->compare('product.productname',$this->product);
        $criteria->compare('stock',$this->stock);
        $criteria->compare('time',$this->time,true);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return ProductStock the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function fetchprolist()
    {
        $conn = yii::app()->db;
        $sql="select productid,productname from  product";
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;

    }
   
         public function fetchstock($id)
    {
        $conn = yii::app()->db;
        $sql="SELECT SUM(stock) as avail_stock FROM product_stock as p WHERE p.type=1 AND product_id=".$id;
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;
        
       

    }
    public function addPro($pro_id){
          for($i=1;$i<=2;$i++){
            $this->id =null;
            $this->isNewRecord =true;

            $this->product_id = $pro_id;
            $this->stock = 0;
            $this->time = time();
            $this->type = $i;

            $this->save();
        }

    }
    
    public function details($id)
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;
        $criteria->join = 'INNER JOIN product  ON product.productid = t.product_id'; 
        $criteria->select = 't.*,product.productname as product';
        $criteria->condition = "`product_id` =".$id." AND `stock` != 0";
        $criteria->together = true; 
        $criteria->order = "time DESC";


        $criteria->compare('id',$this->id);
        $criteria->compare('product.productname',$this->product);
        $criteria->compare('stock',$this->stock);
        $criteria->compare('time',$this->time,true);
       
        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }
    
        public function saveproductstock($cart)
    {

        foreach($cart as $key=>$val){
            $this->id =null;
            $this->isNewRecord =true;

            $this->product_id = $key;
            $this->stock = $val;
            $this->time = time();
            $this->type = 2;

            $this->save();
        }
    }

    public function availstock($id=0)
    {
        $conn = yii::app()->db;
        $sql="SELECT t.product_id,((SELECT SUM(stock) FROM product_stock as p WHERE p.type=1 GROUP BY p.product_id HAVING p.product_id = t.product_id)-(SELECT SUM(stock) FROM product_stock as p WHERE p.type=2 GROUP BY p.product_id HAVING p.product_id = t.product_id)) as avail_stock FROM product_stock  t INNER JOIN product  ON product.productid = t.product_id where product_id =".$id." GROUP BY product_id";
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute.
        return $result;
    }




}

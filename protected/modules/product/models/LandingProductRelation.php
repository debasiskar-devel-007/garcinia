<?php

/**
 * This is the model class for table "landing_product_relation".
 *
 * The followings are the available columns in table 'landing_product_relation':
 * @property string $id
 * @property string $landing_id
 * @property double $product_price
 * @property string $product_desc
 * @property string $product_image
 * @property integer $isactive
 * @property integer $product_type
 * @property string $product_id
 */
class LandingProductRelation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $landing_page_name;
    public $product_orig_name;
    public $ship_name;
	public function tableName()
	{
		return 'landing_product_relation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('landing_id,product_id, product_type,product_price,shipping_id,product_name,quantity', 'required'),
			array('product_image', 'required','message'=>"Select an image"),
			array('isactive, product_type', 'numerical', 'integerOnly'=>true),
			array('product_price', 'numerical'),
			array('id, landing_id, product_id', 'length', 'max'=>255),
			array('product_desc, product_image,autoship', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, landing_id, product_price, product_desc, product_image, isactive, product_type, product_id,shipping_id,product_name', 'safe', 'on'=>'search'),
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
			'landing_id' => 'Landing',
			'product_price' => 'Product Price',
			'product_desc' => 'Product Desc',
			'product_image' => 'Product Image',
			'isactive' => 'Status',
			'product_type' => 'Product Type',
			'product_id' => 'Product',
			'shipping_id' => 'Shipping Type',
			'product_name' => 'Product Name',
			'quantity' => 'Quantity',
			'autoship' => 'Autoship',
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
        $criteria->join = "INNER JOIN landing_page on t.landing_id = landing_page.id INNER JOIN product on t.product_id = product.productid INNER JOIN shipping_charge ON t.shipping_id=shipping_charge.id";
        $criteria->select = "t.*,landing_page.name as landing_page_name,product.productname as product_orig_name,CONCAT(shipping_charge.shipping_name,' - (',shipping_charge.shipping_charge,')') AS ship_name";

		$criteria->compare('id',$this->id,true);
		$criteria->compare('landing_id',$this->landing_id,true);
		$criteria->compare('product_price',$this->product_price);
		$criteria->compare('product_desc',$this->product_desc,true);
		$criteria->compare('product_image',$this->product_image,true);
		$criteria->compare('isactive',$this->isactive);
		$criteria->compare('t.product_type',$this->product_type);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('shipping_id',$this->shipping_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LandingProductRelation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function updatestatus($id)

    {

        $table = $this->tableName();

        $attr = 'isactive';

        $pk = 'id';



        $command=  Yii::app()->db->createCommand('call common2("'.$table.'","'.$attr.'","'.$pk.'",'.$id.')');

        $command->execute();

    }

    public function fetchAllPro($landing_id=1){

        $criteria=new CDbCriteria;
        $criteria->join = "INNER JOIN landing_page on t.landing_id = landing_page.id INNER JOIN product on t.product_id = product.productid INNER JOIN shipping_charge ON t.shipping_id=shipping_charge.id";
        $criteria->select = "t.*,landing_page.name as landing_page_name,product.productname as product_orig_name,CONCAT(shipping_charge.shipping_name,' - (',shipping_charge.shipping_charge,')') AS ship_name";
        $criteria->condition = 't.landing_id='.$landing_id.' AND t.product_type=1';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>false
        ));
    }

    public function fetchAllPro1($lid){

        $criteria=new CDbCriteria;
        $criteria->join = "INNER JOIN landing_page on t.landing_id = landing_page.id INNER JOIN product on t.product_id = product.productid INNER JOIN shipping_charge ON t.shipping_id=shipping_charge.id";
        $criteria->select = "t.*,landing_page.name as landing_page_name,product.productname as product_orig_name,CONCAT(shipping_charge.shipping_name,' - (',shipping_charge.shipping_charge,')') AS ship_name";
        $criteria->addcondition('t.product_type=0');
        $criteria->addcondition('t.landing_id='.$lid);


        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>false
        ));
    }

    public function fetchAllPro2($lid){

        $criteria=new CDbCriteria;
        $criteria->join = "INNER JOIN landing_page on t.landing_id = landing_page.id INNER JOIN product on t.product_id = product.productid INNER JOIN shipping_charge ON t.shipping_id=shipping_charge.id";
        $criteria->select = "t.*,landing_page.name as landing_page_name,product.productname as product_orig_name,CONCAT(shipping_charge.shipping_name,' - (',shipping_charge.shipping_charge,')') AS ship_name";
        $criteria->addcondition('t.product_type=0');
        $criteria->addcondition('t.landing_id='.$lid);


        return $this->findAll($criteria);
    }

    public function checkupsell($lid){

        $r=LandingProductRelation::model()->exists('product_type = :product_type AND landing_id = :landing_id', array('product_type'=>0,'landing_id'=>$lid));
        return $r;
    }

}

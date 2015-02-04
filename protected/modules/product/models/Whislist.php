<?php

/**
 * This is the model class for table "whislist".
 *
 * The followings are the available columns in table 'whislist':
 * @property string $id
 * @property string $user_id
 * @property string $product_id
 * @property integer $is_added
 * @property integer $is_deleted
 * @property integer $isactive
 */
class Whislist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
     public $fullname;
     public $productname;
	public function tableName()
	{
		return 'whislist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_added, is_deleted, isactive', 'numerical', 'integerOnly'=>true),
			array('user_id, product_id', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
            array('id, user_id, product_id, is_added, is_deleted, isactive,fullname,productname', 'safe'),
			array('id, user_id, product_id, is_added, is_deleted, isactive,fullname,productname', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'product_id' => 'Product',
			'is_added' => 'Is Added',
			'is_deleted' => 'Is Deleted',
            'isactive' => 'Isactive',
			'time' => 'time',
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
        
        $criteria->join = 'INNER JOIN  user_manager um ON um.id=t.user_id INNER JOIN  product p ON p.productid=t.product_id';
        $criteria->select = 't.*,CONCAT(um.fname, " ", um.lname) AS fullname,p.productname as productname';

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('is_added',$this->is_added);
		$criteria->compare('is_deleted',$this->is_deleted);
        $criteria->compare('isactive',$this->isactive);
        $criteria->compare('fullname',$this->fullname);
		$criteria->compare('productname',$this->productname);
        
        $criteria->order="time desc";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Whislist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    
    public function checkwish($id,$userid)
    {

        $r=Whislist::model()->exists('user_id=:user_id AND product_id=:product_id AND isactive=1', array(':user_id'=>$userid, ':product_id'=>$id));
        if($r)
            return 0;
        else
            return 1;

    }
    
    
    public function countwish($c)
    {
        $conn = yii::app()->db;
        $sql="select count(product_id) as wishcount from whislist where user_id=".$c;
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();
        //var_dump($result);
         //exit;
            // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;
    }
    
    public function countwish1($c)
    {
        $conn = yii::app()->db;
        $sql="select id from whislist where user_id=".$c ." and isactive=1";
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();
        return count($result);
    }
}

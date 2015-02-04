<?php

/**
 * This is the model class for table "notify_list".
 *
 * The followings are the available columns in table 'notify_list':
 * @property integer $id
 * @property string $email
 * @property integer $product_id
 * @property string $time
 * @property integer $status
 */
class NotifyList extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'notify_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, status', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>255),
			array('time', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, product_id, time, status', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'product_id' => 'Product',
			'time' => 'Time',
			'status' => 'Status',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NotifyList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function checknotify($arr=array())
    {

        $r=$this->exists('email=:email AND product_id=:product_id AND status=0', array(':email'=>@$arr['email'], ':product_id'=>$arr['product_id']));
        if($r)
            return 0;
        else
            return 1;

    }

    public function getnotifymail($product_id =0)
    {
        $conn = yii::app()->db;
        $sql = "SELECT notify_list.*,product.productname,product.catagoryid FROM notify_list INNER JOIN product ON product.productid = notify_list.product_id WHERE `status` =0 AND product_id =".$product_id;
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute.
        return $result;
    }

    public function updatenotify($product_id=0){
        $criteria = new CDbCriteria();
        $criteria->compare('product_id', $product_id);
        $this->updateAll(array('status'=>1), $criteria);
    }

}

<?php

/**
 * This is the model class for table "newsletter".
 *
 * The followings are the available columns in table 'newsletter':
 * @property string $id
 * @property string $user_id
 * @property string $time
 * @property integer $has_select
 */
class Newsletter extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $userid;
    public $email;
	public function tableName()
	{
		return 'newsletter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('has_select', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>255),
			array('time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, time, has_select,userid,email', 'safe', 'on'=>'search'),
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
			'user_id' => 'Name',
			'userid' => 'Name',
			'time' => 'Time',
			'has_select' => 'subscribed',
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

        $criteria->join = 'LEFT JOIN user_manager ON user_manager.id = t.user_id';
        $criteria->select = 't.id,t.user_id as userid,t.time,t.has_select,CONCAT(user_manager.fname, " ", user_manager.lname) as userid,user_manager.email as email';
        // $criteria->order = "t.priority desc";
        $criteria->together = true;

        $criteria->compare('id',$this->id,true);
		$criteria->compare('CONCAT(user_manager.fname, " ",user_manager.lname)',$this->userid,true);
		$criteria->compare('user_manager.email',$this->email,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('has_select',$this->has_select);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Newsletter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

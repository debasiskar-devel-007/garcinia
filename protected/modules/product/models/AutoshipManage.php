<?php

/**
 * This is the model class for table "autoship_manage".
 *
 * The followings are the available columns in table 'autoship_manage':
 * @property integer $id
 * @property string $transaction_id
 * @property string $autoship_response_code
 * @property string $autoship_response_text
 * @property double $amount
 */
class AutoshipManage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'autoship_manage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount', 'numerical'),
			array('transaction_id, autoship_response_code, autoship_response_text', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, transaction_id, autoship_response_code, autoship_response_text, amount,totalOccurrences,start_date,sub_interval,status', 'safe', 'on'=>'search'),
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
			'transaction_id' => 'Transaction',
			'autoship_response_code' => 'Autoship Response Code',
			'autoship_response_text' => 'Autoship Response Text',
			'amount' => 'Amount',
			'totalOccurrences' => 'Total Occurrences',
			'start_date' => 'Start Date',
			'sub_interval' => 'Interval',
            'status' => 'status',
            'product_id' => 'product_id',
			'product_name' => 'product_name',
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
		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('autoship_response_code',$this->autoship_response_code,true);
		$criteria->compare('autoship_response_text',$this->autoship_response_text,true);
		$criteria->compare('amount',$this->amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AutoshipManage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

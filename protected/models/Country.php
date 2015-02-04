<?php

/**
 * This is the model class for table "country".
 *
 * The followings are the available columns in table 'country':
 * @property integer $id
 * @property string $s_name
 * @property integer $lang_id
 * @property integer $currency_id
 * @property string $product_available
 * @property integer $vat_applicable
 * @property string $s_iso_code
 * @property string $s_region
 * @property string $flag
 */
class Country extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lang_id, currency_id, vat_applicable', 'numerical', 'integerOnly'=>true),
			array('s_name', 'length', 'max'=>250),
			array('product_available', 'length', 'max'=>50),
			array('s_iso_code', 'length', 'max'=>10),
			array('s_region', 'length', 'max'=>25),
			array('flag', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, s_name, lang_id, currency_id, product_available, vat_applicable, s_iso_code, s_region, flag', 'safe', 'on'=>'search'),
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
			's_name' => 'S Name',
			'lang_id' => 'Lang',
			'currency_id' => 'Currency',
			'product_available' => 'Product Available',
			'vat_applicable' => 'Vat Applicable',
			's_iso_code' => 'S Iso Code',
			's_region' => 'S Region',
			'flag' => 'Flag',
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
		$criteria->compare('s_name',$this->s_name,true);
		$criteria->compare('lang_id',$this->lang_id);
		$criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('product_available',$this->product_available,true);
		$criteria->compare('vat_applicable',$this->vat_applicable);
		$criteria->compare('s_iso_code',$this->s_iso_code,true);
		$criteria->compare('s_region',$this->s_region,true);
		$criteria->compare('flag',$this->flag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Country the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

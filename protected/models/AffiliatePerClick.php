<?php

/**
 * This is the model class for table "affiliate_per_click".
 *
 * The followings are the available columns in table 'affiliate_per_click':
 * @property integer $id
 * @property integer $affiliate_code
 * @property integer $page_id
 * @property string $ip_address
 * @property string $time
 */
class AffiliatePerClick extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $fullname;
    public $cpc_no;
    public $tot_cpc;
    public $fromdate;
    public $todate;
    public $tot_cpc_cost;
    public $total_cpc_cost;
    public $total_cost;
    public $total_cpc_click;
	public function tableName()
	{
		return 'affiliate_per_click';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('affiliate_code, page_id', 'numerical', 'integerOnly'=>true),
			array('ip_address', 'length', 'max'=>255),
			array('time', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, affiliate_code, page_id, ip_address, time,todate,fromdate', 'safe', 'on'=>'search'),
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
			'affiliate_code' => 'Affiliate Code',
			'page_id' => 'Page',
			'ip_address' => 'Ip Address',
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
        $criteria->join = 'LEFT JOIN user_manager u  ON u.id = t.affiliate_code LEFT JOIN vw_total_cpc v ON t.affiliate_code=v.affiliate_code';
        $criteria->select = 't.*,u.fname as affiliate_fname,u.lname as affiliate_lname, CONCAT(u.fname, " ", u.lname) AS fullname,(SELECT SUM(value) FROM affiliate_per_click as apc where apc.affiliate_code = t.affiliate_code and time between '.$this->fromdate.' and '.$this->todate.') as tot_cpc,(SELECT SUM(cpc_rate) FROM affiliate_per_click as apc where apc.affiliate_code = t.affiliate_code and time between '.$this->fromdate.' and '.$this->todate.') as tot_cpc_cost,(SELECT SUM(cpc_rate) FROM affiliate_per_click as apc where  time between '.$this->fromdate.' and '.$this->todate.') as total_cpc_cost,(SELECT SUM(value) FROM affiliate_per_click as apc where apc.affiliate_code = t.affiliate_code and time between '.$this->fromdate.' and '.$this->todate.') as tot_cpc,(SELECT SUM(cpc_rate) FROM affiliate_per_click as apc where apc.affiliate_code = t.affiliate_code and time between '.$this->fromdate.' and '.$this->todate.') as tot_cpc_cost,(SELECT SUM(value) FROM affiliate_per_click as apc where  time between '.$this->fromdate.' and '.$this->todate.') as total_cpc_click';
        $criteria->together = true;
        //if(count($_GET) == 0)
        $criteria->order = 't.affiliate_code';

        $criteria->compare('id',$this->id);
        $criteria->compare('CONCAT(u.fname, " ", u.lname)',$this->fullname,true);
        $criteria->compare('affiliate_code',$this->affiliate_code);
        $criteria->compare('page_id',$this->page_id);
        $criteria->compare('ip_address',$this->ip_address,true);
        //$criteria->compare('time',$this->time,true);
        //$criteria->compare('time', $this->fromdate,true,'>=');
        //$criteria->compare('time', $this->todate,true,'<=');
        if(intval($this->fromdate) && intval($this->todate))
            $criteria->condition="`time` Between ".$this->fromdate." And ".$this->todate;

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AffiliatePerClick the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function fetchTotalcpc($records)
    {
        $days=0;
        foreach($records as $record)
            $days=$record->total_cpc_cost;
        return $days;
    }
    public function fetchTotalclicks($records)
    {
        $days=0;
        foreach($records as $record)
            $days=$record->total_cpc_click;
        return $days;
    }
}

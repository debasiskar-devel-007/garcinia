<?php

/**
 * This is the model class for table "user_notes".
 *
 * The followings are the available columns in table 'user_notes':
 * @property integer $id
 * @property integer $user_id
 * @property string $notes
 * @property integer $time
 */
class UserNotes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $fullname;
	public function tableName()
	{
		return 'user_notes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('notes', 'required'),
			array('user_id, time', 'numerical', 'integerOnly'=>true),
			array('notes', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			
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
			'notes' => 'Note',
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

        $criteria->join = "INNER JOIN  user_manager um ON um.id=t.user_id";
        $criteria->select = "t.*,CONCAT(um.fname, ' ', um.lname) AS fullname";

        $criteria->order = "t.time desc";

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('time',$this->time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserNotes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function fetchbyid($id2=0){
        $criteria=new CDbCriteria;

        $criteria->join = "INNER JOIN  user_manager um ON um.id=t.user_id";
        $criteria->select = "t.*,CONCAT(um.fname, ' ', um.lname) AS fullname";

        $criteria->condition = "`user_id` =".$id2;
        $criteria->order = "t.time desc";

        $criteria->compare('id',$this->id);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('notes',$this->notes,true);
        $criteria->compare('time',$this->time);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>false
        ));
        
    }
    
    public function addnote($data){
        $this->user_id = $data['user_id'];
        $this->notes = $data['notes'];
        $this->time = time();
        
        $this->save();
    }
    
}

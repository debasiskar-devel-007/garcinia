<?php

/**
 * This is the model class for table "mail".
 *
 * The followings are the available columns in table 'mail':
 * @property string $id
 * @property string $name
 * @property string $email
 * @property integer $isactive
 * @property string $remarks
 */
class Mails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('isactive', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>255),
			array('remarks', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(' name, email', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'email' => 'Email',
			'isactive' => 'Isactive',
			'remarks' => 'Remarks',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		//$criteria->compare('isactive',$this->isactive);
		$criteria->compare('remarks',$this->remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
        
        public function updatetable($post)
    {
        $this->updateByPk($post['pk'], array($post['name']=>$post['value']));
    }
    
            public function insertdata()
    {
        $this->name=$_POST['Mails']['name'];
        $this->email=$_POST['Mails']['email'];
        $this->remarks=$_POST['Mails']['remarks'];
        
        $res=$this->save();

        return $res;
    }
    
    public function fetchmail()
    {
        $sql = 'SELECT email from mail';
        $d = Yii::app()->db->createCommand($sql)->queryAll();
        
        return $d;   
          
        
    }
      public function fetchans($id)

    {
        $sql = 'SELECT remarks  FROM mail WHERE id='.$id.';';
        $d = Yii::app()->db->createCommand($sql)->queryAll();
        return $d;

    }
            public function deletedata($id)
    {
        $this->deleteByPk($id);
        //return $res;
    }
        public function updatestatus($id)

    { $i=$id;
        $tablename=$this->tableName();
        $pk='id';
        $attribute='isactive';
        $command=  yii::app()->db->createCommand('call common2("'.$tablename.'","'.$attribute.'","'.$pk.'",'.$id.')');
        $command->execute();
        

    }
}
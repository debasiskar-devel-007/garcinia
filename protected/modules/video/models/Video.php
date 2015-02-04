<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property integer $type
 * @property integer $isactive
 */
class Video extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Video the static model class
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
		return 'video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('title', 'required'),
            array('name', 'required','message'=>'Please upload a flv Video'),
			array('type, isactive', 'numerical', 'integerOnly'=>true),
			array('title, name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, name, type, isactive,time', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'name' => 'Name',
			'type' => 'Type',
            'isactive' => 'Status',
			'time' => 'Date-Time',
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

        $criteria->compare('id',$this->id);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('type',$this->type);
        $criteria->compare('isactive',$this->isactive);
        if(count($_GET) == 0)
        $criteria->order = 'time DESC';        

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    public function getvalue555()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        $criteria->order = 'time DESC';
        $criteria->addCondition('isactive =1');

        $criteria->compare('id',$this->id);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('type',$this->type);
        $criteria->compare('isactive',$this->isactive);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function getvalue(){
        $rawData=Yii::app()->db->createCommand('SELECT t.id,t.value
     , t.time
     , t.type
     , t.ttype 
  FROM (
SELECT
`status`.`id` AS `id`,
`status`.`value` AS `value`,
`status`.time,
`status`.is_active AS `type`,
\'status\' AS `ttype`
FROM
`status`
WHERE
`status`.`type` = "video" AND
`status`.`is_active` = 1 AND
`status`.`share_with` = 1
UNION
SELECT
video.`id` AS `id`,
video.`name` AS `value`,
`video`.time,
`video`.type AS `type`,
\'video\' AS `ttype`
FROM
`video`
WHERE
`video`.`isactive` = 1)
t
 ORDER BY t.time DESC')->queryAll();

        $dataProvider=new CArrayDataProvider($rawData, array(
            'pagination'=>false,
        ));
        return $dataProvider;
    }

    public function getvalue1(){
        $rawData=Yii::app()->db->createCommand('SELECT t.id,t.value
     , t.time
     , t.type
     , t.ttype
  FROM (
SELECT
`status`.`id` AS `id`,
`status`.`value` AS `value`,
`status`.time,
`status`.is_active AS `type`,
\'status\' AS `ttype`
FROM
`status`
WHERE
`status`.`type` = "video"
UNION
SELECT
video.`id` AS `id`,
video.`name` AS `value`,
`video`.time,
`video`.type AS `type`,
\'video\' AS `ttype`
FROM
`video`)
t
 ORDER BY t.time DESC')->queryAll();

        $dataProvider=new CArrayDataProvider($rawData, array(
        ));
        return $dataProvider;
    }


    public function videofetch($id)
    {
        $res=$this->findAllByPk($id);
        return($res);
    }

    
        
    
    public function deletefun($id)
    {
        $this->deleteByPk($id); 

    }
        public function updatedata($post)
    {
        $this->updateByPk($post['pk'], array($post['name']=>$post['value']));
    }
    
            public function fetchupdatedetails($id)
    {
        $res=$this->findByPk($id);
        return $res;  
    }
            public function updatedetails($id,$arr)
    {
        $res=$this->updateByPk($id,$arr);

    }
    
            public function updatestatus($id)
    {
        $i=$id;
        $tablename=$this->tableName();
        $pk='id';
        $attribute='isactive';
        $command=  yii::app()->db->createCommand('call common2("'.$tablename.'","'.$attribute.'","'.$pk.'",'.$id.')');
        $command->execute();

    }
    
    
                public function updatestatus1($id)
    {
                     $conn = yii::app()->db;
        $sql="update video set showmaintv=1 where id=".$id;
        $result=$conn->createCommand($sql);
        $result=$result->execute();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;

    }
    
                    public function updatestat($id)
    {
                     $conn = yii::app()->db;
        $sql="update video set showmaintv=0 where id!=".$id;
        $result=$conn->createCommand($sql);
        $result=$result->execute();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;

    }
}
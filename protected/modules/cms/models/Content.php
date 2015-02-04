<?php

/**
* This is the model class for table "content".
*
* The followings are the available columns in table 'content':
* @property string $id
* @property string $content_type
* @property string $content_desc
* @property integer $content_status
*/
class Content extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public $image_type;
    public $img_width;
    public $img_height;
    public $page_id;
    public function tableName()
    {
        return 'content';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array(' content_type, content_desc,page_id,image_type', 'required'),
        array('img_width', 'checkval'),
        array('img_height', 'checkval1'),
        
        array('content_status,img_width,img_height', 'numerical', 'integerOnly'=>true),
        array('id', 'length', 'max'=>255),
        array('content_type', 'length', 'max'=>10),
        array('content_desc', 'length', 'max'=>500),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('content_type, content_desc, content_status', 'safe', 'on'=>'search'),
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
    
    public function checkval($attributes,$params)
    {
        
     if($this->content_type == 'IMAGE')
     if($this->img_width=='')   
     $this->addError($attributes,'Image Width is required');
      
       
        
    }
        public function checkval1($attributes,$params)
    {
        
     if($this->content_type == 'IMAGE')
     if($this->img_height=='')   
     $this->addError($attributes,'Image Height is required');
      
       
        
    }

    /**
    * @return array customized attribute labels (name=>label)
    */
    public function attributeLabels()
    {
        return array(
        'id' => 'ID',
        'content_type' => 'Content Type',
        'content_desc' => 'Content Desc',
        'content_status' => 'Content Status',
        'page_id' => 'Page Name',
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
        $criteria->join ='LEFT JOIN  page ON page.id=t.page_id';
        $criteria->select ='t.id,t.content_type,t.content_desc,t.content_status,page.page_name as page_id';

        $criteria->compare('t.id',$this->id,true);
        $criteria->compare('t.content_type',$this->content_type,true);
        $criteria->compare('t.content_desc',$this->content_desc,true);
        $criteria->compare('page.id',$this->page_id,true);
        //$criteria->compare('content_status',$this->content_status);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return Content the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function savedata()
    {

        $r=$this->save();
        return $r;  
    }

    public function updatestatus($id)
    {
        $i=$id;
        $tablename=$this->tableName();
        $pk='id';
        $attribute='content_status';
        $command=  yii::app()->db->createCommand('call common2("'.$tablename.'","'.$attribute.'","'.$pk.'",'.$id.')');
        $command->execute();

    }
    public function updatedata($post)
    {
        $this->updateByPk($post['pk'], array($post['name']=>$post['value']));
    }

    public function deletefun($id)
    {
        $this->deleteByPk($id); 

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
    
        public function fetchdata()
    {
        $conn = yii::app()->db;
       
            $sql="select id,page_name from page where page_status=1";
       
       
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;
    }
    
    
}

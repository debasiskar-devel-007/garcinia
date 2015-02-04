<?php

/**
* This is the model class for table "page".
*
* The followings are the available columns in table 'page':
* @property string $id
* @property string $page_name
* @property string $page_desc
* @property integer $page_status
*/
class Page extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'page';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('page_name, page_desc', 'required'),
        array('page_status', 'numerical', 'integerOnly'=>true),
        array('page_name', 'length', 'max'=>30),
        array('page_desc', 'length', 'max'=>100),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array(' page_name,page_desc', 'safe', 'on'=>'search'),
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
        'page_name' => 'Page Name',
        'page_desc' => 'Page Desc',
        'page_status' => 'Page Status',
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

        //$criteria->compare('id',$this->id,true);
        $criteria->compare('page_name',$this->page_name,true);
        $criteria->compare('page_desc',$this->page_desc,true);
        //$criteria->compare('page_status',$this->page_status);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return Page the static model class
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
        $attribute='page_status';
        $command=  yii::app()->db->createCommand('call common2("'.$tablename.'","'.$attribute.'","'.$pk.'",'.$id.')');
        $command->execute();

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

    public function checkurl($d)

    {
        $conn = yii::app()->db;

        $sql="select count(*)as pagecount from page where page_name='".$d."'";


        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute.
        return $result;
        //var_dump($result);



    }
    public function findpage($data)
    {
        $conn = yii::app()->db; 
        $sql="select * from page where id in (".implode(',',$data).")";
        //echo $sql;

        $result=$conn->createCommand($sql);
        $result=$result->queryAll();
    // for select we will have to use queryAll(), but for update delete insert we will have to use execute.
        return $result;
    }

    public function fetchcontent($pagename)
    {
        $conn = yii::app()->db; 
        $sql="select id from page where page_name='".$pagename."'";
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();
      
        $pageid= @$result[0]['id'];
        $sql="select content_info.content_type,content_info.content_id from content_info left join content on content_info.id=content.id and content.id=".$pageid;
        $result=$conn->createCommand($sql); 
       return $result=$result->queryAll();
        
        //$page=$pagename;

        /* $criteria = new CDbCriteria;
        $criteria->join = 'LEFT JOIN content  ON content.page_id=t.id' ;
        $criteria->select = 't.page_name,content.content_type,content.content_desc,content.image_type,content.img_height,content.img_width';
        //$criteria->condition="t.page_name='".$pagename."'";
        //$criteria->together=true;



        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
        */


    }

}

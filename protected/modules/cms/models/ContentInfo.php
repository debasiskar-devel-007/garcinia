<?php

/**
* This is the model class for table "content_info".
*
* The followings are the available columns in table 'content_info':
* @property string $id
* @property string $content_id
* @property string $content_type
*/
class ContentInfo extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'content_info';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(




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
        'content_id' => 'Content',
        'content_type' => 'Content Type',
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

        $criteria->compare('id',$this->id,true);
        $criteria->compare('content_id',$this->content_id,true);
        $criteria->compare('content_type',$this->content_type,true);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return ContentInfo the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /*    public function addfunc()
    {
    echo $this->getErrors;
    var_dump($this->attributes);
    exit;

    }*/

    public function savedata($id,$r)
    {



        

            $this->content_id=$id;
            $this->content_type=$r;
            //exit;
              $this->save(); 
            //exit;
        
    }


    public function savedata1($id,$r)
    {




        foreach($r as $con)
        {
            $this->id=null;
            $this->isNewRecord=true;
            $this->content_id=$id;
            $this->content_type=$con;
            $this->save();
            //exit;
        }


    }

    public function fetchupdatedetails($id)
    {
        /*$conn = yii::app()->db;

        $sql="select * from content_info where content_id=".$id;


        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;*/
        $res=ContentInfo::model()->findAllByAttributes(array('content_id'=>$id));
        //var_dump($res);
       // exit;
        return $res;
    }
    public function deletedata($id)
    {
        ContentInfo::model()->deleteAll('content_id ='.$id);



    }
}

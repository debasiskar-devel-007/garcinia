<?php

/**
* This is the model class for table "catagory".
*
* The followings are the available columns in table 'catagory':
* @property string $id
* @property string $categoryname
* @property string $categorydesc
* @property integer $priority
* @property string $parentcategoryid
* @property integer $isactive
* @property integer $isfeatured
*/
class Category extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'catagory';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('categoryname, categorydesc, priority', 'required'),
        array('priority, isactive, isfeatured', 'numerical', 'integerOnly'=>true),
        array('categoryname, categorydesc', 'length', 'max'=>50),
        array('parentcategoryid', 'length', 'max'=>255),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array(' categoryname, priority, isactive, isfeatured', 'safe', 'on'=>'search'),
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
        'categoryname' => 'Categoryname',
        'categorydesc' => 'Categorydesc',
        'priority' => 'Priority',
        'parentcategoryid' => 'Parent category',
        'isactive' => 'Isactive',
        'isfeatured' => 'Isfeatured',
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
        $criteria->join = 'LEFT JOIN catagory  cat  ON cat.id = t.parentcategoryid ';
        $criteria->select = 'cat.categoryname as parentcategoryid,t.id,t.categoryname,t.isactive,t.isfeatured,t.priority,t.createdon';
        $criteria->together = true;

        $criteria->compare('id',$this->id,true);
        $criteria->compare('t.categoryname',$this->categoryname,true);
        //$criteria->compare('categorydesc',$this->categorydesc,true);
        //$criteria->compare('priority',$this->priority);
        $criteria->compare('cat.categoryname',$this->parentcategoryid,true);
        //$criteria->compare('isactive',$this->isactive);
        //$criteria->compare('isfeatured',$this->isfeatured);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
                'pagination' => array(
        'pageSize' => 10,
        ),
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return Catagory the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


    //for saving data in database
    public function savecategory()
    {
        $this->categoryname = $_POST['Category']['categoryname'];
        $this->categorydesc = $_POST['Category']['categorydesc'];
        $this->parentcategoryid = $_POST['Category']['parentcategoryid'];
        //$this->categoryimage = $_POST['Category']['categoryimage'];
        $this->isactive = $_POST['Category']['isactive'];
        $this->isfeatured = $_POST['Category']['isfeatured'];
        $this->priority = $_POST['Category']['priority'];
        $this->save();
    }
//for show the description in a modal
    public function fetchdesc($id)
    {
        $res=$this->findAllByPk($id);
        return($res);
    }
    //to fetch the category name
        public function fetchdata()
    {
        $conn = yii::app()->db;
        $sql="select id,categoryname from catagory";
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;
    }
    
            public function fetchcatname($c)
    {
        $conn = yii::app()->db;
        $sql="select categoryname from catagory where id=".$c;
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();
        //var_dump($result);
        //exit;
            // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;
    }
    
        public function updatetable($post)
    {
        $this->updateByPk($post['pk'],array($post['name']=>$post['value']));
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
        $i=$id;
        $tablename=$this->tableName();
        $pk='id';
        $attribute='isfeatured';
        $command=  yii::app()->db->createCommand('call common2("'.$tablename.'","'.$attribute.'","'.$pk.'",'.$id.')');
        $command->execute();
        //echo $id;
    }
    
        public function fetchdetail($id)
    {
           $res=$this->findByPk($id);
         return $res;
        
    }
    public function updatedetails($id)
    {
       // var_dump($_POST);
//        exit;
        $categoryname = $_POST['Category']['categoryname'];
        $categorydesc = $_POST['Category']['categorydesc'];
        
        //$categoryimage = $_POST['Category']['categoryimage'];
        $parentcategoryid = $_POST['Category']['parentcategoryid'];
        $isactive = $_POST['Category']['isactive'];
        $isfeatured = $_POST['Category']['isfeatured'];
        $priority = $_POST['Category']['priority'];
        $this->updateByPk($id,array('categoryname'=>$categoryname,'categorydesc'=>$categorydesc,'parentcategoryid'=>$parentcategoryid,'isactive'=>$isactive,'isfeatured'=>$isfeatured,'priority'=>$priority));
    }
}

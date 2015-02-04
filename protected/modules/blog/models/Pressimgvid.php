<?php

/**
* This is the model class for table "pressimgvid".
*
* The followings are the available columns in table 'pressimgvid':
* @property integer $id
* @property integer $pr_id
* @property string $pr_con_type
* @property string $pr_subcon_type
* @property string $pr_cont
*/
class Pressimgvid extends CActiveRecord
{
    public $pr_id;
    public $pr_con_type;
    public $pr_subcon_type;
    public $pr_cont;
    /**
    * Returns the static model of the specified AR class.
    * @param string $className active record class name.
    * @return Pressimgvid the static model class
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
        return 'pressimgvid';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('pr_id, pr_con_type, pr_subcon_type, pr_cont', 'required'),
        array('pr_id', 'numerical', 'integerOnly'=>true),
        array('pr_con_type, pr_subcon_type', 'length', 'max'=>255),
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
        array('id, pr_id, pr_con_type, pr_subcon_type, pr_cont', 'safe', 'on'=>'search'),
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
        'pr_id' => 'Pr',
        'pr_con_type' => 'Pr Con Type',
        'pr_subcon_type' => 'Pr Subcon Type',
        'pr_cont' => 'Pr Cont',
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
        $criteria->compare('pr_id',$this->pr_id);
        $criteria->compare('pr_con_type',$this->pr_con_type,true);
        $criteria->compare('pr_subcon_type',$this->pr_subcon_type,true);
        $criteria->compare('pr_cont',$this->pr_cont,true);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    public function insertimgcontect($id,$val)
    { 

        //        $con=new CDbConnection('mysql:host=localhost;dbname=kif','root','');
        //        $con->active=true;
        //        $conn = yii::app()->db;
        //        $sql="insert into pressimgvid(pr_id,pr_con_type,pr_subcon_type,pr_cont) values('".$id."','Image','Null','".$val."')";
        //        $result=$conn->createCommand($sql);
        //        $result=$result->execute();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        //        return $result; 
        $this->id =null;
        $this->isNewRecord =true;

        $this->pr_id = $id;
        $this->pr_con_type= "Image";
        $this->pr_subcon_type = "Null";
        $this->pr_cont = $val;
        $this->save();
    }

    public function insertvidcontect($id,$val,$vid)
    {
        //        $con=new CDbConnection('mysql:host=localhost;dbname=kif','root','');
        //        $con->active=true;
        //        $conn = yii::app()->db;
        //        $sql="insert into pressimgvid(pr_id,pr_con_type,pr_subcon_type,pr_cont) values('".$id."','Video','".$vid."','".$val."')";
        //        $result=$conn->createCommand($sql);
        //        $result=$result->execute();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        //        return $result;
        $this->id =null;
        $this->isNewRecord =true;

        $this->pr_id = $id;
        $this->pr_con_type = "Video";
        $this->pr_subcon_type = $vid;
        $this->pr_cont = $val;
        $this->save();
    }
    public function fetchdata($id)
    {
        $res=$this->findAllByAttributes(array('pr_id'=>$id));
        return $res;  
    }

    public function fetchdetails($id)
    {

        $res=$this->findAllByAttributes(array('pr_id'=>$id));
        return $res;
        //        $con=new CDbConnection('mysql:host=localhost;dbname=kif','root','');
        //        $con->active=true;
        //        $conn = yii::app()->db;
        //        $sql="select * from pressimgvid where pr_id=".$id;
        //        $result=$conn->createCommand($sql);
        //        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        //        return $result; 

    }
    public function delvid($id)
    {
        $this->deleteAllByAttributes(array('pr_cont'=>$id)); 
    }
    public function updatedetails($id,$vid,$you,$val)
    {
        //        echo $id; exit;
        //        $con=new CDbConnection('mysql:host=localhost;dbname=kif','root','');
        //        $con->active=true;
        //        $conn = yii::app()->db;
        //        $sql="insert into pressimgvid(pr_id,pr_con_type,pr_subcon_type,pr_cont) values(".$id.",'".$vid."','".$you."','".$val."')";
        //        $result=$conn->createCommand($sql);
        //        $result=$result->execute();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        //        return $result;


        $this->id =null;
        $this->isNewRecord =true;

        $this->pr_id=$id;
        $this->pr_con_type = $vid;
        $this->pr_subcon_type = $you;
        $this->pr_cont = $val;
        $this->save();  

    }

    public function insertimg($id,$img)
    {
        $this->id =null;
        $this->isNewRecord =true;

        $this->pr_id = $id;
        $this->pr_con_type = "Image";
        $this->pr_subcon_type="Null";
        $this->pr_cont=$img;
        $this->save();

    }

    public function deleteData($id){
        $conn = yii::app()->db;
        $sql="delete from pressimgvid where pr_id=".$id."";
        $result=$conn->createCommand($sql);
        $result=$result->execute();
    }
    public function displayvideo($id)
    {
        $conn = yii::app()->db;
        $sql="select pr_cont,pr_subcon_type from pressimgvid where pr_id =".$id." and pr_con_type = 'Video'" ; 
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;
    }

}
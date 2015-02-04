<?php

/**
* This is the model class for table "user_role_relation".
*
* The followings are the available columns in table 'user_role_relation':
* @property integer $id
* @property integer $user_id
* @property integer $role_id
*/
class UserRoleRelation extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public $description;
    public $fname;
    public function tableName()
    {
        return 'user_role_relation';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('user_id, role_id', 'numerical', 'integerOnly'=>true),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, user_id, role_id', 'safe', 'on'=>'search'),
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
        'role_id' => 'Role',
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
        $criteria->join = 'LEFT JOIN user_role_manager  ON user_role_manager.id = t.role_id'; 
        $criteria->select = 't.id,t.user_id,t.role_id as roleid,user_role_manager.name as role_id';
        $criteria->together = true;

        $criteria->compare('id',$this->id);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('role_id',$this->role_id);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return UserRoleRelation the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function addRole($userid=0,$role1){

       foreach($role1 as $role){
            $this->id =null;
            $this->isNewRecord =true;

            $this->user_id = $userid;
            $this->role_id = $role;

           $r=$this->save();

       }
        return $r;
    }

    function getUserRole($id=0){
        $criteria=new CDbCriteria;

        $criteria->join = 'LEFT JOIN user_role_manager  ON user_role_manager.id = t.role_id'; 
        $criteria->select = 't.id,t.user_id,t.role_id as roleid,user_role_manager.name as role_id,user_role_manager.description as description';
        $criteria->condition = 'user_id ='.$id;
        $criteria->together = true;

        $criteria->compare('id',$this->id);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('t.role_id',$this->role_id);
        $criteria->compare('user_role_manager.description',$this->description);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }
    
    function getrole($id=0){
        $conn = yii::app()->db;
        $sql="SELECT * FROM user_role_relation WHERE user_id = ".$id;
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;
    }
}

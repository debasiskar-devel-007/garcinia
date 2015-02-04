<?php

/**
* This is the model class for table "user_role_manager".
*
* The followings are the available columns in table 'user_role_manager':
* @property integer $id
* @property string $name
* @property string $description
* @property integer $is_active
*/
class UserRoleManager extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'user_role_manager';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('name, description', 'required'),
        array('is_active', 'numerical', 'integerOnly'=>true),
        array('name', 'length', 'max'=>255),
        array('description', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, name, description, is_active', 'safe', 'on'=>'search'),
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
        'name' => 'Role Name',
        'description' => 'Description',
        'is_active' => 'Status',
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

        $criteria->compare('id',$this->id);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('is_active',$this->is_active);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        'pagination' => array(
        'pageSize' => 3,
        ),
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return UserRoleManager the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    //This is for insert in table.
    public function saveproduct()
    {
        $this->name = $_POST['UserRoleManager']['name'];
        $this->description = Common_helper::get_safe($_POST['UserRoleManager']['description']);
        $this->is_active = $_POST['UserRoleManager']['is_active'];

        $this->save();
    }

    //This is for toggle action
    public function updatestatus($id)
    {
        $i=$id;
        $tablename=$this->tableName();
        $pk='id';
        $attribute='is_active';
        $command=  yii::app()->db->createCommand('call common2("'.$tablename.'","'.$attribute.'","'.$pk.'",'.$id.')');
        $command->execute();
    }

    //This is for update database table in inline 
    public function updatetable($post)
    {
        $this->updateByPk($post['pk'],array($post['name']=>$post['value']));
    }

    //This is for get value by ID
    public function fetchdetail($id)
    {
        $res=$this->findByPk($id);
        return $res;

    }

    //This is update role
    public function updatedetails($id)
    {
        $name = $_POST['UserRoleManager']['name'];
        $description = $_POST['UserRoleManager']['description'];
        $is_active = $_POST['UserRoleManager']['is_active'];

        $this->updateByPk($id,array('name'=>$name,'description'=>$description,'is_active'=>$is_active));
    }




}

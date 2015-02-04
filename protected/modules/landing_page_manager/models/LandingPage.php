<?php

/**
* This is the model class for table "landing_page".
*
* The followings are the available columns in table 'landing_page':
* @property string $id
* @property string $name
* @property string $url
* @property string $description
* @property string $image
*/
class LandingPage extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'landing_page';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('name, url, description, image', 'required'),
        array('id', 'length', 'max'=>255),
        array('name, url', 'length', 'max'=>250),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, name, url, description, image', 'safe', 'on'=>'search'),
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
        'url' => 'Url',
        'description' => 'Description',
        'image' => 'Image',
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
        $criteria->compare('name',$this->name,true);
        $criteria->compare('url',$this->url,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('image',$this->image,true);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return LandingPage the static model class
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
    public function userImagePath($data){
        if(!empty($data)){ 
            $thumb_path=Yii::app()->request->getBaseUrl(true).'/uploads/landing_image/thumb/'.$data;
        }
        else{
            $thumb_path=Yii::app()->request->getBaseUrl(true).'/uploads/landing_image/thumb/2.jpg';  
        }
        return($thumb_path); 
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

    public function fetchdesc($id)
    {
        $res=$this->findAllByPk($id);
        return($res);
    }

    public function fetchdetail($id)
    {
        $res=$this->findByPk($id);
        return $res;

    }
    
                public function updatedetails($id,$arr)
    {
        $res=$this->updateByPk($id,$arr);

    }

    public function checkAccess(){
        $sess = Yii::app()->session['sess_user'];
        if(in_array(11,$sess['role']))
        return true;
        else
          return false;



    }
}

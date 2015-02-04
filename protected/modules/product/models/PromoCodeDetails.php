<?php

/**
* This is the model class for table "promo_code_details".
*
* The followings are the available columns in table 'promo_code_details':
* @property integer $id
* @property string $code_text
* @property integer $type
* @property string $st_date
* @property string $end_date
* @property integer $isactive
*/
class PromoCodeDetails extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'promo_code_details';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('code_text, st_date, end_date', 'required'),
        array('type, isactive', 'numerical', 'integerOnly'=>true),
        array('dis_value', 'numerical'),
        array('dis_value', 'c_required'),
        array('code_text, st_date, end_date', 'length', 'max'=>255),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, code_text, type, st_date, end_date, isactive', 'safe', 'on'=>'search'),
        );
    }

    public function c_required($attribute){
        if($this->type != 2){
            if(intval($this->$attribute) == 0){
                $this->addError($attribute, $this->getAttributeLabel($attribute).' cannot be blank.');
            }else{
                return true;
            }
        }
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
        'code_text' => 'Code Text',
        'type' => 'Type',
        'st_date' => 'Start Date',
        'end_date' => 'End Date',
        'isactive' => 'Is Active',
        'dis_value' => 'Discount Value',
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
        $criteria->compare('code_text',$this->code_text,true);
        $criteria->compare('type',$this->type);
        $criteria->compare('st_date',$this->st_date,true);
        $criteria->compare('end_date',$this->end_date,true);
        $criteria->compare('isactive',$this->isactive);
        $criteria->compare('dis_value',$this->dis_value);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return PromoCodeDetails the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
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
        $attribute='type';
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
        $code_text = $_POST['PromoCodeDetails']['code_text'];
        $type = $_POST['PromoCodeDetails']['type'];
        $st_date = $_POST['PromoCodeDetails']['st_date'];
        $end_date = $_POST['PromoCodeDetails']['end_date'];
        $isactive = $_POST['PromoCodeDetails']['isactive'];
        $dis_value = $_POST['PromoCodeDetails']['dis_value'];
        if($type == 2)
            $dis_value = 0;
        $this->updateByPk($id,array('code_text'=>$code_text,'type'=>$type,'st_date'=>$st_date,'end_date'=>$end_date,'isactive'=>$isactive,'dis_value'=>$dis_value));
    }
    
    public function checkpromocode($promocode){
        $date = date('Y-m-d');
        
        
        $sql = "SELECT * FROM promo_code_details WHERE code_text='".$promocode."' AND isactive=1 AND '".$date."' BETWEEN st_date and end_date" ;


        $result = yii::app()->db->createCommand($sql)->queryAll();

        return $result;
    }

}

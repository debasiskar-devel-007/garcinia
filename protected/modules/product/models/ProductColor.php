<?php

/**
* This is the model class for table "product_color".
*
* The followings are the available columns in table 'product_color':
* @property integer $id
* @property integer $product_id
* @property string $color_code
*/
class ProductColor extends CActiveRecord
{
    /**
    * Returns the static model of the specified AR class.
    * @param string $className active record class name.
    * @return ProductColor the static model class
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
        return 'product_color';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('product_id', 'numerical', 'integerOnly'=>true),
        array('color_code', 'length', 'max'=>255),
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
        array('id, product_id, color_code', 'safe', 'on'=>'search'),
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
        'product_id' => 'Product',
        'color_code' => 'Color Code',
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
        $criteria->compare('product_id',$this->product_id);
        $criteria->compare('color_code',$this->color_code,true);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    public function savecolor($productid,$color_array){
        foreach($color_array as $row){
            $this->id =null;
            $this->isNewRecord =true;

            $this->product_id = $productid;
            $this->color_code = $row;


            $this->save();
        }
    }

    public function fetchdetail($id=0)
    {
        if($id >0){
            $res=$this->findAll('product_id = '.$id);
        }else{
            $res=$this->findAll();
        }
        return $res;

    }

    public function deletecol($id){
        $this->deleteAll('product_id = '.$id);

    }
    
  
}
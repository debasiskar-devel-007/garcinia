<?php

/**
 * This is the model class for table "shipping_charge".
 *
 * The followings are the available columns in table 'shipping_charge':
 * @property integer $id
 * @property double $shipping_charge
 */
class ShippingCharge extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shipping_charge';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('shipping_charge', 'numerical'),
			array('shipping_charge,shipping_name,shipping_desc,isactive', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('shipping_charge,shipping_name', 'safe', 'on'=>'search'),
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
			'shipping_charge' => 'Shipping Charge',
			'shipping_name' => 'Shipping standard',
			'shipping_desc' => 'Shipping Description',
			'isactive' => 'Status',
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

		//$criteria->compare('id',$this->id);
		$criteria->compare('shipping_charge',$this->shipping_charge,true);
		$criteria->compare('shipping_name',$this->shipping_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ShippingCharge the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function fetchdetail($id)
    {
        $res=$this->findByPk($id);

        if(is_null($res)){
            $this->id=$id;
            $this->shipping_charge=0;
            $this->insert();

            $res=$this->findByPk($id);
        }

        return $res;

    }

    public function updatedetails($id)
    {
        $shipping_charge = $_POST['ShippingCharge']['shipping_charge'];
        $shipping_name = $_POST['ShippingCharge']['shipping_name'];
        $shipping_desc = $_POST['ShippingCharge']['shipping_desc'];
        $isactive = $_POST['ShippingCharge']['isactive'];

        $this->updateByPk($id,array('shipping_charge'=>$shipping_charge,'shipping_name'=>$shipping_name,'shipping_desc'=>$shipping_desc,'isactive'=>$isactive));
    }
    public function updatetable($post)
    {
        $this->updateByPk($post['pk'],array($post['name']=>$post['value']));
    }

    public function fetchdesc($id)
    {
        $res=$this->findAllByPk($id);
        return($res);
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

    public function deletefun($productid)
    {
        $this->deleteByPk($productid);
    }

    public function fetchdetail1($id)
    {
        $res=$this->findByPk($id);
        return $res;

    }




}

<?php

/**
* This is the model class for table "landing_page_details".
*
* The followings are the available columns in table 'landing_page_details':
* @property integer $id
* @property string $fname
* @property string $lname
* @property string $email
* @property string $dob
* @property string $city
* @property string $country
* @property string $state
*/
class LandingPageDetails extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public $radioButtons;
    public $affiliate_fname;
    public $affiliate_lname;
    public $fullname;
    public function tableName()
    {
        return 'landing_page_details';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('fname, lname, email, dob, city, state', 'required'),
        array('radioButtons', 'required','message'=>"Please Agree Terms & Conditions"),
        array('fname, lname, email, dob, city, country, state', 'length', 'max'=>255),
        array('email', 'email','message'=>"The email is not valid"),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, fname, lname, email, dob, city, country, state', 'safe', 'on'=>'search'),
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
        'fname' => 'First Name',
        'lname' => 'Last Name',
        'email' => 'Email',
        'dob' => 'Date Of Birth',
        'city' => 'City',
        'country' => 'Country',
        'state' => 'State',
        'affiliate_code' => 'Affiliate Code',
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
        $criteria->join = 'LEFT JOIN user_manager  ON user_manager.id = t.affiliate_code '; 
        $criteria->select = 't.*,user_manager.fname as affiliate_fname,user_manager.lname as affiliate_lname, CONCAT(t.fname, " ", t.lname) AS fullname';
        $criteria->together = true; 

        $criteria->compare('id',$this->id);
        $criteria->compare('CONCAT(t.fname, " ", t.lname)',$this->fullname,true);
        $criteria->compare('fname',$this->fname,true);
        $criteria->compare('t.lname',$this->lname,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('dob',$this->dob,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('country',$this->country,true);
        $criteria->compare('state',$this->state,true);
        $criteria->compare('affiliate_code',$this->affiliate_code,true);

       return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return LandingPageDetails the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


    public function get_afflist(){
        $user = Yii::app()->db->createCommand()
        ->select('u.id,u.fname,u.lname')
        ->from('landing_page_details l')
        ->join('user_manager u', 'l.affiliate_code=u.id')
        ->queryAll();

        return $user;
    }
}

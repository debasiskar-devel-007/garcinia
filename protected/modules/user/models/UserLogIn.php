<?php

/**
* This is the model class for table "user_manager".
*
* The followings are the available columns in table 'user_manager':
* @property integer $id
* @property string $fname
* @property string $lname
* @property integer $gender
* @property string $email
* @property string $dob
* @property string $phone
* @property string $password
* @property string $password2
* @property integer $role
* @property string $address
* @property string $city
* @property integer $state
* @property integer $country
* @property integer $is_active
* @property double $cpl
* @property double $cpa
* @property double $cpc
*/
class UserLogIn extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'user_manager';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('email,password', 'required'),
        array('email', 'email','message'=>"The email is not valid"),
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
        'fname' => 'Fname',
        'lname' => 'Lname',
        'gender' => 'Gender',
        'email' => 'Email',
        'dob' => 'Dob',
        'phone' => 'Phone',
        'password' => 'Password',
        'password2' => 'Password2',
        'role' => 'Role',
        'address' => 'Address',
        'city' => 'City',
        'state' => 'State',
        'country' => 'Country',
        'is_active' => 'Is Active',
        'cpl' => 'Cpl',
        'cpa' => 'Cpa',
        'cpc' => 'Cpc',
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
        $criteria->compare('fname',$this->fname,true);
        $criteria->compare('lname',$this->lname,true);
        $criteria->compare('gender',$this->gender);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('dob',$this->dob,true);
        $criteria->compare('phone',$this->phone,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('password2',$this->password2,true);
        $criteria->compare('role',$this->role);
        $criteria->compare('address',$this->address,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('state',$this->state);
        $criteria->compare('country',$this->country);
        $criteria->compare('is_active',$this->is_active);
        $criteria->compare('cpl',$this->cpl);
        $criteria->compare('cpa',$this->cpa);
        $criteria->compare('cpc',$this->cpc);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return UserLogIn the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function checkLogin($data){
        $query = Yii::app()->db->createCommand()
        ->select('*')
        ->from('user_manager u')
        ->where('email=:email', array(':email'=>$data['email']))
        ->queryRow();
        
        $user = array();
        if(!empty($query['email'])){
            $query1 = Yii::app()->db->createCommand()
            ->select('id,fname,lname,gender,email,dob,phone,address,city,state,country,is_active,is_email_active,cpl,cpa,cpc')
            ->from('user_manager u')
            ->where('email=:email and password=:password', array(':email'=>$query['email'],':password'=>md5($data['password'])))
            ->queryRow();

            if(!empty($query1['email'])){
                $user['info'] = $query1;
                
                $query2 = Yii::app()->db->createCommand()
                ->select('*')
                ->from('user_role_relation u')
                ->where('user_id=:user_id', array(':user_id'=>$query1['id']))
                ->queryAll();
                
                $user['role'] = $query2;

            }

        }
        return $user;
    }
}

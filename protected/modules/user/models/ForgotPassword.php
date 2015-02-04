<?php

/**
* This is the model class for table "forgot_password".
*
* The followings are the available columns in table 'forgot_password':
* @property integer $id
* @property string $user_email
* @property string $active_code
* @property string $new_password
* @property string $new_conf_password
* @property string $time
* @property integer $already_changed
*/
class ForgotPassword extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'forgot_password';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('user_email', 'required','on'=>'fp'),
        array('active_code', 'required','on'=>'ss'),
        array('user_email', 'email','message'=>"The email is not valid",'on'=>'fp'),
        array('new_password', 'required','on'=>'cp'),
        array('new_password', 'length', 'min'=>6,'on'=>'cp'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('new_conf_password', 'compare', 'compareAttribute'=>'new_password', 'message'=>"Passwords don't match",'on'=>'cp'),
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
        'user_email' => 'User Email',
        'active_code' => 'Active Code',
        'new_password' => 'New Password',
        'new_conf_password' => 'New Conf Password',
        'time' => 'Time',
        'already_changed' => 'Already Changed',
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
        $criteria->compare('user_email',$this->user_email,true);
        $criteria->compare('active_code',$this->active_code,true);
        $criteria->compare('new_password',$this->new_password,true);
        $criteria->compare('new_conf_password',$this->new_conf_password,true);
        $criteria->compare('time',$this->time,true);
        $criteria->compare('already_changed',$this->already_changed);

        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return ForgotPassword the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function checkMail($email=''){
        $query = Yii::app()->db->createCommand()
                ->select('*')
                ->from('user_manager u')
                ->where('email=:email', array(':email'=>$email))
                ->queryRow();
                
        return $query;
    }
    
    public function savecode($data){
        $this->user_email = $data['user_email'];
        $this->active_code = $data['active_code'];
        $this->time = $data['time'];
        
        $this->save();
    }
    public function checkCode($data){
        $query = Yii::app()->db->createCommand()
                ->select('*')
                ->from('forgot_password u')
                ->where('user_email=:user_email and active_code=:active_code and already_changed=:already_changed', array(':user_email'=>$data['user_email'],':active_code'=>$data['active_code'],':already_changed'=>0))
                ->queryRow();
                
        return $query;
    }
    
    public function changePassword($data){
        $sql='update user_manager set password ="'.$data['password'].'" where email="'.$data['email'].'"';
        $sql1='update forgot_password set already_changed =1 where id="'.$data['id'].'"';

        Yii::app()->db->createCommand($sql)->execute();
        Yii::app()->db->createCommand($sql1)->execute();
    }
    
}

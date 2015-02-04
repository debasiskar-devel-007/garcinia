<?php

/**
 * This is the model class for table "blog_comment".
 *
 * The followings are the available columns in table 'blog_comment':
 * @property integer $id
 * @property string $user_id
 * @property string $comment
 * @property string $time
 * @property string $email
 */
class BlogComment extends CActiveRecord
{
    public $comment;
    public $email;
    public $blog_id;
    public $user_id;
    public $time;
    public $i_active;
    public $s_fname;
    public $s_lname;
    public $s_prof_image;
    public $pr_title;
    public $s_gender;
    
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BlogComment the static model class
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
		return 'blog_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment', 'required'),
			array('user_id, email', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, comment, time, email', 'safe', 'on'=>'search'),
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
       
        'user_details'=>array(self::BELONGS_TO, 'Usertable1', 'user_id'),
        'blog_details'=>array(self::BELONGS_TO, 'Blog', 'blog_id'),  
      
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
			'comment' => 'Comment',
			'time' => 'Time',
			'email' => 'Email',
            's_fname'=> 'First Name',
            's_lname'=> 'Last Name',
            'pr_title'=> 'Blog Title',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function searchAll($bl_id=1)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

        
		$criteria=new CDbCriteria;
         $criteria->select = 't.*,s_prof_image as s_prof_image,pr_title as pr_title,s_gender as s_gender';  
        $criteria->with = array('user_details'=>array('select'=>'s_fname,s_lname,s_prof_image,s_gender'),'blog_details'=>array('select'=>'pr_title'));
          //$criteria->condition = 't.i_active=1 AND blog_id=:blog_id';
          

            //$criteria -> params = array('blog_id' =>$bl_id);
        

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    
    
    
    public function search($blog_id="")
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        
         $criteria->select = 't.*,s_prof_image as s_prof_image';  
         $criteria->with = array('user_details'=>array('select'=>'s_fname,s_lname,s_prof_image'));
        
          
            $criteria->condition = 't.blog_id=:blog_id';

            $criteria -> params = array(':blog_id' => $blog_id);
       
 


        $criteria->compare('id',$this->id);
        $criteria->compare('user_id',$this->user_id,true);
        $criteria->compare('comment',$this->comment,true);
        $criteria->compare('time',$this->time,true);
        $criteria->compare('email',$this->email,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    
    
     public function userImagePath($data){
        if(!empty($data)){ 
            $thumb_path=Yii::app()->request->getBaseUrl(true).'/uploads/user_image/thumb/'.$data;
        }
        else{
            $thumb_path=Yii::app()->request->getBaseUrl(true).'/uploads/user_image/default/2.jpg';  
        }
        return($thumb_path); 
    }
    
    
       public function updatestatus($id)
    {
        $command = Yii::app()->db->createCommand('call blogcom('.$id.')');
        $command->execute();        
    }
    
      public function fetchcom($id)
      {
          //$com=BlogComment::model()-> findByAttributes(array('blog_id'=>$this->blog_id));
          
          $sql = 'SELECT *  FROM blog_comment WHERE i_active=1  and blog_id='.$id;
        $d = Yii::app()->db->createCommand($sql)->queryAll();
        
        return $d;
             
          
      }
      
            public function fetchcom1($id)
      {
          //$com=BlogComment::model()-> findByAttributes(array('blog_id'=>$this->blog_id));
          
          $sql = 'SELECT *  FROM blog_comment WHERE i_active=0  and blog_id='.$id;
        $d = Yii::app()->db->createCommand($sql)->queryAll();
       
        
        return $d;
             
          
      }
}

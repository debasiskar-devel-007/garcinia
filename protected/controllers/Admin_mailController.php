<?php

class Admin_mailController extends MyController
{
    
 public $_assetsUrl;
    public function init(){

        $js_arr = array(); //put what js file name that you need to import from admin assets folder
        Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets'), false, -1, YII_DEBUG);
        if(is_array($js_arr)){
        foreach($js_arr as $filename){
            Yii::app()->getClientScript()->registerScriptFile($this->getAssetsUrl().'/js/'.$filename, CClientScript::POS_END);
        }}

        yii::app()->theme='admin';
        return true;
    }
    
    public function actionIndex()
    {

        $model=new Mails();

           if(isset($_GET['Mails']))
        {

            $model->name = $_GET['Mails']['name'];
            $model->email = $_GET['Mails']['email'];
            $model->isactive = $_GET['Mails']['isactive'];
            $model->remarks = $_GET['Mails']['isaremarks'];
                  
        }

        $this->render('index',array('model'=>$model));
        
       
    }
    
    
            public function actionAdd()
        {
            $model=new Mails();
            // if(Yii::app()->user->hasFlash('success')) //echo 8; //exit;

            if(count($_POST)>0)
            {

                $model->attributes=$_POST['Mails'];
                //it's used for validation, here the posted values are transfered into the instance variable 
                //$model->validate() here the validate function is called to validate the data.
                if($model->validate())
                {
                    
                    
                    $res=$model->insertdata();
                    if($res==1)
                    {
                        //the Success message is set if the condition res==1 is true.  
                        Yii::app()->user->setFlash('success', '<strong>Well done!</strong> Your Data is added successfully.');
                        $this->redirect('index');
                    }
                    else
                    {
                        //the Error message is set if the condition res==1 is false. 
                        Yii::app()->user->setFlash('error', 'Error has occured while saving a data:');
                        $this->redirect('index');
                    }
                }
            }
           $this->render('add',array('model'=>$model));
        }
        
    
             public function actionEditableSaver()
    {
        $model=new Mails();
        $model->updatetable($_POST);
    }
    
            public function actionShowans()
        {
        
        $id= $_POST['id'];
        
        $model= new Mails();
        $res= $model->fetchans($id);
        //var_dump($res);
        //exit;
         echo $res[0]['remarks'];
      //echo  json_encode($res);
        
    }
    
             public function actionDelete($id)
        {
    

            $model=new Mails();
            //$res=$model->deletedata($id);
            $model->deletedata($id);


  

        }
        
         public function actionToggle($id)
        {

            $model= new Mails();   
            $model->id=$id;
            $model->updatestatus($model->id);
            $this->createurl('admin/mail/index');   


        
        }

    public function getAssetsUrl()
    {
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager();

        return $this->_assetsUrl;
    }
    
       
        
}
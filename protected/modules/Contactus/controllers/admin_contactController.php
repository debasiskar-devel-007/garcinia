<?php

class Admin_contactController extends MyController
{
    public function init(){
        yii::app()->theme='admin';
        return true;
    }

    public function actionIndex()
    {     

        echo 90;
        exit;
        $model=new Contact();

        if(isset($_GET['Contact']))
        {

            $model->name = $_GET['Contact']['name'];
            $model->email = $_GET['Contact']['email'];
            $model->subject = $_GET['Contact']['subject'];
           // $model->comment = $_GET['Contact']['comment'];
           // $model->con_id = $_GET['Contact']['con_id'];
             $model->message = $_GET['Contact']['message'];

        } 
        $this->render('index',array('model'=>$model));

    }
    public function actionShowcomment()
    {

        
        $id= $_POST['id'];

        $model= new Contact();
        $res= $model->fetchcomment($id);
        //var_dump($res);
        //exit;
        echo $res[0]['message'];
        //echo  json_encode($res);

    }

     public function actionContactmail()
    {
     $model = new Adminmail();

      
        if(count($_POST)>0)
        {
               $model->attributes = $_POST['Adminmail'];
            //var_dump($_POST);
            if($model->validate())
            { 
                 

            
               
             $res = $model->updatedata();
                 $this->redirect(Yii::app()->request->getBaseUrl(true)."/Contactus/contactbackend/contactmail");
     
            }
        }

        $res=$model->fetch();
        $model->email=$res[0]['email'];
     $this->render('adminmail',array('model'=>$model));
        
    }
    
    public function actionEditcontent($id)
    {
        
        echo $id;
        exit;
        
    }


}
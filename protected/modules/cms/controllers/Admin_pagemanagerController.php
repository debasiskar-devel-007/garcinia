<?php

class Admin_pagemanagerController extends MyController
{

    public  function init()
    {

        $this->pageTitle= "Page Manager";
        yii::app()->theme="admin"; 
        return true; 

    }
    public function actionIndex()
    {
        $this->createUrl('/cms/admin/pagemanager/listing');
    }

    public function actionAdd()
    {


        $mod= new Page();

        if(count($_POST))
        {
            $mod->attributes=$_POST['Page'];
            if($mod->validate())
            {


                $r = $mod->savedata();
                if($r>0)
                {
                    //echo $r;
                    $this->createUrl('/admin/pagemanager/listing');  

                }


            } 

        }
        $this->render('add',array('model'=>$mod));



    }

    public function actionListing()
    {

        $mod= new Page('search');
        if(isset($_GET['Page']))
        {
            $mod->page_name=$_GET['Page']['page_name'];
            $mod->page_desc=$_GET['Page']['page_desc'];
            //$mod->page_status=$_GET['Page']['page_status'];

        } 

        $this->render('index',array('model'=>$mod));
    }

    public function actionDelete()
    {

        $id=$_REQUEST['id'];
        $r= Page::model()->deleteByPk($id);
        if($r>0)
            $this->createUrl('/admin/pagemanager/listing');

        else

            echo "ERROR OCCURED";
    }

    public function actionToggle($id)
    {
        $model= new Page();
        $model->updatestatus($id);
        echo $id;
    }


    public function actionDeleteall()
    {
        $model = new Page();
        $x=explode(",",$_POST['ids']);
        foreach($x as $val)
        {
            $model->deletefun($val);


        }
        Yii::app()->user->setFlash('success', 'Your Data Is Deleted Successfully:');
    }
    
        public function actionBulkupdate(){
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new Page();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updatedata($data);
        }

        echo 1;
    }
    
            public function actionUpdatedata($id)
    {

        $model = new Page();
       


        $res = $model->fetchupdatedetails($id);

       

        if(count($_POST)>0)
        {



            $arr['page_name']= $_POST['Page']['page_name'];
            $arr['page_desc'] = $_POST['Page']['page_desc'];
            $arr['page_status'] = $_POST['Page']['page_status'];
           






            $model->updatedetails($id,$arr);

           
           

            $this->redirect(Yii::app()->request->baseUrl."/cms/admin/pagemanager/listing"); 

        }
        $this->render('edit',array('model'=>$res)); 
    }
    
            public function actionEditableSaver()
    {
        $model = new Page();
        $model->updatedata($_POST);
    }  

    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
    // return the filter configuration for this controller, e.g.:
    return array(
    'inlineFilterName',
    array(
    'class'=>'path.to.FilterClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }

    public function actions()
    {
    // return external action classes, e.g.:
    return array(
    'action1'=>'path.to.ActionClass',
    'action2'=>array(
    'class'=>'path.to.AnotherActionClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }
    */
}
<?php

class Admin_roleController extends MyController
{
    public function init(){
        Yii::app()->theme = 'admin';
    }
    public function actionIndex()
    {
        $this->redirect(Yii::app()->BaseUrl.'/user/admin/role/listing');
    }

    //This is listing function
    public function actionListing(){
        $model = new UserRoleManager('search');
        if(isset($_GET['UserRoleManager']))
        {
            $model->name = $_GET['UserRoleManager']['name'];   
            $model->description = $_GET['UserRoleManager']['description'];   
        }


        $this->render('index',array('model'=>$model));
    }

    //This is add function
    public function actionAdd(){
        $model = new UserRoleManager();

        if(count($_POST)>0)
        {   

            $model->attributes=$_POST['UserRoleManager'];   
            if($model->validate())
            {
                $model->saveproduct();
                $this->redirect(Yii::app()->request->baseUrl."/user/admin/role");
            }
        }
        $this->render('add',array('model'=>$model));
    }

    //This is delete function
    public function actionDel(){
        $id = $_REQUEST['id'];
        $model = new UserRoleManager();

        $res = $model->deleteByPk($id);
        $this->redirect(Yii::app()->request->baseUrl."/user/admin/role"); 
    }

    //This is bulk delete
    public function actionDeleteall()
    {
        $model = new UserRoleManager();
        $x=explode(",",$_POST['ids']);
        foreach($x as $val)
        {
            $model->deleteByPk($val); 
        }
        Yii::app()->user->setFlash('success', 'Your Data Is Deleted Successfully:');
    }

    //This is bulk status update
    public function actionBulkupdate(){
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new UserRoleManager();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updatetable($data);
        }

        echo 1;
    }


    //This is for Toggle action
    public function actionToggle($id)
    {
        $model = new UserRoleManager();
        $model->updatestatus($id);
        echo $id;

    }

    //This is for edit field
    public function actionEditableSaver()
    {
        $model = new UserRoleManager();
        $model->updatetable($_POST);
    }

    // This is for update
    public function actionUpdate($id)
    {
        $model = new UserRoleManager();
        $result = $model->fetchdetail($id);


        if(count($_POST)>0)
        {
            $result->attributes=$_POST['UserRoleManager'];   
            if($result->validate())
            {
                $model->updatedetails($id);
                $this->redirect(Yii::app()->request->baseUrl."/user/admin/role"); 
            }
        }
        $this->render('edit',array('model'=>$result));
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
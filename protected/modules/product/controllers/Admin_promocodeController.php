<?php

class Admin_promocodeController extends MyController
{

    public function init()
    {
        $this->pageTitle= "Promo Code Manager";//set page title here
        yii::app()->theme='admin';//set theme for this controller
        return true; 
    }

    public function actionIndex()
    {

        $this->redirect(Yii::app()->request->baseUrl."/product/admin/promocode/listing");

    }
//this is used for add a category
    public function actionAdd()
    {

        $model = new PromoCodeDetails();
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

        if(count($_POST)>0)
        {   
            $randomString = $_POST['PromoCodeDetails']['code_text'];
            $model->attributes=$_POST['PromoCodeDetails']; 
            //var_dump($res); exit;
            if($model->validate())
            {
                if($model->type == 2){
                    $model->dis_value = 0;
                }
                $model->save();
                $this->redirect(Yii::app()->request->baseUrl."/product/admin/promocode");
            }
        }
        $this->render('add',array('model'=>$model,'randomString'=>$randomString));
    }
//this is for showing the listing of promocode
    public function actionListing()
    {




        $model = new PromoCodeDetails('search');
        if(isset($_GET['PromoCodeDetails']))
        {
            $model->code_text = $_GET['PromoCodeDetails']['code_text'];   
            $model->st_date = $_GET['PromoCodeDetails']['st_date'];   
            $model->end_date = $_GET['PromoCodeDetails']['end_date'];   
            $model->dis_value = $_GET['PromoCodeDetails']['dis_value'];   
            $model->type = $_GET['PromoCodeDetails']['type'];
        }

        $this->render('index',array('model'=>$model));

    }
   
    //to delete any particular row from listing
    public function actionDeletedata()
    {
        $id = $_REQUEST['id'];
        $model = new PromoCodeDetails();

        $res = $model->deleteByPk($id);
        $this->redirect(Yii::app()->request->baseUrl."/product/admin/promocode/listing"); 

    }
    //bulk delete
    public function actionDeleteall()
    {
        $model = new PromoCodeDetails();
        $x=explode(",",$_POST['ids']);
        foreach($x as $val)
        {
            $model->deleteByPk($val); 
        }
        Yii::app()->user->setFlash('success', 'Your Data Is Deleted Successfully:');
    }
//this is for inline edit
    public function actionEditableSaver()
    {
        $model = new PromoCodeDetails();
        $model->updatetable($_POST);
    }
//this is for update status
    public function actionToggle($id)
    {
        $model = new PromoCodeDetails();
        $model->updatestatus($id);
        echo $id;

    }
//this is for update feature
    public function actionToggle1($id)
    {
        $model = new PromoCodeDetails();
        $model->updatestatus1($id);

    }
//this is for edit a page    
    public function actionUpdatedata($id)
    {
        $model = new PromoCodeDetails();
        $result = $model->fetchdetail($id);

        if(count($_POST)>0)
        {
            $randomString = $_POST['PromoCodeDetails']['code_text'];
            $result->attributes=$_POST['PromoCodeDetails']; 
            if($result->validate())//we need to validate result here as all the values are stored in the result now
            {
                $model->updatedetails($id);
                $this->redirect(Yii::app()->request->baseUrl."/product/admin/promocode/listing");
            }
        }

        $this->render('edit',array('model'=>$result));
    }

    
        //This is bulk status update
    public function actionBulkupdate(){
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new PromoCodeDetails();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updatetable($data);
        }

        echo 1;
    }

    public function actionrefcode(){
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
        echo $randomString;
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
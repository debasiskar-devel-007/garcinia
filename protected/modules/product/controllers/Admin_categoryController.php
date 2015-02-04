<?php

class Admin_categoryController extends MyController
{

    public function init()
    {
        $this->pageTitle= "Category Manager";//set page title here
        yii::app()->theme='admin';//set theme for this controller
        return true; 
    }

    public function actionIndex()
    {

        $this->redirect(Yii::app()->request->baseUrl."/product/admin/category/listing");

    }
//this is used for add a category
    public function actionAdd()
    {

        $this->pageTitle = "ADD CATEGORY:".$this->pageTitle;
        $model = new Category();

        $res = $model->fetchdata();

        $arr['0'] = 'Select Parent Catagory';
        foreach($res as $r)
        {

            $arr[$r['id']]= $r['categoryname']; 
        }
        if(count($_POST)>0)
        {   
            $model->attributes=$_POST['Category']; 
            //var_dump($res); exit;
            if($model->validate())
            {
                $model->savecategory();
                $this->redirect(Yii::app()->request->baseUrl."/product/admin/category/index");
            }
        }
        $this->render('add',array('model'=>$model,'res'=>$arr));
    }
//this is for showing the listing of category
    public function actionListing()
    {




        $model = new Category('search');
        if(isset($_GET['Category']))
        {
            $model->categoryname = $_GET['Category']['categoryname'];   

            $model->parentcategoryid = $_GET['Category']['parentcategoryid'];   
            $model->priority = $_GET['Category']['priority'];   
        }

        $this->render('index',array('model'=>$model));

    }
    //to show the description 
    public function actionShowcontent()
    {
        $id = $_POST['id']; 

        $model = new Category();
        $res = $model->fetchdesc($id);

        echo $res[0]->categorydesc;  
    }
    //to delete any particular row from listing
    public function actionDeletedata()
    {
        $id = $_REQUEST['id'];
        $model = new Category();

        $res = Category::model()->deleteByPk($id);
        $this->redirect(Yii::app()->request->baseUrl."/product/admin/category/listing"); 

    }
    //bulk delete
    public function actionDeleteall()
    {
        $model = new Category();
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
        $model = new Category();
        $model->updatetable($_POST);
    }
//this is for update status
    public function actionToggle($id)
    {
        $model = new Category();
        $model->updatestatus($id);
        echo $id;

    }
//this is for update feature
    public function actionToggle1($id)
    {
        $model = new Category();
        $model->updatestatus1($id);

    }
//this is for edit a page    
    public function actionUpdatedata($id)
    {
        $model = new Category();
        $result = $model->fetchdetail($id);

        $res = $model->fetchdata();
        $arr['0'] = 'Select Parent Catagory';
        foreach($res as $r)
        {

            $arr[$r['id']]= $r['categoryname']; 
        }

        if(count($_POST)>0)
        {
            $result->attributes=$_POST['Category']; 
            if($result->validate())//we need to validate result here as all the values are stored in the result now
            {
                $model->updatedetails($id);
                $this->redirect(Yii::app()->request->baseUrl."/product/admin/category/listing");
            }
        }

        $this->render('edit',array('model'=>$result,'res'=>$arr));
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
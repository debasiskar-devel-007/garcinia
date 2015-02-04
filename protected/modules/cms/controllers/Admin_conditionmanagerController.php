<?php

class Admin_conditionmanagerController extends MyController
{

    public function init()
    {
        yii::app()->theme='admin';
        $this->pageTitle="Content Manager";
        return true;  

    }
    public function actionIndex()
    {
        $this->redirect(Yii::app()->request->baseUrl."/cms/admin/contentmanager/listing"); 
    }

    public function actionAdd()
    {

        $model=new Content();
        if(count($_POST))
        {

            $model->attributes =$_POST['Content'];
            if($model->validate())
            {

                $r=$model->savedata();
                if($r>0)
                    $this->redirect(Yii::app()->request->baseUrl."/cms/admin/contentmanager/listing");

            } 

        }
        $this->render('add',array('model'=>$model));

    }

    public function actionListing()
    {

        $mod= new Content('search');
        if(isset($_GET['Content']))
        {
            $mod->content_type=$_GET['Content']['content_type'];
            $mod->content_desc=$_GET['Content']['content_desc'];
            //$mod->page_status=$_GET['Page']['page_status'];

        } 

        $this->render('index',array('model'=>$mod));
    }

    public function actionToggle($id)
    {
        $model= new Content();
        $model->updatestatus($id);
        echo $id;
    }

    public function actionBulkupdate()
    {
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new Content();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updatedata($data);
        }

        echo 1;
    }

    public function actionDelete()
    {
        $id=$_REQUEST['id'];
        $r=Content::model()->deleteByPk($id); 

    }
    public function actiondeleteall()
    {

        $model = new Content();
        $x=explode(',',$_POST['ids']);
        foreach($x as $val)
        {
            $model->deletefun($val);  

        }  

    }

    public function actionUpdatedata($id)
    {

        $model = new Content();



        $res = $model->fetchupdatedetails($id);



        if(count($_POST)>0)
        {



            $arr['content_type']= $_POST['Content']['content_type'];
            $arr['content_desc'] = $_POST['Content']['content_desc'];
            $arr['content_status'] = $_POST['Content']['content_status'];







            $model->updatedetails($id,$arr);




            $this->redirect(Yii::app()->request->baseUrl."/cms/admin/contentmanager/listing"); 

        }
        $this->render('edit',array('model'=>$res)); 
    }
    public function actionEditableSaver()
    {
        $model = new Content();
        $model->updatedata($_POST);
    }

    public function actionTest()
    {
        echo "testing";
        exit;

    }

    public function actionCondition()
    {
        $model = new ConditionPolicy();


        if(count($_POST)>0)
        {
            $model->attributes = $_POST['ConditionPolicy'];
            //var_dump($_POST);
            if($model->validate())
            { 




                $res = $model->updatedata();
                $this->redirect(Yii::app()->request->getBaseUrl(true)."/cms/admin/contentmanager");

            }
        }

        $res=$model->fetch();
        $model->terms=$res[0]['terms'];
        
        $model->policy=$res[0]['policy'];
        $this->render('condition-policy',array('model'=>$model));

    }

    public function actionBringcondition()
    {
        $r=$_POST['id'];
        $model= new ConditionPolicy();
            $res=$model->fetchcon($r);

        echo $res;
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
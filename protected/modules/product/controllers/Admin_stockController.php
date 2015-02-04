<?php

class Admin_stockController extends MyController
{
    public function init(){
        Yii::app()->theme = 'admin';
    }
    public function actionIndex()
    {
        $this->redirect(Yii::app()->BaseUrl.'/product/admin/stock/listing');
    }
    
    //This is listing function
    public function actionListing(){
        $model = new ProductStock('search');
        if(isset($_GET['ProductStock']))
        {
            $model->product = $_GET['ProductStock']['product'];   
          
        }


        $this->render('index',array('model'=>$model));
    }
   
    //This is add function
    public function actionAdd($id=0){
        $model = new ProductStock();

        if(count($_POST)>0)
        {   

            $model->attributes=$_POST['ProductStock'];   
            if($model->validate())
            {
                $proid =  $model->product_id;
                $res = $model->availstock($proid);

                $available_stock = $res[0]['avail_stock'];

                $model->time = time();
                $model->type = 1;
                
                $model->save();

                if($available_stock == 0){
                    $nmodel = new NotifyList();
                    $mailL = $nmodel->getnotifymail($proid);

                    if(count($mailL) > 0){
                        /*        this is for sending emails */
                        $mail = new YiiMailMessage();

                        $content= 'We are glad to inform you that the product <strong>'.@$mailL[0]['productname'].'</strong> you were looking for is back in stock, <a href="'.Yii::app()->getBaseUrl(true).'/product/default/details/id/'.@$mailL[0]['product_id'].'/name/'.preg_replace("![^a-z0-9]+!i", "-",strtolower(@$mailL[0]['productname'])).'/catagoryid/'.@$mailL[0]['catagoryid'].'">click here</a> to buy the product';

                        foreach($mailL as $list){
                            $mail->addTo(@$list['email']);
                        }

                        $mail->from = ('info@azcowtown.com');
                        $mail->setSubject($mailL[0]['productname'].' - Available Now');
                        $mail->setBody($content, 'text/html');

                        Yii::app()->mail->send($mail);

                        $nmodel->updatenotify($proid);
                    }

                }

                $this->redirect(Yii::app()->request->baseUrl."/product/admin/stock");
            }
        }
        
        $result = $model->fetchprolist();
        
        $productlist[""] = "Select Product";
        foreach($result as $row){
            $productlist[$row['productid']] = $row['productname'];
        }
        
        $this->render('add',array('model'=>$model,'id'=>$id,'productlist'=>$productlist));
    }

    /*
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
*/

    //This is listing function
    public function actiondetails($id=0){
        $model = new ProductStock('search');
        if(isset($_GET['ProductStock']))
        {
            $model->product = $_GET['ProductStock']['product'];   
          
        }


        $this->render('details',array('model'=>$model,'id'=>$id));
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
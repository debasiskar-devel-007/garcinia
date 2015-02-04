<?php

class Admin_shipController extends MyController
{


    public function init()
    {
        $this->pageTitle="Shipping Manager";//assign title of every page in this controller
        yii::app()->theme="admin";//assign theme to this controller



    }

    public function actionGetAssetsUrl(){
        //Yii::app()->getModule('ProductModule')->getAssetsUrl();
        $res = $this->module->getAssetsUrl();
        echo $res;
    }

    public function actionIndex()
    {
        $this->redirect(yii::app()->baseurl."/product/admin/ship/listing");
    }

    //for adding product
    public function actionAdd()

    {
       $model = new ShippingCharge();
        if(count($_POST))
        {




            $model->attributes=$_POST['ShippingCharge'];
            if($model->validate())
            {
                //var_dump($_POST);
                $r=$model->save();


                $this->redirect(yii::app()->baseurl."/product/admin/ship/listing");//redirect to the listing
            } 

        }
        $this->render('add',array('model'=>$model));//if nothing is posted then redirected to the add page


    }

    public function actionListing()
    {
        $model= new ShippingCharge('search');
        if(isset($_GET['ShippingCharge']))//this is use for searching in the listing page
        {
            $model->shipping_charge=$_GET['ShippingCharge']['shipping_charge'];
            $model->shipping_name=$_GET['ShippingCharge']['shipping_name'];
            //$model->isactive=$_GET['ShippingCharge']['isactive'];


        }


        $this->render('index',array('model'=>$model));//redirect to the listing page

    }
    //for inline edit
    public function actionEditableSaver()
    {
        $model = new ShippingCharge();
        $model->updatetable($_POST);
    }
    //this function used for fetch product description
    public function actionShowcontent()
    {
        $id = $_POST['id']; 
        $model = new ShippingCharge();
        $res = $model->fetchdesc($id);
        //var_dump($res);
        //exit;
        echo $res[0]->shipping_desc;
    }



    //toggle action for change sattus

    public function actionToggle($id)
    {
        $model= new ShippingCharge();
        $model->updatestatus($id);
        echo $id;
    }
    //for bulk action
    public function actionBulkupdate(){
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new ShippingCharge();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updatetable($data);
        }

        echo 1;
    }
    //single delete
    public function actionDeletedata()
    {
        $id = $_REQUEST['id'];
        $model = new ShippingCharge();

        $res = ShippingCharge::model()->deleteByPk($id);
        $this->redirect(Yii::app()->request->baseUrl."/product/admin/ship/listing");

    }
    //bulk delete
    public function actionDeleteall()
    {
        $model = new ShippingCharge();
        $x=explode(",",$_POST['ids']);
        foreach($x as $val)
        {
            $model->deletefun($val); 
        }
        Yii::app()->user->setFlash('success', 'Your Data Is Deleted Successfully:');
    }
    //this is for edit page    
    public function actionUpdatedata($id)
    {
        $model = new ShippingCharge();

        $result = $model->fetchdetail1($id);




        if(count($_POST)>0)
        {


            //$model->deletefun($id);
            $result->attributes=$_POST['ShippingCharge'];
            if($result->validate())//validate $result not model as because all the data are stored in result now
            {
                $model->updatedetails($id);


                $this->redirect(Yii::app()->request->baseUrl."/product/admin/ship/listing");
            }
        }
        //var_dump($res); exit;
        $this->render('edit',array('model'=>$result));
    }

    public static function Rest1()
    {
        $res=1;
        return $res; 

    }

    public function actionUploadify_process()
    {

        // Define a destination
        $targetFolder = '/uploads/product_image/'; // Relative to the root
        ini_set('post_max_size', '640M'); 
        ini_set('upload_max_filesize', '640M');
        ini_set('memeory_limit', '5000M');

        if (!empty($_FILES)){

            $tempFile = $_FILES['Filedata']['tmp_name']; 

            $targetPath =   Yii::getPathOfAlias('webroot').$targetFolder;     
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            $file_name=time().'.'.$fileParts['extension'];

            $targetFile = rtrim($targetPath,'/') . '/' . $file_name;

            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions

            if (in_array($fileParts['extension'],$fileTypes)) {

                move_uploaded_file($tempFile,$targetFile);
                echo  $file_name;
            }
            else{
                echo '123';    
            }


        }
    }


    public function actionUploadify_process1()
    {
        $original = $_FILES['Filedata']['name'];          
        // Define a destination
        $targetFolder = '/uploads/files/'; // Relative to the root
        ini_set('post_max_size', '640M'); 
        ini_set('upload_max_filesize', '640M');
        ini_set('memeory_limit', '5000M');

        if (!empty($_FILES)){

            $tempFile = $_FILES['Filedata']['tmp_name']; 

            $targetPath =   Yii::getPathOfAlias('webroot').$targetFolder;     
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            $file_name=time().'.'.$fileParts['extension'];

            $targetFile = rtrim($targetPath,'/') . '/' . $file_name;

            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png','pdf','doc','docx','txt','rtf');

            if (in_array($fileParts['extension'],$fileTypes)) {

                move_uploaded_file($tempFile,$targetFile);
                //echo  $file_name;
                $arr['original']=$original;
                $arr['alias']=$file_name;
                echo json_encode($arr);
            }
            else{
                echo '123';    
            }


        }
    }

    public function actionResizeimage(){

        $file_name=$_POST['filename'];
        $eheight=$_POST['height'];
        $ewidth=$eheight;
        $foldername = $_POST['foldername'];

        $handle = new upload(Yii::getPathOfAlias('webroot')."/uploads/product_image/".$file_name);

        $handle->image_resize = true;
        $handle->image_ratio_x =true;
        $handle->image_ratio_y =true;  

        $handle->jpeg_quality = 100;

        $width=$handle->image_src_x;
        $height=$handle->image_src_y;

        $orig_asc=$width/$height;

        if($width>800){
            $w=800;
            $h=800*(1/$orig_asc);
            $handle->image_x = $w;
            $handle->image_y = $h;

            $handle->file_overwrite=true;
            $handle->process(Yii::getPathOfAlias('webroot')."/uploads/product_image/");       

            if($handle->processed){
                echo 'image resized';
            }
            else{
                echo 'error : ' . $handle->error;

            }

        }
        if($width>$ewidth || $height>$eheight)
        {
            $left=intval(($width-$ewidth)/2);
            $top=intval(($height-$eheight)/2);
        }
        else

        {
            $left=0;
            $top=0;
            $eheight=$height;
            $ewidth=$width;
        }
        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/product_image/".$file_name);
        $thumb->crop($left,$top,$ewidth,$eheight);
        //if($eheight > $eheight)
        // $thumb->resize($width,$height);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/product_image/".$foldername."/".$file_name);
    }

    public function actionResize_cropImage()
    {
        $image=$_POST['image'];
        $x2=$_POST{'x2'};
        $y2=$_POST['y2'];
        $x1=$_POST['x1'];
        $y1=$_POST['y1'];
        $w=$_POST['w'];
        $h=$_POST['h'];

        $height = $_POST['height'];
        $width = $height;
        $foldername = $_POST['foldername'];


        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/product_image/".$image);
        $thumb->crop($x1,$y1,$w,$h);
        if($h > $height)
            $thumb->resize($width,$height);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/product_image/".$foldername."/".$image);

        $imgarr = pathinfo($image);
        $ext = $imgarr['extension'];
        $temp_image = time().".".$ext;
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/product_image/temp/".$temp_image);

        echo $temp_image;



    }

    function actionDelimage(){

        $image = $_POST['image'];

        if(!isset($_POST['path'])){
            @unlink('./uploads/product_image/'.$image);
            @unlink('./uploads/product_image/zoom/'.$image);
            @unlink('./uploads/product_image/thumb/'.$image);
        }else{

            $path = $_POST['path'];
            echo $path.$image;
            @unlink($_POST['path'].$image);
        }
    }


    //Render Partial Image List
    function actionGetImage($id){
        $model = new Product();

        $result = $model->fetchdetail($id);


        $this->renderPartial('imagelist', array(
        'id' => $id,
        'name' => @$result['productname']
        ));
    }

    public function actionsetshipcharge(){
        $model = new ShippingCharge();

        if(count($_POST)>0)
        {
            $model->updatedetails(1);
        }
        $result = $model->fetchdetail(1);

        $this->render('set_ship_charge',array('model'=>$result));
    }

    public function actionprosfee(){
        $model = new ShippingCharge();

        if(count($_POST)>0)
        {
            $model->updatedetails(2);
        }
        $result = $model->fetchdetail(2);

        $this->render('set_pro_fee',array('model'=>$result));
    }

    public function actionShowfile()
    {
        $id = $_POST['id'];

        $model = new Product();
        $res = $model->files($id);

        echo $res[0]->file_name;
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

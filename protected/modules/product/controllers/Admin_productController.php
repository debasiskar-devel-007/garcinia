<?php

class Admin_productController extends MyController
{


    public function init()
    {
        $this->pageTitle="Product Manager";//assign title of every page in this controller
        yii::app()->theme="admin";//assign theme to this controller



    }

    public function actionGetAssetsUrl(){
        //Yii::app()->getModule('ProductModule')->getAssetsUrl();
        $res = $this->module->getAssetsUrl();
        echo $res;
    }

    public function actionIndex()
    {
        $this->redirect(yii::app()->baseurl."/product/admin/product/listing");
    }

    //for adding product
    public function actionAdd()

    {
        $model = new Product();
        $model_image =new ProductImage();
        $model_stock = new ProductStock();

        $res = $model->fetchdata(1);//fetching all category id and name 
        $arr[0]='Select A Category';
        foreach($res as $r)
        {

            $arr[$r['id']]= $r['categoryname'];//assign categoryname in place of category id 
        }
        if(count($_POST))
        {
            $image = @$_POST['Product']['image'];

            $model->attributes=$_POST['Product']; 
            if($model->validate())
            {


                $pro_id = $model->saveproduct();//going to model to save the added product
                $model_image->imageSave($pro_id,$image);

                $model_stock->addPro($pro_id);

         /*       if($_POST['Product']['is_color']){
                    $color= $_POST['color'];
                    if(count($color) > 0){
                        $colormodel = new ProductColor();
                        $colormodel->savecolor($pro_id,$color);
                    }
                }*/

      /*          if($_POST['Product']['is_size']){
                    $size_array['size']= $_POST['size'];
                    $size_array['price']= $_POST['size_price'];
                    if(count($size_array['size']) > 0){
                        $sizemodel = new ProductSize();
                        $sizemodel->savecolor($pro_id,$size_array);
                    }
                }*/
                $this->redirect(yii::app()->baseurl."/product/admin/product/listing");//redirect to the listing
            } 

        }
        $this->render('add',array('model'=>$model,'res'=>$arr));//if nothing is posted then redirected to the add page


    }

    public function actionListing()
    {
        $model= new Product('search');
        if(isset($_GET['Product']))//this is use for searching in the listing page 
        {
            $model->productname=$_GET['Product']['productname'];
            $model->catagoryid=$_GET['Product']['catagoryid'];
            $model->productprice=$_GET['Product']['productprice'];
            $model->priority=$_GET['Product']['priority'];
            $model->sqnumber=$_GET['Product']['sqnumber'];
            $model->product_type=$_GET['Product']['product_type'];
            //$model->isactive=$_GET['Product']['isactive'];

        }

        $arr = $model->fetchcat();

        //echo "<pre>";
        //var_dump($arr);
        //exit;
        if($arr!=NULL)
        {
            foreach($arr as $key=>$val)
            {
                $arr1[""]= "Select Category";
                $arr1[$val['id']]= $val['categoryname'];
            }
        }
        else
        {
            $arr1['NA'] = "NA";
        }
        $this->render('index',array('model'=>$model,'res'=>$arr1));//redirect to the listing page

    }
    //for inline edit
    public function actionEditableSaver()
    {
        $model = new Product();
        $model->updatetable($_POST);
    }
    //this function used for fetch product description
    public function actionShowcontent()
    {
        $id = $_POST['id']; 
        $model = new Product();
        $res = $model->fetchdesc($id);
        //var_dump($res); 
        echo $res[0]->productdesc;  
    }


    public function actionShowcontent1()
    {
        $id = $_POST['id']; 
        $model = new Product();
        $res = $model->fetchdesc($id);
        //var_dump($res); 
        echo $res[0]->product_info;  
    }

    public function actionShowcontent2()
    {
        $id = $_POST['id']; 
        $model = new Product();
        $res = $model->fetchdesc($id);
        //var_dump($res); 
        echo $res[0]->product_guarantee;  
    }

    public function actionShowcontent3()
    {
        $id = $_POST['id']; 
        $model = new Product();
        $res = $model->fetchdesc($id);
        //var_dump($res); 
        echo $res[0]->product_features;  
    }

    public function actionShowcontent4()
    {
        $id = $_POST['id']; 
        $model = new Product();
        $res = $model->fetchdesc($id);
        //var_dump($res); 
        echo $res[0]->brand_info;  
    }

    public function actionShowcontent5()
    {
        $id = $_POST['id']; 
        $model = new Product();
        $res = $model->fetchdesc($id);
        //var_dump($res); 
        echo $res[0]->product_info;  
    }

    //toggle action for change sattus

    public function actionToggle($id)
    {
        $model= new Product();
        $model->updatestatus($id);
        echo $id;
    }
    //for bulk action
    public function actionBulkupdate(){
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new Product();

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
        $model = new Product();

        $res = Product::model()->deleteByPk($id);
        $this->redirect(Yii::app()->request->baseUrl."/product/admin/product/listing"); 

    }
    //bulk delete
    public function actionDeleteall()
    {
        $model = new Product();
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
        $model = new Product();
        $model_image = new ProductImage();

        $result = $model->fetchdetail($id);
        $res = $model->fetchdata();
        $arr['0'] = 'Select A Catagory';
        foreach($res as $r)
        {

            $arr[$r['id']]= $r['categoryname']; 
        }

        $prev_image1 = $model_image->fecthImage($id);
        $prev_image = array();
        foreach($prev_image1 as $row){
            $prev_image[] = $row['image_name'];
        }

        /*$colormodel = new ProductColor();
        $color_res = $colormodel->fetchdetail($id);
        $prev_color = array();
        foreach($color_res as $row){
            $prev_color[] = $row['color_code'];
        }

        $sizemodel = new ProductSize();
        $size_res = $sizemodel->fetchdetail($id);
        $prev_size = array();
        $i=0;
        foreach($size_res as $row){
            $prev_size[$i]['size'] = $row['size'];
            $prev_size[$i]['price'] = $row['price'];
            $i++;
        }*/


        if(count($_POST)>0)
        {


            //$model->deletefun($id);
            $result->attributes=$_POST['Product']; 
            if($result->validate())//validate $result not model as because all the data are stored in result now
            {
                $model->updatedetails($id);

                $image = @$_POST['Product']['image'];

                $model_image->deleteAllByAttributes(array('product_id'=>@$id));

                $model_image->imageSave($id,$image);

               /* if($_POST['Product']['is_color']){
                    $color= $_POST['color'];
                    if(count($color) > 0){
                        $colormodel->deletecol($id);
                        $colormodel->savecolor($id,$color);
                    }
                }else{
                    $colormodel->deletecol($id);
                }

                if($_POST['Product']['is_size']){
                    $size_array['size']= $_POST['size'];
                    $size_array['price']= $_POST['size_price'];
                    if(count($size_array['size']) > 0){
                        $sizemodel->deletecol($id);
                        $sizemodel->savecolor($id,$size_array);
                    }
                }else{
                    $sizemodel->deletecol($id);
                }*/

                $this->redirect(Yii::app()->request->baseUrl."/product/admin/product/listing");
            }
        }
        //var_dump($res); exit;
        $this->render('edit',array('model'=>$result,'res'=>$arr,'previmage'=>$prev_image/*'prev_color'=>$prev_color,'prev_size'=>$prev_size*/));
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

    //for thumbail image
        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/product_image/".$file_name);
        $thumb->resize(400,400);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/product_image/thumb/".$file_name);

        $dataarr=$_POST['imgarr'];
        foreach($dataarr as $r){
            $w1=$r[0];
            $h1=$r[1];
            $req_ratio = $w1/$h1;
            $filenamearr = Yii::getPathOfAlias('webroot')."/uploads/product_image/thumb/" . $w1 . "X".$h1."/";

            if (!file_exists($filenamearr)) {

                mkdir($filenamearr,0777);
            }

                $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/product_image/".$file_name);
                //$thumb->crop(0,0,$w1,$h1);
                if($w1 == $h1){
                    if($orig_asc > 1){
                        $thumb->resize(($h1*$orig_asc)+1,$h1);
                    }
                    else{
                        $thumb->resize($w1,($w1/$orig_asc)+1);
                    }
                }else{
                    if($w1 < $h1)
                        $thumb->resize($h1*$orig_asc,$h1);
                    else
                        $thumb->resize($w1,$w1*$orig_asc);

                }

            $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/product_image/thumb/".$w1."X".$h1."/".$file_name);

            $handle1 = new upload(Yii::getPathOfAlias('webroot')."/uploads/product_image/thumb/".$w1."X".$h1."/".$file_name);

            $left =0;
            $width1=$handle1->image_src_x;

            if($width1 > $w1)
                $left = ($width1-$w1)/2;

            $thumb->crop($left,0,$w1,$h1);

            $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/product_image/thumb/".$w1."X".$h1."/".$file_name);









        }
    }
       /* if($width>$ewidth || $height>$eheight)
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
    }*/

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
        $width = $_POST['width'];
        $foldername = "thumb/".$width."X".$height;


        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/product_image/".$image);
        $thumb->crop($x1,$y1,$w,$h);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/product_image/".$foldername."/".$image);


        echo $image;



    }

    function actionDelimage(){

        $image = $_POST['image'];
        $main = "./uploads/product_image/*";
        $filelist=$this->dir_scan($main);

        if(count($filelist)){
            foreach($filelist as $f){
                $pathinfo = pathinfo($f);
                if($pathinfo['basename'] == $image){
                    @unlink($f);
                }
            }
        }

    }

    function dir_scan($folder) {
        $files = glob($folder);
        foreach ($files as $f) {
            if (is_dir($f)) {
                $files = array_merge($files, $this->dir_scan($f .'/*')); // scan subfolder
            }
        }
        return $files;
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

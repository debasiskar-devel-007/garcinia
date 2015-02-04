<?php

class Admin_blogController extends MyController
{

    
    
    public function init()
    {
        yii::import('product.controllers.Admin_productController');
        $this->pageTitle="Blog Manager";
        yii::app()->theme='admin';
        return true;
    }

    public function actionAdd()
    {

        $model= new Blog();
        if(count($_POST))
        {
            $model->attributes=$_POST['Blog'];
                                
            if($model->validate())
            {
                 $model->user_image= $_POST['Blog']['user_image'];
                  
                              
                $r=$model->insertdata();
                //echo $r;
                if($r>0)
                {
                    $this->redirect(yii::app()->baseurl."/blog/admin/blog/listing");
                } 

            } 
           

        }

        $this->render('add',array('model'=>$model));

    }
    
    public function actionIndex()
    {
        
       $this->redirect(Yii::app()->request->baseUrl."/blog/admin/blog/listing");   
        
    }

    public function actionListing()
    {
        $model= new Blog('search');

        if(isset($_GET['Blog']))//this is use for searching in the listing page 
        {
            $model->pr_title=$_GET['Blog']['pr_title'];
            $model->pr_date=$_GET['Blog']['pr_date'];
            $model->postby=$_GET['Blog']['postby'];
            $model->pr_status=$_GET['Blog']['priority'];
            //$model->isactive=$_GET['Product']['isactive'];

        }

        $arr = $model->fetchdate();
        //$res_l=BlogComment::model()->findAllByAttributes(array('i_active'=>0));

        //$cnt=count($res_l);
        if($arr!=NULL)
        {
            foreach($arr as $key=>$val)
            {
                $arr1[""]= "Select Date";
                $arr1[$val['pr_date']]= $val['pr_date'];
            }
        }
        else
        {
            $arr1['00-00-0000'] = "00-00-0000";
        }

        $this->render('index',array('model'=>$model,'res'=>$arr1));


    }

    public function actionShowcontent()
    {

        $id = $_POST['id'];
        $model = new Blog();
        $res = $model->fetchcontent($id);
        echo $res[0]['pr_desc'];
    }

    //for bulk action
    public function actionBulkupdate(){
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new Blog();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updatedata($data);
        }

        echo 1;
    }

    public function actionToggle($id)
    {
        $model= new Blog();
        $model->updatestatus($id);
        echo $id;
    }

    public function actionToggle1($id)
    {
        $model= new Blog();
        $model->updatestatus1($id);
        echo $id;
    }

    public function actionDelete()
    {
        $id = $_REQUEST['id'];
        $model = new Blog();

        $res = Blog::model()->deleteByPk($id);
        $this->redirect(Yii::app()->request->baseUrl."/blog/admin/blog/listing"); 

    }
        public function actionDeleteall()
    {
        $model = new Blog();
        $x=explode(",",$_POST['ids']);
        foreach($x as $val)
        {
            $model->deletefun($val);
           
 
        }
        Yii::app()->user->setFlash('success', 'Your Data Is Deleted Successfully:');
    }
        public function actionUpdatedata($id)
    {

        $model = new Blog();
       


        $res = $model->fetchupdatedetails($id);

       

        if(count($_POST)>0)
        {



            $arr['pr_title']= $_POST['Blog']['pr_title'];
            $arr['pr_desc'] = $_POST['Blog']['pr_desc'];
            $arr['postby'] = $_POST['Blog']['postby'];
            $arr['enablecom'] = $_POST['Blog']['enablecom'];
            $arr['user_image'] = $_POST['Blog']['user_image'];
            $arr['priority'] = $_POST['Blog']['priority'];
            //$arr['user_image'] = @$_POST['img_name_val1'];






            $model->updatedetails($id,$arr);

           
           

            $this->redirect(Yii::app()->request->baseUrl."/blog/admin/blog/listing"); 

        }
        $this->render('edit',array('model'=>$res)); 
    } 
    
        public function actionEditableSaver()
    {
        $model = new Blog();
        $model->updatedata($_POST);
    } 
    
    public function actionTest()
    {
       $res=Admin_productController::rest1();
       echo $res; 
        
    }
    
            public function actionUploadify_process()
    {

        // Define a destination
        $targetFolder = '/uploads/proimage/'; // Relative to the root
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
    
    public function actionResizeimage(){

        $file_name=$_POST['filename'];
        $eheight=$_POST['height'];
        $ewidth=$_POST['width'];
        $foldername = $_POST['foldername'];

        $handle = new upload(Yii::getPathOfAlias('webroot')."/uploads/proimage/".$file_name);

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
            $handle->process(Yii::getPathOfAlias('webroot')."/uploads/proimage/");       

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
        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/proimage/".$file_name);
        $thumb->crop($left,$top,$ewidth,$eheight);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/proimage/".$foldername."/".$file_name);
    }
    
        function actionDelimage(){

        $image = $_POST['image'];

        if(!isset($_POST['path'])){
            @unlink('./uploads/proimage/'.$image);
            @unlink('./uploads/proimage/zoom/'.$image);
            @unlink('./uploads/proimage/thumb/'.$image);
        }else{
            
            $path = $_POST['path'];
            echo $path.$image;
            @unlink($_POST['path'].$image);
        }
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
        $width =  $_POST['width'];    
        $foldername = $_POST['foldername'];


        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/proimage/".$image);
        $thumb->crop($x1,$y1,$w,$h);
        if($h > $height)
            $thumb->resize($width,$height);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/proimage/".$foldername."/".$image);

        $imgarr = pathinfo($image);
        $ext = $imgarr['extension'];
        $temp_image = time().".".$ext;
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/proimage/temp/".$temp_image);

        echo $temp_image;



    }

}
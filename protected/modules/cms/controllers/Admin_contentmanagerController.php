<?php

class Admin_contentmanagerController extends MyController
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


        $res=$model->fetchdata();
        $arr[0]='Select Page';
        foreach($res as $r)
        {
            $arr[$r['id']]=$r['page_name'];


        }

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
        $this->render('add',array('model'=>$model,'arr'=>$arr));

    }

    public function actionListing()
    {

        $mod= new Content('search');
        if(isset($_GET['Content']))
        {
            $mod->content_type=$_GET['Content']['content_type'];
            $mod->content_desc=$_GET['Content']['content_desc'];
            $mod->page_id=$_GET['Content']['page_id'];
            $mod->id=$_GET['Content']['id'];

        }
        $res=$mod->fetchdata();
        $arr1['']='Select Page';
        foreach($res as $r)
        {
            $arr1[$r['id']]=$r['page_name'];


        }

        $arr['']='SELECT A TYPE';
        $arr['IMAGE']='IMAGE';  
        $arr['HTML']='HTML';  
        $arr['VIDEO']='VIDEO';  


        $this->render('index',array('model'=>$mod,'arr'=>$arr,'arr1'=>$arr1));
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

    public function actionUpdate($id)
    {

        $model = new Content();
        $res= $model->fetchdata();
        $arr[0]='Select a Page';
        foreach($res as $r)
        {

            $arr[$r['id']]=$r['page_name'];

        }


        $res = $model->fetchupdatedetails($id);



        if(count($_POST)>0)
        {



            $arr['content_type']= $_POST['Content']['content_type'];
            $arr['content_desc'] = $_POST['Content']['content_desc'];
            $arr['content_status'] = $_POST['Content']['content_status'];
            $arr['image_type'] = $_POST['Content']['image_type'];
            $arr['img_width'] = $_POST['Content']['img_width'];
            $arr['img_height'] = $_POST['Content']['img_height'];







            $model->updatedetails($id,$arr);




            $this->redirect(Yii::app()->request->baseUrl."/cms/admin/contentmanager/listing"); 

        }
        $this->render('edit',array('model'=>$res,'arr'=>$arr)); 
    }
    public function actionEditableSaver()
    {
        $model = new Content();
        $model->updatedata($_POST);
    }

    public function actionEditcontent($id)
    {
       
        $model = new Content();
        $model1 = new ContentInfo();
        $res = $model->fetchupdatedetails($id);
        $res1 = $model1->fetchupdatedetails($id);

        if(count($_POST)>0)
        {    
            
            
             
            $model1->deletedata($id);

            if($res['content_type']=='IMAGE')
            {

                if($res['image_type']==1)
                { 


                    $res=@$_POST['imageval'];

                    $model1->savedata1($id,$res);
                }

                else
                {
                    $con=$_POST['ContentInfo'];

                    $model1->savedata($id,$con);

                }   


            }


            else  if($res['content_type']=='TEXT' || $res['content_type']=='HTML')
                {
                    
                    $model1->deletedata($id);

                    $con=$_POST['ContentInfo']['content_type'];
                    $model1->savedata($id,$con);


                }
                
                
                $this->redirect(yii::app()->request->baseUrl.'/cms/admin/contentmanager/listing'); 
        }

             if(count($res1)==0)

            $this->render('editcontent',array('model'=>@$res,'model1'=>$model1,'res1'=>$res1));
           else
           {
             $model1->content_type=$res1[0]['content_type'];  
              $this->render('editcontent',array('model'=>@$res,'model1'=>$model1,'res1'=>$res1));     
           }

    }

    public function actionUploadify_process()
    {

        // Define a destination
        $targetFolder = '/uploads/content_image/'; // Relative to the root
        ini_set('post_max_size', '640M'); 
        ini_set('upload_max_filesize', '640M');
        ini_set('memeory_limit', '5000M');
        set_time_limit(0);

        if (!empty($_FILES)){

            $tempFile = $_FILES['Filedata']['tmp_name']; 

            $targetPath =   Yii::getPathOfAlias('webroot').$targetFolder;     
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            $file_name=time().'.'.$fileParts['extension'];

            $targetFile = rtrim($targetPath,'/') . '/' . $file_name;

            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png','JPEG','JPG'); // File extensions

            if (in_array($fileParts['extension'],$fileTypes)) {

                move_uploaded_file($tempFile,$targetFile);
                $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$file_name);
               // $thumb->crop($left,$top,$ewidth,$eheight);
                $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/content_image/original/".$file_name);
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

        $handle = new upload(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$file_name);

        $handle->image_resize = true;
        $handle->image_ratio_x =true;
        $handle->image_ratio_y =true;  

        $handle->jpeg_quality = 100;

        $width=$handle->image_src_x;
        $height=$handle->image_src_y;

        $orig_asc=$width/$height;

        if($width>1000){
            $w=1000;
            $h=1000*(1/$orig_asc);
            $handle->image_x = $w;
            $handle->image_y = $h;

            $handle->file_overwrite=true;
            $handle->process(Yii::getPathOfAlias('webroot')."/uploads/content_image/");       

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
        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$file_name);
        $thumb->crop($left,$top,$ewidth,$eheight);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$foldername."/".$file_name);
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
        $width = $_POST['width'];
        $foldername = $_POST['foldername'];


        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$image);
        $thumb->crop($x1,$y1,$w,$h);
        if($h > $height)
            $thumb->resize($width,$height);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$foldername."/".$image);

        $imgarr = pathinfo($image);
        $ext = $imgarr['extension'];
        $temp_image = time().".".$ext;
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/content_image/temp/".$temp_image);

        echo $temp_image;



    }
   
    public function actionUploadify_process1()
    {

        // Define a destination
        $targetFolder = '/uploads/content_image'; // Relative to the root
        ini_set('post_max_size', '640M'); 
        ini_set('upload_max_filesize', '640M');
        ini_set('memeory_limit', '5000M');
        set_time_limit(0);

        if (!empty($_FILES)){

            $tempFile = $_FILES['Filedata']['tmp_name']; 

            $targetPath =   Yii::getPathOfAlias('webroot').$targetFolder;     
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            $file_name=time().'.'.$fileParts['extension'];

            $targetFile = rtrim($targetPath,'/') . '/' . $file_name;

            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png','JPEG','JPG'); // File extensions

            if (in_array($fileParts['extension'],$fileTypes)) {

                move_uploaded_file($tempFile,$targetFile);
                //sleep(2);
                $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$file_name);
                // $thumb->crop($left,$top,$ewidth,$eheight);
                $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/content_image/original/".$file_name);
                echo  $file_name;
            }
            else{
                echo '123';    
            }


        }
    }
    
     public function actionResizeimage1(){

        echo $file_name=$_POST['filename'];
       // var_dump($file_name);
        //exit;
        $eheight=intval($_POST['height']);
         $ewidth=intval($_POST['width']);

        $foldername = $_POST['foldername'];


        $handle = new upload(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$file_name);

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
            $handle->process(Yii::getPathOfAlias('webroot')."/uploads/content_image");       

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
        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$file_name);
        $thumb->crop($left,$top,$ewidth,$eheight);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$foldername."/".$file_name);
    }

    public function actionResize_cropImage1()
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
        $foldername = $_POST['foldername'];


        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$image);
        $thumb->crop($x1,$y1,$w,$h);
        if($h > $height)
            $thumb->resize($width,$height);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/content_image/".$foldername."/".$image);

        $imgarr = pathinfo($image);
        $ext = $imgarr['extension'];
        $temp_image = time().".".$ext;
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/content_image/temp/".$temp_image);

        echo $temp_image;



    }


    function actionDelimage(){

        $image = $_POST['image'];

        if(!isset($_POST['path'])){
            @unlink('./uploads/content_image/'.$image);
            @unlink('./uploads/content_image/'.$image);
            @unlink('./uploads/content_image/thumb/'.$image);
            @unlink('./uploads/content_image/original/'.$image);
        }else{

            $path = $_POST['path'];
            echo $path.$image;
            @unlink($_POST['path'].$image);
        }
    }


    function actionDelimage1(){

        $mod = new ContentInfo();

        $image = $_POST['image'];

        $mod->delimg($image);
        /*Banner::model()->deleteAll(array(
        'image'=>$image,
        ));*/

        if(!isset($_POST['path'])){
            @unlink('./uploads/content_image/'.$image);
            @unlink('./uploads/content_image/'.$image);
            @unlink('./uploads/content_image/thumb/'.$image);
            @unlink('./uploads/content_image/original/'.$image);
        }else{

            $path = $_POST['path'];
            echo $path.$image;
            @unlink($_POST['path'].$image);
        }
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
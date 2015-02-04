<?php

class Admin_landingpageController extends MyController
{

    public function init()
    {
        $this->pageTitle= "Landing Page Manager";//set page title here
        yii::app()->theme='admin';//set theme for this controller
        return true; 
    }

    public function actionIndex()
    {

        $this->redirect(Yii::app()->request->baseUrl."/landing_page_manager/admin/landingpage/listing");

    }
//this is used for add a category
    public function actionAdd()
    {

        $this->pageTitle = "Add Landing Page:".$this->pageTitle;
        $model = new LandingPage();
        if(count($_POST))
        {
            $model->attributes=$_POST['LandingPage'];
            if($model->validate())
            {
                
                $r=$model->savedata();
                if($r==1)
               $this->redirect(yii::app()->baseurl."/landing_page_manager/admin/landingpage/listing");
                
            }
            
            
        }
        
        

                $this->render('add',array('model'=>$model));
    }
//this is for showing the listing of category
    public function actionListing()
    {




        $model = new LandingPage('search');
        if(isset($_GET['LandingPage']))
        {
            $model->name = $_GET['LandingPage']['name'];   
            $model->id = $_GET['LandingPage']['id'];

            $model->url = $_GET['LandingPage']['url'];   
            //$model->priority = $_GET['Category']['priority'];   
        }

        $this->render('listing',array('model'=>$model));

    }
    //to show the description 
    public function actionShowcontent()
    {
        $id = $_POST['id']; 

        $model = new LandingPage();
        $res = $model->fetchdesc($id);

        echo $res[0]->description;  
    }
    //to delete any particular row from listing
    public function actionDeletedata()
    {
        $id = $_REQUEST['id'];
        $model = new LandingPage();

        $res = Category::model()->deleteByPk($id);
        $this->redirect(Yii::app()->request->baseUrl."/landing_page_manager/admin/landingpage/listing"); 

    }
    //bulk delete
    public function actionDeleteall()
    {
        $model = new LandingPage();
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
        $model = new LandingPage();
        $model->updatetable($_POST);
    }
//this is for update status
    public function actionToggle($id)
    {
        $model = new LandingPage();
        $model->updatestatus($id);
        echo $id;

    }
//this is for update feature

//this is for edit a page    
    public function actionUpdatedata($id)
    {
        $model = new LandingPage();
        $result = $model->fetchdetail($id);
        
       //var_dump($result);

       


        if(count($_POST)>0)
        {
            $result->attributes=$_POST['LandingPage']; 
           
            if($result->validate())//we need to validate result here as all the values are stored in the result now
            {
                 
                $arr['name']= $_POST['LandingPage']['name'];
                $arr['url']= $_POST['LandingPage']['url'];
                $arr['description']= $_POST['LandingPage']['description'];
                $arr['image']= $_POST['LandingPage']['image'];
                $arr['isactive']= $_POST['LandingPage']['isactive'];
               
                
                $model->updatedetails($id,$arr);
                $this->redirect(Yii::app()->request->baseUrl."/landing_page_manager/admin/landingpage/listing");
            }
        }

        $this->render('edit',array('model'=>$result));
    }
    
        public function actionUploadify_process()
    {

        // Define a destination
        $targetFolder = '/uploads/landing_image/'; // Relative to the root
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
        $ewidth=$eheight;
        $foldername = $_POST['foldername'];

        $handle = new Upload(Yii::getPathOfAlias('webroot')."/uploads/landing_image/".$file_name);

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
            $handle->process(Yii::getPathOfAlias('webroot')."/uploads/landing_image/");       

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
        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/landing_image/".$file_name);
        $thumb->crop($left,$top,$ewidth,$eheight);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/landing_image/".$foldername."/".$file_name);
    }
    
        function actionDelimage(){

        $image = $_POST['image'];

        if(!isset($_POST['path'])){
            @unlink('./uploads/landing_image/'.$image);
            @unlink('./uploads/landing_image/zoom/'.$image);
            @unlink('./uploads/landing_image/thumb/'.$image);
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
        $width = $height;
        $foldername = $_POST['foldername'];


        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/landing_image/".$image);
        $thumb->crop($x1,$y1,$w,$h);
        if($h > $height)
            $thumb->resize($width,$height);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/landing_image/".$foldername."/".$image);

        $imgarr = pathinfo($image);
        $ext = $imgarr['extension'];
        $temp_image = time().".".$ext;
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/landing_image/temp/".$temp_image);

        echo $temp_image;



    }
    
        public function actionBulkupdate(){
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new LandingPage();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updatetable($data);
        }

        echo 1;
    }
    
    //this is for showing the listing of category
    public function actionlead()
    {
        $model = new LandingPageDetails('search');

        if(isset($_GET['LandingPageDetails']))
        {
           // $model->fname = $_GET['LandingPageDetails']['fname'];   
            $model->email = $_GET['LandingPageDetails']['email'];   
            $model->city = $_GET['LandingPageDetails']['city'];   
            $model->state = $_GET['LandingPageDetails']['state'];
            $model->affiliate_code = $_GET['LandingPageDetails']['affiliate_code'];
            $model->fullname = $_GET['LandingPageDetails']['fullname'];
        }
        
        $aff_array = $model->get_afflist();
        
        $aff = array(""=>"Select Affiliate");
        
        if(count($aff_array) > 0){
            foreach($aff_array as $row){
                $aff[$row['id']] = $row['fname']." ".$row['lname'];
            }
        }
        
       
        $this->render('lead_listing',array('model'=>$model,'aff'=>$aff));

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
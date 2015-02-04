<?php

class Admin_videoController extends MyController
{

    public function init()
    {

        yii::app()->theme='admin' ;
        $this->pageTitle="Video Manager";
        return true; 
    }
    public function actionIndex()
    {
        $this->redirect(Yii::app()->request->baseUrl."/video/admin/video/listing");  
    }

    public function actionAdd()
    {
        $model= new Video();
        $val_error = array();

        if(count($_POST))
        {


            $model->attributes= $_POST['Video'];
            $type =  $model->type;
            if($type){
                $model->name = $_POST['y_vid_name']; 
            }else{
                $model->name = $_POST['d_vid_name']; 
            }


            if($model->validate())
            {
                $model->time = time();
                $model->save();   
                $this->redirect(Yii::app()->request->baseUrl."/video/admin/video"); 

            } else{
                $val_error = $model->getErrors();
                if($type && empty($model->name))
                    $val_error['name'][0]="Please select a video from youtube";
            } 
        }
        $this->render('add',array('model'=>$model,'val_error'=>$val_error)); 

    }

    public function actionListing()
    {

        $model= new Video('search');
        if(isset($_GET['Video']))
        {
            $model->title=$_GET['Video']['title'];
            $model->type=$_GET['Video']['type'];
        }

        $this->render('index',array('model'=>$model));
    }

    public function actionallvideo()
    {

        $model= new Video('search');
        if(isset($_GET['Video']))
        {
            $model->title=$_GET['Video']['title'];
            $model->type=$_GET['Video']['type'];
        }

        $this->render('allvideo',array('model'=>$model));
    }

    public function actionshow1content()
    {
        $id = $_POST['id']; 

        $model = new Sport();
        $res = $model->fetchdesc($id);

        echo $res[0]->sport_desc;  
    }

    public function actionToggle($id)
    {
        $model= new Video();
        $model->updatestatus($id);
        //echo $id;
    }

    public function actionToggle1($id)
    {
        $model= new Video();
        $res=$model->updatestatus1($id);
        if($res==1);
        $model->updatestat($id);
        $this->redirect(Yii::app()->request->baseUrl."/video/admin/video/listing");               
    }



    public function actionDeletedata()
    {
        $id=$_REQUEST['id'];
        $r=Video::model()->deleteByPk($id);
        $this->redirect(Yii::app()->request->baseUrl."/video/admin/video/listing");

    }
    public function actiondeleteall()
    {

        $model = new Video();
        $x=explode(',',$_POST['ids']);
        foreach($x as $val)
        {
            $model->deletefun($val);  

        }  

    }

    public function actionBulkupdate()
    {
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new Video();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updatedata($data);
        }

        echo 1;
    }

    public function actionUpdatedata($id)
    {


        $model = new Sport();
        $mod = new Banner();



        $res = $model->fetchupdatedetails($id);
        $result = $mod->fetchimage($id);


        //    echo "<pre>";
        //            var_dump($res);
        //            exit;

        if(count($_POST)>0)
        {
            $mod->deletefun($id);


            $result =@$_POST['imageval'];
            if(is_array($result))

                foreach($result as $val)
                {
                    $mod->save1($val,$id);


            }



            $arr['sport_name']= $_POST['Sport']['sport_name'];
            $arr['sport_desc'] = $_POST['Sport']['sport_desc'];
            $arr['sport_parentcategory'] = $_POST['Sport']['sport_parentcategory'];
            $arr['isactive'] = $_POST['Sport']['isactive'];
            $arr['priority'] = $_POST['Sport']['priority'];
            $arr['imag_name'] = @$_POST['Sport']['imag_name'];
            //$arr['banner_image'] = @$_POST['Sport']['banner_image'];
            $arr['additional_image'] = @$_POST['Sport']['additional_image'];
            $arr['isfeatured'] = @$_POST['Sport']['isfeatured'];
            $arr['tag'] = @$_POST['Sport']['tag'];
            $arr['show1'] = @$_POST['Sport']['show1'];
            $arr['connectionpage_name'] = @$_POST['Sport']['connectionpage_name'];







            $model->updatedetails($id,$arr);




            $this->redirect(Yii::app()->request->baseUrl."/sportsmanager/admin/sports/listing"); 

        }


        $res1 = $model->fetchdata();//fetching all category id and name 
        $arr[0]='Parent Category';
        foreach($res1 as $r)
        {

            $arr[$r['id']]= $r['sport_name'];//assign categoryname in place of category id 
        }
        $this->render('edit',array('model'=>$res,'res'=>$arr,'result'=>$result)); 
    }
    public function actionEditableSaver()
    {
        $model = new Video();
        $model->updatedata($_POST);
    }

        public function actionUploadify_process()
    {

        // Define a destination
        $targetFolder = '/uploads/video/converted/'; // Relative to the root
        ini_set('post_max_size', '1024M'); 
        ini_set('upload_max_filesize', '1024M');
        ini_set('memeory_limit', '1024M');
        ini_set('max_execution_time', 30*60);
        set_time_limit(0);
        
       if (!empty($_FILES)){

            $tempFile = $_FILES['Filedata']['tmp_name'];
            

            $targetPath =   Yii::getPathOfAlias('webroot').$targetFolder;     
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            $file_name=time().'.'.$fileParts['extension'];

            $targetFile = rtrim($targetPath,'/') . '/' . $file_name;

            // Validate the file type
            $fileTypes = array('flv'); // File extensions

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

        // Define a destination
         $targetFolder = '/uploads/video/converted/'; // Relative to the root
        ini_set('post_max_size', '1024M'); 
        ini_set('upload_max_filesize', '1024M');
        ini_set('memeory_limit', '1024M');
        ini_set('max_execution_time', 30*60);
        set_time_limit(0);

        if (!empty($_FILES)){

            $tempFile = $_FILES['Filedata']['tmp_name'];


            $targetPath =   Yii::getPathOfAlias('webroot').$targetFolder;     
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            $filebasename = time();
            $file_name=$filebasename.'.'.$fileParts['extension'];

            $targetFile = rtrim($targetPath,'/') . '/' . $file_name;

            // Validate the file type
            $fileTypes = array('flv','3gp','webm','mov','mp4','wmv'); // File extensions

            if (in_array($fileParts['extension'],$fileTypes)) {

                move_uploaded_file($tempFile,$targetFile);

                $fileToFlv = rtrim($targetPath,'/') . '/' . $file_name; 
                $fileFlv = rtrim($targetPath,'/') . '/converted/' . $filebasename.'.flv'; 
                $Flvjpg = rtrim($targetPath,'/') . '/thumb/' . $filebasename.'.jpg'; 

                $command = "/usr/bin/ffmpeg" . ' -i ' . $fileToFlv . ' -vstats 2>&1';
                $output = shell_exec ( $command );

                $result = ereg ( '[0-9]?[0-9][0-9][0-9]x[0-9][0-9][0-9][0-9]?', $output, $regs );

                $vals = (explode ( 'x', $regs [0] ));
                $width = $vals [0] ? $vals [0] : null;
                $height = $vals [1] ? $vals [1] : null;
                $info = array ('width' => $width, 'height' => $height );


                $s_vid_conv_cmd = "/usr/bin/ffmpeg -i ".$fileToFlv." -sameq  -f flv  ".$info['width']."x".$info['height']." ".$fileFlv;
                $x=exec($s_vid_conv_cmd);
                
                exec("/usr/bin/ffmpeg -i ".$fileFlv." -vframes 1 -ss 00:00:01 -s 180x160 -f image2 ".$Flvjpg,$y);


                echo  $filebasename.'.flv';
            }
            else{
                echo '123';    
            }


        }
    }

    function __get_video_dimensions($video = false) {

        if (file_exists ( $video )) {
            $command = "/usr/bin/ffmpeg" . ' -i ' . $video . ' -vstats 2>&1';
            $output = shell_exec ( $command );

            $result = ereg ( '[0-9]?[0-9][0-9][0-9]x[0-9][0-9][0-9][0-9]?', $output, $regs );

            if (isset ( $regs [0] )) {
                $vals = (explode ( 'x', $regs [0] ));
                $width = $vals [0] ? $vals [0] : null;
                $height = $vals [1] ? $vals [1] : null;
                return array ('width' => $width, 'height' => $height );
            } else {
                return false;
            }
        } else {

            return false;
        }

    }




    function actionDelimage(){

        $image = $_POST['image'];

        if(!isset($_POST['path'])){
            @unlink('./uploads/sports_image/'.$image);
            @unlink('./uploads/sports_image/zoom/'.$image);
            @unlink('./uploads/sports_image/thumb/'.$image);
        }else{

            $path = $_POST['path'];
            echo $path.$image;
            @unlink($_POST['path'].$image);
        }
    }


    //Render Partial Image List

    function actionGetImage($id=0){
        $model = new Banner();
        /*foreach($_GET as $r=>$val)
        {
        //var_dump($r);
        var_dump($val);
        }*/
        //var_dump($_GET);
        // echo $id;
        //var_dump(Yii::app()->getRequest()->getParam('id'));

        $result = $model->fetchupdatedetails($id);


        $this->renderPartial('imagelist', array(
        'id' => $id,
        'name' => @$result['image']
        ));
    }


    public function actionShowvideo()
    {
        $id = $_POST['id'];
        //echo $id;
        //exit;
        $model = new Video();
        $res = $model->videofetch($id);

        echo $res[0]->name;
        //exit;
    }
}
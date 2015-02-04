<?phpclass Admin_bannerController extends MyController{    public function init()    {        yii::app()->theme='admin' ;        $this->pageTitle="Banner Manager";        return true;     }    public function actionIndex()    {        $this->redirect(Yii::app()->request->baseUrl."/banner/admin/banner/listing");    }    public function actionAdd()    {        $model= new Banner();        if(count($_POST))        {            $model->attributes= $_POST['Banner'];            if($model->validate())            {                $model->banner_img=$_POST['Banner']['banner_img'];                $model->save();                $this->redirect(Yii::app()->request->baseUrl."/banner/admin/banner/listing");            }        }        $this->render('add',array('model'=>$model));     }    public function actionListing()    {        $model= new Banner();        if(isset($_GET['Banner']))        {            $model->pagename=$_GET['Banner']['pagename'];            $model->priority=$_GET['Banner']['priority'];        }        $this->render('index',array('model'=>$model));    }    public function actionshowcontent()    {        $id = $_POST['id'];         $model = new Banner();        $res = $model->fetchdesc($id);        echo $res[0]->banner_img;      }    public function actionToggle($id)    {        $model= new Banner();        $model->updatestatus($id);        echo $id;    }    public function actionDeletedata()    {        $id=$_REQUEST['id'];        $r=Banner::model()->deleteByPk($id);        $this->redirect(Yii::app()->request->baseUrl."/banner/admin/banner/listing");    }    public function actionDelete()    {        $id=$_REQUEST['id'];        $r=Banner::model()->deleteByPk($id);        //$this->redirect(Yii::app()->request->baseUrl."/dailypoll/admin/poll/listing");    }    public function actiondeleteall()    {        $model = new Banner();        $x=explode(',',$_POST['ids']);        foreach($x as $val)        {            $model->deletefun($val);          }      }    public function actionBulkupdate()    {        $val = $_POST['values'];        $data['name'] = $_POST['attr'];        $data['value'] = $_POST['status'];        $model = new Banner();        foreach($val as $row){            $data['pk'] = $row;            $model->updatedata($data);        }        echo 1;    }    public function actionUpdatedata($id)    {        $model = new Banner();               $res = $model->fetchupdatedetails($id);                //    echo "<pre>";        //            var_dump($res);        //            exit;        if(count($_POST)>0)        {                       //$arr = $_POST['Polladd'];                        $model->updatedetails($id,$_POST['Banner']);            $this->redirect(Yii::app()->request->baseUrl."/banner/admin/banner/listing");        }        $this->render('edit',array('model'=>$res));     }    public function actionEditableSaver()    {        $model = new Banner();        $model->updatedata($_POST);    }    public function actionUploadify_process()    {        // Define a destination        $targetFolder = '/uploads/banner/'; // Relative to the root        ini_set('post_max_size', '640M');         ini_set('upload_max_filesize', '640M');        ini_set('memeory_limit', '5000M');        if (!empty($_FILES)){            $tempFile = $_FILES['Filedata']['tmp_name'];             $targetPath =   Yii::getPathOfAlias('webroot').$targetFolder;                 $fileParts = pathinfo($_FILES['Filedata']['name']);            $file_name=time().'.'.$fileParts['extension'];            $targetFile = rtrim($targetPath,'/') . '/' . $file_name;            // Validate the file type            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions            if (in_array($fileParts['extension'],$fileTypes)) {                move_uploaded_file($tempFile,$targetFile);                echo  $file_name;            }            else{                echo '123';                }        }    }    public function actionResizeimage(){        $file_name=$_POST['filename'];        $eheight=$_POST['height'];        $ewidth=$_POST['width'];        //$ewidth=$eheight;        $foldername = $_POST['foldername'];        $handle = new upload(Yii::getPathOfAlias('webroot')."/uploads/banner/".$file_name);        $handle->image_resize = true;        $handle->image_ratio_x =true;        $handle->image_ratio_y =true;          $handle->jpeg_quality = 100;        $width=$handle->image_src_x;        $height=$handle->image_src_y;        $orig_asc=$width/$height;        if($width>1000){            $w=1000;            $h=1000*(1/$orig_asc);            $handle->image_x = $w;            $handle->image_y = $h;            $handle->file_overwrite=true;            $handle->process(Yii::getPathOfAlias('webroot')."/uploads/banner/");            if($handle->processed){                echo 'image resized';            }            else{                echo 'error : ' . $handle->error;            }        }        if($width>$ewidth || $height>$eheight)        {            $left=intval(($width-$ewidth)/2);            $top=intval(($height-$eheight)/2);        }        else        {            $left=0;            $top=0;            $eheight=$height;            $ewidth=$width;        }        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/banner/".$file_name);        $thumb->crop($left,$top,$ewidth,$eheight);        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/banner/".$foldername."/".$file_name);    }    public function actionResize_cropImage()    {        $image=$_POST['image'];        $x2=$_POST{'x2'};        $y2=$_POST['y2'];        $x1=$_POST['x1'];        $y1=$_POST['y1'];        $w=$_POST['w'];        $h=$_POST['h'];        $height = $_POST['height'];        $width = $_POST['width'];        // $width = $height;        $foldername = $_POST['foldername'];        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/banner/".$image);        $thumb->crop($x1,$y1,$w,$h);        if($h > $height)            $thumb->resize($width,$height);        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/banner/".$foldername."/".$image);        $imgarr = pathinfo($image);        $ext = $imgarr['extension'];        $temp_image = time().".".$ext;        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/banner/temp/".$temp_image);        echo $temp_image;    }    function actionDelimage(){        $image = $_POST['image'];        if(!isset($_POST['path'])){            @unlink('./uploads/banner/'.$image);            @unlink('./uploads/banner/thumb/'.$image);        }else{            $path = $_POST['path'];            echo $path.$image;            @unlink($_POST['path'].$image);        }    }    function actionDelimage1(){        $mod = new Banner();        $image = $_POST['image'];        $mod->delimg($image);        /*Banner::model()->deleteAll(array(        'image'=>$image,        ));*/        if(!isset($_POST['path'])){            @unlink('./uploads/sports_image/banner/'.$image);            @unlink('./uploads/sports_image/zoom/'.$image);            @unlink('./uploads/sports_image/banner/thumb/'.$image);        }else{            $path = $_POST['path'];            echo $path.$image;            @unlink($_POST['path'].$image);        }    }    function actionDelimage2(){        $image = $_POST['image'];        if(!isset($_POST['path'])){            @unlink('./uploads/sports_image/additional/'.$image);            @unlink('./uploads/sports_image/zoom/'.$image);            @unlink('./uploads/sports_image/additional/thumb/'.$image);        }else{            $path = $_POST['path'];            echo $path.$image;            @unlink($_POST['path'].$image);        }    }    //Render Partial Image List    function actionGetans($id=0){        $model = new Pollanswer();        /*foreach($_GET as $r=>$val)        {        //var_dump($r);        var_dump($val);        }*/        //var_dump($_GET);        // echo $id;        //var_dump(Yii::app()->getRequest()->getParam('id'));        $result = $model->fetchupdatedetails($id);        $this->renderPartial('anslist', array(        'id' => $id,        'name' => @$result['answer'],        'model'=>$model        ));    }    public function getsports($id=0,$space="",$arr=array()){        $dis="";          $res = Sport::model()->fetchsport1($id);         foreach($res as $row){            $sel = '';            if(in_array($row['id'],$arr)){                $sel = ' selected="selected" ';            }            $dis = ($row['sport_parentcategory'] == 0)?'disabled':'';            echo '<option value="'.$row['id'].'" data-original-title="" '.$dis.' '.$sel.'>'.$space.$row['sport_name'].'</option>';            $this->getsports($row['id'],$space."&nbsp;&nbsp;&nbsp;",$arr);        }    }    public function actionDel()    {        $id=$_REQUEST['id'];        Pollanswer::model()->deleteByPk($id);        $this->redirect(Yii::app()->request->baseUrl."/dailypoll/admin/poll/listing");    }}
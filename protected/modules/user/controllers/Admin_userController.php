<?php

class Admin_userController extends MyController
{
    public function init(){
        Yii::app()->theme = 'admin';
    }
    public function actionIndex()
    {
        $this->redirect(Yii::app()->BaseUrl.'/user/admin/user/listing');
    }

    public function actionPartial_listing(){
        $model = new UserManager('search');
        if(isset($_GET['UserManager']))
        {
            $model->fullname = $_GET['UserManager']['fullname'];
            $model->affiliatename = $_GET['UserManager']['affiliatename'];
            $model->landingname = $_GET['UserManager']['landingname'];
            $model->email = $_GET['UserManager']['email'];
            $model->fulladdress = $_GET['UserManager']['fulladdress'];
            if(!empty($_GET['UserManager']['fromdate']))
                $model->fromdate = @$_GET['UserManager']['fromdate']." 00:00:00";
            if(!empty($_GET['UserManager']['todate']))
                $model->todate = @$_GET['UserManager']['todate']. " 23:59:59";
            // $model->role = $_GET['UserManager']['role'];
        }
        //$roleList1['']='Select Role';
        $roleList2 = $this->getUserRole();

        //$roleList = array_merge($roleList1,$roleList2);


        $this->render('partialList',array('model'=>$model,'roleList'=>$roleList2));
    }

    public function actionListing(){
        $model = new UserManager('search');
        if(isset($_GET['UserManager']))
        {
            $model->fname = $_GET['UserManager']['fname'];
            $model->lname = $_GET['UserManager']['lname'];
            $model->email = $_GET['UserManager']['email'];
            $model->fulladdress = $_GET['UserManager']['fulladdress'];
            // $model->role = $_GET['UserManager']['role'];
        }
        //$roleList1['']='Select Role';
        $roleList2 = $this->getUserRole();

        //$roleList = array_merge($roleList1,$roleList2);


        $this->render('index',array('model'=>$model,'roleList'=>$roleList2));
    }

    //This is add function
    public function actionAdd(){
        $model = new UserManager('add');
        $roleList = $this->getUserRole();

        if(count($_POST)>0)
        {   


            $model->attributes=$_POST['UserManager'];   
            if($model->validate())
            {
                $insertid = $model->saveproduct();

                $role = $_POST['UserManager']['role'];

                $roleRel = new UserRoleRelation();

               $res= $roleRel->addRole($insertid,$role);


                /*        this is for sending emails */
                $mail = new YiiMailMessage();

                $content= '<strong style="color:#167db3;">You have been added successfully by Admin as an User.</strong><br /><br />Please <a href="'.Yii::app()->getBaseUrl(true).'/login">Click Here</a> to log in.<br /><br /><strong style="color:#167db3;">Your credentials are listed below:</strong><br /><br />E-Mail: <span style="color:#167db3;">'.@$_POST['UserManager']['email'].'</span><br />Password: <span style="color:#167db3;">'.@$_POST['UserManager']['password'].'</span><br />';

                $mail->addTo(@$_POST['UserManager']['email']);
                $mail->from = ('info@azcowtown.com');
                $mail->setSubject('User Sign Up');
                $mail->setBody($content, 'text/html');

                Yii::app()->mail->send($mail);


                $this->redirect(Yii::app()->request->baseUrl."/user/admin/user");
            }

        }

        $roleList = $this->getUserRole();
        $countryList = $this->getCountryList();

        $this->render('add',array('model'=>$model,'roleList'=>$roleList,'countryList'=>$countryList));
    }

    //This is delete function
    public function actionDel(){
        $id = $_REQUEST['id'];
        $model = new UserManager();

        $res = $model->deleteByPk($id);
        $this->redirect(Yii::app()->request->baseUrl."/user/admin/user"); 
    }

    //This is bulk delete
    public function actionDeleteall()
    {
        $model = new UserManager();
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

        $model = new UserManager();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updatetable($data);
        }

        echo 1;
    }


    //This is for Toggle action
    public function actionToggle($id)
    {
        $model = new UserManager();
        $model->updatestatus($id);
        echo $id;

    }

    //This is for Toggle action
    public function actionGenderToggle($id)
    {
        $model = new UserManager();
        $model->updategender($id);
        echo $id;

    }

    //This is for edit field
    public function actionEditableSaver()
    {
        $model = new UserManager();
        $model->updatetable($_POST);
    }

    // This is for update
    public function actionUpdate($id)
    {
        $model = new UserManager();
        $result = $model->fetchdetail($id);
        $roleRel = new UserRoleRelation();
        $selOptions = array();
        $prevRole = array();

        $selRoleList2 = $roleRel->findAll('user_id ='.$id);

        if(count($selRoleList2) > 0){
            foreach($selRoleList2 as $row){
                $prevRole[] = $row['user_id'];
                $selOptions[$row['role_id']] =array('selected'=>'selected');
            }
        }



        if(count($_POST)>0)
        {


            $result->attributes=$_POST['UserManager'];   

            if($result->validate())
            {
                $model->updatedetails($id);

                $role = $_POST['UserManager']['role'];




                $roleRel->deleteAllByAttributes(array('user_id'=>@$prevRole));

                $roleRel->addRole($id,$role);
                /*        this is for sending emails */
                $mail = new YiiMailMessage();

                $content= '<strong style="color:#167db3;">Your profile info have been updated by Admin.</strong>';

                $mail->addTo(@$_POST['UserManager']['email']);
                $mail->from = ('info@azcowtown.com');
                $mail->setSubject('Update Profile Info');
                $mail->setBody($content, 'text/html');

                Yii::app()->mail->send($mail);

                $this->redirect(Yii::app()->request->baseUrl."/user/admin/user");
            }
        }




        $roleList = $this->getUserRole();
        $countryList = $this->getCountryList();

        $this->render('edit',array('model'=>$result,'prevRole'=>$prevRole,'roleList'=>$roleList,'countryList'=>$countryList,'selOptions'=>$selOptions));
    }

    //This is get role Array from role manager
    public static function getUserRole(){
        $model = new UserRoleManager();
        $res = $model->findAll("is_active = 1");

        $arr = array();
        foreach($res as $row){
            $arr[$row['id']] = $row['name'];
        }

        return $arr;
    }

    //This is get country list array from country table
    public static function getCountryList(){
        $model = new Country();

        $res = $model->findAll();

        $arr[''] = "Select A Country";
        foreach($res as $row){
            $arr[$row['id']] = $row['s_name'];
        }

        return $arr;
    }

    //This is get State list in coutry wise aray from state table 
    public function getStateList($id=0){
        $model = new State();

        $res = $model->findAll('i_cnt_id = '.$id);

        $arr = array();
        foreach($res as $row){
            $arr[$row['id']] = $row['s_st_name'];
        }

        return $arr;
    }

    //Get ajax function to get state list
    public function actionGetState(){
        $con_id = intval($_POST['con']);
        $state_id = intval($_POST['state_id']);

        $res = $this->getStateList($con_id);


        $html = "<option value=\"\">Select A State</option>";


        foreach($res as $key=>$val){
            $str = "";
            if($state_id == $key){
                $str = "selected=\"selected\"";
            }
            $html .="<option ".$str." value=\"".$key."\">".$val."</option>";
        }

        echo $html;



    }

    //This is get role list for renderPrtial
    public function actionRoleListing(){

        $model = new UserRoleRelation('search');

        $result = $model->getUserRole(13);

        if(isset($_GET['UserRoleRelation']))
        {
            $model->role_id = $_GET['UserRoleRelation']['role_id'];   
            $model->description = $_GET['UserRoleRelation']['description'];   

        }

        $this->render('rolelist',array('model'=>$model,'result'=>$result));
    }

    function actionGetRenderRole($id){
        $model = new UserRoleRelation('search');

        $result = $model->getUserRole($id);

        $this->renderPartial('rolelist', array(
        'id' => $id,
        'gridDataProvider' => $result
        ));
    }

    function actionGetRole(){
        $id = $_POST['id'];
        $model = new UserRoleRelation();
        $result = $model->getrole($id);

        $flag =0;
        foreach($result as $row){
            if($row['role_id'] == 9){
                $flag = 1;
                break;
            }
        }

        if($flag==1){
            echo $id;
        }else{
            echo 0;
        }


    }

    //This function for change password
    function actionChangePass(){

        $ret = array();

        $model = new UserManager('cngpass');

        $model->attributes=$_POST['UserManager'];
        if($model->validate()){
            $res = $model->findAll('id='.$_POST['id']);

            /*        this is for sending emails */
            $mail = new YiiMailMessage();

            $content= '<strong style="color:#167db3;">Website Admin has changed your password successfully !</strong><br /><br /><strong style="color:#167db3;">Email : </strong><span style="color:#167db3;">'.@$res[0]['email'].'</span><br /><strong style="color:#167db3;">Password : </strong><span style="color:#167db3;">'.@$_POST['UserManager']['password'].'</span><br /><br />Please <a href="'.Yii::app()->getBaseUrl(true).'/login">Click Here</a> to log in.';

            $mail->addTo('samsujj@gmail.com');
            $mail->addTo(@$res[0]['email']);
            $mail->from = ('info@azcowtown.com');
            $mail->setSubject('Changed Password');
            $mail->setBody($content, 'text/html');

            Yii::app()->mail->send($mail);

            $model->changepass($_POST['id'],$_POST['UserManager']);

            $ret['msg']="success";
            $ret['val'] = '';
        }else{
            $ret['msg']="error";
            $ret['val'] = CActiveForm::validate($model);
        }
        echo json_encode($ret);



    }

    public function actionRenderNote(){
        $id = $_POST['id'];

        $model2 = new UserNotes();
        $this->renderPartial('notes',array('model'=>$model2,'id'=>$id));
    }

    public function actionAddnote(){
        $model = new UserNotes();
        $data['user_id'] = $_POST['uid'];
        $data['notes'] = $_POST['UserNotes']['notes'];
        $model->addnote($data);

        echo $data['user_id'];
    }

    public function actionaddnoteform(){
        $model3 = new UserNotes();
        $this->renderPartial('add_note',array('model'=>$model3));
    }

    public function actionAddnote1(){

        $ret = array();
        $model = new UserNotes();
        //$this->performAjaxValidation($model,'email-form');
        $model->attributes=$_POST['UserNotes'];
        if($model->validate()){
            $data['user_id'] = $_POST['uid'];
            $data['notes'] = $_POST['UserNotes']['notes'];
            $model->addnote($data);
            $ret['msg']="success";
            $ret['val'] = $data['user_id'];
        }else{
            $ret['msg']="error";
            $ret['val'] = CActiveForm::validate($model);
        }
        echo json_encode($ret);
    }

    public function actiondelNote(){
        $id = $_POST['noteid'];
        $model = new UserNotes();

        $res = $model->findAll('id = '.$id);
        $model->deleteByPk($id);
        echo $res[0]['user_id'];
    }

    public function actiongetLPageList(){
        $arr = array();
        $res = LandingPage::model()->findAll('isactive=1');

        if(count($res)){
            foreach($res as $row){
                $arr[$row['id']] = $row['name'];
            }
        }

        echo json_encode($arr);
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

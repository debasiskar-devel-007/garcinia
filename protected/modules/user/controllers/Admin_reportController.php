<?php

class Admin_reportController extends MyController
{
    public function init(){
        Yii::app()->theme = 'admin';
    }
    public function actionIndex()
    {
        $this->redirect(Yii::app()->BaseUrl.'/user/admin/report/listing');
    }

    //This is listing function
    public function actionListing(){
        $model = new AffiliatePerClick('search');
        $model->fromdate = 0;
        $model->todate = time();
        if(isset($_GET['AffiliatePerClick']))
        {

            $model->fullname = $_GET['AffiliatePerClick']['fullname'];
            $model->page_id = $_GET['AffiliatePerClick']['page_id'];   
            $model->ip_address = $_GET['AffiliatePerClick']['ip_address'];
            if(!empty($_GET['AffiliatePerClick']['fromdate']))
            $model->fromdate = @strtotime(str_replace('-','/',$_GET['AffiliatePerClick']['fromdate'])." 0:0:0");
            if(!empty($_GET['AffiliatePerClick']['todate']))
            $model->todate = @strtotime(str_replace('-','/',$_GET['AffiliatePerClick']['todate']). " 23:59:59");
            //var_dump($model);
            //exit;
        }

        $page_set = array(""=>"Select Page",1=>'Home Page',2=>'Landing Page');
        
        $this->render('index',array('model'=>$model,'page_set'=>$page_set));
    }

    //This is add function
    public function actionAdd(){
        $model = new UserManager('add');

        if(count($_POST)>0)
        {   


            $model->attributes=$_POST['UserManager'];   
            if($model->validate())
            {
                $insertid = $model->saveproduct();

                $role = $_POST['UserManager']['role'];

                $roleRel = new UserRoleRelation();

                $roleRel->addRole($insertid,$role);

                /*        this is for sending emails */
                $mail = new YiiMailMessage();
                //$params              = array();

                //$mailbody = "You have been added successfully by Admin as an user.";

                $content= '<strong style="color:#167db3;">You have been added successfully by Admin as an user.</strong><br /><br /><strong style="color:#167db3;">Your credentials are listed below:</strong><br /><br />E-Mail: <span style="color:#167db3;">'.@$_POST['UserManager']['email'].'</span><br />Password: <span style="color:#167db3;">'.@$_POST['UserManager']['password'].'</span><br />';
                $params              = array('content'=>$content);
                $mail->view = "newsletter";


                $mail->addTo(@$_POST['UserManager']['email']);
                $mail->from = ('info@hagenhunting.com');
                $mail->setSubject('User Sign Up');
                $mail->setBody($params, 'text/html');

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
        $selRoleList2 = $roleRel->findAll('user_id ='.$id);

        if(count($selRoleList2) > 0){
            foreach($selRoleList2 as $row){
                $prevRole[] = $row['user_id'];
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

                $this->redirect(Yii::app()->request->baseUrl."/user/admin/user");
            }
        }




        $roleList = $this->getUserRole();
        $countryList = $this->getCountryList();

        $this->render('edit',array('model'=>$result,'roleList'=>$roleList,'countryList'=>$countryList));
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
        $model = new UserManager('cngpass');

        if(count($_POST)>0)
        {
            $model->changepass($_POST['id'],$_POST['UserManager']);
        }
        $this->redirect(Yii::app()->request->baseUrl."/user/admin/user");
    }

    public function actionRenderNote(){
        $id = $_POST['id'];

        $model2 = new UserNotes();
        $this->renderPartial('notes',array('model'=>$model2,'id'=>$id));
    }

    public function actionAddnote(){
        $model = new UserNotes();
        //var_dump($_POST);
        if(count($_POST)>0)
        {
            $data['user_id'] = $_POST['uid'];
            $data['notes'] = $_POST['UserNotes']['notes'];
            $model->addnote($data);
        }
        $this->redirect(Yii::app()->request->baseUrl."/user/admin/user");
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
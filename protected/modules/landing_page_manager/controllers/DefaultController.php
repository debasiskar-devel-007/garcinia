<?php

class DefaultController extends Controller
{
    
    public function init()
    {
       yii::app()->theme='landing';
        //Yii::import('application.modules.user.models.UserManager');
        
    }
    public function actionIndex()
    {
       $model = new LandingPageDetails();
        
        $state = $this->getStateList(254); 
        
        if(count($_POST)>0){
            $model->attributes=$_POST['LandingPageDetails'];
            if($model->validate()){
                $model->affiliate_code =  isset(Yii::app()->request->cookies['affliate_code']) ? Yii::app()->request->cookies['affliate_code']->value : '';
                $model->save();
                $this->redirect(Yii::app()->getBaseUrl(true));
            }
        }
        
        if(isset(Yii::app()->request->cookies['affliate_code'])){

            $this->set_cookie_perclick(Yii::app()->request->cookies['affliate_code'],2);
        }

        $this->render('index');
        
    }
    
        //This is get State list in coutry wise aray from state table 
    public function getStateList($id=0){
        $model = new State();

        $res = $model->findAll('i_cnt_id = '.$id);

        $arr[""] = "Select State";
        foreach($res as $row){
            $arr[$row['s_st_iso']] = $row['s_st_iso'];
        }

        return $arr;
    }
    
    //Insert cookie id in Database in per click
    public function set_cookie_perclick($id=0,$page=1){
        $model = new AffiliatePerClick();
        
        
        $aff_id = (string)$id;
        
        $res = UserManager::model()->fetchdetail($aff_id);
        
        $cpc = $res['cpc'];
        
        
        
        $model->affiliate_code = $aff_id;
        $model->page_id = $page;
        $model->ip_address = Yii::app()->request->getUserHostAddress();
        $model->time = time();
        $model->cpc_rate = $cpc;

        $model->save();
    } 


}
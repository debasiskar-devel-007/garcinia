<?php

class DefaultController extends Controller
{
    
    public function init()
    {
       yii::app()->theme ='newfrontend'; 
        
    }
	public function actionIndex()
	{
        $model = new Blog();
        $this->pageTitle="Blog";
        $res=$model->fetch();
        
		$this->render('index',array('res'=>$res));
	}
    
        public function actiondetails($id=0)
    {
        
        $id = $_GET['id'];
        
        $model = new Blog();
        
        $res = $model->fetchdata($id);
        $this->pageTitle = "Blogdetails || ".Yii::app()->params['site_url']; 
        $this->render('news',array('model'=>$res));
    }
}
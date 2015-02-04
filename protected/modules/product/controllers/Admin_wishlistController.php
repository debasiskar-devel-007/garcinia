<?php

class Admin_wishlistController extends MyController
{

    public function init()
    {
        $this->pageTitle= "Wishlist Manager";//set page title here
        yii::app()->theme='admin';//set theme for this controller
        return true; 
    }

    public function actionIndex()
    {

         $model = new Whislist('search');
        if(isset($_GET['Whislist']))
        {
            $model->fullname=$_GET['Whislist']['fullname'];
            $model->productname=$_GET['Whislist']['productname'];
        }

        $this->render('index',array('model'=>$model));

    }

}
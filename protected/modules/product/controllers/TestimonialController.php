<?php

class  TestimonialController extends MyController
{
    public function init(){
        Yii::app()->theme = 'cow';
        $this->pageTitle = "Product";
        //Yii::import('application.modules.user.models.UserManager');
        //Yii::import('application.modules.gallery.models.Gallery');


    }

    public function actionindex(){

       $this->render('index');

    }


  }
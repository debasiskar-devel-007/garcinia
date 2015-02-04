<?php

class AdminController extends Controller
{
	/**
	 * Declares class-based actions.
	 */


     public function init()
     {
         
         yii::app()->theme='admin';
        return true;
         
     }
     
	public function actionIndex()
	{
        echo 1;
		$this->render('index');
	}



}
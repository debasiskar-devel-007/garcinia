<?php

class NewController extends Controller
{
    
    public function init(){
        
        yii::app()->theme='cow';
    }
	public function actionIndex()
	{
		$this->render('index');
	}
}
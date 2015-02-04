<?php

class  WishlistController extends MyController
{
    public function init(){
        Yii::app()->theme = 'cow';
        $this->pageTitle = "Product";
        //Yii::import('application.modules.user.models.UserManager');
        //Yii::import('application.modules.gallery.models.Gallery');


    }


    //Insert cookie id in Database in per click
    public function actionAdd(){

        $product_id=$_POST['id']; 
        $user_id=$_POST['user']; 
        $model = new Whislist();
        $res=$model->checkwish($product_id,$user_id);
        if($res==0)
        {
            echo 0;   

        }
        else
        {
            $model->user_id = $user_id;
            $model->product_id = $product_id;
            $model->isactive =1;
            $model->is_added=0; 
            $model->is_deleted=0; 

            $model->time = time();

            $model->save();
            $c=$model->countwish1($user_id);
            echo $c;
            //exit;
        }
    } 

    public function actiondel(){
        $product_id=$_POST['id']; 
        $user_id=$_POST['user']; 
        $wish_id=$_POST['wishlistid']; 
        $model = new Whislist();

        $model->updateByPk($wish_id,array('isactive'=>0,'is_added'=>0,'is_deleted'=>time()));

        $c=$model->countwish1($user_id);
        echo $c;

    }

    public function actioncarttowishlist(){
        $sess = Yii::app()->session['sess_user'];
        $user_id = intval(@$sess['id']);

        $product_id = intval($_POST['id']);

        $model = new Whislist();
        $res=$model->checkwish($product_id,$user_id);
        if($res!=0)
        {
            $model->user_id = $user_id;
            $model->product_id = $product_id;
            $model->isactive =1;
            $model->is_added=0; 
            $model->is_deleted=0; 

            $model->time = time();

            $model->save();
           
        }
        
        $cart = Yii::app()->session['cart'];

        unset($cart[$product_id]);

        Yii::app()->session['cart'] = $cart;
    }

}
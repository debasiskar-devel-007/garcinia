<?php

class Shopping_cartController extends MyController
{
    public function init(){
         Yii::app()->theme = 'cow';  
        
        $this->pageTitle = "Cart Listing";

    }

    public function actionIndex()
    {
        
        //$this->redirect(Yii::app()->getBaseurl(true).'/product/checkout/');
        
        $cart = Yii::app()->session['cart'];
        
        $model = new Product();
        $this->render('index',array('model'=>$model));
    }

    public function actionAdd(){
        $id = intval($_POST['id']);
        
        $sess = Yii::app()->session['sess_user'];
        $user_id = intval(@$sess['id']);
        
        $res = Product::model()->findAll('productid ='.$id);
        $proprice = $res[0]['productprice'];
        
        /*if(isset($_POST['autoship']) && $_POST['autoship']){
            $autoship = Yii::app()->session['autoship'];
            $autoship[$id] = 1;
            Yii::app()->session['autoship'] = $autoship; 
        } */
        
        $quan = 1;
        if(isset($_POST['quan'])){
           $quan = intval($_POST['quan']); 
        }
        if($quan == 0){
            $quan = 1;
        }
      

        if($id > 0){


            $cart = Yii::app()->session['cart'];
            $cart[$id] = $quan;
            Yii::app()->session['cart'] = $cart;
            
            $cart = Yii::app()->session['cart'];
            
            $cartprice = Yii::app()->session['cart_price'];
            $cartprice[$id]['price'] = $proprice;
            //added ship here

            //$cartprice[$id]['size'] = "";
            Yii::app()->session['cart_price'] = $cartprice;
            

            $nocart = (count($cart))?count($cart):0;
            
            //wishlist
            if($user_id > 0){
                $wishlist = Whislist::model()->findAll('user_id='.$user_id.' AND product_id='.$id.' AND isactive=1');
                $wishid =@$wishlist[0]['id'];
                Whislist::model()->updateByPk($wishid,array('isactive'=>0,'is_added'=>time(),'is_deleted'=>0));
            }
            

           echo $nocart;

        } else{
           echo 0;
        }

    }

    public function actionDel(){
        $id = intval($_POST['id']);

        $cart = Yii::app()->session['cart'];

        unset($cart[$id]);

        Yii::app()->session['cart'] = $cart;
        
            $cartprice = Yii::app()->session['cart_price'];
            unset($cartprice[$id]);
            Yii::app()->session['cart_price'] = $cartprice;

        //$this->redirect(Yii::app()->request->baseUrl.'/Productmanagement/cart/');
    }

    public function actionUpdate(){
        $id = intval($_POST['id']);
        $quan = intval($_POST['quan']);

        $model1=new ProductStock();
        $res=$model1->availstock($id);
        $a_stock=$res[0]['avail_stock'];

        if(intval($a_stock)>=$quan){


            $cart = Yii::app()->session['cart'];

            $cart[$id] = $quan;

            Yii::app()->session['cart'] = $cart;

            $cart = Yii::app()->session['cart'];

            echo 1;
        }else{
            echo $a_stock;
        }

        // $this->redirect(Yii::app()->request->baseUrl.'/Productmanagement/cart/');
    }
    
    public function actionaddsize(){
        $id = $_POST['product_id'];
        $price = $_POST['price'];
        //$size = $_POST['size'];

            $cartprice = Yii::app()->session['cart_price'];
            $cartprice[$id]['price'] = $price;
            //$cartprice[$id]['size'] = $size;
            Yii::app()->session['cart_price'] = $cartprice;
        
        
        
    }


}
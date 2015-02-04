<?php

class  Landing_productController extends MyController
{
    public function init(){
        Yii::app()->theme = 'admin';
        $this->pageTitle = "Landing Product";
        //Yii::import('application.modules.user.models.UserManager');
        //Yii::import('application.modules.gallery.models.Gallery');


    }

    public function actionGetAssetsUrl(){
        //Yii::app()->getModule('ProductModule')->getAssetsUrl();
        $res = $this->module->getAssetsUrl();
        echo $res;
    }

  public function actionIndex(){
      $this->redirect(Yii::app()->getBaseUrl(true)."/product/landing-product/listing");
  }

    public function actionListing(){
        $model= new LandingProductRelation('search');
        if(isset($_GET['LandingProductRelation']))//this is use for searching in the listing page
        {
            $model->shipping_id=$_GET['LandingProductRelation']['shipping_id'];
            $model->product_name=$_GET['LandingProductRelation']['product_name'];
            $model->product_id=$_GET['LandingProductRelation']['product_id'];
            $model->landing_id=$_GET['LandingProductRelation']['landing_id'];
            $model->product_type=$_GET['LandingProductRelation']['product_type'];
        }


        $res=LandingPage::model()->findAll('isactive=1');
        $res1=Product::model()->findAll('isactive=1');
        $arr[""] = "All Landing Page";
        foreach($res as $row){
            $arr[$row['id']] = $row['name'];
        }
        $arr1[""] = "All Product";
        foreach($res1 as $row){
            $arr1[$row['productid']] = $row['productname'];
        }



        $this->render('listing',array('model'=>$model,'arr'=>$arr,'arr1'=>$arr1));
    }

  public function actionadd_product(){

    $model= new LandingProductRelation();



    if(count($_POST)){
        $model->attributes=$_POST['LandingProductRelation'];
        if($model->validate())
        {
            $model->save();
            $this->redirect(Yii::app()->getBaseUrl(true)."/product/landing-product/listing");
        }
    }


      $res=LandingPage::model()->findAll('isactive=1');
      $res1=Product::model()->findAll('isactive=1');
      $arr[""] = "Select Landing Page";
      foreach($res as $row){
          $arr[$row['id']] = $row['name'];
      }

      $arr1[""] = "Select Product";

      foreach($res1 as $row){
          $arr1[$row['productid']] = $row['productname'];
          $arrtype[$row['productid']] = $row['product_type'];

      }


$this->render('add',array('model'=>$model,'arr'=>$arr,'arr1'=>$arr1,'arrtype'=>$arrtype));

  }

    public function actionFetchpro(){
       $proid= $_POST['proid'];
        $res=Product::model()->findAll('productid='.$proid);
        //var_dump($res);

       //$model= new Product();
        //$model->fetchproduct($proid);

        foreach($res as $r){

         $arr['productprice']=$r['productprice'];
         $arr['productdesc']=$r['productdesc'];
         $arr['productname']=$r['productname'];

        }

        echo json_encode($arr);

    }

    public function actionFetchimg(){

        $id=$_POST['proid'];

      $resimg=ProductImage::model()->findAll('product_id='.$id);
        //var_dump($resimg);
        $arrimg = array();
        foreach($resimg as $r){

         $arrimg[]=$r['image_name'];

       }
        echo json_encode($arrimg);

    }

    //This is for Toggle action
    public function actionToggle($id)
    {
        $model = new LandingProductRelation();
        $model->updatestatus($id);
        $res = $model->findAll('id='.$id);

        echo $res[0]['isactive'];

    }

    //This is bulk status update
    public function actionBulkupdate(){
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new LandingProductRelation();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updateByPk($data['pk'],array($data['name']=>$data['value']));
        }

        echo 1;
    }

    //This is bulk delete
    public function actionDeleteall()
    {
        $model = new LandingProductRelation();
        $x=explode(",",$_POST['ids']);
        foreach($x as $val)
        {
            $model->deleteByPk($val);
        }
    }

    //This is delete function
    public function actionDel(){
        $id = $_REQUEST['id'];
        LandingProductRelation::model()->deleteByPk($id);
        $this->redirect(Yii::app()->getBaseUrl(true)."/product/landing-product/listing");
    }
    // This is for update
    public function actionUpdate($id)
    {
        $model = new LandingProductRelation();
        $result = $model->findByPk($id);
        if(count($_POST)>0)
        {


            $result->attributes=$_POST['LandingProductRelation'];

            if($result->validate())
            {
                $model->updateByPk($id,$result->attributes);
                $this->redirect(Yii::app()->getBaseUrl(true)."/product/landing-product/listing");
            }


        }
        $res=LandingPage::model()->findAll('isactive=1');
        $res1=Product::model()->findAll('isactive=1');
        $arr[""] = "Select Landing Page";
        foreach($res as $row){
            $arr[$row['id']] = $row['name'];
        }

        $arr1[""] = "Select Product";

        foreach($res1 as $row){
            $arr1[$row['productid']] = $row['productname'];
            $arrtype[$row['productid']] = $row['product_type'];

        }
        $this->render('edit',array('model'=>$result,'arr'=>$arr,'arr1'=>$arr1,'arrtype'=>$arrtype));
    }

    public function actionfetchlanding(){


        $id = $_POST['id'];
        $res = array();

        $r = LandingProductRelation::model()->findAll('id='.$id);

        if(count($r) > 0){
            $res['id'] = $r[0]['product_id'];
            $res['name'] = $r[0]['product_name'];
            $res['price'] = $r[0]['product_price'];
            $res['desc'] = $r[0]['product_desc'];
            $res['quan'] = $r[0]['quantity'];
            $s = ShippingCharge::model()->findAll('id='.$r[0]['shipping_id']);

            $sess=yii::app()->session['offerval'] ;
            if(intval($sess)){
            if($sess==1){

                $pr=$s[0]['shipping_charge']/2;
            }
            else
            {
                $pr=$s[0]['shipping_charge']/4;

            }
            }
            else
            {
                $pr=$s[0]['shipping_charge'];

            }


            $res['ship_charge'] = @$s[0]['shipping_charge'];
            $res['modified_ship_charge'] = @$pr;
            $p = Product::model()->findAll('productid='.$r[0]['product_id']);
            $res['o_name'] = @$p[0]['productname'];
        }
        echo json_encode($res);
    }



}
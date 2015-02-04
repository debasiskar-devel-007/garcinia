<?php

/**
* This is the model class for table "product".
*
* The followings are the available columns in table 'product':
* @property string $productid
* @property string $productname
* @property string $productdesc
* @property string $catagoryid
* @property integer $isactive
* @property double $productprice
* @property string $createdon
* @property string $priority
*/
class Product extends CActiveRecord
{
    /**
    * @return string the associated database table name
    */
    public $productimage;
    public $product_type;
    //public $product;
    public $file_name;
    public $original_name;
    public $product_info;
    public $product_guarantee;
    public $product_features;
    public $product_descdetail;
    public $brand_info;
    public $wishlistid;
    public $avail_stock;
    public $is_color;
    public $is_size;
    public $image;

    public function tableName()
    {
        return 'product';
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('productname, productdesc, catagoryid, productprice, priority,product_type', 'required'),
        array('isactive', 'numerical', 'integerOnly'=>true),
        array('productprice', 'numerical'),
        array('productname', 'length', 'max'=>255),
        array('catagoryid, priority', 'length', 'max'=>255),
        array('image', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, productname, productdesc, catagoryid, isactive, productprice, priority,product_type', 'safe', 'on'=>'search'),
        );
    }

    /**
    * @return array relational rules.
    */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
    * @return array customized attribute labels (name=>label)
    */
    public function attributeLabels()
    {
        return array(
        'productid' => 'Productid',
        'productname' => 'Product Name',
        'productdesc' => 'Productdesc',
        'catagoryid' => 'Catagory',
        'isactive' => 'Status',
        'productprice' => 'Product Price',
        'createdon' => 'Createdon',
        'priority' => 'Priority',
        'is_color' => 'Color?',
        'is_size' => 'Size?',
        );
    }

    /**
    * Retrieves a list of models based on the current search/filter conditions.
    *
    * Typical usecase:
    * - Initialize the model fields with values from filter form.
    * - Execute this method to get CActiveDataProvider instance which will filter
    * models according to data in model fields.
    * - Pass data provider to CGridView, CListView or any similar widget.
    *
    * @return CActiveDataProvider the data provider that can return the models
    * based on the search/filter conditions.
    */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        //$criteria=new CDbCriteria;
        $criteria=new CDbCriteria;
        $criteria->join = 'LEFT JOIN catagory  cat  ON cat.id = t.catagoryid '; 
        $criteria->select = 'cat.categoryname as catagoryid,t.catagoryid as catid,t.productid,t.productname,t.isactive,t.productprice,t.createdon,t.priority,t.product_type,t.sqnumber';
       // $criteria->order = "t.priority desc";
        $criteria->together = true; 

        $criteria->compare('productid',$this->productid,true);
        $criteria->compare('t.productname',$this->productname,true);
        //$criteria->compare('productdesc',$this->productdesc,true);
        $criteria->compare('t.catagoryid',$this->catagoryid,true);
        //$criteria->compare('isactive',$this->isactive);
        $criteria->compare('t.productprice',$this->productprice,true);
        //$criteria->compare('t.createdon',$this->createdon,true);
        $criteria->compare('t.priority',$this->priority,true);
        $criteria->compare('t.product_type',$this->product_type,true);
        $criteria->compare('t.sqnumber',$this->sqnumber,true);


        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        'pagination' => array(
        'pageSize' => 10,
        ),
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return Product the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function fetchdata($chk=0)
    {
        $conn = yii::app()->db;
        if($chk == 1){
            $sql="select id,categoryname from catagory where isactive=1";
        }else{
            $sql="select id,categoryname from catagory";
        }
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;
    }

    public function saveproduct()
    {

        $this->file_name=$_POST['Product']['file_name'];
        $this->sqnumber=$_POST['Product']['sqnumber'];
        $this->original_name=$_POST['Product']['original_name'];
        $this->product_info=$_POST['Product']['product_info'];
        $this->product_guarantee=$_POST['Product']['product_guarantee'];
        $this->product_features=$_POST['Product']['product_features'];
        $this->product_features=$_POST['Product']['product_features'];
        $this->product_descdetail=$_POST['Product']['product_descdetail'];
        $this->brand_info=$_POST['Product']['brand_info'];
        $this->save();//it will save the post value to the databaser

        return $this->productid;

    }
    //for inline edit
    public function updatetable($post)
    {
        $this->updateByPk($post['pk'],array($post['name']=>$post['value']));
    }
    //fetch product description from product table
    public function fetchdesc($id)
    {
        $res=$this->findAllByPk($id);
        return($res);
    }
    
        public function fetchdesc1($id)
    {
        $res=$this->findAllByPk($id);
        return($res);
    }

    //function for change status

    public function updatestatus($id)
    {
        $i=$id;
        $tablename=$this->tableName();
        $pk='productid';
        $attribute='isactive';
        $command=  yii::app()->db->createCommand('call common2("'.$tablename.'","'.$attribute.'","'.$pk.'",'.$id.')');
        $command->execute();
    }


    public function deletefun($productid)
    {
        $this->deleteByPk($productid);
    }

    public function updatedetails($id)
    {
        $productname = $_POST['Product']['productname'];
        $sq = $_POST['Product']['sqnumber'];
        $productdesc = $_POST['Product']['productdesc'];
        $product_type = $_POST['Product']['product_type'];
        $file_name = $_POST['Product']['file_name'];
        $original = $_POST['Product']['original_name'];

        //$productimage = $_POST['Product']['productimage'];
        $catagoryid = $_POST['Product']['catagoryid'];
        $isactive = $_POST['Product']['isactive'];
        $productprice = $_POST['Product']['productprice'];
        $product_info = $_POST['Product']['product_info'];
        $product_guarantee = $_POST['Product']['product_guarantee'];
        $product_features = $_POST['Product']['product_features'];
        $product_descdetail = $_POST['Product']['product_descdetail'];
        
        $brand_info = $_POST['Product']['brand_info'];

        $this->updateByPk($id,array('productname'=>$productname,'productdesc'=>$productdesc,'catagoryid'=>$catagoryid,'isactive'=>$isactive,'productprice'=>$productprice,'product_type'=>$product_type,'file_name'=>$file_name,'original_name'=>$original,'product_info'=>$product_info,'product_guarantee'=>$product_guarantee,'product_features'=>$product_features,'product_descdetail'=>$product_descdetail,'brand_info'=>$brand_info,'sqnumber'=>$sq));
    }
    public function fetchdetail($id)
    {
        $res=$this->findByPk($id);
        return $res;

    }

    public function fetchcat()
    {
        $conn = yii::app()->db;
        $sql="select categoryname,id from  catagory";
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();    // for select we will have to use queryAll(), but for update delete insert we will have to use execute. 
        return $result;

    }

    public function frontList($page="")
    {

        $criteria=new CDbCriteria;
        $criteria->join = 'LEFT JOIN product_image  ON product_image.product_id = t.productid '; 
        $criteria->select = 't.*,product_image.image_name as productimage,((SELECT SUM(stock) FROM product_stock as p WHERE p.type=1 GROUP BY p.product_id HAVING p.product_id = t.productid)-(SELECT SUM(stock) FROM product_stock as p WHERE p.type=2 GROUP BY p.product_id HAVING p.product_id = t.productid)) as avail_stock';
        $criteria->condition = "t.isactive = 1";
/*        if($page == "home"){
            $criteria->order = "RAND()";
            $criteria->limit  = 3;
        } */
        $criteria->group = "t.productid"; 
        $criteria->together = true; 



        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        'pagination' => false
        ));
    }
    
    public function wishlist($user_id=0)
    {

        $criteria=new CDbCriteria;
        $criteria->join = 'LEFT JOIN product_image  ON product_image.product_id = t.productid INNER JOIN whislist  ON whislist.product_id = t.productid WHERE whislist.user_id='.$user_id.' AND whislist.isactive=1'; 
        $criteria->select = 't.*,product_image.image_name as productimage,whislist.id as wishlistid,((SELECT SUM(stock) FROM product_stock as p WHERE p.type=1 GROUP BY p.product_id HAVING p.product_id = t.productid)-(SELECT SUM(stock) FROM product_stock as p WHERE p.type=2 GROUP BY p.product_id HAVING p.product_id = t.productid)) as avail_stock';
        //$criteria->condition = "t.isactive = 1";
/*        if($page == "home"){
            $criteria->order = "RAND()";
            $criteria->limit  = 3;
        } */
        $criteria->group = "t.productid"; 
        $criteria->together = true; 



        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        'pagination' => false
        ));
    }
    
    
        public function frontList1($id,$page="")
    {

        $criteria=new CDbCriteria;
        $criteria->join = 'LEFT JOIN product_image  ON product_image.product_id = t.productid '; 
        $criteria->select = 't.*,product_image.image_name as productimage,((SELECT SUM(stock) FROM product_stock as p WHERE p.type=1 GROUP BY p.product_id HAVING p.product_id = t.productid)-(SELECT SUM(stock) FROM product_stock as p WHERE p.type=2 GROUP BY p.product_id HAVING p.product_id = t.productid)) as avail_stock';
        $criteria->condition = "t.isactive = 1 And t.catagoryid=".$id;
/*        if($page == "home"){
            $criteria->order = "RAND()";
            $criteria->limit  = 3;
        } */
        $criteria->group = "t.productid"; 
        $criteria->together = true; 



        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        'pagination' => false
        ));
    }
    


    public function cartList($cart=array())
    {
        $pro_array = array_keys($cart);

        $criteria=new CDbCriteria;
        $criteria->join = 'LEFT JOIN product_image  ON product_image.product_id = t.productid '; 
        $criteria->select = 't.*,product_image.image_name as productimage,((SELECT SUM(stock) FROM product_stock as p WHERE p.type=1 GROUP BY p.product_id HAVING p.product_id = t.productid)-(SELECT SUM(stock) FROM product_stock as p WHERE p.type=2 GROUP BY p.product_id HAVING p.product_id = t.productid)) as avail_stock';
        $criteria->addInCondition('t.productid', $pro_array);
        $criteria->group = "t.productid"; 
        $criteria->together = true; 



        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        'pagination' => false
        ));
    }

    public function fetchSingle($id=0){
        $sql = "SELECT * FROM product WHERE productid=".$id;
        $imgsql = "SELECT * FROM product_image WHERE product_id=".$id." ORDER BY id DESC";
        
        $result = yii::app()->db->createCommand($sql)->queryRow();
        $imagelist = yii::app()->db->createCommand($imgsql)->queryAll();
        $result['images'] = $imagelist;
        
        return $result;
        
    }
    
        public function fetchallbycat($id,$catid=0){
 
        
/*                 $conn = yii::app()->db; 
        $sql="SELECT product.productid,product.productname,product.productdesc,product_image.image_name FROM product LEFT JOIN product_image ON product.productid = product_image.product_id where product.catagoryid=".$catid;
        
        $result=$conn->createCommand($sql);
        $result=$result->queryAll();
   
        return $result;  */
        
        
         $criteria=new CDbCriteria;
        $criteria->join = 'LEFT JOIN product_image  ON product_image.product_id = t.productid '; 
        $criteria->select = 't.*,product_image.image_name as productimage,((SELECT SUM(stock) FROM product_stock as p WHERE p.type=1 GROUP BY p.product_id HAVING p.product_id = t.productid)-(SELECT SUM(stock) FROM product_stock as p WHERE p.type=2 GROUP BY p.product_id HAVING p.product_id = t.productid)) as avail_stock';
        $criteria->condition = "t.isactive = 1 And t.catagoryid=".$catid." AND t.productid !=".$id;
/*        if($page == "home"){
            $criteria->order = "RAND()";
            $criteria->limit  = 3;
        } */
        $criteria->group = "t.productid"; 
        $criteria->together = true; 



        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        'pagination' => false
        ));
        
    }
    
    
    
        public function files($id)
    {
        $res=$this->findAllByPk($id);
        return($res);
    }

    public function fetchproduct($id){



    }


}

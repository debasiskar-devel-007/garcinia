<?php

class PageController extends MyController
{
    private $_assetsUrl;


    public function init()
    {
       yii::app()->theme='cow';

        $js_arr = array('common.js','frontend.js','jquery.fancybox.js','flowplayer-3.js','marquee.js','facebox.js'); //put what js file name that you need to import from admin assets folder
        Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets'), false, -1, YII_DEBUG);
        foreach($js_arr as $filename){
            Yii::app()->getClientScript()->registerScriptFile($this->getAssetsUrl().'/js/'.$filename, CClientScript::POS_END);
        }

    }

	public function actionIndex($id1='home')
	{





         $model= new Page();
         
        
        $id=@$_GET['pagename'];
        if(empty($id))
        $id=$id1;
        $this->pageTitle=ucfirst($id);

        //$r=Yii::app()->request->getUrl();
        //$r1=Yii::app()->request->getParams('pagename');
        //echo $id;
         $res=$model->fetchcontent(str_replace("-"," ",$id));
         //var_dump($res);
         //exit;
 
         
        //echo $r;
        //echo $r1;

		$this->render($id,array('res'=>$res));


}


public function getAssetsUrl()
{
    if ($this->_assetsUrl === null)
        $this->_assetsUrl = Yii::app()->getAssetManager()->publish(
            Yii::getPathOfAlias('cms.assets') );
    return $this->_assetsUrl;
}

public function actionPagelink()
{
    $model=new Page();
    $data=$_POST['data'];
    $res=$model->findpage($data);
   echo json_encode($res);
    
    
}

public function GetcontentByid($id,$res)
{
    
    
  foreach($res as $r=>$val)
  {
      
      
    //var_dump($r);
    // echo "</br>";
     //var_dump($val); 
     foreach($val as $v=>$v1)
     {
     //var_dump($v1['content_id']);
     /*echo "v1==".$v1;
     echo "<br>";
     echo "v==".$v;
     echo "<br />";  */
     
     //var_dump($v1);
     if($v1==$id)
     {
     
         return $oldcontent;
         
     }
     $oldcontent=$v1; 
     }
      
  }


    
    
}
//function for range page image gallery
    public function getmultipleFaceboxContent($id,$res,$htmlcontent)
    {

        //var_dump($htmlcontent);
        //exit;
        $html='';
        foreach($res as $r=>$val)
        {


            //var_dump($r);
            // echo "</br>";
            //var_dump($val);
            foreach($val as $v=>$v1)
            {
                //var_dump($v1['content_id']);
                /*echo "v1==".$v1;
                echo "<br>";
                echo "v==".$v;
                echo "<br />";  */

                //var_dump($v1);
                if($v1==$id)
                {

                    //return $oldcontent;
                    $htmlcontent1= yii::app()->getBaseUrl(true).'/uploads/content_image/thumb/'.$oldcontent;
                    $htmlcontent2= yii::app()->getBaseUrl(true).'/uploads/content_image/original/'.$oldcontent;
                    $searchstring= array('htmlcontent1','htmlcontent2');
                    $replacestring= array($htmlcontent1,$htmlcontent2);
                    $html.=str_replace($searchstring,$replacestring,$htmlcontent);
                    //echo $html;


                }

                $oldcontent=$v1;
            }



        }

        return $html;


    }
    
    //for advertising page
    public function getmultipleContent($id,$res,$htmlcontent)
    {

        //var_dump($htmlcontent);
        //exit;
        $html='';
        foreach($res as $r=>$val)
        {


            //var_dump($r);
            // echo "</br>";
            //var_dump($val);
            foreach($val as $v=>$v1)
            {
                //var_dump($v1['content_id']);
                /*echo "v1==".$v1;
                echo "<br>";
                echo "v==".$v;
                echo "<br />";  */

                //var_dump($v1);
                if($v1==$id)
                {

                    //return $oldcontent;
                    $htmlcontent1= yii::app()->getBaseUrl(true).'/uploads/content_image/thumb/'.$oldcontent;
                    //$htmlcontent2= yii::app()->getBaseUrl(true).'/uploads/content_image/original/'.$oldcontent;
                    $searchstring= array('htmlcontent1');
                    $replacestring= array($htmlcontent1);
                    $html.=str_replace($searchstring,$replacestring,$htmlcontent);
                    //echo $html;


                }

                $oldcontent=$v1;
            }



        }

        return $html;


    }
    
    
    
}

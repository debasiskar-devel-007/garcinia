<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webixer
 * Date: 1/28/14
 * Time: 1:46 PM
 * To change this template use File | Settings | File Templates.
 */

class OurUrlRule extends CBaseUrlRule
{
    public $connectionID = 'db';

    public function createUrl($manager,$route,$params,$ampersand)
    {

        if ($route==='car/index')
        {
            if (isset($params['manufacturer'], $params['model']))
                return $params['manufacturer'] . '/' . $params['model'];
            else if (isset($params['manufacturer']))
                return $params['manufacturer'];
        }
        return false;  // this rule does not apply
    }

    public function parseUrl($manager,$request,$pathInfo,$rawPathInfo)
    {
        /* var_dump($request);
         exit;*/
        $arr=explode('/',$pathInfo);
        $info['module']=@$arr[0];
        $info['controller']=@$arr[1];
        $info['action']=@$arr[2];
        //var_dump($info['controller']);
        //var_dump($info['action']);
        //exit;


        if(!$info['controller'] || !$info['action'])
        {
           // echo 9;
            $res=$this->checkcms($info);
            //var_dump($info);
        }
        else
            $res=false;
        //exit;

        if($res && !$info['controller'] && !$info['action']){
            return  $pathInfo ='cms/page/index/pagename/'.$info['module'];
           // var_dump($pathInfo);
           // exit;
        }
        $key = array_search('admin', $arr);
        if($key>0 )
        {
            $nextval=$arr[$key+1];
            //echo $pathInfo;
            //exit;
            return $pathInfo = str_replace('admin/'.$nextval, "admin_".$nextval, $pathInfo);

        }
        else
        {
            return $pathInfo = str_replace('-','_',$pathInfo);
        }

        if (preg_match('%^(\w+)(/(\w+))?$%', $pathInfo, $matches))
        {
            // check $matches[1] and $matches[3] to see
            // if they match a manufacturer and a model in the database
            // If so, set $_GET['manufacturer'] and/or $_GET['model']
            // and return 'car/index'
        }

        return false;  // this rule does not apply
    }

    public function checkcms($data)
    {
        if($data['controller']=='' and $data['action']=='')
        {
            $pagename= $data['module'];

            $pagename=str_replace("-"," ","$pagename");

            $model = new Page($pagename);
            //$res=$model->checkurl("'".$pagename."'");
            $res=$model->checkurl($pagename);
            //$val =$res[0]['count'];

            $val=$res[0]['pagecount'];
            if($val>0)
                return true;
            else
                return false;
        }


    }
}
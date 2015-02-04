<?php
class MyController extends Controller
{


    function init()
    {
        parent::init();
        $app = Yii::app();

        //echo 90;
        //exit;
    }

    public function missingAction($actionID)
    {
        echo 'You are trying to execute action: '.$actionID;
    }
    public function createAction($actionID)
    {

        if($actionID==='')
            $actionID=$this->defaultAction;
        /*echo $actionID;
        echo Yii::app()->controller->module->id  ;
        echo Yii::app()->controller->id;
        exit;*/
        if(method_exists($this,'action'.$actionID) && strcasecmp($actionID,'s')) // we have actions method
            return new CInlineAction($this,$actionID);
        else
        {
            $action=$this->createActionFromMap($this->actions(),$actionID,$actionID);
            if($action!==null && !method_exists($action,'run'))
                throw new CException(Yii::t('yii', 'Action class {class} must implement the "run" method.', array('{class}'=>get_class($action))));
            return $action;
        }
    }
    public function actions()
    {
        return array();
    }

    public function checkcms()
    {

        //echo $actionID;
        echo Yii::app()->controller->module->id  ;
        echo Yii::app()->controller->id;
        exit;

    }



}
?>
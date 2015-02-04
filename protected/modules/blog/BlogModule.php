<?php

class BlogModule extends CWebModule
{
    private $_assetsUrl;
    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
        'blog.models.*',
        'blog.components.*',
        ));
        $this->registerScript();
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

    public function getAssetsUrl()
    {
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(
            Yii::getPathOfAlias('blog.assets') );
        return $this->_assetsUrl;
    }

    protected function registerScript(){
        //exit;
        $js_arr = array('common.js','jquery.uploadify.min.js','facebox.js','image.upload.js');  //put what js file name that you need to import from admin assets folder
        Yii::app()->assetManager->publish(Yii::getPathOfAlias('blog.assets'), false, -1, YII_DEBUG);
        foreach($js_arr as $filename){
            Yii::app()->getClientScript()->registerScriptFile($this->getAssetsUrl().'/js/'.$filename, CClientScript::POS_END);
        }
    }

}

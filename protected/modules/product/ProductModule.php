<?php

class ProductModule extends CWebModule
{
    private $_assetsUrl;
    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
        'product.models.*',
        'product.components.*',
        ));

        $this->registerScript();
        $this->registerCoreCss();
       

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
            Yii::getPathOfAlias('product.assets') );
        return $this->_assetsUrl;
    }


    protected function registerScript(){
        $js_arr = array('colpick.js','common.js','link.js','jquery.uploadify.min.js','facebox.js','image.upload.js','button.js','marquee.js','flowplayer-3.js','jquery.stickyscroll.js','jquery-ui-block.js'); //put what js file name that you need to import from admin assets folder
        Yii::app()->assetManager->publish(Yii::getPathOfAlias('product.assets'), false, -1, YII_DEBUG);
        foreach($js_arr as $filename){
            Yii::app()->getClientScript()->registerScriptFile($this->getAssetsUrl().'/js/'.$filename, CClientScript::POS_END);
        }

    }
    protected function registerCoreCss()
    {
        $css_arr = array(); //put what js file name that you need to import from admin assets folder
        Yii::app()->assetManager->publish(Yii::getPathOfAlias('product.assets'), false, -1, YII_DEBUG);
        foreach($css_arr as $filename){
            Yii::app()->getClientScript()->registerCssFile($this->getAssetsUrl().'/css/'.$filename, CClientScript::POS_END);
        }
    }
    
   

}

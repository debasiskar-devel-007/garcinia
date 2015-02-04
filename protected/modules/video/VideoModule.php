<?php

class VideoModule extends CWebModule
{
	
    private $_assetsUrl;
    public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'video.models.*',
			'video.components.*',
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
                Yii::getPathOfAlias('video.assets') );
        return $this->_assetsUrl;
    }
    
    protected function registerScript(){
        $js_arr = array('common.js','jquery.uploadify.min.js','facebox.js','image_upload.js','flowplayer-3.2.12.min.js','flowplayer.youtube-3.2.11.js'); //put what js file name that you need to import from admin assets folder
        Yii::app()->assetManager->publish(Yii::getPathOfAlias('video.assets'), false, -1, YII_DEBUG);
        foreach($js_arr as $filename){
        Yii::app()->getClientScript()->registerScriptFile($this->getAssetsUrl().'/js/'.$filename, CClientScript::POS_END);
    }
}

    protected function registerCoreCss()
    {
        $css_arr = array(); //put what js file name that you need to import from admin assets folder
        Yii::app()->assetManager->publish(Yii::getPathOfAlias('video.assets'), false, -1, YII_DEBUG);
        foreach($css_arr as $filename){
            Yii::app()->getClientScript()->registerCssFile($this->getAssetsUrl().'/css/'.$filename, CClientScript::POS_END);
        }
    }
}

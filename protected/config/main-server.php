<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Pure Garcinia',
    'defaultController'=>'product',

    // preloading 'log' component
    'preload'=>array('log','bootstrap','image'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'ext.x-editable.*',
        'ext.YiiMailer.YiiMailer',
        'ext.yii-mail.YiiMailMessage',
        'application.extensions.image.*',
        'application.components.*',
        'application.extensions.phpass.PasswordHash',
        //'application.modules.product.models.Product', 
        'application.modules.product.models.*',
        'application.modules.landing_page_manager.models.*',
        'application.modules.product.*',
        'application.modules.ContactusManager.models.Contact',
        'application.modules.ContactusManager.models.Mails',
        'application.modules.Contactus.models.Contact',
        'application.modules.Contactus.models.Contact',
        'application.modules.blog.models.*',
        'application.modules.banner.models.Banner',
        'application.modules.video.models.Video',
        'application.modules.cms.models.Page',
        'application.modules.blog.models.Blog',
        'application.extensions.helpers.*',
        'application.extensions.galleria.*',
        'application.models.Country',
        'application.models.AffiliatePerClick',
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool

        'gii'=>array(
            'generatorPaths' => array(
                'bootstrap.gii'
            ),
            'class'=>'system.gii.GiiModule',
            'password'=>'P@ssword1',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1',$_SERVER['REMOTE_ADDR'],'::1'),
        ),

        'product','user','blog','cms','landing_page_manager','ContactusManager','gallery','aboutus','Contactus','banner','video'

    ),

    // application components
    'components'=>array(

        'phpThumb'=>array(
            'class'=>'ext.EPhpThumb.EPhpThumb',
        ),

        'Paypal' => array(
            'class'=>'application.components.Paypal',
            'apiUsername' => 'debasiskar007-facilitator_api1.gmail.com',
            'apiPassword' => '1404393218',
            'apiSignature' => 'ANJr4hTx0ihdZ4k2X-m-j87oQ88MApK.VuLSo03gicpRYarWtdw2WXq.',
            'apiLive' => false,

            'returnUrl' => 'paypal/confirm/', //regardless of url management component
            'cancelUrl' => 'paypal/cancel/', //regardless of url management component
        ),

        /*    This is for epdf extension for converting a html to pdf */
        'ePdf' => array(
            'class'         => 'ext.yii-pdf.EYiiPdf',
            'params'        => array(
                'mpdf'     => array(
                    'librarySourcePath' => 'application.vendors.mpdf.*',
                    'constants'         => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                    /*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                    'mode'              => '', //  This parameter specifies the mode of the new document.
                    'format'            => 'A4', // format A4, A5, ...
                    'default_font_size' => 0, // Sets the default document font size in points (pt)
                    'default_font'      => '', // Sets the default font-family for the new document.
                    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                    'mgr'               => 15, // margin_right
                    'mgt'               => 16, // margin_top
                    'mgb'               => 16, // margin_bottom
                    'mgh'               => 9, // margin_header
                    'mgf'               => 9, // margin_footer
                    'orientation'       => 'P', // landscape or portrait orientation
                    )*/
                ),
                'HTML2PDF' => array(
                    'librarySourcePath' => 'application.vendors.html2pdf.*',
                    'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                    /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                    'orientation' => 'P', // landscape or portrait orientation
                    'format'      => 'A4', // format A4, A5, ...
                    'language'    => 'en', // language: fr, en, it ...
                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                    'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                    )*/
                )
            ),
        ),


        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),

        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType'=>'smtp',
            'transportOptions'=>array(
                'host'=>'smtpout.secureserver.net',
                'username'=>'developers@the-webdevelopers.com',
                'password'=>'P@ss1234',
                'port'=>80,
                //'encryption'=>'ssl',
            ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false
        ),

        //'assetManager'=>array(
        //   'class'=>'application.components.SafeModeAssetManager',
        //),

        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(

                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                'sign-up' => 'user/default/sign_up',
                'product' => 'product/default/listing',
                'login' => 'user/default/login',
                'logout' => 'user/default/logout',
                'free-shipping' => 'product/default/landing2',
                array(
                    'class' => 'application.components.OurUrlRule',
                    'connectionID' => 'db',
                ),
                ''

            ),
        ),

        'db'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        ),
        // uncomment the following to use a MySQL database

        // This is for localhost

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=garcinia_db',
            'emulatePrepare' => true,
            'username' => 'garcinia_user',
            'password' => 'P@ss1234',
            'charset' => 'utf8',
        ),

// This is for cowtown
        /*
                        'db'=>array(
                            'connectionString' => 'mysql:host=cowdata.db.12016169.hostedresource.com;dbname=cowdata',
                            'emulatePrepare' => true,
                            'username' => 'cowdata',
                            'password' => 'P@ss1234',
                            'charset' => 'utf8',
                        ),
        */
// This is for valescere
        /*
                'db'=>array(
                    'connectionString' => 'mysql:host=localhost;dbname=valescer_maindb',
                    'emulatePrepare' => true,
                    'username' => 'valescer_user',
                    'password' => 'pass@123',
                    'charset' => 'utf8',
                ),
                */

        'editable' => array(
            'class'     => 'ext.editable.EditableConfig',
            'form'      => 'bootstrap',        //form style: 'bootstrap', 'jqueryui', 'plain' 
            'mode'      => 'popup',            //mode: 'popup' or 'inline'  
            'defaults'  => array(              //default settings for all editable elements
                'emptytext' => 'Click to edit'
            )
        ),

        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
        'site_url'=>'Pure Garcinia',
//        'g_loginname'=>'85S9azA6a',
  //      'g_transactionkey'=>'798WunSmf4p7U8MY',
    //    'g_apihost'=>'api.authorize.net',
      //  'g_apipath'=>'/xml/v1/request.api',
        'g_loginname'=>'3y88Jcr5DN5v',
        'g_transactionkey'=>'6944VqsCL9j426eM',
        'g_apihost'=>'apitest.authorize.net',
        'g_apipath'=>'/xml/v1/request.api',
        'pageactive'=>'',
        'product_image_size'=>array(array(700,357)),
        'phpass'=>array(
            'iteration_count_log2'=>8,
            'portable_hashes'=>false,
        ),
    ),


);

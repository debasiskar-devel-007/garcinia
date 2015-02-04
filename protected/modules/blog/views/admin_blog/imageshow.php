<?php if(!empty($data)){ ?>
<div>

    
    <?php
        $this->widget('application.extensions.nivoslider.ENivoSlider', array(
        'htmlOptions'=>array('style'=>'width: 100%; height: 100%;'),
        'images'=>$data,
        )
        );

    ?>
</div>    
<?php }else{ ?>
<div>

    
    <?php
        $this->widget('application.extensions.nivoslider.ENivoSlider', array(
        'htmlOptions'=>array('style'=>'width: 100%; height: 100%;'),
        'images'=>array( //@array images with images arrays.
        array('src'=> Yii::app()->request->baseUrl.'/uploads/press_image/temp/thumb/IMG1.jpg','width'=>'auto','height'=>'auto'), //only display image.
        array('src'=>Yii::app()->request->baseUrl.'/uploads/press_image/temp/thumb/IMG2.jpg','width'=>'auto','height'=>'auto'), //display image and nivo slider caption.
        array('src'=>Yii::app()->request->baseUrl.'/uploads/press_image/temp/thumb/IMG3.jpg','width'=>'auto','height'=>'auto'), //display image with link.
        array('src'=>Yii::app()->request->baseUrl.'/uploads/press_image/temp/thumb/IMG4.jpg','width'=>'auto','height'=>'auto'), //display image with nivo slider caption and link reference.
        ),
        )
        );

    ?>
</div>    
<?php } ?>

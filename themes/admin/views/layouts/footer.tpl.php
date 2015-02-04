 <?php $themeUrl = Yii::app()->theme->baseUrl; 
       $base = Yii::app()->request->baseUrl;
 ?>

     
   <div class="clear"></div>


<!-- Footer Starts -->
<div id="footerHolder">&copy; Copyright Company name. All Rights Reserved.</div>
<!-- Footer Ends -->

</div>

<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'allloadingModal','htmlOptions'=>array('style'=>'text-align:center;display:none;'))
    ); ?>

<div class="modal-body">Loading...<img src="<?php echo $themeUrl;?>/images/loading5.gif" alt="" /></div>
     
    <?php $this->endWidget(); ?>

</body>
</html>
<?php 
$base=yii::app()->request->baseurl;
?>
<!DOCTYPE html>
<html>
<body>
<?php
    $res_order = $model;

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="border:solid 1px #ddd; background:#fefcfc; padding:10px; font-family:Arial, Helvetica, sans-serif;">
        <tr>
          <td colspan="2" style="font-size:12px; color:#333; "><table width="auto" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="7" style="background:#1f1d1d!important; width:650px; height:20px; padding:5px 10px; font-size:14px; color:#fff">Product List :</td>
              </tr>
              <tr>
                <td width="41" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>S.no</strong></td>
                <td width="41" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>image</strong></td>
                <td width="163" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Item name</strong></td>
                <td width="57" style="padding:5px ; border-bottom:solid 1px #ccc;"><strong>Quantity</strong></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Price</strong></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Offer %</strong></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Refund</strong></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Transaction Id</strong></td>

              </tr>
              
              <?php
    if(count($res_order) > 0){
        $i=0;
        foreach($res_order as $row){
?>
              
              <tr>
                <td width="41" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo ++$i;?></td>
                
                <td width="163" style="padding:5px; border-bottom:solid 1px #ccc;"><img src="<?php echo yii::app()->getBaseUrl(true)."/uploads/product_image/thumb/".$row['imagename'] ;?>" style="max-height: 200px; max-width: 200px;" /></td>
                <td width="163" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['product_name'];?></td>
                <td width="57" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['product_quantity'];?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['product_price'];?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['offervalue'];?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo number_format($row['refund_value'],2);?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['transaction_id'];?></td>

                </td>
              </tr>
              <?php
        }}
?>
              
            
        </tr>
        
              </table></td>
  </tr>
</table>

</body>
</html>
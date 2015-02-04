<hi>Autoship Details</hi><br /><br />

<?php
$base=yii::app()->request->baseurl;
//print_r($data);
//exit;

if(count($model) > 0){

foreach($model as $row){

?>
Start Date:<?php echo $row['autoship_startdate'];?><br />
Autoship Status:<?php echo ($row['autoship_status'] == 1)?'Active':'Canceled';?><br />
Subcription Id:<?php echo $row['is_autoship'];?><br />

<?php if($row['autoship_status'] == 1){?><a id="<?php echo $row['is_autoship'];?>" href="javascript:void(0);" rel="tooltip" onclick="cancel_subscription(<?php echo $row['is_autoship'] ?>)" data-original-title="Cancel Autoship">Cancel Autoship</a>
<?php
    }
}}
exit;

?>

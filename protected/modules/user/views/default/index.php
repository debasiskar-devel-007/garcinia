<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<script>
var base_url = '<?php echo Yii::app()->baseurl;?>';
</script>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>

<?php
    echo $this->module->assetsUrl;
    $var = Yii::app()->session['sess_user'];
    print_r($var);
?>
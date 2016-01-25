<h1>this is a test x</h1>
<?php
use yii\helpers\Html;
if (isset($message))
	echo $message;
?>
<br />

<?= Html::encode($message) ?>



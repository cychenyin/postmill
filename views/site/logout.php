<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Logout';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<script type="text/javascript">
	try {
	window.onload = function(){ 
	　　	top.window.location = "/index.php?r=site/login";
		// $(window.location).attr('href', '/index.php?r=site/login');
　　	}; 
	
	} catch(x) {alert(x);}
</script>

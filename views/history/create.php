<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HistoryModel */

$this->title = 'Create History';
$this->params['breadcrumbs'][] = ['label' => 'Job History', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

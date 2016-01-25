<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HistorySearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'job_id') ?>

    <?= $form->field($model, 'cmd') ?>

    <?= $form->field($model, 'host') ?>

    <?= $form->field($model, 'run_time') ?>

    <?php // echo $form->field($model, 'info_type') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'output') ?>

    <?php // echo $form->field($model, 'cost_ms') ?>

    <?php // echo $form->field($model, 'alarm_phones') ?>

    <?php // echo $form->field($model, 'alarm_mails') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

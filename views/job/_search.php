<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cmd') ?>

    <?= $form->field($model, 'cron_str') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'desc') ?>

    <?php // echo $form->field($model, 'mails') ?>

    <?php // echo $form->field($model, 'phones') ?>

    <?php // echo $form->field($model, 'team') ?>

    <?php // echo $form->field($model, 'owner') ?>

    <?php // echo $form->field($model, 'hosts') ?>

    <?php // echo $form->field($model, 'host_strategy') ?>

    <?php // echo $form->field($model, 'restore_strategy') ?>

    <?php // echo $form->field($model, 'retry_strategy') ?>

    <?php // echo $form->field($model, 'error_strategy') ?>

    <?php // echo $form->field($model, 'exist_strategy') ?>

    <?php // echo $form->field($model, 'running_timeout_s') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'modify_time') ?>

    <?php // echo $form->field($model, 'modify_user') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'create_user') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'oupput_match_reg') ?>

    <?php // echo $form->field($model, 'next_run_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

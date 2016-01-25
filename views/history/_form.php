<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HistoryModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'job_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'host')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'run_time')->textInput() ?>

    <?= $form->field($model, 'info_type')->textInput() ?>

    <?= $form->field($model, 'result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'output')->textInput() ?>

    <?= $form->field($model, 'cost_ms')->textInput() ?>

    <?= $form->field($model, 'alarm_phones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alarm_mails')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

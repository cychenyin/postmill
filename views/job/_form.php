<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-model-form">
    <?php $form = ActiveForm::begin(); ?>
    <table style='width:100%;'>
        <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </td>
            <td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'hosts')->textInput(['maxlength' => true]) ?>

            </td>
        </tr>
            <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'cron_str')->textInput(['maxlength' => true]) ?>
            </td>
            <td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'cmd')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
            <tr>
            <td style='width:50%;'>
            <?= $form->field($model, 'mails')->textInput(['maxlength' => true]) ?>
            </td>
            <td></td>
            <td style='width:49%;'>
            <?= $form->field($model, 'phones')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
            <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'team')->textInput(['maxlength' => true]) ?>
            </td>
            <td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'owner')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
            <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>
            </td><td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'host_strategy')->textInput() ?>
            </td>
        </tr>
            <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'restore_strategy')->textInput() ?>
            </td><td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'retry_strategy')->textInput() ?>
            </td>
        </tr>
            <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'error_strategy')->textInput() ?>
            </td><td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'exist_strategy')->textInput() ?>
            </td>
        </tr>
        <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'running_timeout_s')->textInput() ?>
            </td><td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'status')->textInput() ?>
            </td>
        </tr>
        <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'modify_time')->textInput() ?>
            </td><td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'modify_user')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'create_time')->textInput() ?>
            </td><td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'create_user')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'start_date')->textInput() ?>
            </td><td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'end_date')->textInput() ?>
            </td>
        </tr>
        <tr>
            <td style='width:50%;'>
                <?= $form->field($model, 'oupput_match_reg')->textInput(['maxlength' => true]) ?>
            </td><td></td>
            <td style='width:49%;'>
                <?= $form->field($model, 'next_run_time')->textInput() ?>
            </td>
        </tr>
    </table>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

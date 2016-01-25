<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JobModel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cmd',
            'cron_str',
            'name',
            'desc',
            'mails',
            'phones',
            'team',
            'owner',
            'hosts',
            'host_strategy',
            'restore_strategy',
            'retry_strategy',
            'error_strategy',
            'exist_strategy',
            'running_timeout_s:datetime',
            'status',
            'modify_time:datetime',
            'modify_user',
            'create_time:datetime',
            'create_user',
            'start_date',
            'end_date',
            'oupput_match_reg',
            'next_run_time',
        ],
    ]) ?>

</div>

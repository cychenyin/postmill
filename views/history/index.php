<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HistorySearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Running History';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--     <p> -->
        <?php // echo Html::a('Create Job History', ['create'], ['class' => 'btn btn-success']) ?>
<!--     </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            ['attribute' => 'id', 'headerOptions' => ['width' => '60px'], ],
//             'job_id',
            ['attribute' => 'job_id', 'headerOptions' => ['width' => '60px'], ],
            'cmd',
            // 'host',
            ['attribute' => 'host', 'headerOptions' => ['width' => '120px'], ],
            // 'run_time:datetime',
            ['attribute' => 'run_time', 'format'=> 'datetime',  'headerOptions' => ['width' => '120px'], ],
            // 'info_type',
            // 'result',
            ['attribute' => 'result',
                'headerOptions' => ['width' => '60px'],
                'value' => function ($model) {
                        if ($model->result === 0){
                            return '正常';
                        } else if ($model->result === 1){
                            return '失败';
                        } else {
                            return '被系统暂停';
                        }
                    }
                ],
            // 'output',
            // 'cost_ms',
            ['attribute' => 'cost_ms', 'headerOptions' => ['width' => '60px'], ],
            // 'alarm_phones',
            // 'alarm_mails',
            // 'create_time:datetime',

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                //                 'contentOptions' => function ($model, $key, $index, $column) {
                //                     return ['style' => 'min-width:80px'];
                //                     },
                'headerOptions' => ['width' => '30px'],
                'template' => '{view}',
                'buttons' => [
                    'history' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-record"></span>', $url, ['title' => '查看运行记录', 'aria-label' => 'history', 'data-pjax' => '0'] );
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => '查看任务详情', 'aria-label' => 'view', 'data-pjax' => '0'] );
                    },
                    ],
                ],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JobSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-model-index">

    <h1><?= Html::encode($this->title) ?>
        <span style='float:right; position:relative;'>
        <?= Html::a('Help', '/index.php?r=site%2Fabout', ['class' => 'btn btn-info']) ?>
        </span>
        <span style='float:right; position:relative;width:10px;'>&nbsp;
        </span>
        <span style='float:right; position:relative;'>
        <?= Html::a('Create New Job', ['create'], ['class' => 'btn btn-success']) ?>
        </span>
    </h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--     <p> buttons</p>-->
<!--     <div style='hight:2px'>&nbsp;</div> -->
<!--     <span class="glyphicon glyphicon-record"></span> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'attribute' => 'id',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'width:60px'];
                    },
                ],
            'name',
            'cmd',
            //'cron_str',
             [
                'attribute' => 'cron_str',
                'format' => 'text',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'width:90px'];
                },
                ],
            //'owner',
            [
                'attribute' => 'owner',
                'format' => 'text',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'width:90px'];
                },
                ],

            // 'desc',
            // 'mails',
            // 'phones',
            // 'team',
            // 'hosts',
            // 'host_strategy',
            // 'restore_strategy',
            // 'retry_strategy',
            // 'error_strategy',
            // 'exist_strategy',
            // 'running_timeout_s:datetime',
            // 'status',
            [
                'attribute' => 'status',
                'format' => 'text',
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'width:90px'];
                },
                'value' => function ($model) {
//                     $dt = new DateTime();
//                     return $dt->setTimestamp($data->next_run_time)->format('Y-m-d H:i');
                        if ($model->status === 0){
                            return '新建/停用';
                        } else if ($model->status === 1){
                            return '启用';
                        } else {
                            return '被系统暂停';
                        }
                    }
                ],
            // 'modify_time:datetime',
            // 'modify_user',
            // 'create_time:datetime',
            // 'create_user',
            // 'start_date',
            // 'end_date',
            // 'oupput_match_reg',
            // 'next_run_time',
            [
                'class' => 'yii\grid\ActionColumn',
//                 'contentOptions' => function ($model, $key, $index, $column) {
//                     return ['style' => 'min-width:80px'];
//                     },
                'headerOptions' => ['width' => '90px'],
                'template' => ' {history} {view} {update} {change}',
                'buttons' => [
                    'history' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-list"></span>', $url, ['title' => '查看运行记录', 'aria-label' => 'history', 'data-pjax' => '0'] );
                        },
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => '查看任务详情', 'aria-label' => 'view', 'data-pjax' => '0'] );
                    },
                    'update' => function ($url, $model, $key) {
                        # 目前没有记录Session，所以不做控制；但是应有这个控制
                        if( empty(Yii::$app->user->identity->username) || empty($model->owner) || $model->owner == Yii::$app->user->identity->username )
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => '修改', 'aria-label' => 'update', 'data-pjax' => '0']);
                        else
                            return '';
                    },
                    'change' => function ($url, $model, $key) {
                        // return in_array($model->status, [1 ,2]) ? Html::a('stop', $url) : Html::a('start', $url);
                        if( in_array($model->status, [1,2], true))
                            return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, ['title' => '停用', 'aria-label' => 'change', 'data-pjax' => '0']);
                        else
                            return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, ['title' => '启用', 'aria-label' => 'change1', 'data-pjax' => '1']);
                    },
                    ],
                'urlCreator' => function ( $action, $model, $key, $index ) {
                        if ($action === 'history') {
                            return '/index.php?r=history/index&HistorySearchModel%5Bjob_id%5D=' . $model->id . '&sort=-id';
                        } else if ($action === 'change') {
                            return '/index.php?r=job/' . $action . '&id=' . $model->id . '&status=' . (in_array($model->status, [1,2]) ? 0 : 1);
                        }
                        return '/index.php?r=job/' . $action . '&id=' . $model->id;
                    },

                ],
//             [
//                 'class' => 'yii\grid\ActionColumn',
//                 'contentOptions' => function ($model, $key, $index, $column) {
//                     return ['style' => 'min-width:70px'];
//                     },
//                     ],
        ],
    ]); ?>

</div>

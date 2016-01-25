<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\JobModel;
?>
<link rel="stylesheet" href="/css/postwill.css" type="text/css">

<?php if (!empty($crumbs)) { ?>
<div class="container" style="margin-bottom: 10px;">
	<ul class="breadcrumbordinary">
		<li><?=$title?></li>
    <?php foreach ($crumbs as $c ) { ?>
    		<li><a href='<?=$c['url'] ?>' xtimer='' xcount=''> <?=$c['name'] ?> </a></li>
    <?php } // end of foreach ?>
    	</ul>
</div>
<?php }?>
<div id="job-grid" class="grid-view">
<?php
// $dataProvider = new ActiveDataProvider([
//     'query' => JobModel::find(),
//     'pagination' => [
//         'pageSize' => 20
//     ]
// ]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
//         [
//             'class' => 'yii\grid\SerialColumn'
//         ],
        // Simple columns defined by the data contained in $dataProvider.
        // Data from the model's column will be used.
        'id',
        'name',
        'cmd',
        'cron_str',
        'owner',
        'hosts',
        // More complex one.
        [
            'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
            'label' => 'Next_run_time',
            'enableSorting' => 'True',
            'value' => function ($data) {
                $dt = new DateTime();
                return $dt->setTimestamp($data->next_run_time)->format('Y-m-d H:i');
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {edit} {stop}',
            'buttons' => [
                'view' => function ($url, $data, $key) {
                    // return $data->status === 'editable' ? Html::a('view', $url) : '';
                    return Html::a('view', '/index.php?r=job/view&job_id=' . $data->id );
                },
                'edit' => function ($url, $model, $key) {
                    return empty(Yii::$app->session['user']['name']) || $data->owner == Yii::$app->session['user']['name'] ? Html::a('edit', $url) : '';
                },
                'stop' => function ($url, $model, $key) {
                    return in_array($data->status, [1 ,2]) ? Html::a('stop', $url) : Html::a('start', $url);
                },
                ],
            'urlCreator' => function ( $action, $model, $key, $index ) {
                    return '/index.php?r=job/' . $action . '&job_id=' . $model->id;
                },
        ],
    ]
]);

?>
</div>
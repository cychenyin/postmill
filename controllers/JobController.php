<?php

namespace app\controllers;

use Yii;
use app\models\JobModel;
use app\models\JobSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JobController implements the CRUD actions for JobModel model.
 */
class JobController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all JobModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JobSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JobModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new JobModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JobModel();
        $now = new \DateTime();
        $now = $now->getTimestamp();
//         var_dump($now);
//         var_dump(Yii::$app->user->identity);
//         die;
        $model->modify_time = $model->create_time = $now;
        $model->modify_user = $model->create_user = $model->owner = Yii::$app->user->identity->username;
        $model->cron_str = "1 * * * *";

        #$date = date_create(); # php, hehe
        $date = date('Y-m-d');
        $date = new \Datetime($date);
        // $date = $date->getTimestamp();
        $model->start_date = $date->getTimestamp();
        $model->end_date = $date->add(new \DateInterval('P99Y'));
        $model->host_strategy = 0;
        $model->restore_strategy = 0;
        $model->retry_strategy = 0;
        $model->error_strategy = 0;
        $model->exist_strategy = 0;
        $model->mails = Yii::$app->user->identity->mail;
        $model->next_run_time = 0;
        $model->status = 0;
        $model->running_timeout_s = 99999;
        $model->oupput_match_reg = 'error';
        $model->team = 'backend';
        $model->phones = '10086';
        $model->desc = ' ';

        // $model->phone = Yii::$app->user->identity->phone;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JobModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JobModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionChange($id, $status)
    {
        // $this->findModel($id)->update(false, ['status' => $status]);
        $model =$this->findModel($id);
        $model->status = $status;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JobModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JobModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JobModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

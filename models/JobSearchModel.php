<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JobModel;

/**
 * JobSearchModel represents the model behind the search form about `app\models\JobModel`.
 */
class JobSearchModel extends JobModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'host_strategy', 'restore_strategy', 'retry_strategy', 'error_strategy', 'exist_strategy', 'running_timeout_s', 'status', 'modify_time', 'create_time', 'start_date', 'end_date'], 'integer'],
            [['cmd', 'cron_str', 'name', 'desc', 'mails', 'phones', 'team', 'owner', 'hosts', 'modify_user', 'create_user', 'oupput_match_reg'], 'safe'],
            [['next_run_time'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = JobModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'host_strategy' => $this->host_strategy,
            'restore_strategy' => $this->restore_strategy,
            'retry_strategy' => $this->retry_strategy,
            'error_strategy' => $this->error_strategy,
            'exist_strategy' => $this->exist_strategy,
            'running_timeout_s' => $this->running_timeout_s,
            'status' => $this->status,
            'modify_time' => $this->modify_time,
            'create_time' => $this->create_time,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'next_run_time' => $this->next_run_time,
        ]);

        $query->andFilterWhere(['like', 'cmd', $this->cmd])
            ->andFilterWhere(['like', 'cron_str', $this->cron_str])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'mails', $this->mails])
            ->andFilterWhere(['like', 'phones', $this->phones])
            ->andFilterWhere(['like', 'team', $this->team])
            ->andFilterWhere(['like', 'owner', $this->owner])
            ->andFilterWhere(['like', 'hosts', $this->hosts])
            ->andFilterWhere(['like', 'modify_user', $this->modify_user])
            ->andFilterWhere(['like', 'create_user', $this->create_user])
            ->andFilterWhere(['like', 'oupput_match_reg', $this->oupput_match_reg]);

        return $dataProvider;
    }
}

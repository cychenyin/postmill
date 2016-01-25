<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HistoryModel;

/**
 * HistorySearchModel represents the model behind the search form about `app\models\HistoryModel`.
 */
class HistorySearchModel extends HistoryModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'run_time', 'info_type', 'result', 'cost_ms', 'create_time'], 'integer'],
            [['job_id', 'cmd', 'host', 'output', 'alarm_phones', 'alarm_mails'], 'safe'],
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
        $query = HistoryModel::find();

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
            'run_time' => $this->run_time,
            'info_type' => $this->info_type,
            'output' => $this->output,
            'cost_ms' => $this->cost_ms,
            'create_time' => $this->create_time,
        ]);

        $query->andFilterWhere(['like', 'job_id', $this->job_id])
            ->andFilterWhere(['like', 'cmd', $this->cmd])
            ->andFilterWhere(['like', 'host', $this->host])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'alarm_phones', $this->alarm_phones])
            ->andFilterWhere(['like', 'alarm_mails', $this->alarm_mails]);

        return $dataProvider;
    }
}

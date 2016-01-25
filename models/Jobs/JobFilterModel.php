<?php

namespace app\models\jobs;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * JobFilterModel.
 */
class JobFilterModel extends Model
{
    // ext attributes

//     public $nameLike;
//     public $owner;
//     public $stop = 0;

    public function rules()
    {
        return [
            [['name', 'cmd', 'cron_str', 'owner'], 'trim'],
            [['name', 'cmd', 'cron_str', 'owner'], 'default', 'value'=> ''],
//             ['name', 'default', 'value' => ''],
//             ['cmd', 'default', 'value' => ''],
//             ['cron_str', 'default', 'value' => ''],
//             ['owner', 'default', 'value' => ''],
            [['status'], 'integer'],
            [['status'], 'default', 'value'=> '0'],
            [['name', 'cmd', 'cron_str', 'owner', 'status'], 'safe'],
        ];
    }

//     public function scenarios()
//     {
//         // bypass scenarios() implementation in the parent class
//         return Model::scenarios();
//     }

    public function search($params)
    {
        $query = JobModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        if( $this->id > 0)
            $query->andFilterWhere(['id' => $this->id]);
        if ($this->name)
            $query->andFilterWhere(['like', 'name', $this->name]);

        if ($this->cmd)
            $query->andFilterWhere(['like', 'cmd', $this->cmd]);

        if ($this->cron_str)
            $query->andFilterWhere(['like', 'cron_str', $this->cron_str]);

        if ($this->owner)
            $query->andFilterWhere(['owner' => $this->owner]);

        if ($this->status !== null)
            $query->andFilterWhere(['statis' => $this->status]);


        return $dataProvider;
    }

}



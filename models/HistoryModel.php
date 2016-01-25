<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wm_jobs_history".
 *
 * @property integer $id
 * @property string $job_id
 * @property string $cmd
 * @property string $host
 * @property integer $run_time
 * @property integer $info_type
 * @property integer $result
 * @property string $output
 * @property integer $cost_ms
 * @property string $alarm_phones
 * @property string $alarm_mails
 * @property integer $create_time
 */
class HistoryModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wm_jobs_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['run_time', 'info_type', 'result', 'cost_ms', 'create_time'], 'integer'],
            [['job_id', 'cmd'], 'string', 'max' => 512],
            [['host'], 'string', 'max' => 100],
            [['output'], 'string', 'max' => 8000],
            [['alarm_phones', 'alarm_mails'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'cmd' => 'Cmd',
            'host' => 'Host',
            'run_time' => 'Run Time',
            'info_type' => 'Info Type',
            'result' => 'Result',
            'output' => 'Output',
            'cost_ms' => 'Cost Ms',
            'alarm_phones' => 'Alarm Phones',
            'alarm_mails' => 'Alarm Mails',
            'create_time' => 'Create Time',
        ];
    }
}

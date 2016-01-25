<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wm_jobs".
 *
 * @property integer $id
 * @property string $cmd
 * @property string $cron_str
 * @property string $name
 * @property string $desc
 * @property string $mails
 * @property string $phones
 * @property string $team
 * @property string $owner
 * @property string $hosts
 * @property integer $host_strategy
 * @property integer $restore_strategy
 * @property integer $retry_strategy
 * @property integer $error_strategy
 * @property integer $exist_strategy
 * @property integer $running_timeout_s
 * @property integer $status
 * @property integer $modify_time
 * @property string $modify_user
 * @property integer $create_time
 * @property string $create_user
 * @property integer $start_date
 * @property integer $end_date
 * @property string $oupput_match_reg
 * @property double $next_run_time
 */
class JobModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wm_jobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['host_strategy', 'restore_strategy', 'retry_strategy', 'error_strategy', 'exist_strategy', 'running_timeout_s', 'status', 'modify_time', 'create_time', 'start_date', 'end_date'], 'integer'],
            [['next_run_time'], 'number'],
            [['cmd', 'cron_str'], 'string', 'max' => 512],
            [['name', 'team', 'owner', 'modify_user', 'create_user'], 'string', 'max' => 50],
            [['desc', 'hosts'], 'string', 'max' => 1000],
            [['mails', 'phones'], 'string', 'max' => 200],
            [['oupput_match_reg'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cmd' => 'Cmd',
            'cron_str' => 'Cron Str',
            'name' => 'Name',
            'desc' => 'Desc',
            'mails' => 'Mails',
            'phones' => 'Phones',
            'team' => 'Team',
            'owner' => 'Owner',
            'hosts' => 'Hosts',
            'host_strategy' => 'Host Strategy',
            'restore_strategy' => 'Restore Strategy',
            'retry_strategy' => 'Retry Strategy',
            'error_strategy' => 'Error Strategy',
            'exist_strategy' => 'Exist Strategy',
            'running_timeout_s' => 'Running Timeout S',
            'status' => 'Status',
            'modify_time' => 'Modify Time',
            'modify_user' => 'Modify User',
            'create_time' => 'Create Time',
            'create_user' => 'Create User',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'oupput_match_reg' => 'Oupput Match Reg',
            'next_run_time' => 'Next Run Time',
        ];
    }
}

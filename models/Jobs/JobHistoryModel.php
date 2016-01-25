<?php

namespace app\models\jobs;
use Yii;
use yii\base\Model;

/**
 * JobHistoryModel Model.
 */
class JobHistoryModel extends \yii\db\ActiveRecord
{
    // ext attributes
//     public $timer;
//     public $count;
//     public $alt;
//     public $type;

    public static function tableName() {
        return "wm_jobs_history";
    }

    public static function getlist($job_id = null, $output=null, $page=0, $size=20) {
        $page = int($page);
        $size = int($size);
        if($size > 100)
            $size = 100;

        $sql = 'select * from wm_jobs_history ';
        $cond = '';
        $params = [];
        if ($job_id !== null) {
            if( !empty($cond))
                $cond += ' and ';
            $cond += 'job_id = :job_id';
            $params[':job_id'] = $job_id;
        }
        if ($output !== null) {
            if( !empty($cond))
                $cond += ' and ';
            $cond += 'output = :output';
            $params[':output'] = $output;
        }
        $sql += ' where ' + $cond + ' limit ' + $page * $size + ',' + $size;

        return JobHistoryModel::findBySql($sql, $params).all();
    }
}

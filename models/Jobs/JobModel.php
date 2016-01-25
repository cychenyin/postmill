<?php

namespace app\models\jobs;
use Yii;
use yii\base\Model;

/**
 * TopCount Model.
 * CREATE TABLE top_count (id INTEGER PRIMARY KEY ASC, mod, path, mean,create_time);
 * CREATE INDEX IF NOT EXISTS idx_top_count_mean ON top_count (mean);
 */
class JobModel extends \yii\db\ActiveRecord
{
    // ext attributes
//     public $timer;
//     public $count;
//     public $alt;
//     public $type;

    public static function tableName() {
        return "wm_jobs";
    }

//     public static function getTop($n =10) {
//         return TopCount::findBySql("select * from top_count order by CAST(mean AS INTEGER) desc limit :limit", [ ':limit' => $n ])->all();
//     }

    public static function deleteJob($id){
        $this->changeStatus($id, 0);
    }

    public static function startJob($id){
        $this->changeStatus($id, 1);
    }

    public static function stopJob($id){
        $this->changeStatus($id, 0);
    }

    private static function changeStatus($id, $status){
        return JobModel::updateAll(['status' => $status], ['id' => ':id'], [':id' => $id, 'status' => $status]);
    }

    /**
     *
     * @param string $nameLike
     * @param string $owner
     * @param string $newOrStop, use to match status. can be null, one integer, or integer array;
     * @param number $page
     * @param number $size
     * @return string
     */
    public static function getJobs($nameLike = '', $owner='' ,  $newOrStop=Null, $page=0, $size=20) {
        $page = intval($page);
        $size = intval($size);
        if($size > 100)
            $size = 100;

        $sql = 'select * from wm_jobs ';
        $cond = '';
        $params = [];
        if (! empty($nameLike)) {
            if( !empty($cond))
                $cond .= ' and ';
            $cond .= 'name like :name';
            $params[':name'] = '%' + $nameLike + '%';
        }

        if (! empty($like)) {
            if( !empty($cond))
                $cond .= ' and ';
            $cond .= 'owner = :owner';
            $params[':owner'] = $owner;
        }

        if( !empty($cond))
            $cond .= ' and ';
        if($newOrStop) {
            if (is_int($newOrStop)){
                $cond .= ' status = 0';
            }
            else if (is_array($newOrStop)){
                $cond .= ' status in (' . implode(',', $newOrStop) . ')';
            }
        }
        if ($cond)
            $sql .= ' where ' . $cond ;

        $sql .= ' limit ' . $page * $size . ',' . $size;
        return JobModel::findBySql($sql, $params)->all();
    }
}

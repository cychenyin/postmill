<?php
namespace app\biz;

use app\models\MetricsData;
use app\models\MetricsModel;
use app\models\TopCount;
use app\models\TopTimer;
use app\models\TopFailure;
use app\models\TopCountTmp;
use app\models\TopTimerTmp;
use app\models\TopFailureTmp;

class TopBiz
{

    public static function initSchema()
    {
        $sqls = [
            'CREATE TABLE IF NOT EXISTS top_failure_tmp (id INTEGER PRIMARY KEY ASC, mod, serial, mean,create_time);',
            'CREATE TABLE IF NOT EXISTS top_failure (id INTEGER PRIMARY KEY ASC, mod, serial, mean,create_time);',
            'CREATE INDEX IF NOT EXISTS idx_top_failure_mean ON top_failure (mean);',

            'CREATE TABLE IF NOT EXISTS top_timer_tmp (id INTEGER PRIMARY KEY ASC, mod, serial, mean,create_time);',
            'CREATE TABLE IF NOT EXISTS top_timer (id INTEGER PRIMARY KEY ASC, mod, serial, mean,create_time);',
            'CREATE INDEX IF NOT EXISTS idx_top_timer_mean ON top_timer (mean);',

            'CREATE TABLE IF NOT EXISTS top_count_tmp (id INTEGER PRIMARY KEY ASC, mod, serial, mean,create_time);',
            'CREATE TABLE IF NOT EXISTS top_count (id INTEGER PRIMARY KEY ASC, mod, serial, mean,create_time);',
            'CREATE INDEX IF NOT EXISTS idx_top_count_mean ON top_count (mean);',

            'CREATE TABLE IF NOT EXISTS serials_disuse(id INTEGER PRIMARY KEY ASC,category,serial,alt,create_time);',
            'CREATE TABLE IF NOT EXISTS serials (id INTEGER PRIMARY KEY ASC,category,serial,alt,create_time);'
        ];

        foreach ($sqls as $sql) {
            \Yii::$app->db->createCommand($sql)->execute();
        }
    }

    public static function initSerials()
    {}

    public static function calculateUsing()
    {
        $ret = [];
        $mods = MetricsModel::getMods();
        // 计算新数据
        foreach ($mods as $mod) {
            $clzz = MetricsModel::getClzz($mod);
            foreach ($clzz as $cls) {
                $target = static::getCountTarget($mod, $cls);

                $datapoints = MetricsData::getDataPoints(1, $target);
                if (count($datapoints) > 0) {
                    $ret[] = [
                        $mod,
                        $cls
                    ];
                } else {
                    $datapoints = MetricsData::getDataPoints(60, $target);
                    if (count($datapoints) > 0) {
                        $ret[] = [
                            $mod,
                            $cls
                        ];
                    } else {
                        $datapoints = MetricsData::getDataPoints(1440 * 7, $target);
                        if (count($datapoints) > 0) {
                            $ret[] = [
                                $mod,
                                $cls
                            ];
                        }
                    }
                }
            }
        }
        return $ret;
    }

    /**
     * 计算废弃的接口
     */
    public static function calculateCountNull()
    {
        $ret = [];
        $mods = MetricsModel::getMods();
        // 计算新数据
        foreach ($mods as $mod) {
            $clzz = MetricsModel::getClzz($mod);
            foreach ($clzz as $cls) {
                $target = static::getCountTarget($mod, $cls);

                $datapoints = MetricsData::getDataPoints(1, $target);
                if (count($datapoints) == 0) {
                    $datapoints = MetricsData::getDataPoints(1440 * 7, $target);
                    if (count($datapoints) == 0) {
                        $ret[] = [
                            $mod,
                            $cls
                        ];
                    }
                }
            }
        }
        return $ret;
    }

    /**
     * 计算高频次排行榜
     */
    public static function calculateCount()
    {
        $result = [];
        $mods = MetricsModel::getMods();
        // 计算新数据
        foreach ($mods as $mod) {
            $clzz = MetricsModel::getClzz($mod);
            if (empty($clzz)) {
                continue;
            }
            foreach ($clzz as $cls) {
                $target = static::getCountTarget($mod, $cls);
                echo "counting $mod . $cls . \n";
                $datapoints = MetricsData::getDataPoints(10, $target);
                if (empty($datapoints)) {
                    echo "counting $mod . $cls not datapoint. \n";
                    continue;
                }
                foreach ($datapoints as $dp) {
                    echo "counting $mod . $cls calculting. \n";
                    if ($dp->target == $target && is_array($dp->datapoints) && count($dp->datapoints) > 0) {
                        $data = $dp->datapoints;
                        $sum = 0;
                        $count = 0;
                        if (is_array($data)) {
                            foreach ($data as $d) {
                                if ($d[0] > 0) {
                                    $sum += $d[0];
                                    $count ++;
                                }
                            }
                        }
                        if ($count > 0) {
                            $mean = $sum / count($dp->datapoints);

                            $t = new TopCount();
                            $t->mod = $mod;
                            $t->serial = $cls;
                            $t->mean = $mean;
                            $t->create_time = time();
                            // $t->save();
                            $result[] = $t;
                        }
                    }
                }
            }
        }
        // 删除所有的数据
        TopCount::deleteAll();
        foreach ($result as $top) {
            echo "counting $top->mod . $top->serial updating to db. \n";
            $top->save();
        }
    }

    /**
     * 计算慢请求排行榜
     */
    public static function calculateSlow()
    {
        $result = [];
        // 计算新数据
        $mods = MetricsModel::getMods();
        foreach ($mods as $mod) {
            $clzz = MetricsModel::getClzz($mod);
            if (empty($clzz)) {
                continue;
            }
            foreach ($clzz as $cls) {
                $target = static::getTimerTarget($mod, $cls);
                $datapoints = MetricsData::getDataPoints(10, $target);
                if (empty($datapoints)) {
                    continue;
                }
                foreach ($datapoints as $dp) {
                    if ($dp->target == $target && is_array($dp->datapoints) && count($dp->datapoints) > 0) {
                        $data = $dp->datapoints;
                        $sum = 0;
                        $count = 0;
                        if (is_array($data)) {
                            foreach ($data as $d) {
                                if ($d[0] > 0) {
                                    $sum += $d[0];
                                    $count ++;
                                }
                            }
                        }
                        if ($count > 0) {
                            $t = new TopTimer();
                            $t->mod = $mod;
                            $t->serial = $cls;
                            $t->mean = $sum / $count;
                            $t->create_time = time();
                            // $t->save();
                            $result[] = $t;
                        }
                    }
                }
            }
        }
        // 删除所有的数据
        TopTimer::deleteAll();
        foreach ($result as $top) {
            $top->save();
        }
    }

    /**
     * 计算错误请求排行榜
     */
    public static function calculateFailure()
    {
        $result = [];
        // 计算新数据
        $mods = MetricsModel::getMods();
        foreach ($mods as $mod) {
            $clzz = MetricsModel::getClzz($mod);
            if (empty($clzz)) {
                continue;
            }
            foreach ($clzz as $cls) {
                $target = static::getFailureTarget($mod, $cls);
                $datapoints = MetricsData::getDataPoints(10, $target);
                if (empty($datapoints)) {
                    continue;
                }
                foreach ($datapoints as $dp) {
                    if ($dp->target == $target && is_array($dp->datapoints) && count($dp->datapoints) > 0) {
                        $data = $dp->datapoints;
                        $sum = 0;
                        $count = 0;
                        if (is_array($data)) {
                            foreach ($data as $d) {
                                if ($d[0] > 0) {
                                    $sum += $d[0];
                                    $count ++;
                                }
                            }
                        }
                        if ($count > 0) {
                            $t = new TopFailure();
                            $t->mod = $mod;
                            $t->serial = $cls;
                            $t->mean = $sum / $count;
                            $t->create_time = time();
                            // $t->save();
                            $result[] = $t;
                        }
                    }
                }
            }
        }
        // 删除所有的数据
        TopFailure::deleteAll();
        foreach ($result as $top) {
            $top->save();
        }
    }

    public static function countList($n=10)
    {
        $result = TopCount::getTop($n);
        if (is_array($result)) {
            $i = 0;
            for ($i = 0; $i < count($result); $i ++) {
                $v = $result[$i];
                $result[$i]['timer'] = MetricsBiz::getTimerMetricUrl($v['mod'], $v['serial']);
                $result[$i]['count'] = MetricsBiz::getCountMetricUrl($v['mod'], $v['serial']);
                $result[$i]['alt'] = MetricsBiz::getTitle($v['mod'], $v['serial']);
                $result[$i]['type'] = 'count';
                $result[$i]['mean'] = round($v['mean'], 3);
            }
        }
        return $result;
    }

    public static function slowList($n = 10)
    {
        $result = TopTimer::getTop($n);
        if (is_array($result)) {
            $i = 0;
            for ($i = 0; $i < count($result); $i ++) {
                $v = $result[$i];
                $v->timer = MetricsBiz::getTimerMetricUrl($v->mod, $v->serial);
                $v->count = MetricsBiz::getCountMetricUrl($v->mod, $v->serial);
                $v->alt = MetricsBiz::getTitle($v->mod, $v->serial);
                $v->type = 'timer';
                $v->mean = round($v->mean, 3);
                // echo $v->mean;
                // var_dump($v);
                // die;
            }
        }
        return $result;
    }

    public static function failureList($n)
    {
        $result = TopFailure::getTop($n);
        if (is_array($result)) {
            $i = 0;
            for ($i = 0; $i < count($result); $i ++) {
                $v = $result[$i];
                $result[$i]['timer'] = MetricsBiz::getTimerMetricUrl($v['mod'], $v['serial']);
                $result[$i]['count'] = MetricsBiz::getCountMetricUrl($v['mod'], $v['serial']);
                $result[$i]['alt'] = MetricsBiz::getTitle($v['mod'], $v['serial']);
                $result[$i]['type'] = 'failure';
                $result[$i]['mean'] = round($v['mean'], 3);
            }
        }
        return $result;
    }

    private static function getCountTarget($mod, $cls)
    {
        return \Yii::$app->params['metrics']['countPrefix'] . '.' . strtolower($mod) . '.' . strtolower($cls);
    }

    private static function getTimerTarget($mod, $cls)
    {
        return \Yii::$app->params['metrics']['timerPrefix'] . '.' . strtolower($mod) . '.' . strtolower($cls) . '.mean';
    }

    private static function getFailureTarget($mod, $cls)
    {
        return \Yii::$app->params['metrics']['failurePrefix'] . '.' . strtolower($mod) . '.' . strtolower($cls);
    }
}
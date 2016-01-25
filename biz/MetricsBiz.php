<?php
namespace app\biz;

use app\models\MetricsModel;
use app\models\MetricsData;
use app\models\TopCount;
use app\models\TopTimer;
use app\models\TopFailure;

class MetricsBiz
{
    
    const URL_MAX_LENGTH = 950;
    
    public static function getMods() {
        $ret = [ ];
        $all = MetricsModel::getMods ();
        foreach ( $all as $m ) {
            $ret [$m] = count ( MetricsModel::getClzz ( $m ) );
        }
        return $ret;
    }
    
    public static function getTitle($mod, $clz) {
        return $mod . '.' . $clz;
        // return end(explode('\\',$clz));
        // return $clz;
    }
    
    public static function getTimerMetric($mod, $clz) {
        return \Yii::$app->params ['metrics'] ['timerPrefix'] . '.' . strtolower($mod) . '.' . strtolower($clz) . '.mean' ;
    }
    
    public static function getCountMetric($mod, $clz) {
        return \Yii::$app->params ['metrics'] ['countPrefix'] . '.' . strtolower($mod) . '.' . strtolower($clz);
    }
    
    public static function getTimerMetricUrl($mod, $clz, $width=400, $height=250, $from="6hours") {
        assert ( isset ( $mod ) );
        assert ( isset ( $clz ) );
    
        if (is_array ( $clz )) {
            $url = \Yii::$app->params ['metrics'] ['urlPrefix'] . '?from=-' . $from . '&until=now&width=' . $width . '&height=' . $height . '&template=plain&_uniq=' . rand (); // . '&title=' . $mod . '.__fusion';
            foreach ( $clz as $item ) {
                $t = '&target=' . static::getTimerMetric ( $mod, $item );
                if(strlen($url) + strlen($t) > self::URL_MAX_LENGTH ) {
                    break;
                } else {
                    $url = $url . $t;
                }
            }
            return $url;
        }
        return \Yii::$app->params ['metrics'] ['urlPrefix'] . '?from=-' . $from . '&until=now&width=' . $width . '&height=' . $height . '&template=plain&target=' . static::getTimerMetric ( $mod, $clz ) . '&_uniq=' . rand (); // . '&title=' . static::getTitle ( $mod, $clz );
    }
    
    public static function getCountMetricUrl($mod, $clz, $width=400, $height=250, $from="6hours") {
        assert ( isset ( $mod ) );
        assert ( isset ( $clz ) );
        if (is_array ( $clz ) ) {
            $url = \Yii::$app->params ['metrics'] ['urlPrefix'] . '?from=-' . $from . '&until=now&width=' . $width . '&height=' . $height . '&template=plain&_uniq=' . rand (); // . '&title=' . $mod . '.__fusion';;
             
            foreach ( $clz as $item ) {
                $t ='&target=' . static::getCountMetric ( $mod, $item );
                if(strlen($url) + strlen($t) > self::URL_MAX_LENGTH ) {
                    break;
                } else {
                    $url = $url . '&target=' . static::getCountMetric ( $mod, $item );
                }
            }
            return $url;
        }
    
        return \Yii::$app->params ['metrics'] ['urlPrefix'] . '?from=-' . $from . '&until=now&width=' . $width . '&height=' . $height . '&template=plain&target=' . static::getCountMetric ( $mod, $clz ) . '&_uniq=' . rand (); // . '&title=' . static::getTitle ( $mod, $clz );
    }
    
    public static function getMetricUrl($metric, $width=400, $height=250, $from="6hours") {
        assert ( !empty ( $metric ) );
        return \Yii::$app->params ['metrics'] ['urlPrefix'] . '?from=-' . $from . '&until=now&width=' . $width . '&height=' . $height . '&template=plain&target=' . $metric. '&_uniq=' . rand (); 
    }
}

?>
<?php

namespace app\models\jobs;
use Yii;
use yii\base\Model;

/**
 * JobQueryModel.
 */
class JobQueryModel extends Model
{
    // ext attributes

    public $nameLike;
    public $owner;
    public $stop = 0;

    public function rules()
    {
        return [
            [['nameLike', 'owner'], 'trim'],
            ['nameLike', 'default', 'value' => ''],
            ['owner', 'default', 'value' => ''],
            ['stop', 'default', 'value' => '0'],
            [['stop'], 'integer'],
            [['nameLike', 'owner'], 'safe'],
        ];
    }
}



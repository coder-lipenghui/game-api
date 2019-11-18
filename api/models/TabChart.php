<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_chart".
 *
 * @property int $id
 * @property string $logtime
 * @property string $chart_type
 * @property string $chart_rank
 * @property string $chart_param
 * @property string $playername
 */
class TabChart extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_chart';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
//    public static function getDb()
//    {
//        return Yii::$app->get('db3');
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logtime'], 'safe'],
            [['chart_type', 'chart_rank', 'chart_param', 'playername'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'logtime' => Yii::t('app', 'Logtime'),
            'chart_type' => Yii::t('app', 'Chart Type'),
            'chart_rank' => Yii::t('app', 'Chart Rank'),
            'chart_param' => Yii::t('app', 'Chart Param'),
            'playername' => Yii::t('app', 'Playername'),
        ];
    }
}

<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_tradevc".
 *
 * @property int $id
 * @property string $logtime 记录时间
 * @property string $tradeG 原交易者
 * @property string $seedfrom
 * @property string $tradeM 被交易者
 * @property string $seedto
 * @property int $vcoin 元宝
 */
class TabTradevc extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_tradevc';
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
            [['seedfrom', 'seedto'], 'required'],
            [['vcoin'], 'integer'],
            [['tradeG', 'tradeM'], 'string', 'max' => 200],
            [['seedfrom', 'seedto'], 'string', 'max' => 255],
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
            'tradeG' => Yii::t('app', 'Trade G'),
            'seedfrom' => Yii::t('app', 'Seedfrom'),
            'tradeM' => Yii::t('app', 'Trade M'),
            'seedto' => Yii::t('app', 'Seedto'),
            'vcoin' => Yii::t('app', 'Vcoin'),
        ];
    }
}

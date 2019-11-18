<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_online".
 *
 * @property int $id
 * @property string $channelId 渠道all
 * @property int $online_all 所有在线玩家数量
 * @property int $online_reg 在线的真实玩家数量
 * @property string $logtime 记录时间
 */
class TabOnline extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_online';
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
            [['online_all', 'online_reg'], 'integer'],
            [['logtime'], 'safe'],
            [['channelId'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'channelId' => Yii::t('app', 'Channel ID'),
            'online_all' => Yii::t('app', 'Online All'),
            'online_reg' => Yii::t('app', 'Online Reg'),
            'logtime' => Yii::t('app', 'Logtime'),
        ];
    }
}

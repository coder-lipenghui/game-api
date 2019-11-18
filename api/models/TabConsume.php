<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_consume".
 *
 * @property int $id
 * @property string $account 玩家账号
 * @property string $channelId 渠道标识
 * @property string $chrname 角色名
 * @property string $logtime 日志记录时间
 * @property int $vcoin 元宝数量
 * @property int $itemid 物品编号
 * @property string $itemname 物品名称
 * @property int $itemnum 物品数量
 * @property int $buylv 消费时等级
 */
class TabConsume extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_consume';
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
            [['channelId'], 'required'],
            [['logtime'], 'safe'],
            [['vcoin', 'itemid', 'itemnum', 'buylv'], 'integer'],
            [['account', 'channelId', 'chrname', 'itemname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'account' => Yii::t('app', 'Account'),
            'channelId' => Yii::t('app', 'Channel ID'),
            'chrname' => Yii::t('app', 'Chrname'),
            'logtime' => Yii::t('app', 'Logtime'),
            'vcoin' => Yii::t('app', 'Vcoin'),
            'itemid' => Yii::t('app', 'Itemid'),
            'itemname' => Yii::t('app', 'Itemname'),
            'itemnum' => Yii::t('app', 'Itemnum'),
            'buylv' => Yii::t('app', 'Buylv'),
        ];
    }
}

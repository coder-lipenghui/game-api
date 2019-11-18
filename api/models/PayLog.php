<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "pay_log".
 *
 * @property int $id
 * @property string $channelId
 * @property string $paytouser
 * @property string $serverid
 * @property string $chrname
 * @property int $level
 * @property int $paygold
 * @property double $paymoney
 * @property string $paytime
 * @property string $paynum
 * @property string $pttime
 * @property int $islog
 */
class PayLog extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_log';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
//    public static function getDb()
//    {
//        return Yii::$app->get('db2');
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['channelId', 'paytouser', 'serverid', 'paygold', 'paymoney', 'paytime', 'paynum', 'pttime'], 'required'],
            [['level', 'paygold', 'islog'], 'integer'],
            [['paymoney'], 'number'],
            [['paytime', 'pttime'], 'safe'],
            [['channelId', 'serverid'], 'string', 'max' => 45],
            [['paytouser', 'chrname'], 'string', 'max' => 255],
            [['paynum'], 'string', 'max' => 50],
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
            'paytouser' => Yii::t('app', 'Paytouser'),
            'serverid' => Yii::t('app', 'Serverid'),
            'chrname' => Yii::t('app', 'Chrname'),
            'level' => Yii::t('app', 'Level'),
            'paygold' => Yii::t('app', 'Paygold'),
            'paymoney' => Yii::t('app', 'Paymoney'),
            'paytime' => Yii::t('app', 'Paytime'),
            'paynum' => Yii::t('app', 'Paynum'),
            'pttime' => Yii::t('app', 'Pttime'),
            'islog' => Yii::t('app', 'Islog'),
        ];
    }
}

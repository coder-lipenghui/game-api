<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "pay_info".
 *
 * @property int $id
 * @property string $channelId
 * @property string $paynum
 * @property string $paytouser
 * @property string $serverid
 * @property int $paygold
 * @property double $paymoney
 * @property string $paytime
 * @property int $status
 * @property int $flags
 * @property string $ticket
 * @property string $chrname
 */
class PayInfo extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_info';
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
            [['channelId', 'paynum', 'paytouser', 'serverid', 'paygold', 'paymoney', 'paytime'], 'required'],
            [['paygold', 'status', 'flags'], 'integer'],
            [['paymoney'], 'number'],
            [['paytime'], 'safe'],
            [['channelId', 'serverid'], 'string', 'max' => 45],
            [['paynum'], 'string', 'max' => 50],
            [['paytouser', 'ticket', 'chrname'], 'string', 'max' => 255],
            [['paynum'], 'unique'],
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
            'paynum' => Yii::t('app', 'Paynum'),
            'paytouser' => Yii::t('app', 'Paytouser'),
            'serverid' => Yii::t('app', 'Serverid'),
            'paygold' => Yii::t('app', 'Paygold'),
            'paymoney' => Yii::t('app', 'Paymoney'),
            'paytime' => Yii::t('app', 'Paytime'),
            'status' => Yii::t('app', 'Status'),
            'flags' => Yii::t('app', 'Flags'),
            'ticket' => Yii::t('app', 'Ticket'),
            'chrname' => Yii::t('app', 'Chrname'),
        ];
    }
}

<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "pay_token".
 *
 * @property int $id
 * @property string $openid
 * @property string $openkey
 * @property string $pf
 * @property string $token
 * @property string $payitem
 * @property string $billno
 * @property int $zoneid
 * @property int $providetype
 * @property double $amt
 * @property int $payamt_coins
 * @property string $pubacct_payamt_coins
 * @property string $char_id
 * @property string $char_name
 * @property string $ts
 * @property int $bind
 * @property int $used
 * @property int $typeid
 * @property int $num
 * @property int $serverid
 */
class PayToken extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_token';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
//    public static function getDb()
//    {
//        return Yii::$app->get('db1');
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token'], 'required'],
            [['zoneid', 'providetype', 'payamt_coins', 'bind', 'used', 'typeid', 'num', 'serverid'], 'integer'],
            [['amt'], 'number'],
            [['ts'], 'safe'],
            [['openid', 'openkey', 'pf', 'token', 'payitem', 'billno', 'pubacct_payamt_coins', 'char_id', 'char_name'], 'string', 'max' => 255],
            [['token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'openid' => Yii::t('app', 'Openid'),
            'openkey' => Yii::t('app', 'Openkey'),
            'pf' => Yii::t('app', 'Pf'),
            'token' => Yii::t('app', 'Token'),
            'payitem' => Yii::t('app', 'Payitem'),
            'billno' => Yii::t('app', 'Billno'),
            'zoneid' => Yii::t('app', 'Zoneid'),
            'providetype' => Yii::t('app', 'Providetype'),
            'amt' => Yii::t('app', 'Amt'),
            'payamt_coins' => Yii::t('app', 'Payamt Coins'),
            'pubacct_payamt_coins' => Yii::t('app', 'Pubacct Payamt Coins'),
            'char_id' => Yii::t('app', 'Char ID'),
            'char_name' => Yii::t('app', 'Char Name'),
            'ts' => Yii::t('app', 'Ts'),
            'bind' => Yii::t('app', 'Bind'),
            'used' => Yii::t('app', 'Used'),
            'typeid' => Yii::t('app', 'Typeid'),
            'num' => Yii::t('app', 'Num'),
            'serverid' => Yii::t('app', 'Serverid'),
        ];
    }
}

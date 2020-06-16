<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "pay_script".
 *
 * @property int $id
 * @property string $platform
 * @property string $char_account
 * @property string $char_id
 * @property string $char_name
 * @property int $payseed 触发的脚本ID
 * @property int $status 默认0 已使用1000
 * @property int $amount
 * @property int $num
 * @property string $paytime
 * @property int $serverid
 * @property int $orderId
 */
class PayScript extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay_script';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payseed', 'status', 'amount', 'num', 'serverid','orderId'], 'integer'],
            [['paytime'], 'safe'],
            [['platform', 'char_account', 'char_id', 'char_name','orderId'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'platform' => Yii::t('app', 'Platform'),
            'char_account' => Yii::t('app', 'Char Account'),
            'char_id' => Yii::t('app', 'Char ID'),
            'char_name' => Yii::t('app', 'Char Name'),
            'payseed' => Yii::t('app', 'Payseed'),
            'status' => Yii::t('app', 'Status'),
            'amount' => Yii::t('app', 'Amount'),
            'num' => Yii::t('app', 'Num'),
            'paytime' => Yii::t('app', 'Paytime'),
            'serverid' => Yii::t('app', 'Serverid'),
        ];
    }
}

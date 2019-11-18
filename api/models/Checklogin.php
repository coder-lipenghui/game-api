<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "checklogin".
 *
 * @property int $id
 * @property string $ip
 * @property string $openid
 * @property int $isalways
 * @property int $offtime
 * @property string $sTime
 * @property string $eTime
 * @property string $reason
 * @property string $op_user
 */
class Checklogin extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checklogin';
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
            [['isalways', 'offtime'], 'integer'],
            [['sTime', 'eTime'], 'safe'],
            [['ip', 'openid', 'reason', 'op_user'], 'string', 'max' => 255],
            [['ip'], 'unique'],
            [['openid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ip' => Yii::t('app', 'Ip'),
            'openid' => Yii::t('app', 'Openid'),
            'isalways' => Yii::t('app', 'Isalways'),
            'offtime' => Yii::t('app', 'Offtime'),
            'sTime' => Yii::t('app', 'S Time'),
            'eTime' => Yii::t('app', 'E Time'),
            'reason' => Yii::t('app', 'Reason'),
            'op_user' => Yii::t('app', 'Op User'),
        ];
    }
}

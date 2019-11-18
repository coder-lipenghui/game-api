<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "fcm".
 *
 * @property string $account
 * @property int $off_time
 * @property int $online_time
 * @property string $cn_name
 * @property string $cn_id
 * @property int $cn_ok
 */
class Fcm extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fcm';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
//    public static function getDb()
//    {
//        return Yii::$app->get('db');
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account', 'off_time', 'online_time', 'cn_name', 'cn_id', 'cn_ok'], 'required'],
            [['off_time', 'online_time', 'cn_ok'], 'integer'],
            [['account', 'cn_name', 'cn_id'], 'string', 'max' => 255],
            [['account'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'account' => Yii::t('app', 'Account'),
            'off_time' => Yii::t('app', 'Off Time'),
            'online_time' => Yii::t('app', 'Online Time'),
            'cn_name' => Yii::t('app', 'Cn Name'),
            'cn_id' => Yii::t('app', 'Cn ID'),
            'cn_ok' => Yii::t('app', 'Cn Ok'),
        ];
    }
}

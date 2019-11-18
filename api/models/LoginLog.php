<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "login_log".
 *
 * @property int $id
 * @property string $uid
 * @property string $uname
 * @property string $serverid
 * @property string $logintime
 * @property string $onlineip
 * @property string $channelId
 * @property string $deviceId
 * @property int $islog
 */
class LoginLog extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login_log';
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
            [['serverid'], 'required'],
            [['logintime'], 'safe'],
            [['islog'], 'integer'],
            [['uid', 'uname', 'deviceId'], 'string', 'max' => 255],
            [['serverid', 'onlineip', 'channelId'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', 'Uid'),
            'uname' => Yii::t('app', 'Uname'),
            'serverid' => Yii::t('app', 'Serverid'),
            'logintime' => Yii::t('app', 'Logintime'),
            'onlineip' => Yii::t('app', 'Onlineip'),
            'channelId' => Yii::t('app', 'Channel ID'),
            'deviceId' => Yii::t('app', 'Device ID'),
            'islog' => Yii::t('app', 'Islog'),
        ];
    }
}

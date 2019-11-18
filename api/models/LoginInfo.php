<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "login_info".
 *
 * @property int $id
 * @property string $username
 * @property string $serverid
 * @property string $logintime
 * @property string $ticket
 * @property string $onlineip
 * @property int $status
 * @property string $source
 * @property string $regdate
 * @property string $channelId
 * @property string $deviceId
 */
class LoginInfo extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login_info';
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
            [['logintime', 'regdate'], 'safe'],
            [['status'], 'integer'],
            [['username', 'serverid', 'ticket', 'source', 'deviceId'], 'string', 'max' => 255],
            [['onlineip'], 'string', 'max' => 50],
            [['channelId'], 'string', 'max' => 45],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'serverid' => Yii::t('app', 'Serverid'),
            'logintime' => Yii::t('app', 'Logintime'),
            'ticket' => Yii::t('app', 'Ticket'),
            'onlineip' => Yii::t('app', 'Onlineip'),
            'status' => Yii::t('app', 'Status'),
            'source' => Yii::t('app', 'Source'),
            'regdate' => Yii::t('app', 'Regdate'),
            'channelId' => Yii::t('app', 'Channel ID'),
            'deviceId' => Yii::t('app', 'Device ID'),
        ];
    }
}

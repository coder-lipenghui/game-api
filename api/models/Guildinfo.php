<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "guildinfo".
 *
 * @property int $server_id
 * @property string $guild_id
 * @property string $guild_name
 * @property string $guild_desp
 * @property string $guild_notice
 * @property resource $guild_event
 * @property resource $notices
 * @property resource $rednotices
 */
class Guildinfo extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guildinfo';
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
            [['server_id', 'guild_id'], 'required'],
            [['server_id'], 'integer'],
            [['guild_event', 'notices', 'rednotices'], 'string'],
            [['guild_id', 'guild_name', 'guild_desp', 'guild_notice'], 'string', 'max' => 255],
            [['server_id', 'guild_id'], 'unique', 'targetAttribute' => ['server_id', 'guild_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'server_id' => Yii::t('app', 'Server ID'),
            'guild_id' => Yii::t('app', 'Guild ID'),
            'guild_name' => Yii::t('app', 'Guild Name'),
            'guild_desp' => Yii::t('app', 'Guild Desp'),
            'guild_notice' => Yii::t('app', 'Guild Notice'),
            'guild_event' => Yii::t('app', 'Guild Event'),
            'notices' => Yii::t('app', 'Notices'),
            'rednotices' => Yii::t('app', 'Rednotices'),
        ];
    }
}

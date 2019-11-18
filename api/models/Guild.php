<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "guild".
 *
 * @property int $server_id
 * @property string $guild_name
 * @property string $guild_id
 * @property string $guild_desp
 * @property string $guild_notice
 * @property int $mslv
 * @property string $guild_day
 * @property int $guild_lv
 * @property int $guild_pt
 * @property resource $members
 * @property resource $enemys
 * @property resource $friends
 * @property resource $param
 * @property resource $items
 * @property resource $redb
 */
class Guild extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guild';
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
            [['server_id', 'guild_name', 'mslv', 'guild_day', 'members', 'enemys', 'friends'], 'required'],
            [['server_id', 'mslv', 'guild_lv', 'guild_pt'], 'integer'],
            [['members', 'enemys', 'friends', 'param', 'items', 'redb'], 'string'],
            [['guild_name', 'guild_id', 'guild_desp', 'guild_notice', 'guild_day'], 'string', 'max' => 255],
            [['server_id', 'guild_name'], 'unique', 'targetAttribute' => ['server_id', 'guild_name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'server_id' => Yii::t('app', 'Server ID'),
            'guild_name' => Yii::t('app', 'Guild Name'),
            'guild_id' => Yii::t('app', 'Guild ID'),
            'guild_desp' => Yii::t('app', 'Guild Desp'),
            'guild_notice' => Yii::t('app', 'Guild Notice'),
            'mslv' => Yii::t('app', 'Mslv'),
            'guild_day' => Yii::t('app', 'Guild Day'),
            'guild_lv' => Yii::t('app', 'Guild Lv'),
            'guild_pt' => Yii::t('app', 'Guild Pt'),
            'members' => Yii::t('app', 'Members'),
            'enemys' => Yii::t('app', 'Enemys'),
            'friends' => Yii::t('app', 'Friends'),
            'param' => Yii::t('app', 'Param'),
            'items' => Yii::t('app', 'Items'),
            'redb' => Yii::t('app', 'Redb'),
        ];
    }
}

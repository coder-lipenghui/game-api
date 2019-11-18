<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_gamemoney_rem".
 *
 * @property int $id
 * @property string $logtime 日志记录时间
 * @property string $playername 角色名ID
 * @property string $src 操作ID
 * @property string $addvc 移除金币数量
 * @property string $nowvc 现在总数量
 */
class TabGamemoneyRem extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_gamemoney_rem';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
//    public static function getDb()
//    {
//        return Yii::$app->get('db3');
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logtime'], 'safe'],
            [['playername', 'src', 'addvc', 'nowvc'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'logtime' => Yii::t('app', 'Logtime'),
            'playername' => Yii::t('app', 'Playername'),
            'src' => Yii::t('app', 'Src'),
            'addvc' => Yii::t('app', 'Addvc'),
            'nowvc' => Yii::t('app', 'Nowvc'),
        ];
    }
}

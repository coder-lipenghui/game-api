<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_gamemoneybind_rem".
 *
 * @property int $id
 * @property string $logtime 记录时间
 * @property string $playername 角色ID
 * @property string $src 操作ID
 * @property string $addvc 移除绑定金币
 * @property string $nowvc 角色总绑定金币数
 */
class TabGamemoneybindRem extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_gamemoneybind_rem';
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

<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_die_info".
 *
 * @property int $id
 * @property string $logtime
 * @property string $chrname
 * @property string $mapid
 * @property string $killname
 * @property int $src
 * @property int $x
 * @property int $y
 */
class TabDieInfo extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_die_info';
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
            [['chrname'], 'required'],
            [['src', 'x', 'y'], 'integer'],
            [['chrname'], 'string', 'max' => 255],
            [['mapid', 'killname'], 'string', 'max' => 200],
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
            'chrname' => Yii::t('app', 'Chrname'),
            'mapid' => Yii::t('app', 'Mapid'),
            'killname' => Yii::t('app', 'Killname'),
            'src' => Yii::t('app', 'Src'),
            'x' => Yii::t('app', 'X'),
            'y' => Yii::t('app', 'Y'),
        ];
    }
}

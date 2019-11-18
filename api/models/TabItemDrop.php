<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_item_drop".
 *
 * @property int $id
 * @property string $logtime
 * @property string $chrname
 * @property string $mapid
 * @property int $src
 * @property int $itemid
 * @property int $duration
 * @property int $itemflags
 * @property int $luck
 * @property int $number
 * @property int $createtime
 * @property int $identid
 */
class TabItemDrop extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_item_drop';
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
            [['src', 'itemid', 'duration', 'itemflags', 'luck', 'number', 'createtime', 'identid'], 'integer'],
            [['chrname'], 'string', 'max' => 255],
            [['mapid'], 'string', 'max' => 200],
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
            'src' => Yii::t('app', 'Src'),
            'itemid' => Yii::t('app', 'Itemid'),
            'duration' => Yii::t('app', 'Duration'),
            'itemflags' => Yii::t('app', 'Itemflags'),
            'luck' => Yii::t('app', 'Luck'),
            'number' => Yii::t('app', 'Number'),
            'createtime' => Yii::t('app', 'Createtime'),
            'identid' => Yii::t('app', 'Identid'),
        ];
    }
}

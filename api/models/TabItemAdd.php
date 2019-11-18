<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_item_add".
 *
 * @property int $id
 * @property string $logtime
 * @property string $seedname
 * @property string $playername
 * @property int $src
 * @property int $mTypeID
 * @property int $mPosition
 * @property int $mDuraMax
 * @property int $mDuration
 * @property int $mItemFlags
 * @property int $mLuck
 * @property int $mNumber
 * @property int $mCreateTime
 * @property int $mIdentID
 */
class TabItemAdd extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_item_add';
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
            [['seedname'], 'required'],
            [['src', 'mTypeID', 'mPosition', 'mDuraMax', 'mDuration', 'mItemFlags', 'mLuck', 'mNumber', 'mCreateTime', 'mIdentID'], 'integer'],
            [['seedname'], 'string', 'max' => 255],
            [['playername'], 'string', 'max' => 200],
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
            'seedname' => Yii::t('app', 'Seedname'),
            'playername' => Yii::t('app', 'Playername'),
            'src' => Yii::t('app', 'Src'),
            'mTypeID' => Yii::t('app', 'M Type ID'),
            'mPosition' => Yii::t('app', 'M Position'),
            'mDuraMax' => Yii::t('app', 'M Dura Max'),
            'mDuration' => Yii::t('app', 'M Duration'),
            'mItemFlags' => Yii::t('app', 'M Item Flags'),
            'mLuck' => Yii::t('app', 'M Luck'),
            'mNumber' => Yii::t('app', 'M Number'),
            'mCreateTime' => Yii::t('app', 'M Create Time'),
            'mIdentID' => Yii::t('app', 'M Ident ID'),
        ];
    }
}

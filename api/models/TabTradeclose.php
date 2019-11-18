<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_tradeclose".
 *
 * @property int $id
 * @property string $logtime
 * @property string $seedname
 * @property string $playername
 * @property int $mTypeID
 * @property int $mPosition
 * @property int $mDuraMax
 * @property int $mDuration
 * @property int $mItemFlags
 * @property int $mNumber
 * @property int $mLuck
 * @property int $mCreatetime
 * @property int $mIdentID
 */
class TabTradeclose extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_tradeclose';
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
            [['mTypeID', 'mPosition', 'mDuraMax', 'mDuration', 'mItemFlags', 'mNumber', 'mLuck', 'mCreatetime', 'mIdentID'], 'integer'],
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
            'mTypeID' => Yii::t('app', 'M Type ID'),
            'mPosition' => Yii::t('app', 'M Position'),
            'mDuraMax' => Yii::t('app', 'M Dura Max'),
            'mDuration' => Yii::t('app', 'M Duration'),
            'mItemFlags' => Yii::t('app', 'M Item Flags'),
            'mNumber' => Yii::t('app', 'M Number'),
            'mLuck' => Yii::t('app', 'M Luck'),
            'mCreatetime' => Yii::t('app', 'M Createtime'),
            'mIdentID' => Yii::t('app', 'M Ident ID'),
        ];
    }
}

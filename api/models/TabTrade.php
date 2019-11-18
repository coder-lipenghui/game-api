<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_trade".
 *
 * @property int $id
 * @property string $logtime
 * @property string $tradeG
 * @property string $seedfrom
 * @property string $tradeM
 * @property string $seedto
 * @property int $mTypeID
 * @property int $mPosition
 * @property int $mDuraMax
 * @property int $mDuration
 * @property int $mItemFlags
 * @property int $mNumber
 * @property int $mLuck
 * @property int $mCreatetime
 * @property int $mIndentID
 */
class TabTrade extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_trade';
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
            [['seedfrom', 'seedto'], 'required'],
            [['mTypeID', 'mPosition', 'mDuraMax', 'mDuration', 'mItemFlags', 'mNumber', 'mLuck', 'mCreatetime', 'mIndentID'], 'integer'],
            [['tradeG', 'tradeM'], 'string', 'max' => 200],
            [['seedfrom', 'seedto'], 'string', 'max' => 255],
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
            'tradeG' => Yii::t('app', 'Trade G'),
            'seedfrom' => Yii::t('app', 'Seedfrom'),
            'tradeM' => Yii::t('app', 'Trade M'),
            'seedto' => Yii::t('app', 'Seedto'),
            'mTypeID' => Yii::t('app', 'M Type ID'),
            'mPosition' => Yii::t('app', 'M Position'),
            'mDuraMax' => Yii::t('app', 'M Dura Max'),
            'mDuration' => Yii::t('app', 'M Duration'),
            'mItemFlags' => Yii::t('app', 'M Item Flags'),
            'mNumber' => Yii::t('app', 'M Number'),
            'mLuck' => Yii::t('app', 'M Luck'),
            'mCreatetime' => Yii::t('app', 'M Createtime'),
            'mIndentID' => Yii::t('app', 'M Indent ID'),
        ];
    }
}

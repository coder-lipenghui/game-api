<?php

namespace api\models;

use Yii;
use api\models\api\BaseApi;
/**
 * This is the model class for table "tab_function".
 *
 * @property int $id
 * @property string $logtime
 * @property string $chrname
 * @property int $type
 * @property int $subtype
 * @property int $oldlv
 * @property int $newlv
 */
class TabFunction extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_function';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logtime'], 'safe'],
            [['chrname'], 'required'],
            [['type', 'subtype', 'oldlv', 'newlv'], 'integer'],
            [['chrname'], 'string', 'max' => 255],
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
            'type' => Yii::t('app', 'Type'),
            'subtype' => Yii::t('app', 'Subtype'),
            'oldlv' => Yii::t('app', 'Oldlv'),
            'newlv' => Yii::t('app', 'Newlv'),
        ];
    }
}

<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_count".
 *
 * @property int $id
 * @property string $logtime 日志记录时间
 * @property string $dt 日志记录时间
 * @property int $type 大类别
 * @property int $subtype 小类别
 * @property string $subsid 字符串记录小类别
 * @property int $num 数量
 * @property string $desp 字符串记录指示
 */
class TabCount extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_count';
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
            [['logtime', 'dt'], 'safe'],
            [['type', 'subtype', 'num'], 'integer'],
            [['subsid', 'desp'], 'string', 'max' => 255],
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
            'dt' => Yii::t('app', 'Dt'),
            'type' => Yii::t('app', 'Type'),
            'subtype' => Yii::t('app', 'Subtype'),
            'subsid' => Yii::t('app', 'Subsid'),
            'num' => Yii::t('app', 'Num'),
            'desp' => Yii::t('app', 'Desp'),
        ];
    }
}

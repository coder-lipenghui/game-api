<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_chongzhi".
 *
 * @property int $id
 * @property string $logtime
 * @property int $czMoney
 * @property int $czNum
 * @property int $czCi
 * @property int $arpu
 * @property int $yCz
 * @property int $czVc
 * @property string $flag
 */
class TabChongzhi extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_chongzhi';
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
            [['czMoney', 'czNum', 'czCi', 'arpu', 'yCz', 'czVc'], 'integer'],
            [['flag'], 'string', 'max' => 255],
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
            'czMoney' => Yii::t('app', 'Cz Money'),
            'czNum' => Yii::t('app', 'Cz Num'),
            'czCi' => Yii::t('app', 'Cz Ci'),
            'arpu' => Yii::t('app', 'Arpu'),
            'yCz' => Yii::t('app', 'Y Cz'),
            'czVc' => Yii::t('app', 'Cz Vc'),
            'flag' => Yii::t('app', 'Flag'),
        ];
    }
}

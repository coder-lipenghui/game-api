<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_loginlog".
 *
 * @property int $id
 * @property string $logtime
 * @property string $loguser
 * @property string $logip
 */
class TabLoginlog extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_loginlog';
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
            [['loguser', 'logip'], 'string', 'max' => 255],
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
            'loguser' => Yii::t('app', 'Loguser'),
            'logip' => Yii::t('app', 'Logip'),
        ];
    }
}

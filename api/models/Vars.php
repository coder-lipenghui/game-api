<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "vars".
 *
 * @property int $id
 * @property int $server_id
 * @property int $type
 * @property string $k
 * @property string $v
 * @property resource $var
 */
class Vars extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vars';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
//    public static function getDb()
//    {
//        return Yii::$app->get('db');
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['server_id', 'type'], 'integer'],
            [['var'], 'string'],
            [['k'], 'string', 'max' => 255],
            [['v'], 'string', 'max' => 2048],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'server_id' => Yii::t('app', 'Server ID'),
            'type' => Yii::t('app', 'Type'),
            'k' => Yii::t('app', 'K'),
            'v' => Yii::t('app', 'V'),
            'var' => Yii::t('app', 'Var'),
        ];
    }
}

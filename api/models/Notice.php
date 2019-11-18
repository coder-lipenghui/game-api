<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "notice".
 *
 * @property int $id
 * @property string $begin
 * @property string $end
 * @property string $msg
 */
class Notice extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notice';
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
            [['begin', 'end'], 'safe'],
            [['msg'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'begin' => Yii::t('app', 'Begin'),
            'end' => Yii::t('app', 'End'),
            'msg' => Yii::t('app', 'Msg'),
        ];
    }
}

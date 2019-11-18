<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property string $id
 * @property string $charname
 * @property string $msg
 * @property string $sendername
 * @property int $date
 */
class Chat extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'integer'],
            [['charname', 'sendername'], 'string', 'max' => 63],
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
            'charname' => Yii::t('app', 'Charname'),
            'msg' => Yii::t('app', 'Msg'),
            'sendername' => Yii::t('app', 'Sendername'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
}

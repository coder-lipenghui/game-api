<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "gift".
 *
 * @property int $id
 * @property int $used
 * @property int $bind
 * @property int $typeid
 * @property int $server_id
 * @property string $msg
 * @property string $chrname
 * @property int $number
 * @property string $code
 */
class Gift extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gift';
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
            [['used', 'typeid', 'server_id', 'msg', 'chrname', 'code'], 'required'],
            [['used', 'bind', 'typeid', 'server_id', 'number'], 'integer'],
            [['msg'], 'string', 'max' => 60],
            [['chrname', 'code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'used' => Yii::t('app', 'Used'),
            'bind' => Yii::t('app', 'Bind'),
            'typeid' => Yii::t('app', 'Typeid'),
            'server_id' => Yii::t('app', 'Server ID'),
            'msg' => Yii::t('app', 'Msg'),
            'chrname' => Yii::t('app', 'Chrname'),
            'number' => Yii::t('app', 'Number'),
            'code' => Yii::t('app', 'Code'),
        ];
    }
}

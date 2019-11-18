<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "tab_inv".
 *
 * @property int $id
 * @property string $openid
 * @property string $chrname
 * @property string $iopenid
 * @property string $itime
 * @property string $invkey
 * @property string $isign
 * @property int $confirm
 * @property int $isinvited
 */
class TabInv extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_inv';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
//    public static function getDb()
//    {
//        return Yii::$app->get('db2');
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['openid', 'chrname', 'iopenid', 'itime', 'invkey', 'isign'], 'required'],
            [['confirm', 'isinvited'], 'integer'],
            [['openid', 'chrname', 'iopenid', 'itime', 'invkey', 'isign'], 'string', 'max' => 250],
            [['isign'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'openid' => Yii::t('app', 'Openid'),
            'chrname' => Yii::t('app', 'Chrname'),
            'iopenid' => Yii::t('app', 'Iopenid'),
            'itime' => Yii::t('app', 'Itime'),
            'invkey' => Yii::t('app', 'Invkey'),
            'isign' => Yii::t('app', 'Isign'),
            'confirm' => Yii::t('app', 'Confirm'),
            'isinvited' => Yii::t('app', 'Isinvited'),
        ];
    }
}

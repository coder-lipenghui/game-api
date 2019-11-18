<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "mail".
 *
 * @property int $id
 * @property string $seed
 * @property string $seedname
 * @property string $title
 * @property string $content
 * @property int $date
 * @property int $isopen
 * @property int $isreceive
 * @property resource $items
 * @property int $type
 * @property string $owners
 */
class Mail extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail';
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
            [['id', 'seed', 'owners'], 'required'],
            [['id', 'date', 'isopen', 'isreceive', 'type'], 'integer'],
            [['items', 'owners'], 'string'],
            [['seed', 'seedname', 'title', 'content'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'seed' => Yii::t('app', 'Seed'),
            'seedname' => Yii::t('app', 'Seedname'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'date' => Yii::t('app', 'Date'),
            'isopen' => Yii::t('app', 'Isopen'),
            'isreceive' => Yii::t('app', 'Isreceive'),
            'items' => Yii::t('app', 'Items'),
            'type' => Yii::t('app', 'Type'),
            'owners' => Yii::t('app', 'Owners'),
        ];
    }
}

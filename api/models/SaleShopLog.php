<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "sale_shop_log".
 *
 * @property string $id
 * @property string $typename
 * @property int $num
 * @property int $price
 * @property string $buyerseedname
 * @property string $buyername
 * @property string $salerseedname
 * @property string $salername
 * @property int $date
 */
class SaleShopLog extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_shop_log';
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
            [['typename', 'num', 'price', 'buyerseedname', 'buyername', 'salerseedname', 'salername', 'date'], 'required'],
            [['num', 'price', 'date'], 'integer'],
            [['typename', 'buyerseedname', 'buyername', 'salerseedname', 'salername'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'typename' => Yii::t('app', 'Typename'),
            'num' => Yii::t('app', 'Num'),
            'price' => Yii::t('app', 'Price'),
            'buyerseedname' => Yii::t('app', 'Buyerseedname'),
            'buyername' => Yii::t('app', 'Buyername'),
            'salerseedname' => Yii::t('app', 'Salerseedname'),
            'salername' => Yii::t('app', 'Salername'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
}

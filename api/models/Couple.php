<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "couple".
 *
 * @property int $couple_id
 * @property int $weddingdate
 * @property int $state
 * @property string $male_desp
 * @property string $female_desp
 * @property resource $members
 */
class Couple extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'couple';
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
            [['couple_id', 'members'], 'required'],
            [['couple_id', 'weddingdate', 'state'], 'integer'],
            [['members'], 'string'],
            [['male_desp', 'female_desp'], 'string', 'max' => 255],
            [['couple_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'couple_id' => Yii::t('app', 'Couple ID'),
            'weddingdate' => Yii::t('app', 'Weddingdate'),
            'state' => Yii::t('app', 'State'),
            'male_desp' => Yii::t('app', 'Male Desp'),
            'female_desp' => Yii::t('app', 'Female Desp'),
            'members' => Yii::t('app', 'Members'),
        ];
    }
    /**
     *
     * @return array|false
     */
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['members']);
        return $fields;
    }
}

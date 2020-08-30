<?php


namespace api\models;


use api\models\api\BaseApi;
use yii\data\ActiveDataProvider;

class Consume extends TabConsume
{
    public function rules()
    {
        return [
//            [['channelId'], 'required'],
            [['logtime'], 'safe'],
            [['vcoin', 'itemid', 'itemnum', 'buylv'], 'integer'],
            [['account', 'channelId', 'chrname', 'itemname'], 'string', 'max' => 255],
        ];
    }
    public function dashboard()
    {
        $query=self::find()->select(['number'=>'count(*)','itemid','itemname','total'=>'sum(vcoin)'])
            ->groupBy('itemid')
            ->orderBy('number DESC');
        return $query->asArray()->all();
    }
}
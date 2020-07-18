<?php
/**
 * Created by PhpStorm.
 * User: lipenghui
 * Date: 2019-04-23
 * Time: 20:42
 */

namespace api\controllers;


use api\models\TabTrade;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
class TradeController extends ActiveController
{
    public $modelClass="api\models\TabTrade";

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public function actions()
    {
        $actions= parent::actions(); // TODO: Change the autogenerated stub
        unset($actions['delete'],$actions['create'],$actions['update'],$actions['index']);
        return $actions;
    }
    public function actionIndex($sku,$did,$serverId,$db,$playerName,$targetName,$mTypeID,$mIndentID,$from,$to)
    {
        TabTrade::setDBPrefix($sku,$did,$serverId,$db);
        $query=TabTrade::find();

        $query->andFilterWhere(['tradeG'=>$playerName])
            ->andFilterWhere(['tradeM'=>$targetName])
            ->andFilterWhere(['mTypeID'=>$mTypeID])
            ->andFilterWhere(['mIndentID'=>$mIndentID])
            ->andFilterWhere(['>=','logtime',$from])
            ->andFilterWhere(['<=','logtime',$to]);
        $data=new ActiveDataProvider([
            'query'=>$query,
        ]);
//        exit($query->createCommand()->getRawSql());
        return $data;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: lipenghui
 * Date: 2019-04-23
 * Time: 17:35
 */

namespace api\controllers;

use api\models\TabDieInfo;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class DeathController extends ActiveController
{
    public $modelClass="api\models\TabDieInfo";

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
    public function actionIndex($sku,$serverId,$db,$playerName,$from,$to)
    {
        TabDieInfo::setDBPrefix($sku,$serverId,$db);
        $query=TabDieInfo::find();
        //必要字段
        $query->where(['chrname'=>$playerName])
            ->andFilterWhere(['>=','logtime',$from])
            ->andFilterWhere(['<=','logtime',$to]);
        $data=new ActiveDataProvider([
            'query'=>$query,
        ]);
        return $data;
    }
}
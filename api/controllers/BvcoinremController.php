<?php
/**
 * Created by PhpStorm.
 * User: lipenghui
 * Date: 2019-04-24
 * Time: 19:29
 */

namespace api\controllers;

use api\models\TabVcoinbindAdd;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use api\models\TabVconinbindRem;

class BvcoinremController extends ActiveController
{
    public $modelClass="api\models\TabVconinbindRem";
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public function actions()
    {
        $actions= parent::actions(); // TODO: Change the autogenerated stub
        unset($actions['delete'],$actions['create'],$actions['update'],$actions['index'],$actions['view']);
        return $actions;
    }

    public function actionIndex($sku,$serverId,$db,$playerName,$src,$addvc,$from,$to)
    {
        TabVconinbindRem::setDBPrefix($sku,$serverId,$db);
        $query=TabVconinbindRem::find();
        //必要字段
        $query->where(['playername'=>$playerName])
            ->andFilterWhere([//非必要字段
                'src'=>$src,
                'addvc'=>$addvc,
            ])
            ->andFilterWhere(['>=','logtime',$from])
            ->andFilterWhere(['<=','logtime',$to]);
        $data=new ActiveDataProvider([
            'query'=>$query,
        ]);
        //exit($query->createCommand()->getRawSql());
        return $data;
    }
}
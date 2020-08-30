<?php


namespace api\controllers;


use api\models\Consume;
use yii\rest\ActiveController;
use api\models\TabConsume;

class ConsumeController extends ActiveController
{
    public $modelClass="api\models\TabConsume";

    public function actions()
    {
        $actions= parent::actions();
        unset($actions['delete'],$actions['create'],$actions['update'],$actions['index']);
        return $actions;
    }
    public function actionDashboard($sku,$did,$serverId,$db)
    {
        $model=new Consume();
        $model::setDBPrefix($sku,$did,$serverId,$db);
        return $model->dashboard();
    }
}
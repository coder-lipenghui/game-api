<?php


namespace api\controllers;


use api\models\CdkeyValidate;
use yii\rest\ActiveController;

class CdkeyController extends ActiveController
{
    public $modelClass="api\models\CdkeyValidate";

    public function actions()
    {
        $myActions=parent::actions();
        unset($myActions['create']);
        return $myActions;
    }

    public function actionCreate($sku,$did,$serverId,$db)
    {
        $model=new CdkeyValidate();
        $model::setDBPrefix($sku,$did,$serverId,$db);
        return $model->useCdkey();
    }
}
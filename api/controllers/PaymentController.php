<?php
/**
 * Created by PhpStorm.
 * User: lipenghui
 * Date: 2019-05-07
 * Time: 16:21
 */

namespace api\controllers;


use api\models\PayNormalValidate;
use api\models\PayScriptValidate;
use yii\rest\ActiveController;

class PaymentController extends ActiveController
{
    public $modelClass="api/models/";
    public function actions()
    {
        $actions= parent::actions();
        unset($actions['create']);
        return $actions;
    }
    public function actionCreate($sku,$did,$serverId,$db)
    {
        //区分类型 普通，脚本
        $type=\Yii::$app->request->getBodyParam('type');
        if (empty($type))
        {
            return ['code'=>-1,'msg'=>'未知发货类型'];
        }
        $param=\Yii::$app->request->bodyParams;
        $model=null;
        if ($type==1)
        {
            $model=new PayNormalValidate();
        }else{
            $model=new PayScriptValidate();
        }
        $model::setDBPrefix($sku,$did,$serverId,$db);
        return $model->verify();
    }
    public function actionNotify()
    {
        $model=new PayNormalValidate();
        $model->notify(8022,"69f9abb8207b2acda800516493cd2d0f");
    }
}
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
    public function actionCreate($sku,$serverId,$db)
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
        $model::setDBPrefix($sku,$serverId,$db);
        return $model->verify();
    }

}
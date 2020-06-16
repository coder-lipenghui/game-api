<?php
/**
 * Created by PhpStorm.
 * User: lipenghui
 * Date: 2019-05-07
 * Time: 16:21
 */

namespace api\controllers;

use api\models\LoginInfo;
use api\models\LoginValidate;
use yii\rest\ActiveController;
/**
 * @package api\controllers
 */
class LoginController extends ActiveController
{
    public $modelClass="api\models\LoginInfo";

    public function actions()
    {
        $myActions=parent::actions();
        unset($myActions['create']);
        return $myActions;
    }
    public function runWithParams()
    {

    }
    public function actionIndex()
    {
        return [];
    }
    public function actionCreate($sku,$serverId,$db)
    {
        LoginValidate::setDBPrefix($sku,$serverId,$db);
        $validateModel=new LoginValidate();
        $validateModel::setDBPrefix($sku,$serverId,$db);
        return $validateModel->login();
    }
}
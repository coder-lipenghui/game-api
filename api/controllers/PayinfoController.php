<?php

namespace api\controllers;

use Yii;
use app\models\PayInfo;
use app\models\PayInfoSearch;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PayinfoController implements the CRUD actions for PayInfo model.
 */
class PayinfoController extends ActiveController
{
    public $modelClass='api\models\PayInfo';
}

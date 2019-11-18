<?php
/**
 * Created by PhpStorm.
 * User: lipenghui
 * Date: 2019-04-15
 * Time: 16:11
 */
namespace api\controllers;

use yii\rest\ActiveController;

class UserController extends  ActiveController
{
    public $modelClass='common\models\User';
}
<?php
/**
 * Created by PhpStorm.
 * User: lipenghui
 * Date: 2019-04-25
 * Time: 23:35
 *
 * 邮件发放功能，支持单平台全服发送，单个玩家发送
 */

namespace api\controllers;


use yii\rest\ActiveController;


class MailController extends ActiveController
{
   public $modelClass="api/models/";
   public function actions()
   {
       $parentAction=parent::actions(); // TODO: Change the autogenerated stub
       unset($parentAction['index'],$parentAction['delete'],$parentAction['view'],$parentAction['create']);
       return $parentAction;
   }
   public function actionIndex()
   {

   }
   public function actionCreate($playerName,$title,$body,$items)
   {

   }
}
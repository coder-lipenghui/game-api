<?php
/**
 * Created by PhpStorm.
 * User: lipenghui
 * Date: 2019-04-15
 * Time: 21:26
 */

namespace api\controllers;

use api\models\Player;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class PlayerController extends ActiveController
{
    public $modelClass="api\models\Player";
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public function actions()
    {
        $actions=parent::actions(); // TODO: Change the autogenerated stub

        unset($actions['view'],$actions['index'],$actions['delete'],$actions['update'],$actions['create']);

        return $actions;
    }
    public function actionView($sku,$serverId,$db,$id,$chrname)
    {
        //显示的指定数据库
        Player::setDBPrefix($sku,$serverId,$db);
        $query=Player::find()->where(['chrname'=>$chrname]);
        $data=new ActiveDataProvider([
            'query'=>$query
        ]);
        return $data;
    }
//    public function actionSearch($sku,$serverId,$type,$chrname,$account)
//    {
//        //显示的指定数据库
//        PlayerApi::setDBPrefix($sku,$serverId,$type);
//        $ac=$account==null?"":$account;
//        $cn=$chrname==null?"":$chrname;
//        $query=PlayerApi::find();
//        if ($ac!=null && $ac!="")
//        {
//            $query=PlayerApi::find()->where(['account'=>$ac]);
//        }elseif ($cn!="" && $ac=="")
//        {
//            $query=PlayerApi::find()->filterWhere(['like','chrname',$cn])->orderBy('lv DESC');
//        }else{
//            $query->where('0=1');
//        }
//        return new ActiveDataProvider([
//            'query'=>$query
//        ]);
//    }
    public function actionItems($sku,$serverId,$db,$seedId)
    {
        //显示的指定数据库
        Player::setDBPrefix($sku,$serverId,$db);
        $query=Player::find()->where(['seedId'=>$seedId])->limit(1);
        return new ActiveDataProvider([
            'query'=>$query
        ]);
    }
    public function actionIndex($sku,$serverId,$db,$chrname,$account)
    {
        //显示的指定数据库
        Player::setDBPrefix($sku,$serverId,$db);
        $ac=$account==null?"":$account;
        $cn=$chrname==null?"":$chrname;
        $query=Player::find();
        if ($ac!=null && $ac!="")
        {
            $query=Player::find()->where(['account'=>$ac]);
        }elseif ($cn!="" && $ac=="")
        {
            $query=Player::find()->filterWhere(['like','chrname',$cn])->orderBy('lv DESC');
        }else{
            $query->where('0=1');
        }
        return new ActiveDataProvider([
            'query'=>$query
        ]);
    }
}

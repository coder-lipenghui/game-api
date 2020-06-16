<?php


namespace api\controllers;


use api\models\TabFunction;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class FunctionController extends ActiveController
{
    public $modelClass="api\models\TabFunction";

//    public $serializer = [
//        'class' => 'yii\rest\Serializer',
//    ];
    public function actions()
    {
        $actions= parent::actions();
        unset($actions['delete'],$actions['create'],$actions['update'],$actions['index']);
        return $actions;
    }
    public function actionIndex($sku,$serverId,$db,$type)
    {
        if ($type==10011)
        {
            return $this->equip($sku,$serverId,$db,$type);
        }
        elseif ($type==10012)
        {
            return $this->xiangqian($sku,$serverId,$db,$type);
        }
        else{
            return $this->attribute($sku,$serverId,$db,$type);
        }
    }

    /**
     * 强化分布信息
     * @param $sku
     * @param $serverId
     * @param $db
     * @return array
     */
    public function actionQianghua($sku,$serverId,$db)
    {
        return $this->equip($sku,$serverId,$db,10011);
    }

    /**
     * 镶嵌分布信息
     * @param $sku
     * @param $serverId
     * @param $db
     * @return array
     */
    public function actionXiangqian($sku,$serverId,$db)
    {
        return $this->xiangqian($sku,$serverId,$db,10012);
    }
    public function actionZhanjiang($sku,$serverId,$db)
    {
        return $this->attribute($sku,$serverId,$db,10004);
    }
    /**
     * 装备类型操作
     * @param $sku
     * @param $serverId
     * @param $db
     * @param $type
     * @return array
     */
    private function equip($sku,$serverId,$db,$type)
    {
        TabFunction::setDBPrefix($sku,$serverId,$db);

        $playerTotal=$ids=TabFunction::find()
            ->andFilterWhere(['type'=>$type])
            ->groupBy(['chrname'])->count();

        $ids=TabFunction::find()
            ->select(['id'=>'MAX(id)'])
            ->andFilterWhere(['type'=>$type])
            ->groupBy(['chrname','type','subtype'])
            ->asArray()
            ->all();
        $group=['type','subtype','newlv'];

        $subQuery=TabFunction::find()->where(['id'=>$ids])->groupBy($group);

        $query=TabFunction::find()->select(['type','subtype','newlv','num'=>'count(*)'])->from(['t1'=>$subQuery])->groupBy(['t1.type','t1.subtype','t1.newlv']);
        $data=$query->asArray()->all();

        for ($i=0;$i<count($data);$i++)
        {
            $data[$i]['newlv']=$data[$i]['newlv']-1;
        }
        return ['total'=>$playerTotal,'data'=>$data];
    }

    /**
     * 镶嵌数据
     * @param $sku
     * @param $serverId
     * @param $db
     * @param $type
     * @return array
     */
    private function xiangqian($sku,$serverId,$db,$type)
    {
        TabFunction::setDBPrefix($sku,$serverId,$db);

        $playerTotal=$ids=TabFunction::find()
            ->andFilterWhere(['type'=>$type])
            ->groupBy(['chrname'])->count();

        $ids=TabFunction::find()
            ->select(['id'=>'MAX(id)'])
            ->andFilterWhere(['type'=>$type])
            ->groupBy(['chrname','type','subtype','oldlv'])
            ->asArray()
            ->all();
        $subQuery=TabFunction::find()->where(['id'=>$ids]);
        $query=TabFunction::find()->select(['type','subtype','oldlv','num'=>'count(newlv)'])->from(['t1'=>$subQuery])->groupBy(['t1.type','t1.subtype','t1.oldlv']);
        $data=$query->asArray()->all();
        return ['total'=>$playerTotal,'data'=>$data];
    }
    /**
     * 单属性类型功能
     * @param $sku
     * @param $serverId
     * @param $db
     * @param $type
     * @return array
     */
    private function attribute($sku,$serverId,$db,$type)
    {
        TabFunction::setDBPrefix($sku,$serverId,$db);
        $playerTotal=$ids=TabFunction::find()
            ->andFilterWhere(['type'=>$type])
            ->groupBy(['chrname'])->count();

        $ids=TabFunction::find()
            ->select(['id'=>'MAX(id)'])
            ->andFilterWhere(['type'=>$type])
            ->groupBy(['chrname','type'])
            ->asArray()
            ->all();

        $subQuery=TabFunction::find()->where(['id'=>$ids])->groupBy(['type','newlv']);

        $query=TabFunction::find()->select(['type','newlv','num'=>'count(*)'])->from(['t1'=>$subQuery])->groupBy(['t1.type','t1.newlv']);
        $data=$query->asArray()->all();

        for ($i=0;$i<count($data);$i++)
        {
            $data[$i]['newlv']=$data[$i]['newlv']-1;
        }
        return ['total'=>$playerTotal,'data'=>$data];
    }
}
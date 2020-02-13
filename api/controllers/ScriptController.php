<?php


namespace api\controllers;


use api\models\script\ScriptUpdateModel;
use api\models\script\ScriptModel;
use yii\web\Controller;
use yii\web\UploadedFile;

class ScriptController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionUpload()
    {
        $model=new ScriptModel();
        if (\Yii::$app->request->isPost)
        {
            $model->file=UploadedFile::getInstanceByName('file');
            $fileName=$model->upload();
            if ($fileName)
            {
                return json_encode(['code'=>'1','msg'=>'success']);
            }else{
                return json_encode(['code'=>'-1','msg'=>'error']);
            }
        }else{
             return json_encode(['code'=>'-2','msg'=>'error']);
        }
    }
    public function actionUpdate()
    {
        $model=new ScriptUpdateModel();
        if (\Yii::$app->request->isPost)
        {
            return json_encode($model->doUpdate());
        }
    }
}
<?php


namespace api\models;


use api\helpers\GameSocketHelper;

class CdkeyValidate extends Gift
{
    private static $KEY="MkH3!9f*KW1BguWS6cOEzn1EPq%TRA";

    public $roleId;
    public $roleName;
    public $cdkey;
    public $item;
    public $variety;
    public $sign;
    public $port;

    public function rules()
    {
        $rules = [
            [['roleId', 'roleName', 'cdkey', 'item', 'variety', 'sign','port'], 'required'],
            [['used', 'bind', 'typeid', 'server_id', 'number','port'], 'integer'],
            [['msg'], 'string', 'max' => 60],
            [['roleId', 'roleName', 'cdkey', 'item', 'variety', 'sign', 'chrname', 'code'], 'string', 'max' => 255],
        ];
        return $rules;
    }

    public function useCdkey()
    {
        $request=\Yii::$app->request;
        $params=$request->getBodyParams();
        $this->load(['CdkeyValidate'=>$params]);
        if (!$this->validate())
        {
            return ['code'=>-1,'msg'=>'params error'];
        }
        $mySign=md5($this->roleId.$this->roleName.$this->cdkey.$this->item.$this->variety.self::$KEY);
        if ($mySign!=$this->sign)
        {
            return ['code'=>-5,'msg'=>'sign validate failed'];
        }
        $this->used=1;
        $this->typeid=$this->item;
        $this->server_id=1001;
        $this->msg='激活码';
        $this->chrname=$this->roleName;
        $this->number=1;
        $this->code=$this->cdkey;
        if (!$this->save())
        {
           return ['code'=>-4,'msg'=>'使用激活码失败'];
        }
        $this->notify($this->roleId,$this->port);
        return ['code'=>1,'msg'=>'success'];
    }
    /**
     * 通知游戏刷新
     * @param $port
     * @param $roleId
     */
    public function notify($port,$roleId)
    {
        try
        {
            $info='frgift '.$roleId;
            GameSocketHelper::send($port,$info);
        }catch (\Exception $exception)
        {
            \Yii::error("激活码通知游戏刷新出现异常:".$exception->getMessage(),'payment');
        }

    }
}
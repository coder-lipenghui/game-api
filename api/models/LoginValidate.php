<?php
/**
 * Created by PhpStorm.
 * User: lipenghui
 * Date: 2019-05-07
 * Time: 16:30
 */

namespace api\models;


class LoginValidate extends LoginInfo
{
    public $isAdult;
    public $sign;

    //临时的KEY，需要做成后台配置
    private static $LOGIN_KEY="KOSD6PXtEkb0fRj@Ce7evfltKCMo568S";
    private static $PAY_KEY="MkH3!9f*KW1BguWS6cOEzn1EPq%TRA";
    private static $TIMEOUT=6000;//游戏服务器有3分钟

    public $uname='';
    public $time;

    public $sku;
    public $did;
    public $db;
    public $serverIndex;
    public function rules()
    {
        return [
            [['serverid','uname','channelId','onlineip','time','deviceId','sign'],'required'],
            [['sign'],'string'],
            [['onlineip'], 'string', 'max' => 50],
            [['channelId'], 'string', 'max' => 45],
            [['time','did','db','serverIndex'],'integer'],
            [['uname','username', 'serverid', 'ticket', 'source', 'deviceId','sku','isAdult'], 'string', 'max' => 255],
        ];
    }
    public function login()
    {
        $timestamp = time();
        $request=\Yii::$app->request;
        $this->load(['LoginValidate'=>array_merge($request->getQueryParams(),$request->getBodyParams())]);
        if (!$this->validate())
        {
            return ['error_code'=>-1,'msg'=>'参数错误','data'=>$this->getErrors(),'params'=>$request->getBodyParams()];
        }
        if ($this->time > $timestamp + self::$TIMEOUT || $this->time < $timestamp - self::$TIMEOUT) //0.6
        {
            return ['error_code'=>-2,'msg'=>'登录会话过期'];
        }
        if ($this->sign!=$this->getSign($this->uname,$this->time))
        {
            return ['error_code'=>-3,'msg'=>'验证错误','sign'=>$this->getSign($this->uname,$this->time)];
        }
        $this->username=$this->uname;
        $this->ticket=$this->sign;
        $this->logintime=date('Y-m-d H:i:s',$this->time);
        //登陆数据
        $user=self::find()->where(['username'=>$this->uname])->one();
        if (!empty($user))
        {
            $user->ticket=$this->sign;
            $user->logintime=$this->logintime;
            $user->onlineip=$this->onlineip;
            $user->channelId=$this->channelId;
            $user->deviceId=$this->deviceId;
            $user->username=$this->uname;
            $user->time=$this->time;
            $user->uname=$this->uname;
            $user->sign=$this->sign;
            if (!$user->save())
            {
                return ['error_code'=>-6,'msg'=>'更新登陆数据失败','error'=>$user->getErrors()];
            }
        }else{

            if (!$this->save())
            {
                return ['error_code'=>-5,'msg'=>'创建登陆数据失败'];
            }
        }

        //登陆日志
        LoginLog::setDBPrefix($this->sku,$this->did,$this->serverIndex,$this->db);
        $log=LoginLog::find()->where(['uname'=>$this->uname])->one();
        if (empty($log))
        {
            $log=new LoginLog();
        }
        $log->uname=$this->uname;
        $log->logintime=date('Y-m-d H:i:s',$this->time);
        $log->onlineip=$this->onlineip;
        $log->channelId=$this->channelId;
        $log->deviceId=$this->deviceId;
        $log->serverid=$this->serverid;

        if (!$log->save())
        {
            return ['error_code'=>-8,'msg'=>'登陆日志数据更新失败'];
        }

        //防沉迷信息，暂时先关闭防沉迷数据库更新
        /*
        //TODO 这边换成replace的形式
        Fcm::setDBPrefix($this->sku,$this->serverIndex,1);
        $adult=Fcm::find()->where(['account'=>$this->uname])->one();
        if (empty($adult))
        {
            $adult=new Fcm();
        }
        $adult->account=$this->uname;
        $adult->off_time=0;
        $adult->online_time=0;
        $adult->cn_name='-';
        $adult->cn_id='-';
        $adult->cn_ok=$this->isAdult>0?101:0;
        if (!$adult->save())
        {
            return ['error_code'=>-7,'msg'=>'防沉迷信息更新失败','error'=>$adult->getErrors()];
        }
        */
        return  ['error_code' => 1, 'msg' => 'success', 'sign' => $this->sign, 'ticket' => $this->ticket, 'username' => $this->uname];
    }
    public function getSign($account,$time)
    {
        return md5($account . $time.self::$LOGIN_KEY);
    }
}
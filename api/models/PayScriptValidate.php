<?php


namespace api\models;
use api\helpers\GameSocketHelper;

class PayScriptValidate extends PayScript
{
    private static $KEY="MkH3!9f*KW1BguWS6cOEzn1EPq%TRA";
    public $flag;
    public $type;
    public $payscript;
    public $roleid;
    public $port;
    public $paytouser;
    public $paynum;
    public $paygold;
    public $paytime;
    public $channelId;
    public $paymoney;
    public function rules()
    {
        return [
            [['channelId', 'type','paynum', 'roleid', 'serverid','port', 'paygold', 'paymoney','payscript', 'paytime','flag'], 'required'],
            [['payseed', 'status','amount', 'num','type', 'serverid','type','paytime','paymoney','port'], 'integer'],
            [['platform', 'char_account', 'char_id', 'char_name','roleid','paynum','flag','paytouser','payscript'], 'string', 'max' => 255],
        ];
    }

    public function verify()
    {
        $params=\Yii::$app->request->bodyParams;
        $this->load(['PayScriptValidate'=>$params]);
        if (!$this->validate())
        {
            return ['code'=>-8,'msg'=>'参数错误','error'=>$this->getErrors()];
        }
        $this->char_account=$this->paytouser;
        $this->amount=$this->paymoney;
        $this->char_id=$this->roleid;
        $this->payseed=$this->payscript;
        $this->status=0;
        $this->num=1;
        $this->orderId=$this->paynum;
        $this->platform='2';

        $tmpSign=$this->getSign($this->type,$this->payscript,$this->paynum,$this->roleid,$this->paytouser,$this->paygold,$this->paytime);

        if ($this->flag!=$tmpSign)
        {
            return ['code'=>-4,'msg'=>'验证失败'];
        }
        $order=self::find()->where(['orderId'=>$this->paynum])->one();
        if (!empty($order))
        {
            return ['code'=>-5,'msg'=>'订单重复'];
        }
        if (!$this->save())
        {
            return ['code'=>-13,'msg'=>'订单创建失败'];
        }
        $this->notify($this->port,$this->roleid);
        return['code'=>1,'msg'=>'success'];
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
            $info='frpay '.$roleId;
            GameSocketHelper::send($port,$info);
        }catch (\Exception $exception)
        {
            \Yii::error("通知游戏刷新出现异常:".$exception->getMessage());
        }

    }
    /**
     * @param $type 支付类型
     * @param $payscript 脚本ID
     * @param $paynum 订单号
     * @param $roleId 角色ID
     * @param $uname 角色名称
     * @param $paygold 应发货币数
     * @param $time 支付时间
     * @return string sign
     */
    private function getSign($type,$payscript,$paynum,$roleId,$uname,$paygold,$time)
    {
        return md5($type.$payscript.$paynum.$roleId.urlencode($uname).$paygold.$time.self::$KEY);
    }
}
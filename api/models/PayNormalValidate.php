<?php


namespace api\models;
use GameSocketHelper;

class PayNormalValidate extends PayInfo
{
    private static $KEY="MkH3!9f*KW1BguWS6cOEzn1EPq%TRA";
    public $flag;
    public $type;
    public $payscript;
    public $roleid;
    public $port;

    public function rules()
    {
        return[
            [['channelId', 'type','paynum', 'roleid', 'serverid','port', 'paygold', 'paymoney', 'paytime','flag'], 'required'],
            [['paygold', 'status', 'flags','type','port'], 'integer'],
            [['paymoney'], 'number'],
            [['paytime'], 'safe'],
            [['channelId', 'serverid'], 'string', 'max' => 45],
            [['paynum'], 'string', 'max' => 50],
            [['paytouser', 'ticket', 'chrname','roleid','payscript','flag'], 'string', 'max' => 255],
            [['paynum'], 'unique'],
        ];
    }

    public function verify()
    {
        $params=\Yii::$app->request->getBodyParams();
        $this->load(['PayNormalValidate'=>$params]);
        if (!$this->validate())
        {
            if(count($this->getErrors('paynum'))>0)
            {
                return ['code'=>-5,'msg'=>'订单重复'];
            }else{
                return ['code'=>-8,'msg'=>'参数错误'];
            }
        }
        $tmpSign=$this->getSign($this->type,$this->payscript,$this->paynum,$this->roleid,$this->paytouser,$this->paygold,$this->paytime);
        if ($this->flag!=$tmpSign)
        {
            return ['code'=>-4,'msg'=>'验证失败'];
        }
        $this->paytime=date('Y-m-d H:i:s',$this->paytime);
        $order=self::find()->where(['paynum'=>$this->paynum])->one();
        if (!empty($order))
        {
            return ['code'=>-5,'msg'=>'订单重复'];
        }
        if (!$this->save())
        {
            return ['code'=>-13,'msg'=>'订单创建失败'];
        }
        return['code'=>1,'msg'=>'success'];
    }
    public function notify($port,$roleId)
    {
        $info='frvc '.$roleId;
        GameSocketHelper::send($port,$info);
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
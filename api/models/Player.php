<?php

namespace api\models;

use api\models\api\BaseApi;
use Yii;

/**
 * This is the model class for table "player".
 *
 * @property int $server_id
 * @property string $chrname
 * @property string $seedname
 * @property string $seedId
 * @property string $account
 * @property string $channelId
 * @property string $deviceId
 * @property string $serverid
 * @property int $online
 * @property int $deleted
 * @property string $create_time
 * @property string $last_login_time
 * @property string $last_logout_time
 * @property string $last_login_ip
 * @property int $lv
 * @property int $viplv
 * @property int $lvtime
 * @property string $exp
 * @property int $herolevel
 * @property string $heroexp
 * @property string $money
 * @property resource $mail
 * @property string $money_bind
 * @property int $vcoin
 * @property int $vcoin_bind
 * @property int $vcoin_accu
 * @property int $capacity
 * @property int $job
 * @property int $gender
 * @property string $guild
 * @property string $guildid
 * @property int $guildpt
 * @property int $guildspt
 * @property int $mxs_pool
 * @property int $dailyspt
 * @property string $emap
 * @property int $emapx
 * @property int $emapy
 * @property string $safemap
 * @property int $safemapx
 * @property int $safemapy
 * @property int $pkvalue
 * @property int $chatoff
 * @property int $depotslotadd
 * @property int $freedirectfly
 * @property int $hpinc
 * @property int $mpinc
 * @property int $bagslotadd
 * @property int $ot_all
 * @property int $ot_today
 * @property int $ot_today_tag
 * @property int $ot_yeday
 * @property int $ot_yeday_tag
 * @property string $chinaid
 * @property string $chinanm
 * @property int $chinaok
 * @property int $offline_time
 * @property int $offline_tag
 * @property int $cur_hp
 * @property int $cur_mp
 * @property int $couple_id
 * @property int $weddingdate
 * @property int $marrytimes
 * @property int $team_id
 * @property resource $task
 * @property resource $skill
 * @property resource $item
 * @property string $item_bag
 * @property string $item_depot1
 * @property string $item_depot2
 * @property resource $item_depot3
 * @property resource $item_depot4
 * @property string $item_lottery
 * @property resource $shortcut
 * @property string $var
 * @property resource $intvar
 * @property resource $status
 * @property resource $friend
 * @property int $onlinetimemax
 * @property int $kuafu_result
 * @property int $inner_power
 * @property resource $equip_have
 * @property resource $item_chattrade
 * @property int $herolv
 * @property resource $shop_limit
 */

class Player extends BaseApi
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'player';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
//    public static function getDb()
//    {
//        return Yii::$app->get('db');
//    }

    /**
     *
     * @return array|false
     */
    public function fields()
    {
        $fields = parent::fields();
        unset(
            $fields['mail'],
            $fields['task'],
            $fields['skill'],
            $fields['item'],
            $fields['item_bag'],
            $fields['item_depot1'],
            $fields['item_depot2'],
            $fields['item_depot3'],
            $fields['item_depot4'],
            $fields['item_lottery'],
            $fields['shortcut'],
            $fields['var'],
            $fields['intvar'],
            $fields['status'],
            $fields['friend'],
            $fields['equip_have'],
            $fields['item_chattrade'],
            $fields['shop_limit']
        );
        $fields['item']=function (){
            return base64_encode($this->item);
        };
        $fields['item_bag']=function(){
            return base64_encode($this->item_bag);
        };
        $fields['item_depot1']=function(){
            return base64_encode($this->item_depot1);
        };
        $fields['item_depot2']=function(){
            return base64_encode($this->item_depot2);
        };
        return $fields;
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['server_id', 'online', 'deleted', 'lv', 'viplv', 'lvtime', 'herolevel', 'heroexp', 'money', 'money_bind', 'vcoin', 'vcoin_bind', 'vcoin_accu', 'capacity', 'job', 'gender', 'guildpt', 'guildspt', 'mxs_pool', 'dailyspt', 'emapx', 'emapy', 'safemapx', 'safemapy', 'pkvalue', 'chatoff', 'depotslotadd', 'freedirectfly', 'hpinc', 'mpinc', 'bagslotadd', 'ot_all', 'ot_today', 'ot_today_tag', 'ot_yeday', 'ot_yeday_tag', 'chinaok', 'offline_time', 'offline_tag', 'cur_hp', 'cur_mp', 'couple_id', 'weddingdate', 'marrytimes', 'team_id', 'onlinetimemax', 'kuafu_result', 'inner_power', 'herolv'], 'integer'],
            [['chrname', 'seedId', 'channelId', 'deviceId', 'serverid'], 'required'],
            [['create_time', 'last_login_time', 'last_logout_time'], 'safe'],
            [['mail', 'task', 'skill', 'item', 'item_bag', 'item_depot1', 'item_depot2', 'item_depot3', 'item_depot4', 'item_lottery', 'shortcut', 'var', 'intvar', 'status', 'friend', 'equip_have', 'item_chattrade', 'shop_limit'], 'string'],
            [['chrname', 'seedname', 'seedId', 'account', 'channelId', 'deviceId', 'serverid', 'exp', 'guild', 'guildid', 'emap', 'safemap', 'chinaid', 'chinanm'], 'string', 'max' => 255],
            [['last_login_ip'], 'string', 'max' => 45],
            [['chrname'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'server_id' => Yii::t('app', 'Server ID'),
            'chrname' => Yii::t('app', 'Chrname'),
            'seedname' => Yii::t('app', 'Seedname'),
            'seedId' => Yii::t('app', 'Seed ID'),
            'account' => Yii::t('app', 'Account'),
            'channelId' => Yii::t('app', 'Channel ID'),
            'deviceId' => Yii::t('app', 'Device ID'),
            'serverid' => Yii::t('app', 'Serverid'),
            'online' => Yii::t('app', 'Online'),
            'deleted' => Yii::t('app', 'Deleted'),
            'create_time' => Yii::t('app', 'Create Time'),
            'last_login_time' => Yii::t('app', 'Last Login Time'),
            'last_logout_time' => Yii::t('app', 'Last Logout Time'),
            'last_login_ip' => Yii::t('app', 'Last Login Ip'),
            'lv' => Yii::t('app', 'Lv'),
            'viplv' => Yii::t('app', 'Viplv'),
            'lvtime' => Yii::t('app', 'Lvtime'),
            'exp' => Yii::t('app', 'Exp'),
            'herolevel' => Yii::t('app', 'Herolevel'),
            'heroexp' => Yii::t('app', 'Heroexp'),
            'money' => Yii::t('app', 'Money'),
            'mail' => Yii::t('app', 'Mail'),
            'money_bind' => Yii::t('app', 'Money Bind'),
            'vcoin' => Yii::t('app', 'Vcoin'),
            'vcoin_bind' => Yii::t('app', 'Vcoin Bind'),
            'vcoin_accu' => Yii::t('app', 'Vcoin Accu'),
            'capacity' => Yii::t('app', 'Capacity'),
            'job' => Yii::t('app', 'Job'),
            'gender' => Yii::t('app', 'Gender'),
            'guild' => Yii::t('app', 'Guild'),
            'guildid' => Yii::t('app', 'Guildid'),
            'guildpt' => Yii::t('app', 'Guildpt'),
            'guildspt' => Yii::t('app', 'Guildspt'),
            'mxs_pool' => Yii::t('app', 'Mxs Pool'),
            'dailyspt' => Yii::t('app', 'Dailyspt'),
            'emap' => Yii::t('app', 'Emap'),
            'emapx' => Yii::t('app', 'Emapx'),
            'emapy' => Yii::t('app', 'Emapy'),
            'safemap' => Yii::t('app', 'Safemap'),
            'safemapx' => Yii::t('app', 'Safemapx'),
            'safemapy' => Yii::t('app', 'Safemapy'),
            'pkvalue' => Yii::t('app', 'Pkvalue'),
            'chatoff' => Yii::t('app', 'Chatoff'),
            'depotslotadd' => Yii::t('app', 'Depotslotadd'),
            'freedirectfly' => Yii::t('app', 'Freedirectfly'),
            'hpinc' => Yii::t('app', 'Hpinc'),
            'mpinc' => Yii::t('app', 'Mpinc'),
            'bagslotadd' => Yii::t('app', 'Bagslotadd'),
            'ot_all' => Yii::t('app', 'Ot All'),
            'ot_today' => Yii::t('app', 'Ot Today'),
            'ot_today_tag' => Yii::t('app', 'Ot Today Tag'),
            'ot_yeday' => Yii::t('app', 'Ot Yeday'),
            'ot_yeday_tag' => Yii::t('app', 'Ot Yeday Tag'),
            'chinaid' => Yii::t('app', 'Chinaid'),
            'chinanm' => Yii::t('app', 'Chinanm'),
            'chinaok' => Yii::t('app', 'Chinaok'),
            'offline_time' => Yii::t('app', 'Offline Time'),
            'offline_tag' => Yii::t('app', 'Offline Tag'),
            'cur_hp' => Yii::t('app', 'Cur Hp'),
            'cur_mp' => Yii::t('app', 'Cur Mp'),
            'couple_id' => Yii::t('app', 'Couple ID'),
            'weddingdate' => Yii::t('app', 'Weddingdate'),
            'marrytimes' => Yii::t('app', 'Marrytimes'),
            'team_id' => Yii::t('app', 'Team ID'),
            'task' => Yii::t('app', 'Task'),
            'skill' => Yii::t('app', 'Skill'),
            'item' => Yii::t('app', 'Item'),
            'item_bag' => Yii::t('app', 'Item Bag'),
            'item_depot1' => Yii::t('app', 'Item Depot1'),
            'item_depot2' => Yii::t('app', 'Item Depot2'),
            'item_depot3' => Yii::t('app', 'Item Depot3'),
            'item_depot4' => Yii::t('app', 'Item Depot4'),
            'item_lottery' => Yii::t('app', 'Item Lottery'),
            'shortcut' => Yii::t('app', 'Shortcut'),
            'var' => Yii::t('app', 'Var'),
            'intvar' => Yii::t('app', 'Intvar'),
            'status' => Yii::t('app', 'Status'),
            'friend' => Yii::t('app', 'Friend'),
            'onlinetimemax' => Yii::t('app', 'Onlinetimemax'),
            'kuafu_result' => Yii::t('app', 'Kuafu Result'),
            'inner_power' => Yii::t('app', 'Inner Power'),
            'equip_have' => Yii::t('app', 'Equip Have'),
            'item_chattrade' => Yii::t('app', 'Item Chattrade'),
            'herolv' => Yii::t('app', 'Herolv'),
            'shop_limit' => Yii::t('app', 'Shop Limit'),
        ];
    }
}

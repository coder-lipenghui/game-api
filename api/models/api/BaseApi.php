<?php
namespace api\models\api;
use yii\db\ActiveRecord;
use Yii;
class BaseApi extends ActiveRecord
{
    private static $prefixDbName;
    public static $SKU;
    public static $DISTRIBUTORID;
    public static $SERVERID;
    public static $DB;
    public static function setDBPrefix($sku,$did,$serverId,$db)
    {
        self::$SKU=$sku;
        self::$SERVERID=$serverId;
        self::$DB=$db;

        $dbName="";
        switch ($db)
        {
            case 1:
                $dbName="octgame";
                break;
            case 2:
                $dbName="ocenter";
                break;
            case 3:
                $dbName="octlog";
                break;
        }
        self::$prefixDbName=$sku."_".$did."_".$serverId."_".$dbName;
    }
    public static function getDb()
    {
        return Yii::$app->get(self::$prefixDbName);
    }
}
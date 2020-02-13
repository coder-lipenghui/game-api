<?php


namespace api\models\script;

use yii\base\Exception;
use yii\base\Model;

class ScriptUpdateModel extends Model
{
    public $file;
    public $gameId;
    public $contentPort;
    public $masterPort;
    public $md5;

    public $CODE_SUCCESS=1;

    public $CODE_PARAM_ERROR=-1;
    public $CODE_LOAD_ERROR=-2;

    public $CODE_DOWNLOAD_ERROR=-3;
    public $CODE_EXEC_ERROR=-4;
    public $CODE_MKDIR_ERROR=-5;

    public $CODE_SOCEKT_CREATE_ERROR=-6;
    public $CODE_SOCEKT_CONNECT_ERROR=-7;
    public $CODE_SOCKET_WRITE_ERROR=-8;

    public $CODE_UPDATE_DEFAULT_ERROR=-9;
    public $CODE_EXEC_DEFAULT_ERROR=-10;

    public $CODE_LUA_ERROR=-11;
    public function rules()
    {
        return [
            [['file','gameId','contentPort','masterPort','md5'],'required'],
            [['file','md5'],'string'],
            [['gameId','contentPort','masterPort'],'integer']
        ];
    }
    public function doUpdate()
    {
        $param=\Yii::$app->request->bodyParams;
        if($this->load(['ScriptUpdateModel'=>$param])) {
            if ($this->validate()) {
                $code=$this->downLoadScript();
                if ($code['code']==$this->CODE_SUCCESS)
                {
                    $code=$this->doExecSender();
                    if ($code['code']==$this->CODE_SUCCESS)
                    {
                        $code=$this->doLua();
                    }
                }
                return $code;
            }else{
                return ['code'=>$this->CODE_PARAM_ERROR,'msg'=>''];
            }
        }else{
            return ['code'=>$this->CODE_LOAD_ERROR,'msg'=>''];
        }
    }
    private function downLoadScript()
    {
        $folderPath = \Yii::getAlias('@webroot/../tools/script/' .$this->gameId.'/');
        $filePath=$folderPath.$this->file;

        if (!file_exists($filePath) || md5_file($filePath)!=$this->md5)//本地不存在文件或者MD5值不相同则去中控下载脚本
        {
            //下载文件,暂时从中控后台下载，后续考虑从cdn服务器下载
            try{
                $url="http://center.xxdweb.com/uploads/script/$this->gameId/$this->file";
                $curl=curl_init($url);//需要在php.ini中解开"extension=php_curl.dll"
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
                $scriptFile = curl_exec($curl);
                curl_close($curl);
                //保存到本地
                if (!is_dir($folderPath))
                {
                    mkdir($folderPath);
                }
                $filePath=$folderPath.$this->file;
                $tp = fopen($filePath,'w');
                fwrite($tp,$scriptFile);
                fclose($tp);
            }catch (Exception $exception)
            {
                return ['code'=>$this->CODE_EXEC_ERROR,'msg'=>'exec_error'];
            }
        }
        return ['code'=>$this->CODE_SUCCESS,'msg'=>'success'];
    }
    private function doExecSender()
    {
        //调用contentsender.exe发送脚本
        $ip = "127.0.0.1";
        $senderPath = "D:/qiyou-api/api/tools/contentsender.exe";
        $scriptPath = "D:/qiyou-api/api/tools/script/$this->gameId/$this->file"; //gameId/[script name].7z
        $cmd = [$senderPath, $ip, $this->contentPort, $scriptPath];
        $code = $this->CODE_EXEC_DEFAULT_ERROR;
        $result = [];
        exec(join(" ", $cmd),$result, $code);
        if ($code == 0) {
            if (empty($result[0]) || $result[0] != "ok") {
                return ['code'=>$this->CODE_EXEC_ERROR,'msg'=>join(",",$cmd)];
            } else {
                return ['code'=>$this->CODE_SUCCESS,'msg'=>'success'];
            }
        } else {
            return ['code'=>$code,'msg'=>'exec error:'.$code];
        }
    }
    private function doLua()
    {
        $secret='longcitywebonline12345678901234567890';
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);//php.ini extension=php_sockets.dll
        if ($socket < 0) {
            return ['code'=>$this->CODE_SOCEKT_CREATE_ERROR,'msg'=>'code_socket_create_error'];
        }
        $result = socket_connect($socket, "127.0.0.1", $this->masterPort);
        if ($result < 0) {
            return ['code'=>$this->CODE_SOCEKT_CONNECT_ERROR,'msg'=>'code_socket_connect_error'];
        }
        $strmd5  = 'lscript'.$secret;
        $thismd5 = md5($strmd5);
        //$in = md5($this->command.$server['secretKey']).$this->command."\n";
        $in      = $thismd5 . 'lscript'. "\n";
        if (!socket_write($socket, $in, strlen($in))) {
            return ['code'=>$this->CODE_SOCKET_WRITE_ERROR,'msg'=>'code_socket_write_error'];
        }
        $msg=trim(socket_read($socket, 1024));
        socket_close($socket);
        if ($msg!="done")
        {
            return ['code'=>$this->CODE_LUA_ERROR,'msg'=>$msg];
        }
        return ['code'=>$this->CODE_SUCCESS,'msg'=>'success'];
    }
}
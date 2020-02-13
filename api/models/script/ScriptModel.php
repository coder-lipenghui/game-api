<?php
namespace api\models\script;

use yii\base\Model;
use yii\web\UploadedFile;

class ScriptModel extends Model
{
    public $file;
    public $gameId;
    public function rules()
    {
        return [
            [['file'],'file','skipOnEmpty'=>false,'extensions'=>'zip'],
            [['gameId'],'integer','required']
        ];
    }
    public function upload()
    {
        if ($this->validate()) {

            $new_name = 'uploads/'.$this->gameId.'/' . $this->file->baseName. $this->file->extension;

            $this->file->saveAs($new_name);

            return $new_name;

        } else {
            exit(json_encode($this->getErrors()));
            return false;
        }
    }
}
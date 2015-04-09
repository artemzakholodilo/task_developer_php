<?php
namespace app\models\user;

use yii\base\Model;
use yii\web\IdentityInterface;

class UserRecord extends Model implements IdentityInterface
{
    public $username;
    public $password;
    public $auth_key;
    
    public function getAuthKey() {
        return $this->auth_key;
    }

    public function getId() {
        return $this;
    }

    public function validateAuthKey($authKey) {
        return $this->auth_key === $authKey;
    }

    public static function findIdentity($id) {
        return $this->username === $id;
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException("this functional is not allowed now");
    }
}

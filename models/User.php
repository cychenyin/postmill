<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
	
	public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
	public $avatar;
	public $mail;
	
    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    public static function loadFromCookie() {
    	if(isset($_COOKIE['speed_user'])) {
    		$arr = [];
    		parse_str($_COOKIE['speed_user'], $arr);
    		$u = new User();
    		$u->id = $arr['id'];
    		$u->username = $arr['name'];
    		$u->mail = $arr['mail']; 
    		return new static($u);
    	}
    	return null;
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    	// echo "findIdentity " . $id; die;
        return self::loadFromCookie();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
//         foreach (self::$users as $user) {
//             if ($user['accessToken'] === $token) {
//                 return new static($user);
//             }
//         }
//     	$c = new SpeedOpenOAuth(Yii::$app->params['appkey'], Yii::$app->params['appsecret']);
//     	$u = $c->getUserInfo($token);
//      return isset($u['code']) && $u['code'] == 200 && isset($u['data']) && isset($u['data'][id]) ? $u['data'][id] : null;
    	// echo "findIdentityByAccessToken "; die;
    	return self::loadFromCookie();
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
//         foreach (self::$users as $user) {
//             if (strcasecmp($user['username'], $username) === 0) {
//                 return new static($user);
//             }
//         }
//         return null;
		// echo "findByUsername "; die;
    	return self::loadFromCookie();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        //return $this->authKey === $authKey;
        return true;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //return $this->password === $password;
        return true;
    }
}

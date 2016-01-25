<?php
namespace app\models;

use yii\base\Exception;

/**
 * SPEED API操作类
 * @version 1.0
 */
class SpeedOpenClient
{
	private $client_id;
	private $client_secret_key; 
	private $oauth;
	/**
	 * 构造函数
	 *
	 * @access public
	 * @param mixed $akey 微博开放平台应用APP KEY
	 * @param mixed $skey 微博开放平台应用APP SECRET
	 * @param mixed $access_token OAuth认证返回的token
	 * @param mixed $refresh_token OAuth认证返回的token secret
	 * @return void
	 */
	function __construct( $akey, $skey, $access_token, $refresh_token = NULL)
	{
		$this->oauth = new SpeedOpenOAuth( $akey, $skey, $access_token, $refresh_token );
		$this->client_id = $akey;
		$this->client_secret_key = $skey;
	}

	/**
	 * 开启调试信息
	 *
	 * 开启调试信息后，SDK会将每次请求微博API所发送的POST Data、Headers以及请求信息、返回内容输出出来。
	 *
	 * @access public
	 * @param bool $enable 是否开启调试信息
	 * @return void
	 */
	function set_debug( $enable )
	{
		$this->oauth->debug = $enable;
	}

	/**
	 * 设置用户IP
	 *
	 * SDK默认将会通过$_SERVER['REMOTE_ADDR']获取用户IP，在请求微博API时将用户IP附加到Request Header中。但某些情况下$_SERVER['REMOTE_ADDR']取到的IP并非用户IP，而是一个固定的IP（例如使用SAE的Cron或TaskQueue服务时），此时就有可能会造成该固定IP达到微博API调用频率限额，导致API调用失败。此时可使用本方法设置用户IP，以避免此问题。
	 *
	 * @access public
	 * @param string $ip 用户IP
	 * @return bool IP为非法IP字符串时，返回false，否则返回true
	 */
	function set_remote_ip( $ip )
	{
		if ( ip2long($ip) !== false ) {
			$this->oauth->remote_ip = $ip;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 根据用户UID或昵称获取用户资料
	 *
	 * 按用户UID或昵称返回用户资料，同时也将返回用户的最新发布的微博。
	 * <br />对应API：{@link http://open.speed.server.com/wiki/2/users/show users/show}
	 *
	 * @access public
	 * @param int  $uid 用户UID。
	 * @return array
	 */
	function show_user_by_id( $uid )
	{
		$params=array();
		if ( $uid !== NULL ) {
			$this->id_format($uid);
			$params['id'] = $uid;
		}

		return $this->oauth->get('user/show', $params );
	}

	/**
	 * 根据用户UID或昵称获取用户资料
	 *
	 * 按用户UID或昵称返回用户资料，同时也将返回用户的最新发布的微博。
	 * <br />对应API：{@link http://open.speed.server.com/wiki/2/users/show users/show}
	 *
	 * @access public
	 * @param string  $screen_name 用户UID。
	 * @return array
	 */
	function show_user_by_mail( $screen_name )
	{
		$params = array();
		$params['mail'] = $screen_name;

		return $this->oauth->get( 'show/show', $params );
	}
	
}

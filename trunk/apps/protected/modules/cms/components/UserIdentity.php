<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
    $username = $this->username;
    $password = md5($this->password);
    // $user = Users::model()->find('username = :username', array(':username' => $username));
    $user = Users::model()->find('username = :username AND password = :password', array(':username' => $username, ':password' => $password ));
    
    // if user is exist
    if($user){
      $this->errorCode=self::ERROR_NONE;       

      $session = new CHttpSession;
      $session->open();
      $session['user_id'] = $user->id;
      $session['username'] = $user->username;
    }else{
      $this->errorCode=self::ERROR_USERNAME_INVALID;
    }
  
		// $users=array(
			// username => password
			// 'admin'=>'admin',
		// );
		// if(!isset($users[$this->username]))
			// $this->errorCode=self::ERROR_USERNAME_INVALID;
		// else if($users[$this->username]!==$this->password)
			// $this->errorCode=self::ERROR_PASSWORD_INVALID;
		// else
			// $this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}
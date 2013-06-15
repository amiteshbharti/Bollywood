<?php
// model
ini_set ( "display_errors", "1" );
// include "connection.php";

require_once (PDO_PATH . '/cxpdo.php');
require_once (PDO_PATH . '/mysql.php');

/**
 * @classname loginModel
 *
 * This class contain all methods that describes all the functionality of the login page....
 *
 * @package Zend_Magic
 *         
 * @author Abhishek Arora
 *         @date 28-03-2013
 * @version version - 2
 *          @modified-by Amitesh Bharti
 *          @modification-date 28-03-2013
 *          ...
 *         
 */
class loginModel {
	private $_username = "";
	private $_password = "";
	private $_passlen = "";
	// public $errors = null;
	public $errors = array ();
	private $_query = "";
	public $conn_obj;
	public $_db;
	public function __construct() {
		include ('database.php');
		$this->_db = db::instance ( $config );
	}
	
	/* function will check whether ussername and password are unset or not after logout */
	public function check_session() {
		if (! empty ( $_REQUEST ['logout'] )) {
			
			unset ( $_SESSION ['username'] );
			unset ( $_SESSION ['password'] );
			return "session unset";
		} else {
			return "not unset";
		}
	}
	
	/* function will check for login username and password */
	public function confirm_session() {
		$this->_username = $_REQUEST ['username'];
		$this->_password = $_REQUEST ['passwd'];
		$this->_passlen = strlen ( $this->_password );
		$flag = 0;
		$id_pattern = "[a-zA-Z0-9]$";
		if ((empty ( $_REQUEST ['passwd'] ) && empty ( $_REQUEST ['username'] ))) {
			$_SESSION ['start'] = 'Please enter usename and password';
			header ( "location: index.php" );
		} elseif (empty ( $_REQUEST ['username'] )) {
			$_SESSION ['start'] = 'Empty Username';
			header ( "location: index.php" );
		} elseif (empty ( $_REQUEST ['passwd'] )) {
			$_SESSION ['start'] = 'You have entered empty password';
			header ( "location: index.php" );
		}
		
		if (! empty ( $this->_username ) && ! empty ( $this->_password )) {
			
			// if(($this->_passlen>0)&&($this->_passlen<11))
			if (($this->_passlen > 0)) {
				
				$data ['columns'] = array (
						'user_id',
						'password',
						'user_type' 
				);
				$data ['tables'] = 'user_master';
				$data ['conditions'] = array (
						'user_id' => $this->_username,
						'password' => $this->_password 
				);
				$result = $this->_db->select ( $data );
				$row = $result->fetch ( PDO::FETCH_ASSOC );
				// $this->query="SELECT user_id, password, user_type FROM user_master where user_id='$this->_username' and "."password='".$this->_password."';";
				
				// $result = $this->dbh->query($this->query);
				// $row=$result->fetch();
				
				if (($row ['user_id'] == $this->_username) && ($row ['password'] == $this->_password)) {
					$flag = 1;
				}
				/*
				 * else{ return "not match"; }
				 */
				
				if ($flag == 1) {
					$_SESSION ['log'] = 'yes';
					if (! isset ( $_SESSION ['visit'] )) {
						
						$_SESSION ['visit'] = 1;
					} 

					else {
						
						$_SESSION ['visit'] ++;
					}
					
					if (($row ['user_type'] == 'user')) {
						
						$data ['columns'] = array (
								'user_name',
								'password' 
						);
						$data ['tables'] = 'user_details';
						$data ['conditions'] = array (
								'user_name' => $this->_username 
						);
						$results = $this->_db->select ( $data );
						$rows = $results->fetch ( PDO::FETCH_ASSOC );
						
						// $query="select user_name,password from user_details where user_name='".$this->_username."';";
						// $results = $this->dbh->query($query);
						// $rows=$results->fetch();
						$_SESSION ['username'] = $rows ['user_name'];
						$_SESSION ['password'] = $rows ['password'];
						return "user";
					} 

					else if (($row ['user_type'] == 'admin')) {
						
						$data ['columns'] = array (
								'user_name',
								'password' 
						);
						$data ['tables'] = 'user_details';
						$data ['conditions'] = array (
								'user_name' => $this->_username 
						);
						$results = $this->_db->select ( $data );
						$rows = $results->fetch ( PDO::FETCH_ASSOC );
						
						// $query="select user_name,password from user_details where user_name='".$this->_username."';";
						// $results = $this->dbh->query($query);
						// $rows=$results->fetch();
						$_SESSION ['username'] = $rows ['user_name'];
						$_SESSION ['password'] = $rows ['password'];
						return "admin";
					}
					// header('Location: admin_home.php');
				} else {
					$_SESSION ['start'] = "Username and Password dont match";
					header ( "location: index.php" );
				}
				
				/*
				 * if(!isset($flag)) { $errors[]="User does not exist"; $flag=0; //return "flag"; }
				 */
			}
			/*
			 * else { $_SESSION['start']="Password should not be empty"; header("location: index.php"); }
			 */
		}
		
		/*
		 * else if(!empty($this->_username)) { $errors[]="password field is empty"; //return "empty username"; } else if(!empty($this->_password)) { $errors[]="User field is empty"; //return "empty password"; } else { $errors[]="enter username and password"; //return "empty username and password"; }
		 */
	}
	/* function will used to recover password of user from database in case if user forgot password */
	public function passwordRecovery($arrValue) {
		$userName = $arrValue ['uname'];
		$eid = $arrValue ['eid'];
		
		$data ['columns'] = array (
				'user_name',
				'email_id',
				'password' 
		);
		$data ['tables'] = 'user_details';
		$data ['conditions'] = array (
				'user_name' => $userName 
		);
		$result = $this->_db->select ( $data );
		
		// if matching eid to find to user password cause he/she already know username
		$row = $result->fetch ( PDO::FETCH_ASSOC );
		if (isset ( $row )) {
			if ($row ['email_id'] == $eid) {
				// return "your password is \t ".
				return $row;
			} else
				return 1;
		}
		// else
	}
}

?>

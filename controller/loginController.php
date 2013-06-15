<?php
session_start();

ini_set("display_errors","1");


/**
* @classname            loginController
*
* This class contain all methods that controls  the functionality of the login page....

* @package              Zend_Magic

* @author               Arpit Goyal
* @date                 26-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    26-03-2013
* ...
*/



class loginController
{
	
	#method to obtain connection from mysql database
	public function dbConnect()
	{	$config=array();
		require_once(PDO);									#including CXPDO class
		require_once(PDO_CONFIG);							#Requiring configuration array for PDO
		$db = dbclass::instance($config);					#calling static instance() method of dbclass 
															#which returns connection object	
															
		return $db;  										#returning connection object	
	}
	
    public function __construct()
    {
    	
      
    }
    /*function will load login and header page*/
    public function execute_process()
    {
		loadview('header.php');
		loadview('player.php');
                
    }
    public function saveUser()
    {
	
	//$_SESSION["$_SESS_NAME"]=;
/*		$db = $this->dbConnect();
		$data = array(
					"username"=>"amitesh",
					
					"email_id"=>"amitesh@yahoo.com"
				
					);
		$result=$db->insert('user',$data);
*/ 

    echo 'dffd';              
    }
    
     public function playGameRule()
    {
	/* this method contain the control statement to load game rule*/
		loadview('header.php');	
		loadview('game_rule.php');
                   
    }
    public function playGame()
    {
	/* this method contain the control statement of game logic*/
	   
	    $user= 'Amitesh'; //$_SESSION["$_SESS_NAME"];
	    $movie= array(
	                  '3 idiots'=>array(
	                                  'actor'=>array('Aamir Khan','R. Madhavan','Sharman Joshi'),
	                                  'actoress'=>array('Kareena Kapoor'),
	                                  'villion'=>array('Boman Irani')
	                                  
	                                  ),
	                  'Taare Zameen par'=>array(
	                                  'actor'=>array('Aamir Khan','Darsheel Safary'),
	                                  'actoress'=>array('Tisca Chopra'),
	                                  'villion'=>array('Vipin Sharma')
	                                  
	                                  )
	                   ); 
	   //  shuffle($movie);  
	     //$Parameter = array();
	         
	     $movieIs=(array_rand( $movie));
	     
	     $actorIs=array_rand($movie["$movieIs"]['actor']);
	     $actoressIs=array_rand($movie["$movieIs"]['actoress']);
	     $villionIs= array_rand($movie["$movieIs"]['villion']);
	     
	     	   
	     
	     $Parameter['user']=      $user;
	     $Parameter['movieIs']=    $movieIs;   
	     $Parameter['actorIs']=    $movie["$movieIs"]['actor'][$actorIs];   
	     $Parameter['actoressIs']= $movie["$movieIs"]['actoress'][$actoressIs];
	     $Parameter['villionIs']=  $movie["$movieIs"]['villion'][$villionIs];    
	                    
		loadview('header.php');	
		loadview('game.php',$Parameter);
                   
    }
       
}    
?>

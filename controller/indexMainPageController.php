<?php

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



class indexMainPageController
{
    public function __construct()
    {
    	
      
    }
    /*function will load login and header page*/
    public function execute_process()
    {   
		loadview('header.php');
		loadview('indexMainPage.php');
		//loadview('player.php');
                
    }
    

   
}    
?>

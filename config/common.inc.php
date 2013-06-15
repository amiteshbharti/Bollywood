<?php
define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);  				//output-->   /var/www

define('SITE_ROOT',DOC_ROOT.'/Bollywood/trunk/');           //output-->  /var/www/main_project/
//echo SITE_ROOT; 
define('SITE_PATH','http://'.$_SERVER['HTTP_HOST'].'/Bollywood/trunk/');   //output-->    http://localhost/Bollywood/        \

define('IMAGE_PATH',SITE_PATH.'images/');    		//output-->                http://localhost/Bollywood/images/
//echo IMAGE_PATH;
define('CSS_PATH',SITE_PATH.'css/');         		//output-->                http://localhost/Bollywood/css/
define('JS_PATH',SITE_PATH.'js/');           		//output-->                http://localhost/Bollywood/js/
define('LIBRARY_ROOT',SITE_ROOT.'library/'); 		//output-->                /var/wwwmvc/library/
define('VIEW_PATH',SITE_ROOT.'view/');       		//output-->                /var/wwwmvc/view/
//echo VIEW_PATH;
define('MODEL_PATH',SITE_ROOT.'model/');     		//output-->                /var/wwwmvc/model/
// define('username',$_REQUEST['username']);
// define('password',$_REQUEST['passwd']);
define('ip_address',$_SERVER['SERVER_ADDR']);
define('access_date',date('l jS \of F Y h:i:s A'));
define('browser_details',$_SERVER['HTTP_USER_AGENT']);
define('port_number',$_SERVER['REMOTE_PORT']) ;
define('machine_name' ,@getHostByAddr($ip_address));

#php mailer
define('PHPMAILER_CLASS_ROOT',SITE_ROOT.'PHPmailer/'); 
define('PHPMAILER_CLASS_ROOT_CLASS',PHPMAILER_CLASS_ROOT.'trunk/'); 

#PDO constants 	
define('PDO',SITE_ROOT.'library/pdo/cxpdo_modified.php');
define('PDO_CONFIG',SITE_ROOT.'library/pdo/pdo_config.php');


function loadView($templateName,$arrPassValue=''){

     $view_path=VIEW_PATH.$templateName;
         //echo $view_path;
         if(file_exists($view_path)){
            if(isset($arrPassValue)){
                 $arrData=$arrPassValue;
            }

            include_once($view_path);
         }else{
            die($templateName. ' Template Not Found under View Folder');
         }

}

function loadModel($modelName,$function,$arrArgument=''){
         $model_path=MODEL_PATH.$modelName.'.php';

         if(file_exists($model_path)){
            if(isset($arr)){
                 $arrData=$arrPassValue;
            }

            include_once($model_path);
            $modelClass=$modelName.'Model';
            if(!method_exists($modelClass,$function)){
                die($function .' function not found in Model '.$modelName);
            }

            $obj=new $modelClass;
            if(isset($arrArgument)){
                return $obj-> $function($arrArgument);
            }else{
                return $obj-> $function();
            }
         }else{
            die($modelName. ' Model Not Found under Model Folder');
         }

}
?>

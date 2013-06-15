<?php

ini_set("display_errors","1");
/* Example Config for MYSQL */
$config = array();
$config['user'] = 'root';
$config['pass'] = 'root';
$config['name'] = 'test';
$config['host'] = 'localhost';
$config['type'] = 'mysql';
$config['port'] = null;
$config['persistent'] = true;

//echo "here";
//Include the CXPDO Class
include('cxpdo_modified.php');

//die();
//Create/GET the instance - pass the config values
$db = dbclass::instance($config);

//So that print_r functions work
print '<pre>';

/*
Functions:
print $db->insert($tables, $data, $return);
print $db->replace($tables, $data, $return);
print $db->update($tables, $data, $where, $return);
print $db->select($data, $return);
print $db->delete($tables, $where, $return);
print $db->count($tables, $where, $return);
*/

/*
 * SELECT ALL RECORDS
 

   $data = array('tables' => 'users');
   $result = $db->select($data);

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	    print_r($row);
    }


*/



 //* SELECT WHERE RECORDS
 
 
 /* v.imp
 to use both and and or in this query 
 for strings -use \'
 * 
 * for integeres -use '
 * $data['conditions'] = array('firstname = ' =>'\'siddarth\' and ','lastname = ' =>'\'chowdhary\'');
 * SELECT * FROM `users`  WHERE firstname = 'siddarth' and lastname = 'chowdhary'
    
   */
    //$data['conditions']		= array('OR',firstname' =>"saurabh");
    //$data['group_by'] = array('posts.id');
    //$data['order_by'] = 'posts.id';
    //$data['limit']		= 10;
    //$data['offset']		= 0;
    //print_r($data);die();
	$data				= array();
    $data['tables']		= 'users';

	//$conditions = array(
	//'id' => array(1,2),
	//'lastname' => array('chowdhary')
	//);

	//$data['conditions']		= $conditions;

	//$data['conditions'] = array('id' =>2);
	$data['conditions'] = array('firstname = ' =>'\'siddarth\' and ','lastname = ' =>'\'chowdhary\'');
	//$data['conditions']		= array('id' => array(1,2),'lastname'=>'chowdhary');    //??where with or not clear till now
    //$data['conditions']		= array('id' => array(1,2));    //??where with or not clear till now
    //$data['conditions']		= array('lastname'=>'chowdhary');    //??where with or not clear till now

//echo '<pre>';

//print_r($data);
    $result = $db->select($data);
    print($result->queryString);
	//print_r($result);
	echo '<pre>';
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	    print_r($row);
    }
//die("here");




/*
 * INSERT NEW ROW IN THE TABLE
 
$data[] = array('firstname' => 'peter', 'lastname' => 'petrelli','email'=>'peter@osscube.com','password'=>'peter');
//$data[] = array('firstname' => 'peter', 'lastname' => 'petrelli','email'=>'peter@osscube.com','password'=>'peter');
//add rows here like above for multiple insert at a time
//Add them
foreach($data as $row) {
	$result = $db->insert('users', $row);            //first arg is tablename and second is data in the array
	print 'Created row '. $db->lastInsertId(). ' in the table "users"<br />';
}

die;

*/

/*
 * UPDATE ROW  WITH NEW DATA
 

$data = array('firstname' => 'saurabh');
$where = array('id' => 2);

$result = $db->update('users', $data, $where);

print 'Updated row <br />';

*/

/*die;
*/


/*
 * DELETE ROW 
$result = $db->delete('users', array('id' => 5));
print 'Deleted Row<br />';

*/

/*
 * COUNT ROWS
 
$result = $db->count('users');
print 'There are '. $result->fetchColumn(). ' rows in the table users<br />';

*/

/* VIEW LAST QUERY RUN
var_dump($result->queryString);

*/

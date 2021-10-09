<?php
date_default_timezone_set('Africa/Johannesburg');
ini_set('max_execution_time', 150);
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', '1');

$DB_host = '185.61.135.173';
$DB_user = 'vpnquest1_user';
$DB_pass = 's+(WT#r4AaB&';
$DB_name = 'vpnquest1_dbase';



$mysqli = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$values = array();
$username = $_GET['username'];
$username = $mysqli->real_escape_string($username);
$query = $mysqli->query("SELECT is_duration, vip_duration, private_duration
FROM 
user 
WHERE 
username='".$username."' 
AND is_active=1");
if($query->num_rows > 0)
{
	$row = $query->fetch_assoc();
	$prem = $row['is_duration'];
	$vip = $row['vip_duration'];
	$pri = $row['private_duration'];
}else{
	$json_data = array(
        "status" => 'false',
        "message" => 'invalid account'
        );
    
        echo json_encode($json_data);
}
    $json_data = array(
        "premium" => ($prem),
        "vip" => ($vip),
        "private" => ($pri)
        );
                
echo json_encode($json_data);	
?>

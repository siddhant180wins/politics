<?php
require_once __DIR__ . '/db_connect.php';
/*
Needed variables
$email
$password
*/
$db = new DB_CONNECT();
//echo 'hii'; 
$response=array();
$message="start";
$email=$_POST['email'];
$password=$_POST['password'];
$result=mysql_query("select name,constituency_id,cand_id from CAND_SIGNUP where email=$email and password = $password ") or die(mysql_error());
$row=mysql_fetch_array($result);
$length=mysql_num_rows($result);
if($length==1)
{
$response['name']=$row['name'];
$response['constituency']=$row['constituency_id'];
$response['cand_id']=$row['cand_id'];
$response['success']=1;
$response['message']="success";
}
else
{
$response['success']=0;
$response['message']="failure";
}
	
echo jason_encode($response);
?>


<?php
require_once __DIR__ . '/db_connect.php';
/*
Needed variables
$cand_id 
seemore
*/
$db = new DB_CONNECT();
//echo 'hii'; 
$response=array();
$message="start";
$cand_id=$_POST['user_id'];
//$cand_const_id=$_POST['cand_const_id'];
$seemore=$_POST['seemore'];
//$cand_id=//$_POST['cand_id'];
$max=($seemore+1)*5;
$min=$max-5;
if($min <=0)
$min=0;
echo "1";
$result=mysql_query("select name,msg,msg_id,date_time,pic from CAND_SIGNUP as C,CAND_FOLLOWED as F,CAND_UPDATES as U where F.cand_id=$cand_id and F.following_id=U.cand_id and C.cand_id=F.following_id order by date_time desc") or die(mysql_error());
$length=mysql_num_rows($result) or die(mysql_error());
//echo "122334";
$x=0;
$y=1;
$row=mysql_fetch_array($result) or die(mysql_error());
//echo $row['name'];
while( $y<=($seemore+1)*5-5 && $y<$length )
{
//echo $y;
$row=mysql_fetch_array($result);
$y++;
}

	while( $row && $x<5 && $x < $length)
	{

	
//	echo $x;
	$response['msg_id'.$x]=$row['msg_id'];
	$response['msg'.$x]=$row['msg'];
	$response['name'.$x]=$row['name'];
	$response['date_time'.$x]=$row['date_time'];
	$response['pic'.$x]=$row['pic'];
	$row=mysql_fetch_array($result);
	echo $x;
//	echo "<br>";
	$x++;
	}

echo json_encode($response);
/*for($i=0;$i<$x;$i++)
{
echo $response['msg'.$i];
echo $response['name'.$i];
echo $response['date_time'.$i];
echo $response['pic'.$i];
echo "<br>";
}*/
?>


<?php
require_once __DIR__ . '/db_connect.php';
/*
Needed variables:
cand_id 
seemore
*/
$db = new DB_CONNECT();
//echo 'hii'; 
$response=array();
$message="start";
$seemore=0;//$_POST['seemore'];
$cand_id=1;//$_POST['cand_id'];
$max=($seemore+1)*5;
$min=$max-5;
if($min <=0)
$min=0;
echo "2222333";
$result=mysql_query("select V.username,date_time,reason,anonymous,pic from VOTE_UP_DOWN as V,USER_SIGNUP as U where V.vote=0 and U.user_id=V.user_id and cand_id= $cand_id  order by date_time desc") or die(mysql_error());
$length=mysql_num_rows($result) or die(mysql_error());
echo "222";
//echo "$length";
$x=0;
$y=1;
$row=mysql_fetch_array($result) or die(mysql_error());
while( $row && $y<=($seemore+1)*5-5 && $y<$length )
{
//echo $y;
$row=mysql_fetch_array($result);
$y++;
}

	while( $row && $x<5 && $x < $length)
	{

	$row=mysql_fetch_array($result);
	//echo $x;

	$response['date_time'.$x]=$row['date_time'];
	$response['reason'.$x]=$row['reason'];
	$response['username'.$x]=$row['V.username'];
	if($row['anonymous']==1)
	$response['username'.$x]='Anonymous';
	$x++;
	}

	
echo json_encode($response);
/*for($i=0;$i<$x;$i++)
{
echo $response['date_time'.$i];
echo $response['reason'.$i];
echo $response['username'.$i];

}*/
?>
	

  

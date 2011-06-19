<?php
require("config.php"); 


function dbcon()
{
    @$spojeni=mysql_connect($GLOBALS["dbserver"],$GLOBALS["dbuser"],$GLOBALS["dbpass"]);
    if (!$spojeni): die('Spojeni se serverem nelze vytvorit! / Could not connect to database server!'. mysql_error());
    endif;
    mysql_select_db  ($GLOBALS["dbname"],$spojeni);
    return $spojeni;
}

function selectAct() {
	$conn = dbcon();

	return $result = mysql_query("SELECT * FROM t_aktuality GROUP BY id DESC");
	mysql_close($conn);

}
function getCredentials($login,$passwd) {
	$conn = dbcon();
	return $result = mysql_query("SELECT login,passwd FROM t_users WHERE login='$login' AND passwd = '$passwd'");
	mysql_close($conn);
}


function insertAdmin($name, $password) {
	$conn = dbcon();
	$sql = "INSERT INTO t_users(login,passwd) values ('$name','$password') ";
		mysql_query($sql);
		mysql_close($conn);
}

function insertAct($name, $aktualita) {
	$conn = dbcon();
	$dt1=date('Y-m-d'); 
	
   	$sql = "INSERT INTO t_aktuality(publishdate,aktualita,name) values ('$dt1','$aktualita','$name')";
	mysql_query($sql);
	mysql_close($conn);

}

//insertAdmin("admin","changeit30");
/*
$result = getCredentials("admin");
echo "aaaaa";
echo $result;
while($row = mysql_fetch_array($result))
  {
  echo $row['login'] . " " . $row['passwd'];
  echo "<br />";
  }
*/
/*
insertAct("pepa z depa", "chci prizemoney");

$result = selectAct();
while($row = mysql_fetch_array($result))
  {
  echo $row['publishdate'] . " " . $row['aktualita']. " " . $row['name'];
  echo "<br />";
  }
*/


?>


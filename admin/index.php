<?php 
//ob_start();
session_start();

require("../functions.php");
require("db.php"); 


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title>České Budějovice - Praha</title>
 
<!-- Page-specific styles --> 
<link rel="stylesheet" type="text/css" href="../js/global.css">
<!-- Dependency source files -->
<link rel="stylesheet" type="text/css" href="../yui/build/reset-fonts-grids/reset-fonts-grids.css" /> 
<link rel="stylesheet" type="text/css" href="../yui/build/layout/assets/layout-core.css" />

</head> 
<body class="yui-skin-sam"> 
<div id="doc1" class="yui-t1">

	<?php

	function showLoginForm() {
		print <<<END
			<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
			<form name="form1" method="post" action="index.php">
			<td>
			<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
			<tr>
			<td colspan="3"><strong>Member Login </strong></td>
			</tr>
			<tr>
			<td width="78">Username</td>
			<td width="6">:</td>
			<td width="294"><input name="login" type="text" id="login"></td>
			</tr>
			<tr>
			<td>Password</td>
			<td>:</td>
			<td><input name="passwd" type="password" id="passwd"></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="SubmitLogin" value="Login"></td>
			</tr>
			</table>
			</td>
			</form>
			</tr>
			</table>
END;
	}

		function showLoginOut() {
			print <<<END
				<div id="logout" name="logout">
				<form name="logout" method="post" action="index.php">
				<td><input type="submit" name="SubmitLogout" value="LogOut"></td>
				</form>
				</div>
END;
		}
	// Function to display form
	function showForm($errorName=false,$errorMesg=false){
	   if ($errorName)  $errorTextName  = "Please enter your name!";
	   
	   if ($errorMesg)  $errorTextMesg  = "Please leave a longer message! (Min is 10 chars)";

	   echo '<form action="." method="POST"><table>';

	   // Display name field an error if needed
?>		   
		<tr>
			<td>Name:</td>
			<td>
			<select name="name">
			  <option value="Michal Odvárko" selected="true">Michal Odvárko</option>
			  <option value="Tomáš Odvárko">Tomáš Odvárko</option>
			  <option value="Petr Náprstek">Petr Náprstek</option>
			  <option value="Pavel Topinka">Pavel Topinka</option>
			</select>
			</td>
<?php
	   if ($errorName) echo "<tr><td colspan='2'>$errorTextName</td></tr>";

	   

	   // Display message field an error if needed
	   echo '<tr><td>Message:</td><td><textarea class="styled" id="styled" name="mesg"></textarea></td></tr>';
	   if ($errorMesg) echo "<tr><td colspan='2'>$errorTextMesg</td></tr>";


	   echo '<tr><td><input type="submit" name="SubmitForm" value="Send"></td></tr>';
	   echo '<form>';
	}//end function showForm()


function showNormalPage() {
	

	if (!isset($_POST['SubmitForm'])) {
		showForm();
	} else {
	   //Init error variables
	   $errorName  = false;
	   $errorEmail = false;
	   $errorMesg  = false;

	   $name  = isset($_POST['name'])  ? trim($_POST['name'])  : '';
	   $mesg  = isset($_POST['mesg'])  ? trim($_POST['mesg'])  : '';

	   if (strlen($name)<3)  $errorName = true;
	   if (strlen($mesg)<10) $errorMesg = true;

	   // Display the form again as there was an error
	   if ($errorName  || $errorMesg) {
	      showForm($errorName,$errorMesg);
	   } else {
		showForm();
		insertAct($name, $mesg);
		$result = selectAct();

		echo "<table>";

		while($row = mysql_fetch_array($result))
		  {
		  	echo "<tr>";
			echo "<td>".$row['id'] . "</td><td>".$row['publishdate'] . "</td><td> " . $row['aktualita']. "</td><td> " . $row['name']."</td>";
		  	echo "</tr>";
		  }
		echo "</table>";


	   }

	}

}
//session_register("login");
if (isset($_POST['SubmitLogout'])) {
	unset($_SESSION['login']);
	unset($_SESSION['passwd']);
	echo "<H1>Jsi Odlogovaný</H1>";
	echo "<a href='index.php'>Pokračuj Zde</a>";			
	die();
}


	if(!isset($_SESSION['login']) || !isset($_SESSION['passwd'])){
	//header("location:main_login.php");

		if (!isset($_POST['SubmitLogin'])) {
			showLoginForm();
		} else {
			//zkontroluj login a heslo a zapis do sesny a refresni
			//echo "<h1>budu kontrolovat heslo z databaze a zapisovat do sessny</h1>";
			$login  = isset($_POST['login'])  ? trim($_POST['login'])  : '';
		    $passwd  = isset($_POST['passwd'])  ? trim($_POST['passwd'])  : '';
			//echo $login ;
			//echo "<br/>";
			//echo $passwd;
			
			$result = getCredentials($login,$passwd);
			
			
			$count=mysql_num_rows($result);
			// If result matched $myusername and $mypassword, table row must be 1 row

			if($count>0){
			// Register $myusername, $mypassword and redirect to file "login_success.php"
			$_SESSION['login'] = stripslashes($login);
			$_SESSION['passwd'] = $passwd;
			echo "<H1>Jsi zalogovaný</H1>";
			echo "<a href='index.php'>Pokračuj Zde</a>";			}
			else {
			echo "<H1>Špatné uživatelské jméno nebo heslo</H1>";
			echo "<a href='index.php'>Jdi Zpět</a>";
			}
			
			/*
			$row = mysql_fetch_array($result);
			  
			$db_login = $row['login'];
			$db_passwd = $row['passwd'];
			  
			echo $db_login ;
			echo "<br/>";
			echo $db_passwd;
			*/
			
			
	    }
	} else {
	   	showNormalPage();
		showLoginOut();
		
	}
	ob_end_flush();
	?></body>

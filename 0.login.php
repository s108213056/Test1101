<?php
require_once("dbconfig.php");
	 //???session ?\??, ?????bphp?{????S??X????T?????e???
	$loginID = $_POST["id"];
	$password = $_POST["pwd"];

$sql = "select loginID,role,level from user where password=PASSWORD(?);";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_bind_param($stmt, "s", $password); //bind parameters with variables
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
if ($rs = mysqli_fetch_assoc($result)) {
	if ($rs['loginID'] == $loginID) {
		$_SESSION["userID"] = $loginID; //??isession ??????w??
		//$_SESSION["role"] = $rs['role']; //??isession ??????w??
		$_SESSION["role"] = $rs['level']; //??isession ??????w??
		header("Location: 1.listUI.php");
	} else {
		$_SESSION["userID"] = '';
		$_SESSION["role"] = '';
		header("Location: 0.loginUI.php");
	}
}
?>

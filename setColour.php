<?php
require("dbconfig.php");
if(isset($_GET['id'])) {
	$id=(int)$_GET['id'];
} else {
	$id=0;
}

$t=(int)$_GET['a'];

if ($id>0) {
	if ($a <=5) {
		echo '<font style="color:black;">$rs["msg"]</font>';
	} if ($a >=6 && $a <=10) {
		echo '<font style="color:blue;">$rs["msg"]</font>';
	} if($a >=11) {
		echo '<font style="color:red;">$rs["msg"]</font>';
	}
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);

	//echo "liked.";
	header("Location: 1.listUI.php");
} else {
	echo "";
}
?>

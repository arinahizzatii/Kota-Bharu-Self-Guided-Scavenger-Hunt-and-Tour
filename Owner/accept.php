<?php

include("../dbconn.php"); 

if (isset($_POST['Approve'])) {
	$checkpoint_id = $_POST['CheckpointID'];
	$sql = "UPDATE `checkpoint` SET `CPStatus`='1' WHERE CheckpointID='".$checkpoint_id."'";
	$query = mysqli_query($connection, $sql);

	header ('location: pending.php');
}


?>
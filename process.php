<?php

session_start();

$mysqli =  new mysqli("localhost","root","","crudapp")or die(mysqli_error($mysqli));

 $id = 0;
 $update = false;
 $name = '';
 $email = '';
 $contact = '';
 $location = '';


if (isset($_POST['save'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$location = $_POST['location'];
	
	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";
     
     header("location:index.php");
        
	$mysqli->query("INSERT INTO data(name,email,contact,location) VALUES ('$name','$email','$contact','$location')") or die($mysqli->error);
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id=$id")or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";
    
    header("location:index.php");
}
if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM data WHERE id=$id")or die($mysqli->error());
	if(count($result)==1){
		$row = $result->fetch_array();
		$name = $row['name'];
		$email = $row['email'];
		$contact = $row['contact'];
		$location = $row['location'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$location = $_POST['location'];

	$mysqli->query("UPDATE data set name='$name',email='$email',contact='$contact',location='$location' WHERE id = $id")or die
	($mysqli->error);

	$_SESSION['message'] = "Record has been Updated!";
	$_SESSION['msg_type'] = "warning";

	header("location:index.php");

}
?>



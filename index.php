<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Hassan Sikandar">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, intial-scale=1,shrink-to-fit=no">
		<title>CRUD APPLICATION</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="login.php">
		<link rel="stylesheet" type="text/css" href="registration.php">
	</head>
	<body>
		<?php require_once 'process.php';?>
        <?php 
          if (isset($_SESSION['message'])):?>
          	<div class="alert alert-<?=$_SESSION['msg_type']?>">
          	<?php 
             echo $_SESSION['message'];
             unset ($_SESSION['message']);
          	?> 
          	</div>

            <?php endif ?>



		
		<div class="container" style="background-color: black;">
			<div class="background-image" style="background-image: url('navigation-drawer-background-image-1.jpg');">

			<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">STUDENT DATA CENTER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>
			<div>

			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h3 class="text-center text-dark  mt-2">USER REGISTRATION FORM</h3>
						<hr>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-4">
						<h3 class=" text-center text-info mt-2">Add Record</h3>
						<form action="process.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<div class="form-group">
								<label>NAME</label>
								<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Name" >
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter Email" >
							</div>
							<div class="form-group">
								<label>Contact</label>
								<input type="tel" name="contact" class="form-control" value="<?php echo $contact; ?>" placeholder="Enter phone" >
							</div>
							<div class="form-group">
								<label>Location</label>
								<input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter phone" >
							</div>
							<div class="form-group">
								<?php 
                                  if ($update == true):

								?>
								 <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
								 <?php else:?>
								<button type="submit" class="btn btn-primary" name="save">SAVE</button>
							<?php endif;?>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
		<div class="search-bar justify-content-right" >
					<input type="text" name="search" class="search-bar" placeholder="Search....">
					<div class="form-group">
								<button type="submit" class="btn btn-primary" name="Search" style="margin: 10px;">Search</button>
							</div>
				</div>

        <?php 
          $mysqli =  new mysqli("localhost","root","","crudapp")or die(mysqli_error($mysqli));
          $result = $mysqli->query("SELECT * FROM data")or die($mysqli->error);
          // pre_r($result);
          ?>
           <div class="justify-content-center">
           	<table class="table">
           		<thead>
           			<tr>
           				<th>Name</th>
           				<th>Email</th>
           				<th>Contact</th>
           				<th>Location</th>
           				<th colspan="2">Action</th>
           			</tr>
           		</thead>
           		<?php  
           		 while ($row =$result->fetch_assoc()): ?>
           		 	<tr>
           		 		<td><?php echo $row['name'];?></td>
           		 		<td><?php echo $row['email'];?></td>
           		 		<td><?php echo $row['contact'];?></td>
           		 		<td><?php echo $row['location'];?></td>
           		 		<td>
           		 			<a href="index.php?edit=<?php echo $row['id'];?>"
           		 				class="btn btn-info">Edit</a>
           		 				<a href="index.php?delete=<?php echo $row['id'];?>"
           		 				class="btn btn-danger">Delete</a>
           		 		</td>
           		 	</tr>
           		 <?php endwhile; ?>
           	</table>
           </div>

          <?php

          function pre_r($array){
          	echo '<pre>';
          	print_r($array);
          	echo '</pre>';
          }
        ?>

		</div>
	</div>
	</body>
</html>
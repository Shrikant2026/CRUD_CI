<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View List</title>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">List</a>
      <form class="d-flex" name ="search" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
 </nav>
 <div class="container" style="padding-top: 50px;">
 	<div class="row">
 		<div class="col-md-12">
 			<?php
 			$success = $this->session->userdata('success');
 				if($success != "") {
 			?>
 			<div class="alert alert-success"><?php echo $success; ?></div>
 			<?php
 				}
 			?>
 			<?php
 			$failure = $this->session->userdata('failure');
 				if($failure != "") {
 			?>
 			<div class="alert alert-danger"><?php echo $failure; ?></div>
 			<?php
 				}
 			?>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-6"><h3>Users List</h3></div>
 		<div class="col-6 text-right"><a href="<?php echo base_url().'index.php/user/create'; ?>" class="btn btn-primary" style="float: right;">Create User<i class="fa fa-plus-circle" style="font-size:20px; margin: 5px;"></i>
</a></div>	
 	</div>
 	<hr>
 	<div class="row">
 		<div class="col-md-12">
 			<table class="table table-striped">
 				<tr>
 					<th>ID</th>
 					<th>Name</th>
 					<th>Email</th>
          <th>Password</th>
 					<th width="60">Edit</th>
 					<th width="100">Delete</th>
 				</tr>
 				<?php 
          if (!empty($users)) {
   					foreach ($users as $user) {
 				?>
 				<tr>
 					<td><?php echo $user['userId']; ?></td>
 					<td><?php echo $user['name']; ?></td>
 					<td><?php echo $user['email']; ?></td>
          <td><?php echo $user['password']; ?></td>
 					<td>
 						<a href="<?php echo base_url().'index.php/user/edit/'.$user['userId'] ?>" class="btn btn-primary" >EDIT</a>
 					</td>
 					<td>
 						<a href="<?php echo base_url().'index.php/user/delete/'.$user['userId'] ?>" class="btn btn-danger" >DELETE</a>
 					</td>
 				</tr>
 				<?php
 					}
 				?>
        <?php
          }
        ?>
 			</table>
 		</div>
 	</div>
 </div>
</body>
</html>
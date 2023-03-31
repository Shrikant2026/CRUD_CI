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
	<title>Add record</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>"> 
</head>
<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">Navbar</a>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <form method="POST" name="createUser" action="<?php echo base_url().'index.php/User/edit/'.$user['0']['userId']; ?>">
  <div class="container" style="padding-top: 50px; max-width: 720px;">
    <div class="form-check form-switch" style="text-align: right;">
      <input class="form-check-input" id="toggle-switch" data-toggle-id="1" type="checkbox" type="checkbox" id="flexSwitchCheckChecked" style="float: right;" checked>
      <label class="form-check-label" for="flexSwitchCheckChecked" style="margin-right: 40px;" >Select to set it as active user</label>
    </div>
    <input type="hidden" name="is_active" id="is_active" value="0">
    <div class="mb-3">
      <label for="exampleInputName" class="form-label">Name</label>
      <input type="name" name="name" class="form-control" id="exampleInputName" value="<?php echo set_value('name', $user['0']['name']); ?>" aria-describedby="namehelp">
      <div id="nameHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('email', $user['0']['email']); ?>" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="text" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo set_value('password', $user['0']['password']); ?>">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="<?php echo base_url().'index.php/user/index'; ?>" name="cancel" class="btn btn-warning">Cancel</a>
  </div>
  </form>
  <script type="text/javascript">
    $(document).ready(function() {
          var toggleSwitch = $('#toggle-switch');
          
          if (toggleSwitch.prop('checked')) {
            toggleSwitch.val(1);
          } else {
            toggleSwitch.val(0);
          }
          
          toggleSwitch.change(function() {
            if (toggleSwitch.prop('checked')) {
              toggleSwitch.val(1);
            } else {
              toggleSwitch.val(0);
            }
          });
        });
  </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Bootstrap Example</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style>.row-eq-height {  display: -webkit-box;  display: -webkit-flex;  display: -ms-flexbox;  display: flex;}</style>
</head>
<body>
  <?php
  // define variables and set to empty values
  $email = $passwd = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])){
      $email_error="Email is required!"
    }
    else{
      $email = test_input($_POST["email"]);
    }
    if (empty($_POST["passwd"])){
      $passwd="Password is required!"
    }
    else{
      $passwd = test_input($_POST["passwd"]);
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
<div class="container">
 <h1>Hello! Please enter your email address, and a password!</h1>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 <div class="form-group">
   <label for="email">Email address:</label>
   <input type="email" class="form-control" id="email">
 </div>
 <div class="form-group">
   <label for="passwd">Password:</label>
   <input type="password" class="form-control" id="passwd">
 </div>
 <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

</body>
</html>

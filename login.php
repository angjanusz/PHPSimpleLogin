<!DOCTYPE html>
<html lang="en">
<head>
 <title>Login</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style>.row-eq-height {  display: -webkit-box;  display: -webkit-flex;  display: -ms-flexbox;  display: flex;} .error {color: #FF0000;}</style>
</head>
<body>
  <?php
  // define variables and set to empty values
  $emailErr = $passwdErr = "";
  $email = $passwd = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "database.php";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed:");
    }
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
    }

    if (empty($_POST["passwd"])) {
      $passwdErr = "";
    } else {
      $passwd = test_input($_POST["passwd"]);
    }
    if (empty($$passwdErr) && empty($emailErr)){

  $sql_l = $conn->prepare('SELECT * FROM log_ins WHERE email = ? AND passwd = ?');
  $sql_l->bind_param('ss', $email, password_hash($passwd, PASSWORD_BCRYPT));
  $sql_l->execute();
  $result_l = $sql_l->get_result();
  if (mysqli_num_rows($result_u) > 0) {
    $logged = 1;
    $login_Result = "Successfuly logged in as $email.";
  }
  else{
    $logged = -1;
    $login_Result="Incorrect username or password. Please try again!";
  }
mysqli_close($conn);

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
   <h1>Hello! Please enter your login credentials!</h1>
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
   <div class="form-group">
     <label for="email">Email address:</label>
     <input type="email" name="email" class="form-control" id="email" placeholder="Please enter your email here!" required><span class="error"><?php echo $emailErr;?></span>
   </div>
   <div class="form-group">
     <label for="passwd">Password:</label>
     <input type="password" name="passwd" class="form-control" id="passwd" placeholder="Please enter your password here!" required><span class="error"><?php echo $passwdErr;?></span>
   </div>
   <button type="submit" class="btn btn-default">Submit</button>
  </form>
  <?php
  if ($logged = 1) {
    print "<div class=\"alert alert-success alert-dismissible fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Logged In!</strong>$login_Result</div>"
  }
  else if ($logged = -1) {
    print "<div class=\"alert alert-danger alert-dismissible fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Failed to Log In!</strong>$login_Result</div>"
  }
  }
  ?>
  </div>
</body>
</html>

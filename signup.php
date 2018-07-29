<!DOCTYPE html>
<html lang="en">
<head>
 <title>Bootstrap Example</title>
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
  $email = $email_err = $passwd = $passwd_err = "";

    if (empty($_POST["email"])) {
    $email_err = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["passwd"])) {
    $passwd_err = "Password is required";
  } else {
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
   <input type="email" class="form-control" id="email" placeholder="Please enter your email here!" required><span class="error"><?php echo $email_err;?></span>
 </div>
 <div class="form-group">
   <label for="passwd">Password:</label>
   <input type="password" class="form-control" id="passwd" placeholder="Please enter your password here!" required><span class="error"><?php echo $passwd_err;?></span>
 </div>
 <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
<script>
((function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>

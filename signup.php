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

<div class="container">
 <h1>Hello! Please enter your email address, and a password!</h1>
 <form action="/action_page.php">
 <div class="form-group">
   <label for="email">Email address:</label>
   <input type="email" class="form-control" id="email">
 </div>
 <div class="form-group">
   <label for="pwd">Password:</label>
   <input type="password" class="form-control" id="pwd">
 </div>
 <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

</body>
</html>

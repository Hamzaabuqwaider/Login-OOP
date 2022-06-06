<?php 
if(isset($_SESSION['userid'])) { ?>

<li><a href="#"><?php echo $_SESSION['useruid'] ?></a></li>
<li><a href="logout.php">LOGOUT</a></li>
<?php } else { ?>
<li><a href="#">Signup</a></li>
<li><a href="#">LOGIN</a></li>
<?php }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="includes/login.inc.php" style="border:1px solid #ccc" method="POST">
  <div class="container">
    <h1>Login</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <input type="text" name="uid" placeholder="Username">
    <input type="password" placeholder="Enter Password" name="pwd" required>
    <div class="clearfix">
      <button type="submit" class="signupbtn" name="submit">LOGIN</button>
    </div>
  </div>
</form>

<hr>

<form action="includes/signup.inc.php" style="border:1px solid #ccc" method="POST">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <input type="text" name="uid" placeholder="Username">
    <input type="text" placeholder="Enter Email" name="email" required>
    <input type="password" placeholder="Enter Password" name="pwd" required>
    <input type="password" placeholder="Repeat Password" name="pwdrepeat" required>
    <div class="clearfix">
      <button type="submit" class="signupbtn" name="submit">Sign Up</button>
    </div>
  </div>
</form>
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="container">
    <h1>Confirm Log off</h1>
    <form action="15_checkpwd.php" method="POST">
      <div class="form-group">
        <label for="usr">Username:</label>
        <input type="text" id="usr" name="usr" placeholder="Enter your username" required>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" id="pwd" name="pwd" placeholder="Enter your password" required>
      </div>
      <input type="submit" value="Delete Account" id="button">
      <p class="register-link">Regretted it? <a href="02_register.php">Come back to your homepage</a><br><a href="06_customer.php">Home</a></p>
    </form>
  </div>
</body>

</html>

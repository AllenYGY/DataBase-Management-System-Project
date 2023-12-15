<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="container">
    <h1>Register</h1>
    <form action="05_new_member.php" method="POST">
      <div class="form-group">
        <label for="usr">Username:</label>
        <input type="text" id="usr" name="usr" placeholder="Enter a username" required>
      </div>
      <div class="form-group">
        <label for="pwd1">Password:</label>
        <input type="password" id="pwd1" name="pwd1" placeholder="Enter a password" required>
      </div>
      <div class="form-group">
        <label for="pwd2">Confirm Password:</label>
        <input type="password" id="pwd2" name="pwd2" placeholder="Confirm the password" required>
      </div>
      <div class="form-group">
        <label for="usrtype">User Type:</label>
        <select id="usrtype" name="usrtype">
          <option value="customer">Customer</option>
          <!-- <option value="buyer">Buyer</option> -->
        </select>
      </div>
      <input type="submit" value="Register" id="button">
      <p class="register-link">Already have an account? <a href="01_login.php">Go to Login!</a><br><a href="00_index.php">Home</a></p>
    </form>
  </div>
</body>

</html>

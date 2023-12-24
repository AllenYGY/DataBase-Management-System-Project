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
    <h1>Login</h1>
    <form action="04_checkPasswordByDB.php" method="POST">
      <div class="form-group">
        <label for="usr">UserID</label>
        <input type="text" id="usr" name="usr" placeholder="Enter your userID" required>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" id="pwd" name="pwd" placeholder="Enter your password" required>
      </div>
      <div class="form-group">
        <label for="usrtype">User Type:</label>
        <select id="usrtype" name="usrtype">
          <option value="customer">Customer</option>
          <option value="cadmin">Courier Administrator</option>
          <option value="admin">Administrator</option>
        </select>
      </div>
      <input type="submit" value="Login" id="button">
      <p class="register-link">Haven't registered? <a href="02_register.php">Register here</a><br><a href="00_index.php">Home</a></p>
    </form>
  </div>
</body>

</html>

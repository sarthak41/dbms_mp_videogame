<?php
  $servername = 'localhost';
  $user = 'root';
  $password = '';
  $done = false;

  // Database name is geeksforgeeks
  $database = 'vdo_game';

  // Server is localhost with
  // port number 3306
  $mysqli = new mysqli($servername, $user,
          $password, $database);
  // Checking for connections
  if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
  }

  // $_SERVER["REQUEST_METHOD"] = "GET";

  $errMsg = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uname = $_POST['username'];
    $pw = $_POST['password'];
    $cpw = $_POST['confirm-password'];

    $rows1 = $mysqli->query("SELECT * FROM customer WHERE username = '$uname'");
    $rows2 = $mysqli->query("SELECT * FROM customer WHERE email = '$email'");
    $rows3 = $mysqli->query("SELECT * FROM customer WHERE password = '$pw'");

    if ($rows1->num_rows > 0) {
      $errMsg = "Username already in use";
    } else if ($rows2->num_rows > 0) {
      $errMsg = "Email already in use";
    } else if ($rows3->num_rows > 0) {
      $errMsg = "Password already in use by another user";
    } else if ($pw != $cpw) {
      $errMsg = "Passwords don't match";
    } else if (strlen($uname) > 20 || strlen($password) > 20) {
      $errMsg = "Username/password too long";
    } else if (strlen($name) > 20) {
      $errMsg = "Name too long";
    } else {
      $done = true;
      $result = $mysqli->query("INSERT INTO `customer`(`username`, `password`, `email`, `name`, `phoneNo`) VALUES ('$uname', '$pw', '$email', '$name', NULL)");
      sleep(0.5);
      header("Location: ../index.php");
      die();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="signup_style.css" <?php echo time(); ?>/>
    <title>Sign up</title>
  </head>
  <body>
    <div class="main_div">
      <?php
      if ($done == true) {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Success! You can now login. Redirecting...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
      }
      if ($errMsg != "") {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Sorry! <?php echo $errMsg;?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
      }
      ?>
      <div class="box">
        <h1>Sign Up</h1>
        <form action="" method="post">
        <div class="input-box">
            <input
              type="text"
              name="name"
              id="name"
              autocomplete="off"
              required
            />
            <label for="name">Name</label>
          </div>
          <div class="input-box">
            <input
              type="email"
              name="email"
              id="email"
              autocomplete="off"
              required
            />
            <label for="email">Email</label>
          </div>
          <div class="input-box">
            <input
              type="text"
              name="username"
              id="username"
              autocomplete="off"
              required
            />
            <label for="username">Username</label>
          </div>
          <div class="input-box">
            <input
              type="password"
              name="password"
              id="password"
              autocomplete="off"
              required
            />
            <label for="password">Password</label>
          </div>
          <div class="input-box">
            <input
              type="password"
              name="confirm-password"
              id="confirm-password"
              autocomplete="off"
              required
            />
            <label for="confirm-password">Confirm Password</label>
          </div>
          <input type="submit" value="Signup"/>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
 $msg = "";
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $uname = $_POST['username'];
    $pw = $_POST['password'];

    $acc = $mysqli->query("SELECT * FROM customer WHERE username = '$uname' AND password = '$pw'");
    if ($acc->num_rows == 1) {
      session_start();
      $_SESSION['username'] = $uname;
      $msg = "Logging in...";
      header("Location: pages/games.php");
      die();
    } else {
      $msg = "Username/password incorrect";
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
    <link rel="stylesheet" href="style.css" <?php echo time(); ?>/>
    <title>Login</title>
  </head>
  <body>
    <div class="main_div">
      <?php if ($msg != "") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo $msg; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      <div class="box">
        <h1>Login</h1>
        <form action="" method="post">
          <div class="input-box">
            <input
              type="text"
              name="username"
              id="username"
              autocomplete="off"
              required
            />
            <label for="ssername">Username</label>
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
          <input type="submit" value="Login" />
        </form>
        <div class = "bottom">
          Don't have an account?
          <a href="pages/signup.php">Sign Up</a>
        </div>
      </div>
    </div>
  </body>
</html>
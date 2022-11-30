<!-- PHP code to establish connection with the localserver -->
<?php

// Username is root
session_start();
$user = 'root';
$password = '';

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


// SQL query to select data from database
$games_sql = $query = "SELECT *
                       FROM publisher
                       JOIN game
                       ON publisher.pubId = game.pubId";
$games = $mysqli->query($games_sql);

// $mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Steam</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="games_style.css?v=<?php echo time(); ?>">
</head>

<body>
	<section>
		<!-- TABLE CONSTRUCTION -->

	</section>
	<section>
		<div class="header">
      <h1>Steam</h1>
      <div class = "profile"><?php echo $_SESSION['username']?></div>
    </div>
		<div class = "games">
      <?php
        while($game_rows = $games->fetch_assoc()) {
      ?>
      <div class="game-container">
        <div class = "game-name">
          <?php echo $game_rows['name'];?>
        </div>
        <div class="game-price">
          <?php
          if ($game_rows['price'] > 0)
            echo "$" . $game_rows['price'];
           else
            echo "Free";
          ?>
        </div>
        <div class = "pub-name">
          <?php echo $game_rows['pubName'];?>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
	</section>
</body>

</html>

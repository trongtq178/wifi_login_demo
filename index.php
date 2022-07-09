<?php
session_start();

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

$dotenv->load();

include 'parameters.php';

$_SESSION["user_type"] = "new";
// $_SESSION["mac"] = $_GET["id"];
// $_SESSION["ap"] = $_GET["ap"];

/*
Checking DB to see if user exists or not.
*/

$host_ip = $_SERVER['HOST_IP'];
$db_user = $_SERVER['DB_USER'];
$db_pass = $_SERVER['DB_PASS'];
$db_name = $_SERVER['DB_NAME'];

$con = mysqli_connect($host_ip, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
  echo "Failed to connect to SQL: " . mysqli_connect_error();
}

// $result = mysqli_query($con, "SELECT * FROM `$table_name` WHERE mac='$_SESSION[mac]'");

// if ($result->num_rows >= 1) {
//   $row = mysqli_fetch_array($result);

//   $_SESSION["fname"] = $row[1];
//   $_SESSION["lname"] = $row[2];
//   $_SESSION["email"] = $row[3];

//   mysqli_close($con);

//   $_SESSION["user_type"] = "repeat";
//   header("Location: welcome.php");
// } else {
//   mysqli_close($con);
// }
mysqli_close($con);
?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Latitude 38</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="bulma.min.css" />
  <script defer src="vendor\fortawesome\font-awesome\js\all.js"></script>
  <link rel="icon" type="image/png" href="favicomatic\favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="favicomatic\favicon-16x16.png" sizes="16x16" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="bg">

    <figure id="logo">
      <img src="./images/logo.png">
    </figure>

    <br>

    <div id="login" class="content is-size-4 has-text-weight-bold">Login for Free Wi-Fi</div>

    <br>

    <form class="form_login" method="post" action="connect.php">
      
      <br>
      
      <div class="field">
        <div class="control has-icons-left">
          <input class="input" type="text" id="form_font" name="fname" placeholder="First Name" required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>
      
      <div class="field">
        <div class="control has-icons-left">
          <input class="input" type="text" id="form_font" name="lname" placeholder="Last Name" required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>
      
      <div class="field">
        <div class="control has-icons-left">
          <input class="input" type="email" id="form_font" name="email" placeholder="Email" required>
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
      </div>
      
      <div id="access_wifi" class="control">
        <button id="button_font" class="button is-danger">Continue</button>
      </div>
                        
    </form>

    <div id="powered" class="content is-size-6">Latitude 38 Vacation Rentals</div>
    <div id="copyright" class="content is-size-6">(C) Copyright 2021</div>

  </div>

</body>
</html>
<?php
session_start();

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
  <form class="form_export" method="post" action="export_result.php">
    <label for="start-datetime">Start datetime</label>
    <input type="datetime-local" id="start-datetime" name="start_datetime">
    <label for="end-datetime">End datetime</label>
    <input type="datetime-local" id="start-datetime" name="end_datetime">
    <input type="submit" value="Export">
  </form>
</body>
</html>
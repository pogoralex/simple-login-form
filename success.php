<?php

    session_start();

    $name = $_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
  <title>Success page</title>
</head>
<body>
  
  <div class="container">
    <div class="jumbotron">
      <h1>Welcome, <?php echo $name; ?>!</h1>
    </div>
  </div>

</body>
</html>
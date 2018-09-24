<?php

    if (isset($_POST['submit'])) {
        session_start();

        $_SESSION['name'] = htmlentities($_POST['username']);
    }

    $name = $pass = '';
    $nameErr = $passErr = '';
    $userpassErr = '';


function validation($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['username'])) {
        $nameErr = "<span style='color: red'>*Email is required.</span>";
    } elseif (!preg_match("/^[a-zA-Z@.]*$/",$_POST['username'])) {
        $nameErr = "<span style='color: red'>*Use valid email</span>";
    } else {
        $name = validation($_POST['username']);
    }

    if (empty($_POST['password'])) {
        $passErr = "<span style='color: red'>*Password is required.</span>";
    } elseif (!preg_match("/[A-Za-zА-Яа-яЁё0-9_]{4,20}/",$_POST['password'])) {
        $passErr = "<span style='color: red'>*Enter a valid password.</span>";
    }
      else {
        $pass = validation($_POST['password']);
    }

    if ($name && $pass) {
        header("Location: success.php");
    } else {
        $userpassErr = "<span style='color: red'>*Invalid username or password.</span>";
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
    <title>Login Form</title>
</head>
<body>

    <div class="container">
        <h2>Login Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="username" class="form-control" placeholder="Enter email" value="<?php echo isset($_POST['username']) ? $name : ''; ?>"><span><?php echo $nameErr?></span>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password"><span><?php echo $passErr?></span>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Password must be 4-20 characters long, contain letters, numbers or "_" underscore.
            </small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login </button>
        <span><?php echo $userpassErr?></span>
    </form>

    </div>
</body>
</html>
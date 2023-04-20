<?php
if( !empty($_POST)){
   
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "france";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $password_hash = password_hash(htmlentities($_POST["password"]),PASSWORD_DEFAULT);

  $sql = "INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES (NULL, '".htmlentities($_POST["username"])."', '".$password_hash."','customer');";
  // use exec() because no results are returned
  $conn->exec($sql);
  //echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
      body {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        background-image: linear-gradient(white, rgb(161, 147, 124));
      }
      label,
      input,
      textarea,
      select {
        display: block;
        margin: 5px;
        width: 100%;
        box-sizing: border-box;
        padding: 10px 10px;
      }
      input:invalid,
      select:invalid {
        border: 2px rgb(243, 84, 84) solid;
      }
    </style>
</head>
<body>
    <h3>please SIGN IN ou <a href  = "./login.php">Login</a></h3>
    <form method="POST" action="">
        <label for="username">Username:
    <input type="text" name="username" id="username" required>
        </label>
        <label for="password">Password:
    <input type="text" name="password" id="password" required>
        </label>
    <input type="submit" value="Sign In">
</form>
</body>
</html>
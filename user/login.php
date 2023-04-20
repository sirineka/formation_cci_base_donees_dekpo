<?php
if( ! empty($_POST) ) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "france";
    try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user WHERE username = '" . htmlentities($_POST["username"]) ."' LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC); 


    //var_dump($result);
    //si le mot de passe entrer dans le formulaire correspond bien à celui de la base de données alors on redirigera vers admin.php. sinon on affiche $error
    if ( !empty($result) && password_verify(htmlentities($_POST["password"]), $result["password"]) ){
       session_start();
       $_SESSION = $result;
       header("location:./admin.php");
       exit;
    } else{
        $error = "Mauvaise Username/Pasword !";
    }

    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <h3>Log in</h3>
    <?php
    if (isset($error)){
        echo "<h2 style=\"color:blue\">". $error . "</h2>";
    }
    ?>
    <form action="" method="POST">
        <label for="username">Nom : </label>
    <input type="text" name="username" id="username" required>
        <label for="password">Mot de pass : </label>
    <input type="password" name="password" id="password" required>
    <input type="submit" value="Log in">
    </form>
</body>
</html>



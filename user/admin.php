<?php
session_start();
if(empty($_SESSION)){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome admin</title>
</head>
<body>
    <h1>Welcome ! <?php echo $_SESSION['username'];?> !</h1>
    <p> your role is <b> <?php echo $_SESSION['role'];?></b> <p>
        <h3>
        <?php
        if($_SESSION['role']==="admin"){
            echo "Oh grand maitre vous ici !";
        }
        else{
            echo "Salut client!";
        }
        ?>
        </h3>
    <h2>do you want to <a href="logout.php">logout</a> ?</h2>
   
      

</body>
</html>
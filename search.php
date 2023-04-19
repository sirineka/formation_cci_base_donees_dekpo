<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search Town</title>
</head>
<body>
<form>
    <input type="text" name="ville" >
    <input type="submit" value="GO">
</form>
<?php
//si le nom de la ville est défini et n'est pas vide
if(isset($_GET["ville"]) && !empty($_GET["ville"])){
    echo "vous avez indiquer la ville:".htmlentities($_GET["ville"]);
    //je stock le nom de la ville recherchée dans une variable
    $ville = htmlentities($_GET["ville"]);
    //je me connecte à la base de donnée via PDO
    //et j'effectue la requette SELECT avec nom de la ville
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "france";
 
 try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $query="SELECT * FROM villes_france_free WHERE ville_nom LIKE'%$ville%'";
   $stmt = $conn->prepare($query);
   $stmt->execute();
   // set the resulting array to associative
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    foreach($result as $k=>$v){
    echo "<p>";
    echo "<ul>";
    echo "<li> Nom de ville:" . $v["ville_nom_reel"] . "</li>\n";
    echo "<li> population:" . $v["ville_population_2012"] ."</li>\n";
    echo "<li> surface:" . $v["ville_surface"] . "</li>\n";
    echo "</ul>";
    echo "</p>" ;
 }
   } 
 catch(PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
 }
} else {
    echo"veuillez indiquer la ville...";
}
?>
</body>
</html>
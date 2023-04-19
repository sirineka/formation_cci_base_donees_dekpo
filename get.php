<?php
//si le nom de la ville est défini et n'est pas vide
if(isset($_GET["ville"]) && !empty($_GET["ville"])){
    echo "vous avez indiquer la ville:".htmlentities($_GET["ville"]);
} else {
    echo"veuillez indiquer la ville...";
}
?>

<form>
    <input type="text" name="ville">
    <input type="submit" value="GO">
</form>

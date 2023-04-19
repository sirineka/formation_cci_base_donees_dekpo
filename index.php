<?php
$phrase = "HELLO PHP WORLD"; // commentaire une ligne
$calcul = 2+5;
$actif = true;
/* commentaire sur plusieurs lignes*/ 
$nombre = 10.5;
//var_dump($nombre);
$nombre = 22.3;
//var_dump($nombre);
echo "vous restez nous devoir la somme: ".$nombre+$calcul." % ";

echo " <p>je vous dit ".$phrase."!!! </p>";
echo "<pre>";
//$tableau = array("Bonjour","hello","buenos dias","ni hao", true,12,3.14, $calcul,$nombre);
$alphabet = ["A","B","C","D"];
$tableau = [
    'etage' => $alphabet,
    "Bonjour",
    "hello",
    "buenos dias",
    "ni hao",
     true,
     12,
     3.14, 
     $calcul,
     $nombre];
var_dump($tableau);
class Voiture{
    public $couleur;
    public $marque;
    public $model;
    public function __construct(){
        $this -> marque = "BMW";
    }
}
$clio = new Voiture();
//$clio->marque = "Renault";
var_dump($clio);
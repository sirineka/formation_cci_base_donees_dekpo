
<?php
//permet de démarrer un session pour mémoriser des informations d'authentification

session_start();

//unset($_SERVER['PHP_AUTH_PW']);
$valid_passwords = array ("mario" => "74d39d8d7888022726298017c5010ca6", "admin" => '$2y$10$bmz2pgYYWd1OWMiBArrv/eNUMtmUJQsfdfH60Rp0yjPd/5McVCHIK');
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass_input = $_SERVER['PHP_AUTH_PW'];
$pass_db = $valid_passwords["admin"];

//$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

$validated =  (in_array($user,$valid_users))&& (password_verify($pass_input, $valid_passwords[$user]));

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}

// If arrives here, is a valid user.
$_SESSION["user"]=$user;
echo "<p>Welcome $user.</p>";
echo "<p>Congratulation, you are into the system.</p>";
echo "<p> votre mot-de-pass! " .$pass_db. "</p>";

?>
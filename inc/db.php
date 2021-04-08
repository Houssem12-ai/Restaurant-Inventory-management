<html lang="en">
<?php
$host = 'localhost';
$db = 'Products';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";


try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //????
    echo "connected actually ";
} catch (PDOException $e) {/* mandatory to put inside */
    echo "error " . $e->getMessage(); //??? less than the other method 
    exit();
} //throw =< will stoop the entire execution if there is an error 

?>
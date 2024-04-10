<?php
$host = "tree-caribou-7375.g8z.gcp-us-east1.cockroachlabs.cloud"; 
$port = "26257"; 
$user = "angel"; 
$pass = "s--d5SQhPeRIipJGYA6xDA"; 
$dbname = "practica"; 
$sslmode = "verify-full"; 
$options = "--cluster=tree-caribou-7375"; 

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$pass;sslmode=$sslmode;options=$options";

try {
    $pdo = new PDO($dsn);
    $ID = $_POST["ID"];

    $sql = "SELECT * FROM nube WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $ID, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(null);
    }

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

?>


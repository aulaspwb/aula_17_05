<?php

/*
$dsn = "mysql:host=localhost;dbname=aula_pwb;charset=utf8mb4";
$options = [
  PDO::ATTR_EMULATE_PREPARES   => false, 
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
  $pdo = new PDO($dsn, "root", "123", $options);
  echo "tudo certo";
} catch (Exception $e) {
  error_log($e->getMessage()); 
  exit('errado!'); 
}

*/

$con = new PDO("mysql:host=localhost;dbname=aula_pwb", "root", "123"); 


$stmt = $con->prepare("INSERT INTO pessoa(nome, email) VALUES(?, ?)");
$stmt->bindParam(1,"Nome da Pessoa");
$stmt->bindParam(2,"email);
$stmt->execute();

?>
<?php
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', '123' );
define( 'MYSQL_DB_NAME', 'aula_pwb' );

$PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );


try
{
    $PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
}
catch ( PDOException $e )
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}




$sql = "SELECT * FROM programadores";
$result = $PDO->query( $sql );
//$rows = $result->fetchAll();
 $rows = $result->fetchAll( PDO::FETCH_ASSOC );
print_r( $rows );



echo "#######################################################################################################";



$sql = "SELECT * FROM programadores WHERE id=7";
$result = $PDO->query( $sql );
$rows = $result->fetchAll( PDO::FETCH_ASSOC );
print_r( $rows );



echo "####################################################################################################### ";


$nome = 'Bill Gates';
$site = 'http://microsoft.com';
$sql = "INSERT INTO programadores(nome, site) VALUES(:nome, :site)";
$stmt = $PDO->prepare( $sql );
$stmt->bindParam( ':nome', $nome );
$stmt->bindParam( ':site', $site );
 
$result = $stmt->execute();
 
if ( ! $result )
{
    var_dump( $stmt->errorInfo() );
    exit;
}
 
echo $stmt->rowCount() . "linhas inseridas";

echo "#######################################################################################################";


$nome = 'Bill Gates';
$site = 'http://ruindows.com.br';
$sql = "UPDATE programadores set site = :site WHERE nome = :nome";
$stmt = $PDO->prepare( $sql );
$stmt->bindParam( ':nome', $nome );
$stmt->bindParam( ':site', $site );
 
$result = $stmt->execute();
 
if ( ! $result )
{
    var_dump( $stmt->errorInfo() );
    exit;
}
 
echo $stmt->rowCount() . "linhas alteradas";


echo "#######################################################################################################";

$nome = 'Bill Gates';
$sql = "DELETE FROM programadores WHERE nome = :nome";
$stmt = $PDO->prepare( $sql );
$stmt->bindParam( ':nome', $nome );
 
$result = $stmt->execute();
 
if ( ! $result )
{
    var_dump( $stmt->errorInfo() );
    exit;
}
 
echo $stmt->rowCount() . "linhas removidas";

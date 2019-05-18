<?php
include_once('Registry.php');
include_once('dao/PostDAO.php');
include_once('model/Post.php');


$dsn = 'mysql:host=localhost;dbname=aula_pwb';
$usuario = 'root';
$senha = '123';

try {
    $conn = new PDO($dsn, $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Armazenar essa instância no Registry
$registry = Registry::getInstance();
$registry->set('Connection', $conn);

// Instanciar um novo Post e setar informações
$primeiroPost = new Post();
$primeiroPost->setTitle('Primeiro post');
$primeiroPost->setContent('Conteudo!');

// Instanciar um novo Post e setar informações
$segundoPost = new Post();
$segundoPost->setTitle('Segundo post');
$segundoPost->setContent('Conteudo!');

// Instanciar o DAO e trabalhar com os métodos
$postDAO = new PostDAO();
$postDAO->insert($primeiroPost);
$postDAO->insert($segundoPost);

// Resgatar todos os registros e iterar
$results = $postDAO->getAll();
foreach($results as $post) {
    echo $post->gettitulo() . '<br />';
    echo $post->getconteudo() . '<br />';
    echo '<br />';
}


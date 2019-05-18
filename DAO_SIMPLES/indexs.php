<?php
include_once('Registry.php');
include_once('dao/PostDAO.php');
include_once('model/Post.php');

//$dsn = 'mysql:host=localhost;dbname=aula_pwb';
$dsn = 'mysql:host=localhost;port=3306;dbname=aula_pwb';
$senha = '123';
$usuario = 'root';




// Instanciar uma conexão com PDO
//$conn = new PDO('mysql:host=localhost;port=3306;dbname=aula_pwb', 'root', '123');
$conn = new PDO($dsn, $usuario, $senha);


// Armazenar essa instância no Registry
$registry = Registry::getInstance();
$registry->set('Connection', $conn);

// Instanciar um novo Post e setar informações
$primeiroPost = new Post();
$primeiroPost->settitulo('Primeiro post');
$primeiroPost->setconteudo('Conteudo!');

// Instanciar um novo Post e setar informações
$segundoPost = new Post();
$segundoPost->settitulo('Segundo post');
$segundoPost->setconteudo('Conteudo!');

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


<?php
include_once('model/Post.php');

class PostDAO {

    private $conn;

    public function __construct() {
        $registry = Registry::getInstance();
        $this->conn = $registry->get('Connection');
    }

    public function insert(Post $post) {
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO postagens  (titulo, conteudo) VALUES (:titulo, :conteudo)'
            );

            $stmt->bindValue(':titulo', $post->gettitulo  ());
            $stmt->bindValue(':conteudo', $post->getconteudo  ());
            $stmt->execute();

            $this->conn->commit();
        }
        catch(Exception $e) {
            $this->conn->rollback();
        }
    }

    public function getAll() {
        $statement = $this->conn->query(
            'SELECT * FROM postagens '
        );

        return $this->processResults($statement);
    }

    private function processResults($statement) {
        $results = array();

        if($statement) {
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $post = new Post();

                $post->setId($row->postagem_id);
                $post->settitulo  ($row->titulo  );
                $post->setconteudo  ($row->conteudo  );

                $results[] = $post;
            }
        }

        return $results;
    }

}


<?php
class Post {

    private $id;
    private $titulo;
    private $conteudo;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function gettitulo() {
        return $this->titulo;
    }

    public function settitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    public function getconteudo() {
        return $this->conteudo;
    }

    public function setconteudo($conteudo) {
        $this->conteudo = $conteudo;
        return $this;
    }

}


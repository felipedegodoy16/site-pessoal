<?php

class Comentario
{
    public $id;
    public $nome;
    public $insta;
    public $mensagem;
    public $imagem;

    public function _construct($id = false)
    {
        if ($id) {
            $this->id = $id;
        }
    }

    public function listar()
    {
        $sql = "SELECT id, nome, insta, mensagem, imagem 
                FROM recados ORDER BY id";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=comentarios', 'root', '');
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir()
    {
        $sql = "INSERT INTO recados (nome, insta, mensagem, imagem) VALUES (
            '" . $this->nome . "',
            '" . $this->insta . "',
            '" . $this->mensagem . "',
            '" . $this->imagem . "')";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=comentarios', 'root', '');
        $conexao->exec($sql);
    }

}

?>
<?php
// Chama a classe criada
require_once 'classe/Comentario.php';

$comentario = new Comentario();

$comentario->nome = $_POST['name'];
$comentario->insta = $_POST['insta'];
$comentario->mensagem = $_POST['comentario'];

if(isset($_FILES['foto']['name']) && $_FILES["foto"]["error"] == 0){
    $arquivo_tmp = $_FILES['foto']['tmp_name'];
    $nomeImagem = $_FILES['foto']['name'];
    $extensao = strrchr($nomeImagem, '.');
    $extensao = strtolower($extensao);
    if(strstr('.jpg;.jpeg;.png', $extensao)){
        $novoNome = md5(microtime()) .$extensao; ;
        $destino = 'uploads/' . $novoNome; 
        @move_uploaded_file($arquivo_tmp, $destino);
        $comentario->imagem = $novoNome;
    }
}

$comentario->inserir();
header('Location: confirmacao.php');

?>
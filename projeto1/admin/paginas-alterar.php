<?php

require_once "config.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto = $_POST["produto"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $texto = $_POST["texto"];
    $imagem = $_POST["imagem"];
    $id = $_POST["id"];

    $sql = "UPDATE paginas SET 
            produto = '$produto',
            descricao = '$descricao',
            preco = '$preco',
            texto = '$texto',
            imagem = '$imagem'
            WHERE id = '$id'";

    $executa = mysqli_query($conexao, $sql);
    if($executa) {
        echo "<h2>Alteração realizada com sucesso.</h2>";
        echo "<a href='?pg=paginas'>Voltar</a>";
    }else{
        echo "<h2>Erro ao alterar página.</h2>";
        echo "<a href='?pg=paginas'>Voltar</a>";
    }
}else{
    echo "<h2>Acesso negado.</h2>";
    echo "<a href='?pg=paginas'>Voltar</a>";
}




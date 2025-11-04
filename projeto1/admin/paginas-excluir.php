<?php
    require_once "config.inc.php";
    $id = $_GET['id'];

    $sql = "DELETE FROM paginas WHERE id= $id";

    $resultado = mysqli_query($conexao, $sql);
    if($resultado){
        echo "<h2>Página excluída com sucesso!</h2>";
        echo "<br><a href='?pg=paginas'>Listar Página</a>";
    }else{
        echo "<h2>Erro ao excluir página!</h2>";
        echo "<br><a href='?pg=paginas'>Voltar</a>";
    }
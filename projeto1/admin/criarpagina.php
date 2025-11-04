<?php
    require_once "config.inc.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $produto = $_POST["produto"];
        $descricao = $_POST["descricao"];
        $preco = $_POST["preco"];
        $texto = $_POST["texto"];
        $imagem = $_POST["imagem"];

        $sql = "INSERT INTO paginas (produto, descricao, preco, texto, imagem)
                VALUES ('$produto', '$descricao', '$preco', '$texto', '$imagem')";

        $executa = mysqli_query($conexao, $sql);
        if($executa) {
            echo "<h2>Página criada com sucesso!</h2>";
            echo "<a href='?pg=paginas'>Voltar</a>";
        }else {
            echo "<h2>Erro ao criar.</h2>";
            echo "<a href='?pg=paginas'>Voltar</a>";
        }
    }else{
            echo "<h2>Acesso negado.</h2>";
            echo "<a href='?pg=paginas'>Voltar</a>";
        }
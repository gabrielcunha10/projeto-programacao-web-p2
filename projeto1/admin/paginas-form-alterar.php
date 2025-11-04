<?php
    require_once "config.inc.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM paginas WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($resultado) > 0){
        $pagina = mysqli_fetch_array($resultado);


?>

<h2>Alteração de páginas</h2>
<form action="?pg=paginas-alterar" method="post">
    <input type="hidden" name="id" value="<?=$pagina['id']?>">
    <label>Nome do produto:</label><br>
    <input type="text" name="produto" value="<?=$pagina['produto']?>"><br>
    <label>Descrição:</label><br>
    <input type="text" name="descricao" value="<?=$pagina['descricao']?>"><br>
    <label>Preço:</label><br>
    <input type="number" name="titulo" value="<?=$pagina['preco']?>"><br>
    <label>Imagem do produto (URL):</label><br>
    <input type="text" name="imagem" value="<?=$pagina['imagem']?>"><br>
    <label>Texto do produto:</label><br>
    <textarea rows="10" cols="50" name="texto"><?=$pagina['texto']?></textarea><br>
    <br>
    <input type="submit" value="Alterar página"><br><br>
    <a href='?pg=paginas'>Voltar</a>
</form>

<?php
    }else{
        echo "<h2>Nenhuma página cadastrado!</h2>";
    }
?>
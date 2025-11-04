<?php

    require_once "admin/config.inc.php";

    $sql = "SELECT * FROM clientes";
    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultado) > 0){
        $dados = mysqli_fetch_array($resultado);
    
    echo "<h1>Clientes</h1>";
?>
<table border="1">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Cidade</th>
            <th>Estado</th>
        </th>
    </thead>
    <tbody>
    <?php
        while($dados = mysqli_fetch_array($resultado)){
    ?>
        <tr>
            <td><?=$dados['cliente']?></td>
            <td><?=$dados['cidade']?></td>
            <td><?=$dados['estado']?></td>
        </tr>
    <?php
        }
    ?>
    </tbody>  
</table>
<?php
    }else{
        echo "<h2>Nenhum cliente encontrado!</h2>";
    }
<?php
    echo "<h1>Painel Administrativo</h1>";

    $login = True;
    if($login == True){
        include "principal.php";
    }else{
        include "login.php";
    }
?>

<?php
    if(empty($_SERVER["QUERY_STRING"])){
        $var = "principal";
        include_once "$var.php";
    }else{
        $pg = $_GET['pg'];
        include_once "$pg.php";
    }
?>

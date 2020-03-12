<?php


$data = array(
    "empresa"=>"COOKIE DA SILVA"
);

setcookie("NOME_DO_COOKIE",json_encode($data), time() + 3600);

if(isset($_COOKIE['NOME_DO_COOKIE'])){

    var_dump(json_decode($_COOKIE['NOME_DO_COOKIE']));

}

?>
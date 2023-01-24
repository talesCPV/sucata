<?php

    include "crip.php";

    $usuario = decrip('swsv5s?xDKJP47s)wFstyu7-8s.0;*?"q!yt`s9v,s2ys:XI');
    $senha= decrip('o)or1o9tW))x03o"s:opuq.*4o*,u#ky+xq?bo5r(o.Po6?H');
    $servidor = decrip('A4AD[AdF?76/Z^AOE8ABGCX,_ATVOPaKXJVY`A`DRAX_Aa4;');
    $banco = decrip('twcf"c-jDKIP!%cqgFcdiw70(cvx;H?Fqlht[c)xtcDyN*XI');
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if (!$conexao){
        die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
    }    

?>
<?php

    include "crip.php";

    $usuario = decrip('3Y_by_)4)3+=x _mcA_`ew,0!_rt3nLA h38]_"2p_/z+#/0');
    $senha= decrip('rjru4r=wC[,V36r(vjrsxtV,7r-/5)u!R iKar8u+r1Gr98V');
    $servidor = decrip('k0kn-k5F)()f,/kyo*klqmC-0k#(LzAuAtHA_k1n!k*J%2/(');
    $banco = decrip('bYbe!b,4)3+= #bpfAbchd,-%buw3qLl k38_b(esbyz+)/0');
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if (!$conexao){
        die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
    }    

?>
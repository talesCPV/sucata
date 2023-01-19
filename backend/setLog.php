<?php   

	if (IsSet($_POST["line"])){
        $path = getcwd().'/../config/log/'.date("m_Y").'.txt';
        $line = $_POST["line"];    
        $fp = fopen($path, "a");
        fwrite($fp, $line."\n");     
    }

?>
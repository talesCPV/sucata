<?php   

	if (IsSet($_POST["line"])){
        $path = getcwd().'/../config/log/'.$_POST["db"].'/'.date("m_Y").'.txt';
//        $line = $_POST["line"]; 
        $line = mb_convert_encoding($_POST["line"],'UTF-8'); 
        
        $fp = fopen($path, "a+");
//        $fp = "\xEF\xBB\xBF".$fp;
//        fputs($fp, $line."\n");
        fwrite($fp, utf8_encode($line."\n")); 
        fclose($fp);    
    }

?>
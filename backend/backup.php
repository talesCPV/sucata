<?php
/*
    include "crip.php";

    $DB_BACKUP_PATH = getcwd().'/../backup_web.sh';
    $MYSQL_HOST = decrip('A4AD[AdF?76/Z^AOE8ABGCX,_ATVOPaKXJVY`A`DRAX_Aa4;');
    $MYSQL_USER = decrip('swsv5s?xDKJP47s)wFstyu7-8s.0;*?"q!yt`s9v,s2ys:XI');
    $MYSQL_PASSWORD = decrip('o)or1o9tW))x03o"s:opuq.*4o*,u#ky+xq?bo5r(o.Po6?H');
    $DATABASE_NAME = decrip('twcf"c-jDKIP!%cqgFcdiw70(cvx;H?Fqlht[c)xtcDyN*XI');

//    echo($DB_BACKUP_PATH);

    echo shell_exec($DB_BACKUP_PATH.' '.$MYSQL_HOST.' '.$MYSQL_USER.'  \\'.$MYSQL_PASSWORD.' '.$DATABASE_NAME);
*/
?>

<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $database = 'd2soft98_caldeirao_sc';
    $user = 'd2soft98_tales';
    $pass = '#Sucata65';
    $host = '50.116.87.200';
    $dir = dirname(__FILE__) . '/dump.sql';

    echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";

    exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);

    var_dump($output);

?>
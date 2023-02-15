<?php

    include "crip.php";

    $DB_BACKUP_PATH = getcwd().'/../backup_web.sh';
    $MYSQL_HOST = decrip('A4AD[AdF?76/Z^AOE8ABGCX,_ATVOPaKXJVY`A`DRAX_Aa4;');
    $MYSQL_USER = decrip('swsv5s?xDKJP47s)wFstyu7-8s.0;*?"q!yt`s9v,s2ys:XI');
    $MYSQL_PASSWORD = decrip('o)or1o9tW))x03o"s:opuq.*4o*,u#ky+xq?bo5r(o.Po6?H');
    $DATABASE_NAME = decrip('twcf"c-jDKIP!%cqgFcdiw70(cvx;H?Fqlht[c)xtcDyN*XI');

//    echo($DB_BACKUP_PATH);

    echo shell_exec($DB_BACKUP_PATH.' '.$MYSQL_HOST.' '.$MYSQL_USER.'  \\'.$MYSQL_PASSWORD.' '.$DATABASE_NAME);

?>
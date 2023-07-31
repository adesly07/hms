<?php 

$dbcon= @mysql_connect('localhost', 'root', 'root');
if (!$dbcon)die( mysql_error());
$dbsel= @mysql_select_db('onepos', $dbcon);
if (!$dbsel)die( mysql_error());

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'onepos');
?>
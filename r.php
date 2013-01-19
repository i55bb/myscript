<?php
//fix By : Bazaid
//Copyright © To Bazaid
require_once("app/config.php");
$link = mysql_connect($AppConfig['db']['host'],$AppConfig['db']['user'],$AppConfig['db']['password']) or die(mysql_error());
mysql_select_db($AppConfig['db']['database'],$link) or die(mysql_error());
mysql_query("update `g_settings` set `qlocked` = 0;");
printf("Records Update in 'g_settings'");
echo '<p>&nbsp;</p>';
if (mysql_query){
echo 'The&nbsp;Error&nbsp;Fix&nbsp;By&nbsp;:&nbsp;Bazaid';
}
else 
{
echo "The&nbsp;Error&nbsp;Can't&nbsp;Fix";
}
?> 
<?
//链接数据库，并引入mydb.class
require(dirname(__FILE__)."/mydb.inc.php");
require(dirname(__FILE__)."/mydb.class.php");

$mydb = new db_mysql();
$mydb->connect(DB_HOST, DB_USER, DB_PW, DB_NAME, DB_PCONNECT, DB_CHARSET);

?>
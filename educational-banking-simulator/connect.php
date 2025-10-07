<?php
error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);

$dbservertype='mysqli';

$server='localhost';

$username='root';
$password='';

$dbname='bnk';

$currency_symbol = '&#163';


if(!mysqli_connect($server,$username,$password,$dbname)){
exit('error: could not establish database connection');
$link = mysqli_connect($server,$username,$password);
}
$link = mysqli_connect($server,$username,$password,$dbname);
if(!mysqli_select_db($link,$dbname)){
exit('error: could not select database');
echo mysqli_connect_error();
}
?>
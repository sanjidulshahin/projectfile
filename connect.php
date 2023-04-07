<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='spms';

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE,3307);

if($con===false){
    die("connection error");
}

?>
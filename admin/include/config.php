<?php
   $servername = "localhost";
	$username ="imo_user";
	$password ="z!B,Al!dPFsU";
	$dbname ="imo_db";


$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("connection failed".mysqli_connect_error());
}
session_start();
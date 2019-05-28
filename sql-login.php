<?php 
//set server name
$serverName = "my-server";

//set connection options
$connectionOptions = array(
    "Database" => "my-database",
    "Uid" => "connect-user",
    "CharacterSet" => "UTF-8",
    "PWD" => "correct-horse-battery-staple"
);

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


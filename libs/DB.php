<?php
include("libs/Medoo.php");
use Medoo\Medoo;

function conexao(){
    $db = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'agenda',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);
    return $db;
}
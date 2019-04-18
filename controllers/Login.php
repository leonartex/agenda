<?php
session_start();

function verificaSessao(){
    if(isset($_SESSION['email'])){
        return true;
    }else{
        return false;
    }
}
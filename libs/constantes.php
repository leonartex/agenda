<?php
DEFINE("HOST_NAME", $_SERVER['SERVER_NAME']);
DEFINE("URI_BASE", "localhost/agenda");
if(isset($_SERVER['HTTPS'])) {
    if ($_SERVER['HTTPS'] == "on") {
        DEFINE("PROTOCOL", 'https');
    }else{
        DEFINE("PROTOCOL", 'http');
    }
}else{
    DEFINE("PROTOCOL", 'http');
}
DEFINE("URL_BASE", PROTOCOL . '://' . URI_BASE);
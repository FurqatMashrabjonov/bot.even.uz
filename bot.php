<?php
require_once './vendor/autoload.php';
try {

    $config = require 'config/telegram.php';

    require_once './bootstrap/bootstrap.php';

}catch (Exception $e){
    echo $e->getMessage();
}
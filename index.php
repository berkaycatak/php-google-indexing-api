<?php
session_start();
error_reporting(0);
require_once 'app/init.php';
$app = new App();
session_abort();
<?php

session_start();
require_once __DIR__ . '/classes/calculator.php';

$calc = new \Calculator();
echo json_encode($calc->doIt());
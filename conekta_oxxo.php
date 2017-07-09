<?php
require_once 'MyConekta.php';

$amount = filter_input(INPUT_POST, 'amount');
$amount = (strstr($amount = $_POST['amount'], '.')) ? str_replace('.', '', $amount) : $amount.'00';
$email 	= filter_input(INPUT_POST, 'email');

MyConekta::oxxo($amount, $email);
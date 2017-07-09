<?php
require_once 'MyConekta.php';

$amount_card = filter_input(INPUT_POST, 'amount_card_card');
$amount_card = (strstr($amount_card = $_POST['amount_card'], '.')) ? str_replace('.', '', $amount_card) : $amount_card.'00';
$name_card 	= filter_input(INPUT_POST, 'name_card');
$token_id 	= $_POST['token'];

MyConekta::card($amount_card,$name_card,$token_id);
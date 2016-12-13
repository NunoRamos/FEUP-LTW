<?php
function generateRandomToken() {
    return bin2hex(openssl_random_pseudo_bytes(16));
}

function getFormatAtualTIme() {
    $date = date('d, l, F H:i');

    return $date;
}
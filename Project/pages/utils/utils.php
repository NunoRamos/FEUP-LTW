<?php
function generateRandomToken() {
    return bin2hex(openssl_random_pseudo_bytes(16));
}
<?php
/**
 * Returns the encrypted version of the given input
 *
 * @since 1.0.0
 * @param $input - The string to be encrypted
 * @return $encryped_string - Returns the encrypted string
 */

function encrypt($input){
    $ciphering = 'AES-128-CTR';
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = '1ZcvEWkry6FbX8p9w3WoCfZteKgSxKlKeiw7PILIISKXYiC53XmZRVF2oklM';

    $encryption = openssl_encrypt($input, $ciphering,
        $encryption_key, $options, $encryption_iv);
    return $encryption;
}

/**
 * Returns the decrypted version of the given input
 *
 * @since 1.0.0
 * @param $input - The string to be decrypted
 * @return $decrypted_string - Returns the decrypted string
 */

function decrypt($input){
    $ciphering = 'AES-128-CTR';
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = '1ZcvEWkry6FbX8p9w3WoCfZteKgSxKlKeiw7PILIISKXYiC53XmZRVF2oklM';

    $decryption = openssl_decrypt($input, $ciphering,
        $encryption_key, $options, $encryption_iv);
    return $decryption;
}

/**
 * Returns a randomly generated 16 digit long string
 *
 * @since 1.0.0
 * @param $length - The length of the string to be generated
 * @return $random_string - Returns the generated string
 */

function generate_code($length){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random_string = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $random_string .= $characters[$index];
    }

    return $random_string;
}
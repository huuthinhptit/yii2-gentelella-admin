<?php
namespace common\utils;

class SecurityUtil
{
    public static function getTransactionGDC()
    {
        return sha1(microtime(true) . uniqid(rand(), true));
    }

    /**
     * Encrypt Encrypt data send to pay365
     * @param $key_seed
     * @param $input
     * @return string
     */
    public static function encryptData($key_seed, $input)
    {
        $input = trim($input);
        $block = mcrypt_get_block_size('tripledes', 'ecb');
        $len = strlen($input);
        $padding = $block - ($len % $block);
        $input .= str_repeat(chr($padding), $padding);

        // generate a 24 byte key from the md5 of the seed
        $key = substr(md5($key_seed), 0, 24);
        $iv_size = mcrypt_get_iv_size(MCRYPT_TRIPLEDES, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

        // encrypt
        $encrypted_data = mcrypt_encrypt(MCRYPT_TRIPLEDES, $key, $input, MCRYPT_MODE_ECB, $iv);

        // clean up output and return base64 encoded
        return base64_encode($encrypted_data);
    }

    /**
     * Decrypt data receive from 365
     * @param $input
     * @param $key_seed
     * @return string
     */
    public static function decryptData($input, $key_seed)
    {
        $input = base64_decode($input);
        $key = substr(md5($key_seed), 0, 24);
        $text = mcrypt_decrypt(MCRYPT_TRIPLEDES, $key, $input, MCRYPT_MODE_ECB, '12345678');
        $block = mcrypt_get_block_size('tripledes', 'ecb');
        $packing = ord($text{strlen($text) - 1});
        if ($packing and ($packing < $block)) {
            for ($P = strlen($text) - 1; $P >= strlen($text) - $packing; $P--) {
                if (ord($text{$P}) != $packing) {
                    $packing = 0;
                }
            }
        }
        $text = substr($text, 0, strlen($text) - $packing);
        return $text;
    }

    /**
     * Encrypt data
     * @return string
     */
    public static function getRandomString($length = 12){
        $string = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $string_shuffled = str_shuffle($string);
        $str = substr($string_shuffled, 1, $length);
        return $str;
    }
}
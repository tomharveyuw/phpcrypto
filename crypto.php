<?php
$hexkey = <read DB encryption key>;
$cryptkey = sodium_hex2bin($hexkey);
$noncebytes = SODIUM_CRYPTO_SECRETBOX_NONCEBYTES; // 24 bytes initially, in case it matters

function encrypt($instring)
{
  global $cryptkey, $noncebytes;
  $nonce = random_bytes($noncebytes);
  $rawcrypt = sodium_crypto_secretbox($instring, $nonce, $cryptkey);
  $encrypted = base64_encode($nonce . $rawcrypt);
  return $encrypted;
}

function decrypt($encrypted)
{
  global $cryptkey, $noncebytes;
  $decoded = base64_decode($encrypted);
  $nonce = mb_substr($decoded, 0, $noncebytes, '8bit');
  $rawcrypt = mb_substr($decoded, $noncebytes, null, '8bit');
  $decrypted = sodium_crypto_secretbox_open($rawcrypt, $nonce, $cryptkey);
  return $decrypted;
}
?>

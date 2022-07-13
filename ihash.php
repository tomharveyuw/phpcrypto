<?php
$hexkey = <read blind indexing key>;
$hashkey = sodium_hex2bin($hexkey);

// DO NOT use for passwords! This function creates a deterministic hash, for database blind indexes
function hashIndex($instring)
{
  global $hashkey;
  return bin2hex(
    sodium_crypto_pwhash(
      32, 
      $instring, 
      $hashkey, 
      3, // SODIUM_CRYPTO_PWHASH_OPSLIMIT_MODERATE,
      268435456, // SODIUM_CRYPTO_PWHASH_MEMLIMIT_MODERATE
      2 // SODIUM_CRYPTO_PWHASH_ALG_ARGON2ID13
    )
  );
}
?>

# phpcrypto
Some basic functions for encryption, decryption and blind index hashing in PHP, using libsodium.

So you will need to make sure libsodium is installed and activated. 

Using libsodium defaults for encryption/decryption (ie. strongest available), and Argon2ID with specific settings to create the deterministic hashing required for blind indexes. 

Note that these DO NOT cover password hashing, as libsodium has built in methods for that which are preferable and easy enough to use directly (ie. password_hash and password_verify). 

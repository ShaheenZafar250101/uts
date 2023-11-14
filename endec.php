<?php $originalData = "Sensitive information";
$encryptionKey = "your_secret_key"; // This should be kept secure

// Encrypt the data
$encryptedData = openssl_encrypt($originalData, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);

// Decrypt the data
$decryptedData = openssl_decrypt($encryptedData, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);

echo "Original Data: $originalData<br>";
echo "Encrypted Data: $encryptedData<br>";
echo "Decrypted Data: $decryptedData<br>";
?>
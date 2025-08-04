<?php
$ENCRYPTION_KEY = 'A1123AW';
$ENCRYPTION_ALGORITHM = 'AES-256-CBC';

function encrypt($ClearTextData) {
   
		global $ENCRYPTION_KEY;
		global $ENCRYPTION_ALGORITHM;
		$EncryptionKey = base64_decode($ENCRYPTION_KEY);
		$InitializationVector  = openssl_random_pseudo_bytes(openssl_cipher_iv_length($ENCRYPTION_ALGORITHM));
		$EncryptedText = openssl_encrypt($ClearTextData, $ENCRYPTION_ALGORITHM, $EncryptionKey, 0, $InitializationVector);
		return base64_encode($EncryptedText . '::' . $InitializationVector);
}

function decrypt($CipherData) {
   
		global $ENCRYPTION_KEY;
		global $ENCRYPTION_ALGORITHM;
		$EncryptionKey = base64_decode($ENCRYPTION_KEY);
		list($Encrypted_Data, $InitializationVector ) = array_pad(explode('::', base64_decode($CipherData), 2), 2, null);
		return openssl_decrypt($Encrypted_Data, $ENCRYPTION_ALGORITHM, $EncryptionKey, 0, $InitializationVector);
}

function getID($n) { 
        $characters = '0123456789'; 
        $randomString = ''; 
  
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        }    
    
        return $randomString; 
}

function getRef($n) { 
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
        $randomString = ''; 
  
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        }    
    
        return $randomString; 
}

function RemoveSpecialChar($str) { 
       $res = str_replace( array( '\'', '"', ',' , ';', '<', '>' ), ' ', $str); 
       return $res; 
}
?>

 
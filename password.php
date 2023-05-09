<?php

$password = 'edna123';
var_dump(validate_password($password));
function validate_password($password){
echo 'Password:' . $password . "\n";
$hash_password = sha1($password);
echo 'Hash Password' . $hash_password . "\n";
$first_5_characters = substr($hash_password, 0, 5);
echo 'First 5 chars' . $first_5_characters . "\n";
$other_characters = substr($hash_password, 5, strlen($hash_password));
echo 'Other chars' .$other_characters . "\n";
$response = file_get_contents('https://api.pwnedpasswords.com/range/'. $first_5_characters);
if (str_contains($response, strtoupper($other_characters))){

    echo "Password has been breached";

}else{
    echo "Password safe";
}
}


?>
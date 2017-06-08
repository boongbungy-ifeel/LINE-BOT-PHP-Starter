<?php
$access_token = '7QZ/hG7CevalyZNpkTIbBNmQfNb2Ea/bPTskGdT5oXRxsYVnasDapVqYaf87GKjUtDEPf3punq6+VPawAa8TzNyUOVMDxLmmpcrjp8W8wbw7ryfttz2YhD9vMAxRK594pGNfuMoVViSzKIAzBxmnmwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

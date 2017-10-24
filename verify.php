<?php
$access_token = 'ac9NKOx3Z/RraS26ihQwP9MUW8r6edCk+xce7n325v4kG3n4+zCSMf6VD+QoDYw1yjUCu0lvsL3X1lg1Uw3k8Ue0bFsSMfgudP3Ui48ONpaJZ92qIGBWivuoPLQWlEQATTlLdCPuzFk9W7Q5z/VlKAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

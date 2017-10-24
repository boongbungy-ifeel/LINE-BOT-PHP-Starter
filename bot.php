<?php
$access_token = 'ac9NKOx3Z/RraS26ihQwP9MUW8r6edCk+xce7n325v4kG3n4+zCSMf6VD+QoDYw1yjUCu0lvsL3X1lg1Uw3k8Ue0bFsSMfgudP3Ui48ONpaJZ92qIGBWivuoPLQWlEQATTlLdCPuzFk9W7Q5z/VlKAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				//'type' => 'text',
				//'text' => $text
				"type": "image",
    				"originalContentUrl": "https://www.dropbox.com/home/bbshabu?preview=pic399.jpg",
    				"previewImageUrl": "https://www.dropbox.com/home/bbshabu?preview=pic399.jpg"
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";

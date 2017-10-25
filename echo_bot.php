<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');

$channelAccessToken = 'ac9NKOx3Z/RraS26ihQwP9MUW8r6edCk+xce7n325v4kG3n4+zCSMf6VD+QoDYw1yjUCu0lvsL3X1lg1Uw3k8Ue0bFsSMfgudP3Ui48ONpaJZ92qIGBWivuoPLQWlEQATTlLdCPuzFk9W7Q5z/VlKAdB04t89/1O/w1cDnyilFU=';
$channelSecret = '8b3e65219fd215b1a122a30b593341e0';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => 'new '.$message['text']
                            )
                        )
                    ));
                    break;
                case 'location':
                     $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => 'latitude :'.$message['latitude'].', longitude: '.$message['longitude']
                            )
                        )
                    ));
                    break; 
                case 'image':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => 'image :'.$message['originalContentUrl']
                            )
                        )
                    ));
                    
                    break;
                default:
                    
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};

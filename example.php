<?php

// CHANGE THIS VALUE HERE
$apiKey = 'YOUR_API_KEY';

$url = 'https://api.nofiltergpt.com/v1/chat/completions?api_key='.$apiKey;
$data = [
    'messages' => [
        ['role' => 'system', 'content' => 'You are a helpful assistant.'],
        ['role' => 'user', 'content' => 'Hello! Can you help me with something?']
    ],
    'temperature' => 0.7,
    'max_tokens' => 150,
    'top_p' => 1
];

$options = [
    'http' => [
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode($data),
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    die('Error');
}

echo $response;
?>

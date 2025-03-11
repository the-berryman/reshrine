<?php
$messagesFile = 'messages.txt';

// Sample horror messages that should always be displayed
$sampleMessages = [
    [
        'date' => '03/09/2025',
        'username' => 'midnight_caller',
        'message' => 'i recorded this at 3:33am. there was someone else in my house. it was my mom.'
    ],
    [
        'date' => '03/08/2025',
        'username' => 'the_watcher',
        'message' => 'found this on an unlabeled tape in my basement. i don\'t have a basement.'
    ],
    [
        'date' => '03/07/2025',
        'username' => 'shadow_666',
        'message' => 'the song stops at 2:17. after that it\'s just sneezing.'
    ],
    [
        'date' => '03/06/2025',
        'username' => 'paranoid_entity',
        'message' => 'don\'t listen with headphones. she whispers directions to sonic drive in.'
    ]
];

// Array to store all messages
$allMessages = [];

// Add sample messages to the array
foreach ($sampleMessages as $sample) {
    $allMessages[] = $sample;
}

// Check if messages file exists and add those messages too
if (file_exists($messagesFile)) {
    // Read all messages from file
    $lines = file($messagesFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    // Process each line and add to messages array
    foreach ($lines as $line) {
        $parts = explode('|', $line);
        if (count($parts) >= 3) {
            $allMessages[] = [
                'date' => $parts[0],
                'username' => $parts[1],
                'message' => $parts[2]
            ];
        }
    }
}

// Sort messages by date (newest first)
usort($allMessages, function($a, $b) {
    $dateA = strtotime($a['date']);
    $dateB = strtotime($b['date']);
    return $dateB - $dateA;
});

// Display up to 8 most recent messages
$count = 0;
foreach ($allMessages as $msg) {
    if ($count >= 8) break;
    
    echo '<div class="message">';
    echo '<div class="name">' . htmlspecialchars($msg['username']) . '</div>';
    echo '<div class="text">' . htmlspecialchars($msg['message']) . '</div>';
    echo '<div class="date">' . htmlspecialchars($msg['date']) . '</div>';
    echo '</div>';
    
    $count++;
}
?>
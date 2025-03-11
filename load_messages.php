<?php
$messagesFile = 'messages.txt';

// Check if messages file exists
if (file_exists($messagesFile)) {
    // Read all messages from file
    $lines = file($messagesFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    // Reverse order (newest first)
    $lines = array_reverse($lines);
    
    // Display up to 5 most recent messages
    $count = 0;
    foreach ($lines as $line) {
        if ($count >= 5) break;
        
        $parts = explode('|', $line);
        if (count($parts) >= 3) {
            $date = htmlspecialchars($parts[0]);
            $username = htmlspecialchars($parts[1]);
            $message = htmlspecialchars($parts[2]);
            
            echo '<div class="message">';
            echo '<div class="name">' . $username . '</div>';
            echo '<div class="text">' . $message . '</div>';
            echo '<div class="date">' . $date . '</div>';
            echo '</div>';
            
            $count++;
        }
    }
} else {
    // Sample messages if no messages exist yet
    echo '<div class="message">
        <div class="name">midnight_caller</div>
        <div class="text">i recorded this at 3:33am. there was someone else in my house.</div>
        <div class="date">03/09/2025</div>
    </div>
    
    <div class="message">
        <div class="name">the_watcher</div>
        <div class="text">found this on an unlabeled tape in my basement. i don\'t have a basement.</div>
        <div class="date">03/08/2025</div>
    </div>
    
    <div class="message">
        <div class="name">shadow_666</div>
        <div class="text">the song stops at 2:17. after that it\'s just breathing.</div>
        <div class="date">03/07/2025</div>
    </div>
    
    <div class="message">
        <div class="name">paranoid_entity</div>
        <div class="text">don\'t listen with headphones. she whispers directions to your house.</div>
        <div class="date">03/06/2025</div>
    </div>';
}
?>
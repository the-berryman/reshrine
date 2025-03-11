<?php
$counterFile = 'counter.txt';

// Create counter file if it doesn't exist
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, '1337');
}

// Read current count
$count = (int)file_get_contents($counterFile);

// Increment count (only once per session)
if (!isset($_SESSION['counted'])) {
    $count++;
    file_put_contents($counterFile, $count);
    $_SESSION['counted'] = true;
}

// Display with comma as thousands separator
echo number_format($count);
?>
<?php
// Get post ID from URL
$postId = isset($_GET['id']) ? $_GET['id'] : '';

// Initialize post data
$post = null;

// Load posts from JSON
if (file_exists('posts.json')) {
    $postsData = json_decode(file_get_contents('posts.json'), true);
    
    // Find the requested post
    foreach ($postsData['posts'] as $p) {
        if ($p['id'] == $postId) {
            $post = $p;
            break;
        }
    }
}

// If post not found, prepare error post
if (!$post) {
    $post = [
        'title' => 'post not found',
        'date' => date('m/d/Y'),
        'content' => 'the post you\'re looking for has been consumed by the void.',
        'tags' => ['error', '404']
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($post['title']); ?> - re:play</title>
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="static-effect"></div>
    <div class="vhs-effect"></div>
    <div class="noise"></div>
    
    <div class="blood-drip" id="drip1"></div>
    <div class="blood-drip" id="drip2"></div>
    <div class="blood-drip" id="drip3"></div>
    <div class="blood-drip" id="drip4"></div>
    <div class="blood-drip" id="drip5"></div>
    
    <div class="container">
        <header>
            <h1 class="flicker"><span class="title-glitch">re:play</span></h1>
            <div class="visitor-counter">visitors: <?php include 'counter.php'; ?></div>
            <nav>
                <a href="index.html">blog</a>
                <a href="shrine.html">shrine</a>
                <a href="about.html">about</a>
            </nav>
        </header>
        
        <div class="post-page">
            <h2><?php echo htmlspecialchars($post['title']); ?></h2>
            <div class="post-date"><?php echo htmlspecialchars($post['date']); ?></div>
            
            <div class="post-content">
                <?php echo $post['content']; ?>
            </div>
            
            <?php if (isset($post['tags']) && !empty($post['tags'])): ?>
            <div class="post-tags">
                <?php foreach ($post['tags'] as $tag): ?>
                <span><?php echo htmlspecialchars($tag); ?></span>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        
        <footer>
            <p>re:play est. 2025 • the words remain even after you close this page</p>
            <p><small><a href="shrine.html">make an offering</a></small></p>
        </footer>
    </div>
    
    <script>
        // Simulate VHS tracking errors occasionally
        setInterval(function() {
            if (Math.random() > 0.95) {
                const vhsEffect = document.querySelector('.vhs-effect');
                if (vhsEffect) {
                    vhsEffect.style.opacity = '0.1';
                    setTimeout(() => {
                        vhsEffect.style.opacity = '0.03';
                    }, 200);
                }
            }
        }, 3000);
    </script>
</body>
</html>
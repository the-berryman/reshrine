<!DOCTYPE html>
<html>
<head>
    <title>re:play - horror blog</title>
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
                <a href="index.php">blog</a>
                <a href="shrine.php">shrine</a>
                <a href="about.php">about</a>
            </nav>
        </header>
        
        <div class="blog-posts">
            <!-- Posts will be loaded from posts.json via JavaScript -->
        </div>
        
        <footer>
            <p>re:play est. 2025 • the words remain even after you close this page</p>
            <p><small><a href="shrine.html">make an offering</a></small></p>
        </footer>
    </div>
    
    <script src="scripts.js"></script>
</body>
</html>
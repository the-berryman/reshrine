<!DOCTYPE html>
<html>
<head>
    <title>re:play - digital horror shrine</title>
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
        
        <div class="shrine-description">
            welcome to the digital shrine. the place where lost sounds find their home.
            leave an offering or listen to the whispers of the forgotten.
        </div>
        
        <div class="player-container">
            <div class="player-header">
                <div class="player-title">death.wav</div>
                <div class="player-options">recording: on</div>
            </div>
            
            <div class="player-controls">
                <button class="control-button" onclick="prevTrack()">◄◄</button>
                <button class="control-button" id="playBtn" onclick="togglePlay()">►</button>
                <button class="control-button" onclick="stopTrack()">■</button>
                <button class="control-button" onclick="nextTrack()">►►</button>
                <span style="margin-left: 10px; font-size: 11px; color: #ffffff;">volume:</span>
                <div style="width: 60px; height: 6px; background: #1a1a1a; margin-left: 5px;">
                    <div style="width: 70%; height: 100%; background: #b31a1a;"></div>
                </div>
            </div>
            
            <div class="song-info" id="currentSong">now playing: "last breath.mp3" by unknown</div>
            
            <div class="progress-bar">
                <div class="progress" id="progress"></div>
            </div>
            
            <div style="font-size: 11px; color: #ffffff; display: flex; justify-content: space-between;">
                <span id="currentTime">0:00</span>
                <span id="totalTime">0:00</span>
            </div>
            
            <ul class="song-list" id="songList">
                <!-- Songs will be loaded via JavaScript -->
            </ul>
        </div>
        
        <div class="offerings">
            <h2>make an offering</h2>
            <p>your payment guarantees nothing. some things cannot be unheard.</p>
            
            <!-- PayPal integration -->
            <form action="process_payment.php" method="post">
                <input type="hidden" name="amount" value="1">
                <input type="hidden" name="tier" value="basic">
                <input type="submit" class="offering-button" value="$1 - add your sound">
            </form>
            
            <form action="process_payment.php" method="post">
                <input type="hidden" name="amount" value="2">
                <input type="hidden" name="tier" value="message">
                <input type="submit" class="offering-button" value="$2 - add sound + message">
            </form>
            
            <form action="process_payment.php" method="post">
                <input type="hidden" name="amount" value="5">
                <input type="hidden" name="tier" value="featured">
                <input type="submit" class="offering-button" value="$5 - featured recording">
            </form>
        </div>
        
        <div class="guestbook">
            <h3>visitor messages</h3>
            
            <!-- Messages will be loaded via PHP -->
            <?php include 'load_messages.php'; ?>
        </div>
        
        <div id="thankyou-form" style="display:none;">
            <h3>leave your offering</h3>
            <form action="submit_message.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">your name:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="message">your message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <label for="sound_file">your sound (mp3/wav):</label>
                    <input type="file" id="sound_file" name="sound_file" accept="audio/*" required>
                </div>
                <input type="submit" class="offering-button" value="submit offering">
            </form>
        </div>
        
        <footer>
            <p>re:play est. 2025 • the sounds remain even after you close this page</p>
            <p><small>some visitors never leave</small></p>
        </footer>
    </div>
    
    <script src="shrine.js"></script>
</body>
</html>
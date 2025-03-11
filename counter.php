document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on the shrine page
    if (!document.querySelector('.player-container')) return;
    
    // Audio player functionality
    let audioPlayer = new Audio();
    let currentTrackIndex = 0;
    let isPlaying = false;
    let tracks = [];
    
    // Load tracks from JSON file
    fetch('tracks.json')
        .then(response => response.json())
        .then(data => {
            tracks = data.tracks;
            
            // Populate playlist
            const songList = document.getElementById('songList');
            songList.innerHTML = '';
            
            tracks.forEach((track, index) => {
                const li = document.createElement('li');
                li.className = 'song-item';
                li.innerHTML = `
                    <span>${index + 1}. ${track.title}</span>
                    <span>${track.artist}</span>
                `;
                li.addEventListener('click', () => {
                    currentTrackIndex = index;
                    loadTrack(currentTrackIndex);
                    playTrack();
                });
                songList.appendChild(li);
            });
            
            // Load the first track
            if (tracks.length > 0) {
                loadTrack(0);
            }
        })
        .catch(error => {
            console.error('Error loading tracks:', error);
            document.getElementById('songList').innerHTML = '<li class="song-item"><span>Error loading tracks</span></li>';
        });
    
    // Player functions
    function loadTrack(index) {
        if (tracks.length === 0) return;
        
        const track = tracks[index];
        audioPlayer.src = track.file;
        document.getElementById('currentSong').textContent = `now playing: "${track.title}" by ${track.artist}`;
        
        // Reset progress bar
        document.getElementById('progress').style.width = '0%';
        document.getElementById('currentTime').textContent = '0:00';
        
        audioPlayer.addEventListener('loadedmetadata', function() {
            document.getElementById('totalTime').textContent = formatTime(audioPlayer.duration);
        });
        
        audioPlayer.addEventListener('timeupdate', updateProgress);
        audioPlayer.addEventListener('ended', nextTrack);
    }
    
    function playTrack() {
        audioPlayer.play();
        isPlaying = true;
        document.getElementById('playBtn').textContent = '❚❚';
    }
    
    function pauseTrack() {
        audioPlayer.pause();
        isPlaying = false;
        document.getElementById('playBtn').textContent = '►';
    }
    
    function stopTrack() {
        pauseTrack();
        audioPlayer.currentTime = 0;
        document.getElementById('progress').style.width = '0%';
        document.getElementById('currentTime').textContent = '0:00';
    }
    
    function prevTrack() {
        currentTrackIndex--;
        if (currentTrackIndex < 0) currentTrackIndex = tracks.length - 1;
        loadTrack(currentTrackIndex);
        playTrack();
    }
    
    function nextTrack() {
        currentTrackIndex++;
        if (currentTrackIndex >= tracks.length) currentTrackIndex = 0;
        loadTrack(currentTrackIndex);
        playTrack();
    }
    
    function togglePlay() {
        if (isPlaying) {
            pauseTrack();
        } else {
            playTrack();
        }
    }
    
    function updateProgress() {
        const duration = audioPlayer.duration;
        const currentTime = audioPlayer.currentTime;
        const percent = (currentTime / duration) * 100;
        
        document.getElementById('progress').style.width = percent + '%';
        document.getElementById('currentTime').textContent = formatTime(currentTime);
    }
    
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        seconds = Math.floor(seconds % 60);
        return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }
    
    // Expose functions to global scope for HTML buttons
    window.togglePlay = togglePlay;
    window.prevTrack = prevTrack;
    window.nextTrack = nextTrack;
    window.stopTrack = stopTrack;
    
    // Handle form display after payment
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('payment') === 'success') {
        document.getElementById('thankyou-form').style.display = 'block';
        // Scroll to the form
        document.getElementById('thankyou-form').scrollIntoView();
    }
    
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
});

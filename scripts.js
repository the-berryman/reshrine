document.addEventListener('DOMContentLoaded', function() {
    // Load blog posts from JSON file
    fetch('posts.json')
        .then(response => response.json())
        .then(data => {
            const postsContainer = document.querySelector('.blog-posts');
            
            // If no posts yet, show placeholder
            if (data.posts.length === 0) {
                postsContainer.innerHTML = '<div class="blog-post"><h2>no posts yet</h2><div class="post-content">the darkness is still gathering...</div></div>';
                return;
            }
            
            // Sort posts by date (newest first)
            data.posts.sort((a, b) => new Date(b.date) - new Date(a.date));
            
            // Display posts
            data.posts.forEach(post => {
                const postElement = document.createElement('div');
                postElement.className = 'blog-post';
                
                postElement.innerHTML = `
                    <h2>${post.title}</h2>
                    <div class="post-date">${post.date}</div>
                    <div class="post-content">${post.excerpt}</div>
                    <a href="post.php?id=${post.id}" class="read-more">read more...</a>
                `;
                
                postsContainer.appendChild(postElement);
            });
        })
        .catch(error => {
            console.error('Error loading posts:', error);
            const postsContainer = document.querySelector('.blog-posts');
            postsContainer.innerHTML = '<div class="blog-post"><h2>error</h2><div class="post-content">something went wrong while loading posts...</div></div>';
        });
        
    // Simple noise animation
    const noise = document.querySelector('.noise');
    if (noise) {
        // Using a pre-made noise PNG instead of SVG for better performance
        // The noise.png should be uploaded to your server
    }
});

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
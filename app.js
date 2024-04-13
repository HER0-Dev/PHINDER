document.addEventListener('DOMContentLoaded', function() {
    const likeButton = document.getElementById('like-button');
    const dislikeButton = document.getElementById('dislike-button');
    const userCard = document.getElementById('user-card');
    const userImage = document.getElementById('user-image');
    const userName = document.getElementById('user-name');

    let users = [
        { id: 1, name: 'Jan Kowalski', image: 'path/to/jan.jpg' },
        { id: 2, name: 'Anna Nowak', image: 'path/to/anna.jpg' },
    ];
    let currentUserIndex = 0;

    function showUser() {
        const user = users[currentUserIndex];
        userImage.src = user.image;
        userName.textContent = user.name;
    }

    function fetchUsers() {
        fetch('fetch_users.php')
            .then(response => response.json())
            .then(data => {
                users = data;
                showUser();
            })
            .catch(error => console.error('Error:', error));
    }

    function nextUser() {
        currentUserIndex++;
        if (currentUserIndex >= users.length) {
            currentUserIndex = 0;
        }
        showUser();
    }

    function handleLike() {
        const userId = likeButton.getAttribute('data-id');
        // Logika obsługi "Like"
        console.log('Like', userId);
        // Tutaj możesz dodać logikę do zapisania "Like" na serwerze
        nextUser();
    }

    function handleDislike() {
        const userId = dislikeButton.getAttribute('data-id');
        // Logika obsługi "Dislike"
        console.log('Dislike', userId);
        // Tutaj możesz dodać logikę do zapisania "Dislike" na serwerze
        nextUser();
    }

    likeButton.addEventListener('click', handleLike);
    dislikeButton.addEventListener('click', handleDislike);

    fetchUsers();
});

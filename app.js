document.addEventListener('DOMContentLoaded', function() {
    const likeButtons = document.querySelectorAll('.like-button');
    const dislikeButtons = document.querySelectorAll('.dislike-button');

    function updateUserCard(userId, action) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_user.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && xhr.status == 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Zaktualizuj panel z danymi użytkownika
                    document.getElementById('app').innerHTML = response.html;
                } else {
                    console.error('Błąd:', response.message);
                }
            }
        };
        xhr.send(`id=${userId}&action=${action}`);
    }

    likeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-id');
            updateUserCard(userId, 'like');
        });
    });

    dislikeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-id');
            updateUserCard(userId, 'dislike');
        });
    });
});

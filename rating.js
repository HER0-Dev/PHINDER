function saveRating(user_id, rated_id, lik) {
    fetch('save_rating.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `user_id=${user_id}&rated_id=${rated_id}&lik=${lik}`
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch((error) => console.error('Error:', error));
}

function checkMatches(user_id) {
    fetch('check_matches.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `user_id=${user_id}`
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch((error) => console.error('Error:', error));
}

function saveMatch(user1_id, user2_id) {
    fetch('save_match.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `user1_id=${user1_id}&user2_id=${user2_id}`
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch((error) => console.error('Error:', error));
}

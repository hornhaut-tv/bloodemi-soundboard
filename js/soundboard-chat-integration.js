$(function() {
    // Check if user comes from twitch authentication
    if(window.location.hash !== '') {
        // Extract token
        var hash = window.location.hash.split('#')[1].split('&')[0].split('=');
        var token = null;
        if(hash[0] == 'access_token') {
            var token = hash[1];

            // Remove twitch login button
            $('#twitch-connect').remove();
            $('.button-chat').css('display', 'inline-block');

            
            // Fetch username for full chat authability
            const fetch = new window.TwitchJs({ token, clientId });
            fetch.api.get('users').then(response => {
                console.log(response.data[0]);

                // Get authenticated user's username
                let username = response.data[0].displayName;
                console.log(username);

                // Connect to chat
                const send = new window.TwitchJs({ username, token });
                send.chat.connect().then(() => {

                    // Join channel
                    send.chat.join(channel).then(channelState => {
                        // Chat button click watcher
                        $('.button-chat').click(function() {
                            // Send command to chat
                            let command = $(this).parent('td').parent('tr').data('command');
                            console.log('Sending to chat [#' + channel + '] @' + username + ': ' + command);
                            send.chat.say(channel, command);
                        });
                    });
                });
            });
        }
    }
});
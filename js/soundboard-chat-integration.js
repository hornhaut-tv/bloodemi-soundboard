$(function() {

    // HORNHAUT.tv advertising
    console.log(`                  
                           .;@@      ;;,'                          
                    @@@@@@@@@         +@@@@@@@@+                   
                   +@@@@@@@#            @@@@@@@@                   
             @+    ,@@@@@@@             ;@@@@@@@     @:            
            @@@     @@@@@@@             '@@@@@@@    ;@@'           
          '@@@@@    +@@@@@@              @@@@@@    ;@@@@@          
          @@@@@@@    @@@@@@             ;@@@@@    @@@@@@@;         
           @@@@@@@@   @@@@@,            @@@@@    @@@@@@@;          
             @@@@@@@@   @@@@           @@@@#   @@@@@@@#            
         @     @@@@@@@@ @@@@@         @@@@@ '@@@@@@@.    @         
         @@@      :@@@@@@@@.            @@@@@@@@@      @@@@        
         @@@@@        ;@@@+              @@@@        @@@@@,        
          @@@@@@@@+    @@@        @  @@; +@@+   '@@@@@@@@@         
           @@@@@@@@@@@@@@@        '@@@@  ,@@@@@@@@@@@@@@:          
              @@@@@@@@@@@@      @@@@@@@@ #@@@@@@@@@@@#             
                      .#@@@  @@@'   ;;  .@@@,                      
                  @'    @@@@ @@@        @@@     ;;                 
                     '@@@@@@@ @@@@    ;@@@@@@@                     
                          ;@@@@@@@@@@@@@@                          
                             :@@@@@@@@                             
                              @@@@@@@                              
                              @@@@@@@'                             
                             @@      @                             
                         @@#@         @'@@                         
                          + @@        @                            

Dies ist ein Projekt von HORNHAUT.tv und der Allianz der Geiervögel. Wir sind eine Initiative zur Förderung kleiner Streamer. Wenn dich derartige Projekte interessieren, dann solltest du unbedingt mal bei uns reinschauen!

https://hornhaut.tv
https://www.twitch.tv/HORNHAUTtv
https://twitter.com/HORNHAUTtv
https://twitter.com/geierallianz
https://twitter.com/dialogik
`);

    const clientId = '1cq3tqmw523zn03v0egw7se8att5vm';
    const channel  = 'bloodemi';

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

            // Initalize fetch API
            const fetch = new TwitchJs({ token });
            fetch.api.get('user').then(response => {

                // Get authenticated user's username
                let username = response.name;

                // Initalize send API
                const send = new TwitchJs({ token, username });

                // Connect to chat
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
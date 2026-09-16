<?php

return [

    // Bot token used for Discord API requests
    'bot_token' => env('DISCORD_BOT_TOKEN'),

    // Default guild/server ID (if your package needs it)
    'guild_id' => env('GUILD_ID'),

    // OAuth2 app credentials (only needed for OAuth2 flows, not for bot-token calls)
    'client_id' => env('DISCORD_CLIENT_ID'),
    'client_secret' => env('DISCORD_CLIENT_SECRET'),
    'redirect_uri' => env('DISCORD_REDIRECT_URI'),

];


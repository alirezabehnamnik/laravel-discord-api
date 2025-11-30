# Reysa Discord API (v1)

A small Laravel helper package for working with parts of the Discord HTTP API.

> **Note:** This is version **1** of the package. It does **not** cover all Discord API endpoints yet.  
> More endpoints and features will be added in future versions.

Official Discord API documentation:  
https://discord.com/developers/docs/intro

---

## Features (v1)

Currently supported helpers:

- Get guild invites
- Delete a guild invite
- Get a single message from a channel
- Get a guild member
- Get guild roles
- Give one or multiple roles to a user
- Remove one or multiple roles from a user
- Set a member nickname
- Send a direct message to a user
- Send an embed-style payload to a user
- Send a message/payload to a channel
- Get a single message from a channel
- Get recent messages from a channel
- Edit an existing message’s embeds in a channel

---

## Requirements

Check `composer.json` for exact constraints, but the package is designed to work with:

- PHP: `>= 8.2`
- Laravel: `7.x` up to `11.x` (via `illuminate/support` `^7.0|^8.0|^9.0|^10.0|^11.0`)


---

## Installation

Install the package via Composer:

~~~bash
composer require reysa/discord-api
~~~

Laravel’s package auto-discovery will automatically register the service provider and facade.

You can also find the package on Packagist:

https://packagist.org/packages/reysa/discord-api

---

## Configuration

Publish the config file:

~~~bash
php artisan vendor:publish --tag=discord-api-config
~~~

This will create `config/discord-api.php` in your Laravel application:

~~~php
<?php

return [
    'bot_token' => env('DISCORD_BOT_TOKEN'),
    'guild_id'  => env('GUILD_ID'),
];
~~~

Then set the values in your `.env` file:

~~~env
DISCORD_BOT_TOKEN=your_bot_token_here
GUILD_ID=your_guild_id_here
~~~

---

## Quick Usage Example

The package ships with a facade alias `DAPI`.

~~~php
<?php

use Reysa\DiscordAPI\Facades\DAPI;
use Illuminate\Support\Facades\Route;

Route::get('/test-discord', function () {
    DAPI::sendMessageToChannel(
        '123456789012345678',
        ['content' => 'Hello from Reysa Discord API!']
    );

    return 'Message sent (if token and channel are correct).';
});
~~~

> **Note:** For methods like `sendMessageToChannel` and `sendEmbedMessageToUser`,  
> the second argument is the raw payload array that Discord accepts  
> (for example: `['content' => '...']`, `['embeds' => [...]]`, etc).  
> In v1 this payload is passed directly to the HTTP request body without additional validation.

---

## API Reference (v1)

All methods are static on `Reysa\DiscordAPI\DAPI`.  
In a Laravel app you typically use the facade: `Reysa\DiscordAPI\Facades\DAPI`.

### `getGuildInvites(string $guildId): Response`

Fetch all invites for a guild.

~~~php
$invites = DAPI::getGuildInvites(config('discord-api.guild_id'));
~~~

---

### `deleteGuildInvite(string $code): Response`

Delete a specific invite by code.

~~~php
DAPI::deleteGuildInvite('inviteCodeHere');
~~~

---

### `getMessage(string $channelId, string $messageId): Response`

Get a single message from a channel.

~~~php
$message = DAPI::getMessage($channelId, $messageId);
~~~

---

### `getGuildUser(string $userId): Response`

Get a guild member (by user ID) in the configured guild.

~~~php
$member = DAPI::getGuildUser('123456789012345678');
~~~

---

### `getGuildRoles(): Response`

Get the list of roles in the configured guild.

~~~php
$roles = DAPI::getGuildRoles();
~~~

---

### `giveRole(string $userId, array $roleIds): Response`

Give one or multiple roles to a member.

- `$roleIds` must be an **array of role IDs**.
- It can contain a single ID (for example: `[1234567890]`) or multiple IDs (for example: `[123, 456, 789]`).
- When multiple IDs are provided, the method is intended to give **all** of them to the user.

~~~php
// Give a single role
DAPI::giveRole($userId, [123456789012345678]);

// Give multiple roles
DAPI::giveRole($userId, [
    123456789012345678,
    234567890123456789,
    345678901234567890,
]);
~~~

---

### `removeRole(string $userId, array $roleIds): Response`

Remove one or multiple roles from a member.

- `$roleIds` works the same way as in `giveRole`:
  - `[oneRoleId]` → remove that single role
  - `[roleId1, roleId2, ...]` → remove each of those roles

~~~php
// Remove a single role
DAPI::removeRole($userId, [123456789012345678]);

// Remove multiple roles
DAPI::removeRole($userId, [
    123456789012345678,
    234567890123456789,
]);
~~~

---

### `setName(string $userId, string $name): Response`

Set the member's nickname in the configured guild.

~~~php
DAPI::setName($userId, 'New Nickname');
~~~

---

### `sendMessageToUser(string $userId, string $message): Response|false`

Send a direct message (plain text) to a user.

- Internally:
  - Creates a DM channel with the user.
  - Sends the message to that channel.
- Returns `false` if creating the DM channel fails.

~~~php
$result = DAPI::sendMessageToUser($userId, 'Hello in your DMs!');

if ($result === false) {
    // handle failure
}
~~~

---

### `sendEmbedMessageToUser(string $userId, array $payload): Response|false`

Send a rich embed (or any valid Discord message payload) to a user via DM.

- `$payload` is sent as-is to the Discord API.
- Example payload: `['embeds' => [...]]`
- Returns `false` if DM channel creation fails.

~~~php
$payload = [
    'content' => 'Optional text',
    'embeds'  => [
        [
            'title'       => 'Hello!',
            'description' => 'This is an embed message',
            'color'       => 0x7289DA,
        ],
    ],
];

DAPI::sendEmbedMessageToUser($userId, $payload);
~~~

---

### `sendMessageToChannel(string $channelId, array $payload): Response`

Send a message to a specific channel.

- `$payload` can be:
  - `['content' => 'plain text']`
  - or a more complex structure (embeds, components, etc.).

~~~php
DAPI::sendMessageToChannel('123456789012345678', [
    'content' => 'Hello channel!',
]);
~~~

---

### `getChannelMessage(string $channelId, string $messageId): Response`

Retrieve a single message from a given channel.

~~~php
$message = DAPI::getChannelMessage($channelId, $messageId);
~~~

---

### `getChannelMessages(string $channelId): Response`

Retrieve recent messages from a given channel.

~~~php
$messages = DAPI::getChannelMessages($channelId);
~~~

---

### `editChannelEmbedMessage(string $channelId, string $messageId, array $embeds): Response`

Edit an existing message’s embeds in a channel.

~~~php
DAPI::editChannelEmbedMessage($channelId, $messageId, [
    [
        'title'       => 'Updated title',
        'description' => 'Updated description',
    ],
]);
~~~

---

## Versioning & Roadmap

- **Current version:** `v1`
- **Scope:** A small subset of Discord’s HTTP API focused on guild members, roles, invites, and basic messaging.
- **Planned:** Future versions will add support for more Discord endpoints and higher-level helpers.

---

## Contributing

Issues and pull requests are welcome.

- Feel free to open an issue with:
  - API endpoints you’d like to see supported
  - Bug reports
  - Ideas for improving developer experience (DX)

---

## License

This project is open-source software licensed under the MIT license.  
See the `LICENSE` file for details.

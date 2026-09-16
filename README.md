# Reysa Discord API

![License: MIT](https://img.shields.io/badge/license-MIT-green.svg)
![PHP >= 8.2](https://img.shields.io/badge/php-%3E%3D8.2-777bb4.svg)
![Laravel 7-13+](https://img.shields.io/badge/laravel-7%20--%2013%2B-ff2d20.svg)
![Version 2.0.0](https://img.shields.io/badge/version-2.0.0-blue.svg)

Call Discord's HTTP API from Laravel through simple static method calls instead of hand-rolling
Guzzle/`Http::` requests, headers, and URLs yourself:

```php
DAPI::sendMessageToChannel($channelId, ['content' => 'Hello from Laravel!']);
DAPI::giveRole($userId, [$roleId]);
DAPI::getGuildChannels($guildId);
```

**v2** covers essentially every endpoint Discord officially documents for bots — Guilds,
Channels, Messages, Users, Webhooks, Emojis, Stickers, Invites, Application Commands &
Interactions, Audit Log, Auto Moderation, Scheduled Events, Stage Instances, Soundboard, Polls,
Voice, Monetization, and OAuth2. Not covered: the Gateway (WebSocket real-time events) and the
Discord Social SDK/Lobby endpoints — different protocol/product, outside the scope of an HTTP
client wrapper.

Official Discord API documentation: https://discord.com/developers/docs/intro

## Table of contents

- [What's new in v2](#whats-new-in-v2)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Quick usage example](#quick-usage-example)
- [Full API coverage](#full-api-coverage)
- [Browsable docs & live testing (Swagger)](#browsable-docs--live-testing-swagger)
- [API reference (core helpers)](#api-reference-core-helpers)
- [Versioning & roadmap](#versioning--roadmap)
- [Contributing](#contributing)
- [License](#license)

---

## What's new in v2

- **Full endpoint coverage** — ~218 methods across 21 resource categories (up from 15 helpers in
  v1), generated directly from Discord's official docs source so paths/params match exactly.
  See [Full API coverage](#full-api-coverage) for the breakdown.
- **Interactive documentation** — a Swagger UI you can run locally that documents every method
  as the actual PHP call you write, with real example payloads, and lets you fire live test
  requests against your own bot. See [Browsable docs & live testing](#browsable-docs--live-testing-swagger).
- **Docker test harness** — `docker compose up`, no local PHP/Composer setup needed to try the
  package against a real Discord server.
- **Breaking change:** `giveRole()`/`removeRole()` now return `Response[]` keyed by role ID
  instead of a single `Response` — see [their reference entries](#giverolestring-userid-array-roleids-response) for why.
- Every v1 method still works exactly as it did (same names, same arguments) except that one
  documented change.

---

## Requirements

Check `composer.json` for exact constraints, but the package is designed to work with:

- PHP: `>= 8.2`
- Laravel: `7.x` up to `13.x` (via `illuminate/support` `^7.0|^8.0|^9.0|^10.0|^11.0|^12.0|^13.0`).
  Only `illuminate/support` (config, HTTP client, facades) is required — no framework internals
  this package depends on have changed across that range, so newer Laravel majors will typically
  keep working without a package update; the constraint just gets widened once released.

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

## Full API coverage

~218 methods total. Request bodies for POST/PUT/PATCH calls are passed through to Discord as-is
(no field validation) — see the linked official docs page per category for the exact payload
shape, or browse it interactively in Swagger (below).

| Category | Methods | Source file | Official docs |
|---|---|---|---|
| Core helpers (v1) | 14 | `src/DAPI.php` | — |
| Guilds (settings, members, roles, bans, widgets, onboarding) | 40 | `Concerns/InteractsWithGuilds.php` | [Guild](https://discord.com/developers/docs/resources/guild) |
| Channels (CRUD, permissions, threads, pins, invites) | 24 | `Concerns/InteractsWithChannels.php` | [Channel](https://discord.com/developers/docs/resources/channel) |
| Application Commands (slash commands) | 16 | `Concerns/InteractsWithApplicationCommands.php` | [Application Commands](https://discord.com/developers/docs/interactions/application-commands) |
| Webhooks | 15 | `Concerns/InteractsWithWebhooks.php` | [Webhook](https://discord.com/developers/docs/resources/webhook) |
| Messages (send, edit, delete, react, bulk-delete, pins) | 14 | `Concerns/InteractsWithMessages.php` | [Message](https://discord.com/developers/docs/resources/message) |
| Users | 12 | `Concerns/InteractsWithUsers.php` | [User](https://discord.com/developers/docs/resources/user) |
| Emojis | 10 | `Concerns/InteractsWithEmojis.php` | [Emoji](https://discord.com/developers/docs/resources/emoji) |
| Monetization (SKUs, entitlements, subscriptions) | 8 | `Concerns/InteractsWithMonetization.php` | [SKU](https://discord.com/developers/docs/resources/sku) |
| Interactions (responding/following up) | 8 | `Concerns/InteractsWithInteractions.php` | [Receiving & Responding](https://discord.com/developers/docs/interactions/receiving-and-responding) |
| Stickers | 8 | `Concerns/InteractsWithStickers.php` | [Sticker](https://discord.com/developers/docs/resources/sticker) |
| Soundboard | 7 | `Concerns/InteractsWithSoundboard.php` | [Soundboard](https://discord.com/developers/docs/resources/soundboard) |
| Guild Scheduled Events | 6 | `Concerns/InteractsWithScheduledEvents.php` | [Guild Scheduled Event](https://discord.com/developers/docs/resources/guild-scheduled-event) |
| Guild Templates | 6 | `Concerns/InteractsWithGuildTemplates.php` | [Guild Template](https://discord.com/developers/docs/resources/guild-template) |
| Auto Moderation | 5 | `Concerns/InteractsWithAutoModeration.php` | [Auto Moderation](https://discord.com/developers/docs/resources/auto-moderation) |
| Voice | 5 | `Concerns/InteractsWithVoice.php` | [Voice](https://discord.com/developers/docs/resources/voice) |
| Invites | 4 | `Concerns/InteractsWithInvites.php` | [Invite](https://discord.com/developers/docs/resources/invite) |
| Stage Instances | 4 | `Concerns/InteractsWithStageInstances.php` | [Stage Instance](https://discord.com/developers/docs/resources/stage-instance) |
| Applications | 3 | `Concerns/InteractsWithApplications.php` | [Application](https://discord.com/developers/docs/resources/application) |
| OAuth2 (code exchange, refresh, revoke, authorization URL) | 6 | `Concerns/InteractsWithOAuth2.php` | [OAuth2](https://discord.com/developers/docs/topics/oauth2) |
| Polls | 2 | `Concerns/InteractsWithPolls.php` | [Poll](https://discord.com/developers/docs/resources/poll) |
| Audit Log | 1 | `Concerns/InteractsWithAuditLog.php` | [Audit Log](https://discord.com/developers/docs/resources/audit-log) |

Method names mirror Discord's own endpoint titles (e.g. "Get Guild Channels" →
`getGuildChannels()`), so if you know the Discord docs, you already know the method name.

---

## Browsable docs & live testing (Swagger)

Every method above is also documented interactively — grouped by category, with the real PHP
call signature front and center, Discord's own description, and (where available) a real
example payload — plus a "Try it out" button that fires a real request against your own bot.

```bash
cp harness/.env.example harness/.env   # then fill in DISCORD_BOT_TOKEN / GUILD_ID
docker compose up -d --build
```

- **`http://localhost:8081`** — Swagger UI.
- **`http://localhost:8080`** — the harness Laravel app itself (requires this package via a
  local path dependency, so it always runs against the current `src/`, not a published release
  — edits to `src/**/*.php` are picked up without rebuilding).

The HTTP routes Swagger calls only exist in this local test harness, as a thin proxy so "Try it
out" works in a browser — they are **not** part of the published package. A real consumer of
this package only ever calls the PHP methods shown in each Swagger entry's summary.

---

## API Reference (core helpers)

All methods are static on `Reysa\DiscordAPI\DAPI`.  
In a Laravel app you typically use the facade: `Reysa\DiscordAPI\Facades\DAPI`.

Below are the original hand-written convenience helpers. For the full set of ~200 additional
wrapped endpoints (organized under `src/Concerns/*.php`, one trait per Discord resource), browse
the Swagger UI (see above) or the source directly — method names mirror Discord's own endpoint
titles (e.g. "Get Guild Channels" → `getGuildChannels()`).

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

### `giveRole(string $userId, array $roleIds): Response[]`

Give one or multiple roles to a member.

- `$roleIds` must be an **array of role IDs**.
- Discord's "Add Guild Member Role" endpoint only accepts **one role per call**
  (`PUT /guilds/{guild.id}/members/{user.id}/roles/{role.id}`), so this method sends one
  request per role ID.
- **Returns an array of `Response` objects keyed by role ID** (not a single `Response`), so you
  can check each role's outcome individually.

~~~php
// Give a single role
$results = DAPI::giveRole($userId, [123456789012345678]);

// Give multiple roles
$results = DAPI::giveRole($userId, [
    123456789012345678,
    234567890123456789,
    345678901234567890,
]);

foreach ($results as $roleId => $response) {
    // $response->successful() / $response->json() per role
}
~~~

---

### `removeRole(string $userId, array $roleIds): Response[]`

Remove one or multiple roles from a member.

- `$roleIds` works the same way as in `giveRole` — one `DELETE` request per role ID.
- **Returns an array of `Response` objects keyed by role ID.**

~~~php
// Remove a single role
$results = DAPI::removeRole($userId, [123456789012345678]);

// Remove multiple roles
$results = DAPI::removeRole($userId, [
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

- **Scope:** Full coverage of Discord's documented bot-usable HTTP REST API. Request bodies are
  passed through as-is (no validation), matching the original package's philosophy — see the
  Discord docs or the Swagger UI (`docker compose up`, `http://localhost:8081`) for exact payload
  shapes per endpoint.
- **Not covered:** Gateway/WebSocket events, Discord Social SDK (Lobby) endpoints.
- **Planned:** Typed request/response DTOs and higher-level helpers on top of the raw wrappers.

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

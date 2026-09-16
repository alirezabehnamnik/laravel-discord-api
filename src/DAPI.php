<?php

namespace Reysa\DiscordAPI;

use Illuminate\Support\Facades\Http;
use Reysa\DiscordAPI\Concerns\InteractsWithApplicationCommands;
use Reysa\DiscordAPI\Concerns\InteractsWithApplications;
use Reysa\DiscordAPI\Concerns\InteractsWithAuditLog;
use Reysa\DiscordAPI\Concerns\InteractsWithAutoModeration;
use Reysa\DiscordAPI\Concerns\InteractsWithChannels;
use Reysa\DiscordAPI\Concerns\InteractsWithEmojis;
use Reysa\DiscordAPI\Concerns\InteractsWithGuilds;
use Reysa\DiscordAPI\Concerns\InteractsWithGuildTemplates;
use Reysa\DiscordAPI\Concerns\InteractsWithInteractions;
use Reysa\DiscordAPI\Concerns\InteractsWithInvites;
use Reysa\DiscordAPI\Concerns\InteractsWithMessages;
use Reysa\DiscordAPI\Concerns\InteractsWithMonetization;
use Reysa\DiscordAPI\Concerns\InteractsWithOAuth2;
use Reysa\DiscordAPI\Concerns\InteractsWithPolls;
use Reysa\DiscordAPI\Concerns\InteractsWithScheduledEvents;
use Reysa\DiscordAPI\Concerns\InteractsWithSoundboard;
use Reysa\DiscordAPI\Concerns\InteractsWithStageInstances;
use Reysa\DiscordAPI\Concerns\InteractsWithStickers;
use Reysa\DiscordAPI\Concerns\InteractsWithUsers;
use Reysa\DiscordAPI\Concerns\InteractsWithVoice;
use Reysa\DiscordAPI\Concerns\InteractsWithWebhooks;

class DAPI
{
    use InteractsWithApplicationCommands;
    use InteractsWithApplications;
    use InteractsWithAuditLog;
    use InteractsWithAutoModeration;
    use InteractsWithChannels;
    use InteractsWithEmojis;
    use InteractsWithGuilds;
    use InteractsWithGuildTemplates;
    use InteractsWithInteractions;
    use InteractsWithInvites;
    use InteractsWithMessages;
    use InteractsWithMonetization;
    use InteractsWithOAuth2;
    use InteractsWithPolls;
    use InteractsWithScheduledEvents;
    use InteractsWithSoundboard;
    use InteractsWithStageInstances;
    use InteractsWithStickers;
    use InteractsWithUsers;
    use InteractsWithVoice;
    use InteractsWithWebhooks;

    /**
     * Base URL for the Discord HTTP API. All wrapped calls target this version.
     */
    protected static function baseUrl()
    {
        return 'https://discord.com/api/v10';
    }

    /**
     * Http client pre-authorized with the configured bot token.
     * Shared by every generated resource trait.
     *
     * @return \Illuminate\Http\Client\PendingRequest
     */
    protected static function client()
    {
        return Http::withHeaders([
            'Authorization' => 'Bot ' . config('discord-api.bot_token'),
        ]);
    }

    /**
     * Get guild invites.
     *
     * @param string $guildId
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildInvites($guildId)
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/invites");
    }

    /**
     * Delete a guild invite by code.
     *
     * @param string $code
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteGuildInvite($code)
    {
        return self::client()->delete(self::baseUrl() . "/invites/{$code}");
    }

    /**
     * Get a single message from a channel.
     *
     * @param string $channelId
     * @param string $messageId
     * @return \Illuminate\Http\Client\Response
     */
    public static function getMessage($channelId, $messageId)
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}");
    }

    /**
     * Get a guild member (by user ID) in the configured guild.
     *
     * @param string $userId
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildUser($userId)
    {
        return self::client()->get(self::baseUrl() . "/guilds/" . config('discord-api.guild_id') . "/members/{$userId}");
    }

    /**
     * Get the roles in the configured guild.
     *
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildRoles()
    {
        return self::client()->get(self::baseUrl() . "/guilds/" . config('discord-api.guild_id') . "/roles");
    }

    /**
     * Give one or multiple roles to a member.
     *
     * Discord's "Add Guild Member Role" endpoint only accepts one role per call
     * (PUT /guilds/{guild.id}/members/{user.id}/roles/{role.id}), so a separate
     * request is sent per role ID.
     *
     * @param string $userId
     * @param array $roleIds
     * @return \Illuminate\Http\Client\Response[] Responses keyed by role ID.
     */
    public static function giveRole($userId, array $roleIds)
    {
        $guildId = config('discord-api.guild_id');
        $responses = [];
        foreach ($roleIds as $roleId) {
            $responses[$roleId] = self::client()->put(
                self::baseUrl() . "/guilds/{$guildId}/members/{$userId}/roles/{$roleId}"
            );
        }
        return $responses;
    }

    /**
     * Remove one or multiple roles from a member.
     *
     * Discord's "Remove Guild Member Role" endpoint only accepts one role per call
     * (DELETE /guilds/{guild.id}/members/{user.id}/roles/{role.id}), so a separate
     * request is sent per role ID.
     *
     * @param string $userId
     * @param array $roleIds
     * @return \Illuminate\Http\Client\Response[] Responses keyed by role ID.
     */
    public static function removeRole($userId, array $roleIds)
    {
        $guildId = config('discord-api.guild_id');
        $responses = [];
        foreach ($roleIds as $roleId) {
            $responses[$roleId] = self::client()->delete(
                self::baseUrl() . "/guilds/{$guildId}/members/{$userId}/roles/{$roleId}"
            );
        }
        return $responses;
    }

    /**
     * Set the member's nickname in the configured guild.
     *
     * @param string $userId
     * @param string $name
     * @return \Illuminate\Http\Client\Response
     */
    public static function setName($userId, $name)
    {
        return self::client()->patch(self::baseUrl() . "/guilds/" . config('discord-api.guild_id') . "/members/{$userId}", [
            'nick' => $name,
        ]);
    }

    /**
     * Send a direct message (plain text) to a user.
     *
     * @param string $userId
     * @param string $message
     * @return \Illuminate\Http\Client\Response|false
     */
    public static function sendMessageToUser($userId, $message)
    {
        $recipient = self::client()->post(self::baseUrl() . '/users/@me/channels', [
            'recipient_id' => $userId,
        ]);
        if (!$recipient->json()) {
            return false;
        }
        return self::client()->post(self::baseUrl() . '/channels/' . $recipient->json()['id'] . '/messages', [
            'content' => $message,
        ]);
    }

    /**
     * Send a rich embed (or any valid Discord message payload) to a user via DM.
     *
     * @param string $userId
     * @param array $payload
     * @return \Illuminate\Http\Client\Response|false
     */
    public static function sendEmbedMessageToUser($userId, $payload)
    {
        $recipient = self::client()->post(self::baseUrl() . '/users/@me/channels', [
            'recipient_id' => $userId,
        ]);
        if (!$recipient->json()) {
            return false;
        }
        return self::client()->post(self::baseUrl() . '/channels/' . $recipient->json()['id'] . '/messages', $payload);
    }

    /**
     * Send a message to a specific channel.
     *
     * @param string $channelId
     * @param array $payload
     * @return \Illuminate\Http\Client\Response
     */
    public static function sendMessageToChannel($channelId, $payload)
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/messages", $payload);
    }

    /**
     * Retrieve a single message from a given channel.
     *
     * @param string $channelId
     * @param string $messageId
     * @return \Illuminate\Http\Client\Response
     */
    public static function getChannelMessage($channelId, $messageId)
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}");
    }

    /**
     * Retrieve recent messages from a given channel.
     *
     * @param string $channelId
     * @return \Illuminate\Http\Client\Response
     */
    public static function getChannelMessages($channelId)
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/messages");
    }

    /**
     * Edit an existing message's embeds in a channel.
     *
     * For a full message edit (content, components, flags, attachments, etc.) use
     * editMessage() instead.
     *
     * @param string $channelId
     * @param string $messageId
     * @param array $embeds
     * @return \Illuminate\Http\Client\Response
     */
    public static function editChannelEmbedMessage($channelId, $messageId, array $embeds)
    {
        return self::client()->patch(
            self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}",
            ['embeds' => $embeds]
        );
    }
}

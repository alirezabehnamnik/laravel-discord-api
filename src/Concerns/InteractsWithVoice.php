<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithVoice
{
    /**
     * List Voice Regions.
     *
     * Returns an array of voice region objects that can be used when setting a voice or stage channel's
     * rtc_region.
     *
     * GET /voice/regions
     * @return \Illuminate\Http\Client\Response
     */
    public static function listVoiceRegions(array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/voice/regions", $query);
    }

    /**
     * Get Current User Voice State.
     *
     * Returns the current user's voice state in the guild.
     *
     * GET /guilds/{guild.id}/voice-states/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function getCurrentUserVoiceState($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/voice-states/@me", $query);
    }

    /**
     * Get User Voice State.
     *
     * Returns the specified user's voice state in the guild.
     *
     * GET /guilds/{guild.id}/voice-states/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getUserVoiceState($guildId, $userId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/voice-states/{$userId}", $query);
    }

    /**
     * Modify Current User Voice State.
     *
     * Updates the current user's voice state. Returns 204 No Content on success. Fires a Voice State
     * Update Gateway event.
     *
     * PATCH /guilds/{guild.id}/voice-states/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyCurrentUserVoiceState($guildId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/voice-states/@me", $data);
    }

    /**
     * Modify User Voice State.
     *
     * Updates another user's voice state. Returns 204 No Content on success. Fires a Voice State Update
     * Gateway event.
     *
     * PATCH /guilds/{guild.id}/voice-states/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyUserVoiceState($guildId, $userId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/voice-states/{$userId}", $data);
    }

}

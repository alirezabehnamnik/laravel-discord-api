<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithSoundboard
{
    /**
     * Send Soundboard Sound.
     *
     * Send a soundboard sound to a voice channel the user is connected to. Fires a Voice Channel Effect
     * Send Gateway event.
     *
     * POST /channels/{channel.id}/send-soundboard-sound
     * @return \Illuminate\Http\Client\Response
     */
    public static function sendSoundboardSound($channelId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/send-soundboard-sound", $data);
    }

    /**
     * List Default Soundboard Sounds.
     *
     * Returns an array of soundboard sound objects that can be used by all users.
     *
     * GET /soundboard-default-sounds
     * @return \Illuminate\Http\Client\Response
     */
    public static function listDefaultSoundboardSounds(array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/soundboard-default-sounds", $query);
    }

    /**
     * List Guild Soundboard Sounds.
     *
     * Returns a list of the guild's soundboard sounds. Includes user fields if the bot has the
     * CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission.
     *
     * GET /guilds/{guild.id}/soundboard-sounds
     * @return \Illuminate\Http\Client\Response
     */
    public static function listGuildSoundboardSounds($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/soundboard-sounds", $query);
    }

    /**
     * Get Guild Soundboard Sound.
     *
     * Returns a soundboard sound object for the given sound id. Includes the user field if the bot has the
     * CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission.
     *
     * GET /guilds/{guild.id}/soundboard-sounds/{sound.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildSoundboardSound($guildId, $soundId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/soundboard-sounds/{$soundId}", $query);
    }

    /**
     * Create Guild Soundboard Sound.
     *
     * Create a new soundboard sound for the guild. Requires the CREATE_GUILD_EXPRESSIONS permission.
     * Returns the new soundboard sound object on success. Fires a Guild Soundboard Sound Create Gateway
     * event.
     *
     * POST /guilds/{guild.id}/soundboard-sounds
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGuildSoundboardSound($guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/guilds/{$guildId}/soundboard-sounds", $data);
    }

    /**
     * Modify Guild Soundboard Sound.
     *
     * Modify the given soundboard sound. For sounds created by the current user, requires either the
     * CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission. For other sounds, requires the
     * MANAGE_GUILD_EXPRESSIONS permission. Returns the updated soundboard sound object on success. Fires a
     * Guild So
     *
     * PATCH /guilds/{guild.id}/soundboard-sounds/{sound.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildSoundboardSound($guildId, $soundId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/soundboard-sounds/{$soundId}", $data);
    }

    /**
     * Delete Guild Soundboard Sound.
     *
     * Delete the given soundboard sound. For sounds created by the current user, requires either the
     * CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission. For other sounds, requires the
     * MANAGE_GUILD_EXPRESSIONS permission. Returns 204 No Content on success. Fires a Guild Soundboard
     * Sound Delete
     *
     * DELETE /guilds/{guild.id}/soundboard-sounds/{sound.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteGuildSoundboardSound($guildId, $soundId)
    {
        return self::client()->delete(self::baseUrl() . "/guilds/{$guildId}/soundboard-sounds/{$soundId}");
    }

}

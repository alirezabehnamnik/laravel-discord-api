<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithEmojis
{
    /**
     * List Guild Emojis.
     *
     * Returns a list of emoji objects for the given guild. Includes user fields if the bot has the
     * CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission.
     *
     * GET /guilds/{guild.id}/emojis
     * @return \Illuminate\Http\Client\Response
     */
    public static function listGuildEmojis($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/emojis", $query);
    }

    /**
     * Get Guild Emoji.
     *
     * Returns an emoji object for the given guild and emoji IDs. Includes the user field if the bot has
     * the MANAGE_GUILD_EXPRESSIONS permission, or if the bot created the emoji and has the
     * CREATE_GUILD_EXPRESSIONS permission.
     *
     * GET /guilds/{guild.id}/emojis/{emoji.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildEmoji($guildId, $emojiId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/emojis/{$emojiId}", $query);
    }

    /**
     * Create Guild Emoji.
     *
     * Create a new emoji for the guild. Requires the CREATE_GUILD_EXPRESSIONS permission. Returns the new
     * emoji object on success. Fires a Guild Emojis Update Gateway event.
     *
     * POST /guilds/{guild.id}/emojis
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGuildEmoji($guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/guilds/{$guildId}/emojis", $data);
    }

    /**
     * Modify Guild Emoji.
     *
     * Modify the given emoji. For emojis created by the current user, requires either the
     * CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission. For other emojis, requires the
     * MANAGE_GUILD_EXPRESSIONS permission. Returns the updated emoji object on success. Fires a Guild
     * Emojis Update Gateway ev
     *
     * PATCH /guilds/{guild.id}/emojis/{emoji.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildEmoji($guildId, $emojiId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/emojis/{$emojiId}", $data);
    }

    /**
     * Delete Guild Emoji.
     *
     * Delete the given emoji. For emojis created by the current user, requires either the
     * CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission. For other emojis, requires the
     * MANAGE_GUILD_EXPRESSIONS permission. Returns 204 No Content on success. Fires a Guild Emojis Update
     * Gateway event.
     *
     * DELETE /guilds/{guild.id}/emojis/{emoji.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteGuildEmoji($guildId, $emojiId)
    {
        return self::client()->delete(self::baseUrl() . "/guilds/{$guildId}/emojis/{$emojiId}");
    }

    /**
     * List Application Emojis.
     *
     * Returns an object containing a list of emoji objects for the given application under the items key.
     * Includes a user object for the team member that uploaded the emoji from the app's settings, or for
     * the bot user if uploaded using the API.
     *
     * GET /applications/{application.id}/emojis
     * @return \Illuminate\Http\Client\Response
     */
    public static function listApplicationEmojis($applicationId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/emojis", $query);
    }

    /**
     * Get Application Emoji.
     *
     * Returns an emoji object for the given application and emoji IDs. Includes the user field.
     *
     * GET /applications/{application.id}/emojis/{emoji.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getApplicationEmoji($applicationId, $emojiId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/emojis/{$emojiId}", $query);
    }

    /**
     * Create Application Emoji.
     *
     * Create a new emoji for the application. Returns the new emoji object on success.
     *
     * POST /applications/{application.id}/emojis
     * @return \Illuminate\Http\Client\Response
     */
    public static function createApplicationEmoji($applicationId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/applications/{$applicationId}/emojis", $data);
    }

    /**
     * Modify Application Emoji.
     *
     * Modify the given emoji. Returns the updated emoji object on success.
     *
     * PATCH /applications/{application.id}/emojis/{emoji.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyApplicationEmoji($applicationId, $emojiId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/applications/{$applicationId}/emojis/{$emojiId}", $data);
    }

    /**
     * Delete Application Emoji.
     *
     * Delete the given emoji. Returns 204 No Content on success.
     *
     * DELETE /applications/{application.id}/emojis/{emoji.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteApplicationEmoji($applicationId, $emojiId)
    {
        return self::client()->delete(self::baseUrl() . "/applications/{$applicationId}/emojis/{$emojiId}");
    }

}

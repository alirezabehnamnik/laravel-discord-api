<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithScheduledEvents
{
    /**
     * List Scheduled Events for Guild.
     *
     * Returns a list of guild scheduled event objects for the given guild.
     *
     * GET /guilds/{guild.id}/scheduled-events
     * @return \Illuminate\Http\Client\Response
     */
    public static function listScheduledEventsForGuild($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/scheduled-events", $query);
    }

    /**
     * Create Guild Scheduled Event.
     *
     * Create a guild scheduled event in the guild. Returns a guild scheduled event object on success.
     * Fires a Guild Scheduled Event Create Gateway event.
     *
     * POST /guilds/{guild.id}/scheduled-events
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGuildScheduledEvent($guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/guilds/{$guildId}/scheduled-events", $data);
    }

    /**
     * Get Guild Scheduled Event.
     *
     * Get a guild scheduled event. Returns a guild scheduled event object on success.
     *
     * GET /guilds/{guild.id}/scheduled-events/{guild_scheduled_event.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildScheduledEvent($guildId, $guildScheduledEventId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/scheduled-events/{$guildScheduledEventId}", $query);
    }

    /**
     * Modify Guild Scheduled Event.
     *
     * Modify a guild scheduled event. Returns the modified guild scheduled event object on success. Fires
     * a Guild Scheduled Event Update Gateway event.
     *
     * PATCH /guilds/{guild.id}/scheduled-events/{guild_scheduled_event.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildScheduledEvent($guildId, $guildScheduledEventId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/scheduled-events/{$guildScheduledEventId}", $data);
    }

    /**
     * Delete Guild Scheduled Event.
     *
     * Delete a guild scheduled event. Returns a 204 on success. Fires a Guild Scheduled Event Delete
     * Gateway event.
     *
     * DELETE /guilds/{guild.id}/scheduled-events/{guild_scheduled_event.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteGuildScheduledEvent($guildId, $guildScheduledEventId)
    {
        return self::client()->delete(self::baseUrl() . "/guilds/{$guildId}/scheduled-events/{$guildScheduledEventId}");
    }

    /**
     * Get Guild Scheduled Event Users.
     *
     * Get a list of guild scheduled event users subscribed to a guild scheduled event. Returns a list of
     * guild scheduled event user objects on success. Guild member data, if it exists, is included if the
     * with_member query parameter is set.
     *
     * GET /guilds/{guild.id}/scheduled-events/{guild_scheduled_event.id}/users
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildScheduledEventUsers($guildId, $guildScheduledEventId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/scheduled-events/{$guildScheduledEventId}/users", $query);
    }

}

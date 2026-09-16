<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithGuilds
{
    /**
     * Get Guild.
     *
     * Returns the guild object for the given id. If with_counts is set to true, this endpoint will also
     * return approximate_member_count and approximate_presence_count for the guild.
     *
     * GET /guilds/{guild.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuild($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}", $query);
    }

    /**
     * Get Guild Preview.
     *
     * Returns the guild preview object for the given id. If the user is not in the guild, then the guild
     * must be discoverable.
     *
     * GET /guilds/{guild.id}/preview
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildPreview($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/preview", $query);
    }

    /**
     * Modify Guild.
     *
     * Modify a guild's settings. Requires the MANAGE_GUILD permission. Returns the updated guild object on
     * success. Fires a Guild Update Gateway event.
     *
     * PATCH /guilds/{guild.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuild($guildId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}", $data);
    }

    /**
     * Get Guild Channels.
     *
     * Returns a list of guild channel objects. Does not include threads.
     *
     * GET /guilds/{guild.id}/channels
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildChannels($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/channels", $query);
    }

    /**
     * Create Guild Channel.
     *
     * Create a new channel object for the guild. Requires the MANAGE_CHANNELS permission. If setting
     * permission overwrites, only permissions your bot has in the guild can be allowed/denied. Setting
     * MANAGE_ROLES permission in channels is only possible for guild administrators. Returns the new
     * channel objec
     *
     * POST /guilds/{guild.id}/channels
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGuildChannel($guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/guilds/{$guildId}/channels", $data);
    }

    /**
     * Modify Guild Channel Positions.
     *
     * Modify the positions of a set of channel objects for the guild. Requires MANAGE_CHANNELS permission.
     * Returns a 204 empty response on success. Fires multiple Channel Update Gateway events.
     *
     * PATCH /guilds/{guild.id}/channels
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildChannelPositions($guildId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/channels", $data);
    }

    /**
     * List Active Guild Threads.
     *
     * Returns all active threads in the guild, including public and private threads. Threads are ordered
     * by their id, in descending order.
     *
     * GET /guilds/{guild.id}/threads/active
     * @return \Illuminate\Http\Client\Response
     */
    public static function listActiveGuildThreads($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/threads/active", $query);
    }

    /**
     * List Guild Members.
     *
     * Returns a list of guild member objects that are members of the guild.
     *
     * GET /guilds/{guild.id}/members
     * @return \Illuminate\Http\Client\Response
     */
    public static function listGuildMembers($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/members", $query);
    }

    /**
     * Search Guild Members.
     *
     * Returns a list of guild member objects whose username or nickname starts with a provided string.
     *
     * GET /guilds/{guild.id}/members/search
     * @return \Illuminate\Http\Client\Response
     */
    public static function searchGuildMembers($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/members/search", $query);
    }

    /**
     * Add Guild Member.
     *
     * Adds a user to the guild, provided you have a valid oauth2 access token for the user with the
     * guilds.join scope. Returns a 201 Created with the guild member as the body, or 204 No Content if the
     * user is already a member of the guild. Fires a Guild Member Add Gateway event.
     *
     * PUT /guilds/{guild.id}/members/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function addGuildMember($guildId, $userId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/guilds/{$guildId}/members/{$userId}", $data);
    }

    /**
     * Modify Guild Member.
     *
     * Modify attributes of a guild member. Returns a 200 OK with the guild member as the body. Fires a
     * Guild Member Update Gateway event. If the channel_id is set to null, this will force the target user
     * to be disconnected from voice.
     *
     * PATCH /guilds/{guild.id}/members/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildMember($guildId, $userId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/members/{$userId}", $data);
    }

    /**
     * Modify Current Member.
     *
     * Modifies the current member in a guild. Returns a 200 with the updated member object on success.
     * Fires a Guild Member Update Gateway event.
     *
     * PATCH /guilds/{guild.id}/members/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyCurrentMember($guildId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/members/@me", $data);
    }

    /**
     * Modify Current User Nick.
     *
     * <Danger> Deprecated in favor of Modify Current Member. </Danger>
     *
     * PATCH /guilds/{guild.id}/members/@me/nick
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyCurrentUserNick($guildId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/members/@me/nick", $data);
    }

    /**
     * Remove Guild Member.
     *
     * Remove a member from a guild. Requires KICK_MEMBERS permission. Returns a 204 empty response on
     * success. Fires a Guild Member Remove Gateway event.
     *
     * DELETE /guilds/{guild.id}/members/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function removeGuildMember($guildId, $userId)
    {
        return self::client()->delete(self::baseUrl() . "/guilds/{$guildId}/members/{$userId}");
    }

    /**
     * Get Guild Bans.
     *
     * Returns a list of ban objects for the users banned from this guild. Requires the BAN_MEMBERS
     * permission.
     *
     * GET /guilds/{guild.id}/bans
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildBans($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/bans", $query);
    }

    /**
     * Get Guild Ban.
     *
     * Returns a ban object for the given user or a 404 not found if the ban cannot be found. Requires the
     * BAN_MEMBERS permission.
     *
     * GET /guilds/{guild.id}/bans/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildBan($guildId, $userId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/bans/{$userId}", $query);
    }

    /**
     * Create Guild Ban.
     *
     * Create a guild ban, and optionally delete previous messages sent by the banned user. Requires the
     * BAN_MEMBERS permission. Returns a 204 empty response on success. Fires a Guild Ban Add Gateway
     * event.
     *
     * PUT /guilds/{guild.id}/bans/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGuildBan($guildId, $userId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/guilds/{$guildId}/bans/{$userId}", $data);
    }

    /**
     * Remove Guild Ban.
     *
     * Remove the ban for a user. Requires the BAN_MEMBERS permissions. Returns a 204 empty response on
     * success. Fires a Guild Ban Remove Gateway event.
     *
     * DELETE /guilds/{guild.id}/bans/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function removeGuildBan($guildId, $userId)
    {
        return self::client()->delete(self::baseUrl() . "/guilds/{$guildId}/bans/{$userId}");
    }

    /**
     * Bulk Guild Ban.
     *
     * Ban up to 200 users from a guild, and optionally delete previous messages sent by the banned users.
     * Requires both the BAN_MEMBERS and MANAGE_GUILD permissions. Returns a 200 response on success,
     * including the fields banned_users with the IDs of the banned users and failed_users with IDs that
     * could n
     *
     * POST /guilds/{guild.id}/bulk-ban
     * @return \Illuminate\Http\Client\Response
     */
    public static function bulkGuildBan($guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/guilds/{$guildId}/bulk-ban", $data);
    }

    /**
     * Get Guild Role.
     *
     * Returns a role object for the specified role.
     *
     * GET /guilds/{guild.id}/roles/{role.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildRole($guildId, $roleId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/roles/{$roleId}", $query);
    }

    /**
     * Get Guild Role Member Counts.
     *
     * Returns a map of role IDs to the number of members with the role. Does not include the @everyone
     * role.
     *
     * GET /guilds/{guild.id}/roles/member-counts
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildRoleMemberCounts($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/roles/member-counts", $query);
    }

    /**
     * Create Guild Role.
     *
     * Create a new role for the guild. Requires the MANAGE_ROLES permission. Returns the new role object
     * on success. Fires a Guild Role Create Gateway event. All JSON params are optional.
     *
     * POST /guilds/{guild.id}/roles
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGuildRole($guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/guilds/{$guildId}/roles", $data);
    }

    /**
     * Modify Guild Role Positions.
     *
     * Modify the positions of a set of role objects for the guild. Requires the MANAGE_ROLES permission.
     * Returns a list of all of the guild's role objects on success. Fires multiple Guild Role Update
     * Gateway events.
     *
     * PATCH /guilds/{guild.id}/roles
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildRolePositions($guildId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/roles", $data);
    }

    /**
     * Modify Guild Role.
     *
     * Modify a guild role. Requires the MANAGE_ROLES permission. Returns the updated role on success.
     * Fires a Guild Role Update Gateway event.
     *
     * PATCH /guilds/{guild.id}/roles/{role.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildRole($guildId, $roleId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/roles/{$roleId}", $data);
    }

    /**
     * Delete Guild Role.
     *
     * Delete a guild role. Requires the MANAGE_ROLES permission. Returns a 204 empty response on success.
     * Fires a Guild Role Delete Gateway event.
     *
     * DELETE /guilds/{guild.id}/roles/{role.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteGuildRole($guildId, $roleId)
    {
        return self::client()->delete(self::baseUrl() . "/guilds/{$guildId}/roles/{$roleId}");
    }

    /**
     * Get Guild Prune Count.
     *
     * Returns an object with one pruned key indicating the number of members that would be removed in a
     * prune operation. Requires the MANAGE_GUILD and KICK_MEMBERS permissions, unless the guild has the
     * PRUNE_REQUIRES_ADMIN guild feature, in which case it requires the ADMINISTRATOR permission.
     *
     * GET /guilds/{guild.id}/prune
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildPruneCount($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/prune", $query);
    }

    /**
     * Begin Guild Prune.
     *
     * Begin a prune operation. Requires the MANAGE_GUILD and KICK_MEMBERS permissions, unless the guild
     * has the PRUNE_REQUIRES_ADMIN guild feature, in which case it requires the ADMINISTRATOR permission.
     * Returns an object with one pruned key indicating the number of members that were removed in the
     * prune
     *
     * POST /guilds/{guild.id}/prune
     * @return \Illuminate\Http\Client\Response
     */
    public static function beginGuildPrune($guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/guilds/{$guildId}/prune", $data);
    }

    /**
     * Get Guild Voice Regions.
     *
     * Returns a list of voice region objects for the guild. Unlike the similar /voice route, this returns
     * VIP servers when the guild is VIP-enabled.
     *
     * GET /guilds/{guild.id}/regions
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildVoiceRegions($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/regions", $query);
    }

    /**
     * Get Guild Integrations.
     *
     * Returns a list of integration objects for the guild. Requires the MANAGE_GUILD permission.
     *
     * GET /guilds/{guild.id}/integrations
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildIntegrations($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/integrations", $query);
    }

    /**
     * Delete Guild Integration.
     *
     * Delete the attached integration object for the guild. Deletes any associated webhooks and kicks the
     * associated bot if there is one. Requires the MANAGE_GUILD permission. Returns a 204 empty response
     * on success. Fires Guild Integrations Update and Integration Delete Gateway events.
     *
     * DELETE /guilds/{guild.id}/integrations/{integration.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteGuildIntegration($guildId, $integrationId)
    {
        return self::client()->delete(self::baseUrl() . "/guilds/{$guildId}/integrations/{$integrationId}");
    }

    /**
     * Get Guild Widget Settings.
     *
     * Returns a guild widget settings object. Requires the MANAGE_GUILD permission.
     *
     * GET /guilds/{guild.id}/widget
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildWidgetSettings($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/widget", $query);
    }

    /**
     * Modify Guild Widget.
     *
     * Modify a guild widget settings object for the guild. All attributes may be passed in with JSON and
     * modified. Requires the MANAGE_GUILD permission. Returns the updated guild widget settings object.
     * Fires a Guild Update Gateway event.
     *
     * PATCH /guilds/{guild.id}/widget
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildWidget($guildId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/widget", $data);
    }

    /**
     * Get Guild Widget.
     *
     * Returns the widget for the guild. Fires an Invite Create Gateway event when an invite channel is
     * defined and a new Invite is generated.
     *
     * GET /guilds/{guild.id}/widget.json
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildWidget($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/widget.json", $query);
    }

    /**
     * Get Guild Vanity URL.
     *
     * Returns a partial invite object for guilds with that feature enabled. Requires the MANAGE_GUILD
     * permission. code will be null if a vanity url for the guild is not set.
     *
     * GET /guilds/{guild.id}/vanity-url
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildVanityURL($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/vanity-url", $query);
    }

    /**
     * Get Guild Widget Image.
     *
     * Returns a PNG image widget for the guild. Requires no permissions or authentication.
     *
     * GET /guilds/{guild.id}/widget.png
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildWidgetImage($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/widget.png", $query);
    }

    /**
     * Get Guild Welcome Screen.
     *
     * Returns the Welcome Screen object for the guild. If the welcome screen is not enabled, the
     * MANAGE_GUILD permission is required.
     *
     * GET /guilds/{guild.id}/welcome-screen
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildWelcomeScreen($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/welcome-screen", $query);
    }

    /**
     * Modify Guild Welcome Screen.
     *
     * Modify the guild's Welcome Screen. Requires the MANAGE_GUILD permission. Returns the updated Welcome
     * Screen object. May fire a Guild Update Gateway event.
     *
     * PATCH /guilds/{guild.id}/welcome-screen
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildWelcomeScreen($guildId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/welcome-screen", $data);
    }

    /**
     * Get Guild Onboarding.
     *
     * Returns the Onboarding object for the guild.
     *
     * GET /guilds/{guild.id}/onboarding
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildOnboarding($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/onboarding", $query);
    }

    /**
     * Modify Guild Onboarding.
     *
     * Modifies the onboarding configuration of the guild. Returns a 200 with the Onboarding object for the
     * guild. Requires the MANAGE_GUILD and MANAGE_ROLES permissions.
     *
     * PUT /guilds/{guild.id}/onboarding
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildOnboarding($guildId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/guilds/{$guildId}/onboarding", $data);
    }

    /**
     * Modify Guild Incident Actions.
     *
     * Modifies the incident actions of the guild. Returns a 200 with the Incidents Data object for the
     * guild. Requires the MANAGE_GUILD permission.
     *
     * PUT /guilds/{guild.id}/incident-actions
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildIncidentActions($guildId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/guilds/{$guildId}/incident-actions", $data);
    }

}

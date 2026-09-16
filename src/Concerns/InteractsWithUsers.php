<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithUsers
{
    /**
     * Get Current User.
     *
     * Returns the user object of the requester's account. For OAuth2, this requires the identify scope,
     * which will return the object _without_ an email, and optionally the email scope, which returns the
     * object _with_ an email if the user has one.
     *
     * GET /users/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function getCurrentUser(array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/users/@me", $query);
    }

    /**
     * Get User.
     *
     * Returns a user object for a given user ID.
     *
     * GET /users/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getUser($userId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/users/{$userId}", $query);
    }

    /**
     * Modify Current User.
     *
     * Modify the requester's user account settings. Returns a user object on success. Fires a User Update
     * Gateway event.
     *
     * PATCH /users/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyCurrentUser(array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/users/@me", $data);
    }

    /**
     * Get Current User Guilds.
     *
     * Returns a list of partial guild objects the current user is a member of. For OAuth2, requires the
     * guilds scope.
     *
     * GET /users/@me/guilds
     * @return \Illuminate\Http\Client\Response
     */
    public static function getCurrentUserGuilds(array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/users/@me/guilds", $query);
    }

    /**
     * Get Current User Guild Member.
     *
     * Returns a guild member object for the current user. Requires the guilds.members.read OAuth2 scope.
     *
     * GET /users/@me/guilds/{guild.id}/member
     * @return \Illuminate\Http\Client\Response
     */
    public static function getCurrentUserGuildMember($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/users/@me/guilds/{$guildId}/member", $query);
    }

    /**
     * Leave Guild.
     *
     * Leave a guild. Returns a 204 empty response on success. Fires a Guild Delete Gateway event and a
     * Guild Member Remove Gateway event.
     *
     * DELETE /users/@me/guilds/{guild.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function leaveGuild($guildId)
    {
        return self::client()->delete(self::baseUrl() . "/users/@me/guilds/{$guildId}");
    }

    /**
     * Create DM.
     *
     * Create a new DM channel with a user. Returns a DM channel object (if one already exists, it will be
     * returned instead).
     *
     * POST /users/@me/channels
     * @return \Illuminate\Http\Client\Response
     */
    public static function createDM(array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/users/@me/channels", $data);
    }

    /**
     * Create Group DM.
     *
     * Create a new group DM channel with multiple users. Returns a DM channel object. This endpoint was
     * intended to be used with the now-deprecated GameBridge SDK. Fires a Channel Create Gateway event.
     *
     * POST /users/@me/channels
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGroupDM(array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/users/@me/channels", $data);
    }

    /**
     * Get Current User Connections.
     *
     * Returns a list of connection objects. Requires the connections OAuth2 scope.
     *
     * GET /users/@me/connections
     * @return \Illuminate\Http\Client\Response
     */
    public static function getCurrentUserConnections(array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/users/@me/connections", $query);
    }

    /**
     * Get Current User Application Role Connection.
     *
     * Returns the application role connection for the user. Requires an OAuth2 access token with
     * role_connections.write scope for the application specified in the path.
     *
     * GET /users/@me/applications/{application.id}/role-connection
     * @return \Illuminate\Http\Client\Response
     */
    public static function getCurrentUserApplicationRoleConnection($applicationId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/users/@me/applications/{$applicationId}/role-connection", $query);
    }

    /**
     * Update Current User Application Role Connection.
     *
     * Updates and returns the application role connection for the user. Requires an OAuth2 access token
     * with role_connections.write scope for the application specified in the path.
     *
     * PUT /users/@me/applications/{application.id}/role-connection
     * @return \Illuminate\Http\Client\Response
     */
    public static function updateCurrentUserApplicationRoleConnection($applicationId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/users/@me/applications/{$applicationId}/role-connection", $data);
    }

    /**
     * Delete Current User Application Role Connection.
     *
     * Deletes the application role connection for the user. Requires an OAuth2 access token with
     * role_connections.write scope for the application specified in the path.
     *
     * DELETE /users/@me/applications/{application.id}/role-connection
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteCurrentUserApplicationRoleConnection($applicationId)
    {
        return self::client()->delete(self::baseUrl() . "/users/@me/applications/{$applicationId}/role-connection");
    }

}

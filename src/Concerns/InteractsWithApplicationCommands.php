<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithApplicationCommands
{
    /**
     * Get Global Application Commands.
     *
     * Fetch all of the global commands for your application. Returns an array of application command
     * objects.
     *
     * GET /applications/{application.id}/commands
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGlobalApplicationCommands($applicationId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/commands", $query);
    }

    /**
     * Create Global Application Command.
     *
     * Create a new global command. Returns 201 if a command with the same name does not already exist, or
     * a 200 if it does (in which case the previous command will be overwritten). Both responses include an
     * application command object.
     *
     * POST /applications/{application.id}/commands
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGlobalApplicationCommand($applicationId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/applications/{$applicationId}/commands", $data);
    }

    /**
     * Get Global Application Command.
     *
     * Fetch a global command for your application. Returns an application command object.
     *
     * GET /applications/{application.id}/commands/{command.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGlobalApplicationCommand($applicationId, $commandId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/commands/{$commandId}", $query);
    }

    /**
     * Edit Global Application Command.
     *
     * Edit a global command. Returns 200 and an application command object. All fields are optional, but
     * any fields provided will entirely overwrite the existing values of those fields.
     *
     * PATCH /applications/{application.id}/commands/{command.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function editGlobalApplicationCommand($applicationId, $commandId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/applications/{$applicationId}/commands/{$commandId}", $data);
    }

    /**
     * Delete Global Application Command.
     *
     * Deletes a global command. Returns 204 No Content on success.
     *
     * DELETE /applications/{application.id}/commands/{command.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteGlobalApplicationCommand($applicationId, $commandId)
    {
        return self::client()->delete(self::baseUrl() . "/applications/{$applicationId}/commands/{$commandId}");
    }

    /**
     * Bulk Overwrite Global Application Commands.
     *
     * Takes a list of application commands, overwriting the existing global command list for this
     * application. Returns 200 and a list of application command objects. Commands that do not already
     * exist will count toward daily application command create limits.
     *
     * PUT /applications/{application.id}/commands
     * @return \Illuminate\Http\Client\Response
     */
    public static function bulkOverwriteGlobalApplicationCommands($applicationId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/applications/{$applicationId}/commands", $data);
    }

    /**
     * Get Guild Application Commands.
     *
     * Fetch all of the guild commands for your application for a specific guild. Returns an array of
     * application command objects.
     *
     * GET /applications/{application.id}/guilds/{guild.id}/commands
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildApplicationCommands($applicationId, $guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/guilds/{$guildId}/commands", $query);
    }

    /**
     * Create Guild Application Command.
     *
     * <Danger> Creating a command with the same name as an existing command for your application will
     * overwrite the old command. </Danger>
     *
     * POST /applications/{application.id}/guilds/{guild.id}/commands
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGuildApplicationCommand($applicationId, $guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/applications/{$applicationId}/guilds/{$guildId}/commands", $data);
    }

    /**
     * Get Guild Application Command.
     *
     * Fetch a guild command for your application. Returns an application command object.
     *
     * GET /applications/{application.id}/guilds/{guild.id}/commands/{command.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildApplicationCommand($applicationId, $guildId, $commandId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/guilds/{$guildId}/commands/{$commandId}", $query);
    }

    /**
     * Edit Guild Application Command.
     *
     * Edit a guild command. Updates for guild commands will be available immediately. Returns 200 and an
     * application command object. All fields are optional, but any fields provided will entirely overwrite
     * the existing values of those fields.
     *
     * PATCH /applications/{application.id}/guilds/{guild.id}/commands/{command.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function editGuildApplicationCommand($applicationId, $guildId, $commandId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/applications/{$applicationId}/guilds/{$guildId}/commands/{$commandId}", $data);
    }

    /**
     * Delete Guild Application Command.
     *
     * Delete a guild command. Returns 204 No Content on success.
     *
     * DELETE /applications/{application.id}/guilds/{guild.id}/commands/{command.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteGuildApplicationCommand($applicationId, $guildId, $commandId)
    {
        return self::client()->delete(self::baseUrl() . "/applications/{$applicationId}/guilds/{$guildId}/commands/{$commandId}");
    }

    /**
     * Bulk Overwrite Guild Application Commands.
     *
     * Takes a list of application commands, overwriting the existing command list for this application for
     * the targeted guild. Returns 200 and a list of application command objects.
     *
     * PUT /applications/{application.id}/guilds/{guild.id}/commands
     * @return \Illuminate\Http\Client\Response
     */
    public static function bulkOverwriteGuildApplicationCommands($applicationId, $guildId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/applications/{$applicationId}/guilds/{$guildId}/commands", $data);
    }

    /**
     * Get Guild Application Command Permissions.
     *
     * Fetches permissions for all commands for your application in a guild. Returns an array of guild
     * application command permissions objects.
     *
     * GET /applications/{application.id}/guilds/{guild.id}/commands/permissions
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildApplicationCommandPermissions($applicationId, $guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/guilds/{$guildId}/commands/permissions", $query);
    }

    /**
     * Get Application Command Permissions.
     *
     * Fetches permissions for a specific command for your application in a guild. Returns a guild
     * application command permissions object.
     *
     * GET /applications/{application.id}/guilds/{guild.id}/commands/{command.id}/permissions
     * @return \Illuminate\Http\Client\Response
     */
    public static function getApplicationCommandPermissions($applicationId, $guildId, $commandId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/guilds/{$guildId}/commands/{$commandId}/permissions", $query);
    }

    /**
     * Edit Application Command Permissions.
     *
     * Edits command permissions for a specific command for your application in a guild and returns a guild
     * application command permissions object. Fires an Application Command Permissions Update Gateway
     * event.
     *
     * PUT /applications/{application.id}/guilds/{guild.id}/commands/{command.id}/permissions
     * @return \Illuminate\Http\Client\Response
     */
    public static function editApplicationCommandPermissions($applicationId, $guildId, $commandId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/applications/{$applicationId}/guilds/{$guildId}/commands/{$commandId}/permissions", $data);
    }

    /**
     * Batch Edit Application Command Permissions.
     *
     * <Danger> This endpoint has been disabled with updates to command permissions (Permissions v2).
     * Instead, you can edit each application command permissions (though you should be careful to handle
     * any potential rate limits). </Danger>
     *
     * PUT /applications/{application.id}/guilds/{guild.id}/commands/permissions
     * @return \Illuminate\Http\Client\Response
     */
    public static function batchEditApplicationCommandPermissions($applicationId, $guildId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/applications/{$applicationId}/guilds/{$guildId}/commands/permissions", $data);
    }

}

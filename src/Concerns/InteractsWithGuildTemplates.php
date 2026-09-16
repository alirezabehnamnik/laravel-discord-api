<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithGuildTemplates
{
    /**
     * Get Guild Template.
     *
     * Returns a guild template object for the given code.
     *
     * GET /guilds/templates/{template.code}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildTemplate($templateCode, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/templates/{$templateCode}", $query);
    }

    /**
     * Get Guild Templates.
     *
     * Returns an array of guild template objects. Requires the MANAGE_GUILD permission.
     *
     * GET /guilds/{guild.id}/templates
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildTemplates($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/templates", $query);
    }

    /**
     * Create Guild Template.
     *
     * Creates a template for the guild. Requires the MANAGE_GUILD permission. Returns the created guild
     * template object on success.
     *
     * POST /guilds/{guild.id}/templates
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGuildTemplate($guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/guilds/{$guildId}/templates", $data);
    }

    /**
     * Sync Guild Template.
     *
     * Syncs the template to the guild's current state. Requires the MANAGE_GUILD permission. Returns the
     * guild template object on success.
     *
     * PUT /guilds/{guild.id}/templates/{template.code}
     * @return \Illuminate\Http\Client\Response
     */
    public static function syncGuildTemplate($guildId, $templateCode, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/guilds/{$guildId}/templates/{$templateCode}", $data);
    }

    /**
     * Modify Guild Template.
     *
     * Modifies the template's metadata. Requires the MANAGE_GUILD permission. Returns the guild template
     * object on success.
     *
     * PATCH /guilds/{guild.id}/templates/{template.code}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildTemplate($guildId, $templateCode, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/templates/{$templateCode}", $data);
    }

    /**
     * Delete Guild Template.
     *
     * Deletes the template. Requires the MANAGE_GUILD permission. Returns the deleted guild template
     * object on success.
     *
     * DELETE /guilds/{guild.id}/templates/{template.code}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteGuildTemplate($guildId, $templateCode)
    {
        return self::client()->delete(self::baseUrl() . "/guilds/{$guildId}/templates/{$templateCode}");
    }

}

<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithAutoModeration
{
    /**
     * List Auto Moderation Rules for Guild.
     *
     * Get a list of all rules currently configured for the guild. Returns a list of auto moderation rule
     * objects for the given guild.
     *
     * GET /guilds/{guild.id}/auto-moderation/rules
     * @return \Illuminate\Http\Client\Response
     */
    public static function listAutoModerationRulesForGuild($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/auto-moderation/rules", $query);
    }

    /**
     * Get Auto Moderation Rule.
     *
     * Get a single rule. Returns an auto moderation rule object.
     *
     * GET /guilds/{guild.id}/auto-moderation/rules/{auto_moderation_rule.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getAutoModerationRule($guildId, $autoModerationRuleId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/auto-moderation/rules/{$autoModerationRuleId}", $query);
    }

    /**
     * Create Auto Moderation Rule.
     *
     * Create a new rule. Returns an auto moderation rule on success. Fires an Auto Moderation Rule Create
     * Gateway event.
     *
     * POST /guilds/{guild.id}/auto-moderation/rules
     * @return \Illuminate\Http\Client\Response
     */
    public static function createAutoModerationRule($guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/guilds/{$guildId}/auto-moderation/rules", $data);
    }

    /**
     * Modify Auto Moderation Rule.
     *
     * Modify an existing rule. Returns an auto moderation rule on success. Fires an Auto Moderation Rule
     * Update Gateway event.
     *
     * PATCH /guilds/{guild.id}/auto-moderation/rules/{auto_moderation_rule.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyAutoModerationRule($guildId, $autoModerationRuleId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/auto-moderation/rules/{$autoModerationRuleId}", $data);
    }

    /**
     * Delete Auto Moderation Rule.
     *
     * Delete a rule. Returns a 204 on success. Fires an Auto Moderation Rule Delete Gateway event.
     *
     * DELETE /guilds/{guild.id}/auto-moderation/rules/{auto_moderation_rule.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteAutoModerationRule($guildId, $autoModerationRuleId)
    {
        return self::client()->delete(self::baseUrl() . "/guilds/{$guildId}/auto-moderation/rules/{$autoModerationRuleId}");
    }

}

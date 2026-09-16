<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithAuditLog
{
    /**
     * Get Guild Audit Log.
     *
     * Returns an audit log object for the guild. Requires the VIEW_AUDIT_LOG permission.
     *
     * GET /guilds/{guild.id}/audit-logs
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildAuditLog($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/audit-logs", $query);
    }

}

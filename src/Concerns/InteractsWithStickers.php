<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithStickers
{
    /**
     * Get Sticker.
     *
     * Returns a sticker object for the given sticker ID.
     *
     * GET /stickers/{sticker.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getSticker($stickerId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/stickers/{$stickerId}", $query);
    }

    /**
     * List Sticker Packs.
     *
     * Returns a list of available sticker packs.
     *
     * GET /sticker-packs
     * @return \Illuminate\Http\Client\Response
     */
    public static function listStickerPacks(array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/sticker-packs", $query);
    }

    /**
     * Get Sticker Pack.
     *
     * Returns a sticker pack object for the given sticker pack ID.
     *
     * GET /sticker-packs/{pack.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getStickerPack($packId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/sticker-packs/{$packId}", $query);
    }

    /**
     * List Guild Stickers.
     *
     * Returns an array of sticker objects for the given guild. Includes user fields if the bot has the
     * CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission.
     *
     * GET /guilds/{guild.id}/stickers
     * @return \Illuminate\Http\Client\Response
     */
    public static function listGuildStickers($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/stickers", $query);
    }

    /**
     * Get Guild Sticker.
     *
     * Returns a sticker object for the given guild and sticker IDs. Includes the user field if the bot has
     * the CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission.
     *
     * GET /guilds/{guild.id}/stickers/{sticker.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildSticker($guildId, $stickerId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/stickers/{$stickerId}", $query);
    }

    /**
     * Create Guild Sticker.
     *
     * Create a new sticker for the guild. Send a multipart/form-data body as described in Uploading Files.
     * Requires the CREATE_GUILD_EXPRESSIONS permission. Returns the new sticker object on success. Fires a
     * Guild Stickers Update Gateway event.
     *
     * POST /guilds/{guild.id}/stickers
     * @return \Illuminate\Http\Client\Response
     */
    public static function createGuildSticker($guildId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/guilds/{$guildId}/stickers", $data);
    }

    /**
     * Modify Guild Sticker.
     *
     * Modify the given sticker. For stickers created by the current user, requires either the
     * CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission. For other stickers, requires the
     * MANAGE_GUILD_EXPRESSIONS permission. Returns the updated sticker object on success. Fires a Guild
     * Stickers Update
     *
     * PATCH /guilds/{guild.id}/stickers/{sticker.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyGuildSticker($guildId, $stickerId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/guilds/{$guildId}/stickers/{$stickerId}", $data);
    }

    /**
     * Delete Guild Sticker.
     *
     * Delete the given sticker. For stickers created by the current user, requires either the
     * CREATE_GUILD_EXPRESSIONS or MANAGE_GUILD_EXPRESSIONS permission. For other stickers, requires the
     * MANAGE_GUILD_EXPRESSIONS permission. Returns 204 No Content on success. Fires a Guild Stickers
     * Update Gateway even
     *
     * DELETE /guilds/{guild.id}/stickers/{sticker.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteGuildSticker($guildId, $stickerId)
    {
        return self::client()->delete(self::baseUrl() . "/guilds/{$guildId}/stickers/{$stickerId}");
    }

}

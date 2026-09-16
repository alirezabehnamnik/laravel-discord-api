<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithMessages
{
    /**
     * Search Guild Messages.
     *
     * Returns a list of messages without the reactions key that match a search query in the guild.
     * Requires the READ_MESSAGE_HISTORY permission.
     *
     * GET /guilds/{guild.id}/messages/search
     * @return \Illuminate\Http\Client\Response
     */
    public static function searchGuildMessages($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/messages/search", $query);
    }

    /**
     * Crosspost Message.
     *
     * Crosspost a message in an Announcement Channel to following channels. This endpoint requires the
     * SEND_MESSAGES permission, if the current user sent the message, or additionally the MANAGE_MESSAGES
     * permission, for all other messages, to be present for the current user.
     *
     * POST /channels/{channel.id}/messages/{message.id}/crosspost
     * @return \Illuminate\Http\Client\Response
     */
    public static function crosspostMessage($channelId, $messageId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}/crosspost", $data);
    }

    /**
     * Create Reaction.
     *
     * Create a reaction for the message. This endpoint requires the READ_MESSAGE_HISTORY permission to be
     * present on the current user. Additionally, if nobody else has reacted to the message using this
     * emoji, this endpoint requires the ADD_REACTIONS permission to be present on the current user.
     * Returns a
     *
     * PUT /channels/{channel.id}/messages/{message.id}/reactions/{emoji.id}/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function createReaction($channelId, $messageId, $emojiId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}/reactions/{$emojiId}/@me", $data);
    }

    /**
     * Delete Own Reaction.
     *
     * Delete a reaction the current user has made for the message. Returns a 204 empty response on
     * success. Fires a Message Reaction Remove Gateway event. The emoji must be URL Encoded or the request
     * will fail with 10014: Unknown Emoji. To use custom emoji, you must encode it in the format name:id
     * with th
     *
     * DELETE /channels/{channel.id}/messages/{message.id}/reactions/{emoji.id}/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteOwnReaction($channelId, $messageId, $emojiId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}/reactions/{$emojiId}/@me");
    }

    /**
     * Delete User Reaction.
     *
     * Deletes another user's reaction. This endpoint requires the MANAGE_MESSAGES permission to be present
     * on the current user. Returns a 204 empty response on success. Fires a Message Reaction Remove
     * Gateway event. The emoji must be URL Encoded or the request will fail with 10014: Unknown Emoji. To
     * use c
     *
     * DELETE /channels/{channel.id}/messages/{message.id}/reactions/{emoji.id}/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteUserReaction($channelId, $messageId, $emojiId, $userId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}/reactions/{$emojiId}/{$userId}");
    }

    /**
     * Get Reactions.
     *
     * Get a list of users that reacted with this emoji. Returns an array of user objects on success. The
     * emoji must be URL Encoded or the request will fail with 10014: Unknown Emoji. To use custom emoji,
     * you must encode it in the format name:id with the emoji name and emoji id.
     *
     * GET /channels/{channel.id}/messages/{message.id}/reactions/{emoji.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getReactions($channelId, $messageId, $emojiId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}/reactions/{$emojiId}", $query);
    }

    /**
     * Delete All Reactions.
     *
     * Deletes all reactions on a message. This endpoint requires the MANAGE_MESSAGES permission to be
     * present on the current user. Fires a Message Reaction Remove All Gateway event.
     *
     * DELETE /channels/{channel.id}/messages/{message.id}/reactions
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteAllReactions($channelId, $messageId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}/reactions");
    }

    /**
     * Delete All Reactions for Emoji.
     *
     * Deletes all the reactions for a given emoji on a message. This endpoint requires the MANAGE_MESSAGES
     * permission to be present on the current user. Fires a Message Reaction Remove Emoji Gateway event.
     * The emoji must be URL Encoded or the request will fail with 10014: Unknown Emoji. To use custom emoj
     *
     * DELETE /channels/{channel.id}/messages/{message.id}/reactions/{emoji.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteAllReactionsForEmoji($channelId, $messageId, $emojiId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}/reactions/{$emojiId}");
    }

    /**
     * Edit Message.
     *
     * Edit a previously sent message. The fields content, embeds, flags and components can be edited by
     * the original message author. Other users can only edit flags and only if they have the
     * MANAGE_MESSAGES permission in the corresponding channel. When specifying flags, ensure to include
     * all previously se
     *
     * PATCH /channels/{channel.id}/messages/{message.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function editMessage($channelId, $messageId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}", $data);
    }

    /**
     * Delete Message.
     *
     * Delete a message. If operating on a guild channel and trying to delete a message that was not sent
     * by the current user, this endpoint requires the MANAGE_MESSAGES permission. Returns a 204 empty
     * response on success. Fires a Message Delete Gateway event.
     *
     * DELETE /channels/{channel.id}/messages/{message.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteMessage($channelId, $messageId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}");
    }

    /**
     * Bulk Delete Messages.
     *
     * Delete multiple messages in a single request. This endpoint can only be used on guild channels and
     * requires the MANAGE_MESSAGES permission. Returns a 204 empty response on success. Fires a Message
     * Delete Bulk Gateway event.
     *
     * POST /channels/{channel.id}/messages/bulk-delete
     * @return \Illuminate\Http\Client\Response
     */
    public static function bulkDeleteMessages($channelId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/messages/bulk-delete", $data);
    }

    /**
     * Get Channel Pins.
     *
     * Retrieves the list of pins in a channel. Requires the VIEW_CHANNEL permission. If the user is
     * missing the READ_MESSAGE_HISTORY permission in the channel, then no pins will be returned.
     *
     * GET /channels/{channel.id}/messages/pins
     * @return \Illuminate\Http\Client\Response
     */
    public static function getChannelPins($channelId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/messages/pins", $query);
    }

    /**
     * Pin Message.
     *
     * Pin a message in a channel. Requires the PIN_MESSAGES permission. Fires a Channel Pins Update
     * Gateway event.
     *
     * PUT /channels/{channel.id}/messages/pins/{message.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function pinMessage($channelId, $messageId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/channels/{$channelId}/messages/pins/{$messageId}", $data);
    }

    /**
     * Unpin Message.
     *
     * Unpin a message in a channel. Requires the PIN_MESSAGES permission. Returns a 204 empty response on
     * success. Fires a Channel Pins Update Gateway event.
     *
     * DELETE /channels/{channel.id}/messages/pins/{message.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function unpinMessage($channelId, $messageId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}/messages/pins/{$messageId}");
    }

}

<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithChannels
{
    /**
     * Get Channel.
     *
     * Get a channel by ID. Returns a channel object. If the channel is a thread, a thread member object is
     * included in the returned result.
     *
     * GET /channels/{channel.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getChannel($channelId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}", $query);
    }

    /**
     * Modify Channel.
     *
     * Update a channel's settings. Returns a channel on success, and a 400 BAD REQUEST on invalid
     * parameters.
     *
     * PATCH /channels/{channel.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyChannel($channelId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/channels/{$channelId}", $data);
    }

    /**
     * Set Voice Channel Status.
     *
     * Set a voice channel's status. Requires the SET_VOICE_CHANNEL_STATUS permission, and additionally the
     * MANAGE_CHANNELS permission if the current user is not connected to the voice channel. Fires a Voice
     * Channel Status Update Gateway event.
     *
     * PUT /channels/{channel.id}/voice-status
     * @return \Illuminate\Http\Client\Response
     */
    public static function setVoiceChannelStatus($channelId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/channels/{$channelId}/voice-status", $data);
    }

    /**
     * Delete/Close Channel.
     *
     * Delete a channel, or close a private message. Requires the MANAGE_CHANNELS permission for the guild,
     * or MANAGE_THREADS if the channel is a thread. Deleting a category does not delete its child
     * channels; they will have their parent_id removed and a Channel Update Gateway event will fire for
     * each of t
     *
     * DELETE /channels/{channel.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteCloseChannel($channelId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}");
    }

    /**
     * Edit Channel Permissions.
     *
     * Edit the channel permission overwrites for a user or role in a channel. Only usable for guild
     * channels. Requires the MANAGE_ROLES permission. Only permissions your bot has in the guild or parent
     * channel (if applicable) can be allowed/denied (unless your bot has a MANAGE_ROLES overwrite in the
     * channe
     *
     * PUT /channels/{channel.id}/permissions/{overwrite.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function editChannelPermissions($channelId, $overwriteId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/channels/{$channelId}/permissions/{$overwriteId}", $data);
    }

    /**
     * Get Channel Invites.
     *
     * Returns a list of invite objects (with invite metadata) for the channel. Only usable for guild
     * channels. Requires the MANAGE_CHANNELS permission.
     *
     * GET /channels/{channel.id}/invites
     * @return \Illuminate\Http\Client\Response
     */
    public static function getChannelInvites($channelId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/invites", $query);
    }

    /**
     * Create Channel Invite.
     *
     * Create a new invite object for the channel. Only usable for guild channels. Requires the
     * CREATE_INSTANT_INVITE permission. All JSON parameters for this route are optional, however the
     * request body is not. If you are not sending any fields, you still have to send an empty JSON object
     * ({}). Returns an
     *
     * POST /channels/{channel.id}/invites
     * @return \Illuminate\Http\Client\Response
     */
    public static function createChannelInvite($channelId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/invites", $data);
    }

    /**
     * Delete Channel Permission.
     *
     * Delete a channel permission overwrite for a user or role in a channel. Only usable for guild
     * channels. Requires the MANAGE_ROLES permission. Returns a 204 empty response on success. Fires a
     * Channel Update Gateway event. For more information about permissions, see permissions
     *
     * DELETE /channels/{channel.id}/permissions/{overwrite.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteChannelPermission($channelId, $overwriteId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}/permissions/{$overwriteId}");
    }

    /**
     * Follow Announcement Channel.
     *
     * Follow an Announcement Channel to send messages to a target channel. Requires the MANAGE_WEBHOOKS
     * permission in the target channel. Returns a followed channel object. Fires a Webhooks Update Gateway
     * event for the target channel.
     *
     * POST /channels/{channel.id}/followers
     * @return \Illuminate\Http\Client\Response
     */
    public static function followAnnouncementChannel($channelId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/followers", $data);
    }

    /**
     * Trigger Typing Indicator.
     *
     * Post a typing indicator for the specified channel, which expires after 10 seconds. Returns a 204
     * empty response on success. Fires a Typing Start Gateway event.
     *
     * POST /channels/{channel.id}/typing
     * @return \Illuminate\Http\Client\Response
     */
    public static function triggerTypingIndicator($channelId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/typing", $data);
    }

    /**
     * Group DM Add Recipient.
     *
     * Adds a recipient to a Group DM using their access token.
     *
     * PUT /channels/{channel.id}/recipients/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function groupDMAddRecipient($channelId, $userId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/channels/{$channelId}/recipients/{$userId}", $data);
    }

    /**
     * Group DM Remove Recipient.
     *
     * Removes a recipient from a Group DM.
     *
     * DELETE /channels/{channel.id}/recipients/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function groupDMRemoveRecipient($channelId, $userId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}/recipients/{$userId}");
    }

    /**
     * Start Thread from Message.
     *
     * Creates a new thread from an existing message. Returns a channel on success, and a 400 BAD REQUEST
     * on invalid parameters. Fires a Thread Create and a Message Update Gateway event.
     *
     * POST /channels/{channel.id}/messages/{message.id}/threads
     * @return \Illuminate\Http\Client\Response
     */
    public static function startThreadFromMessage($channelId, $messageId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/messages/{$messageId}/threads", $data);
    }

    /**
     * Start Thread without Message.
     *
     * Creates a new thread that is not connected to an existing message. Returns a channel on success, and
     * a 400 BAD REQUEST on invalid parameters. Fires a Thread Create Gateway event.
     *
     * POST /channels/{channel.id}/threads
     * @return \Illuminate\Http\Client\Response
     */
    public static function startThreadWithoutMessage($channelId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/threads", $data);
    }

    /**
     * Start Thread in Forum or Media Channel.
     *
     * Creates a new thread in a forum or a media channel, and sends a message within the created thread.
     * Returns a channel, with a nested message object, on success, and a 400 BAD REQUEST on invalid
     * parameters. Fires a Thread Create and Message Create Gateway event.
     *
     * POST /channels/{channel.id}/threads
     * @return \Illuminate\Http\Client\Response
     */
    public static function startThreadInForumOrMediaChannel($channelId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/threads", $data);
    }

    /**
     * Join Thread.
     *
     * Adds the current user to a thread. Also requires the thread is not archived. Returns a 204 empty
     * response on success. Fires a Thread Members Update and a Thread Create Gateway event.
     *
     * PUT /channels/{channel.id}/thread-members/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function joinThread($channelId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/channels/{$channelId}/thread-members/@me", $data);
    }

    /**
     * Add Thread Member.
     *
     * Adds another member to a thread. Requires the ability to send messages in the thread. Also requires
     * the thread is not archived. Returns a 204 empty response if the member is successfully added or was
     * already a member of the thread. Fires a Thread Members Update Gateway event.
     *
     * PUT /channels/{channel.id}/thread-members/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function addThreadMember($channelId, $userId, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/channels/{$channelId}/thread-members/{$userId}", $data);
    }

    /**
     * Leave Thread.
     *
     * Removes the current user from a thread. Also requires the thread is not archived. Returns a 204
     * empty response on success. Fires a Thread Members Update Gateway event.
     *
     * DELETE /channels/{channel.id}/thread-members/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function leaveThread($channelId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}/thread-members/@me");
    }

    /**
     * Remove Thread Member.
     *
     * Removes another member from a thread. Requires the MANAGE_THREADS permission, or the creator of the
     * thread if it is a PRIVATE_THREAD. Also requires the thread is not archived. Returns a 204 empty
     * response on success. Fires a Thread Members Update Gateway event.
     *
     * DELETE /channels/{channel.id}/thread-members/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function removeThreadMember($channelId, $userId)
    {
        return self::client()->delete(self::baseUrl() . "/channels/{$channelId}/thread-members/{$userId}");
    }

    /**
     * Get Thread Member.
     *
     * Returns a thread member object for the specified user if they are a member of the thread, returns a
     * 404 response otherwise.
     *
     * GET /channels/{channel.id}/thread-members/{user.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getThreadMember($channelId, $userId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/thread-members/{$userId}", $query);
    }

    /**
     * List Thread Members.
     *
     * Returns array of thread members objects that are members of the thread.
     *
     * GET /channels/{channel.id}/thread-members
     * @return \Illuminate\Http\Client\Response
     */
    public static function listThreadMembers($channelId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/thread-members", $query);
    }

    /**
     * List Public Archived Threads.
     *
     * Returns archived threads in the channel that are public. When called on a GUILD_TEXT channel,
     * returns threads of type PUBLIC_THREAD. When called on a GUILD_ANNOUNCEMENT channel returns threads
     * of type ANNOUNCEMENT_THREAD. Threads are ordered by archive_timestamp, in descending order. Requires
     * the RE
     *
     * GET /channels/{channel.id}/threads/archived/public
     * @return \Illuminate\Http\Client\Response
     */
    public static function listPublicArchivedThreads($channelId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/threads/archived/public", $query);
    }

    /**
     * List Private Archived Threads.
     *
     * Returns archived threads in the channel that are of type PRIVATE_THREAD. Threads are ordered by
     * archive_timestamp, in descending order. Requires both the READ_MESSAGE_HISTORY and MANAGE_THREADS
     * permissions.
     *
     * GET /channels/{channel.id}/threads/archived/private
     * @return \Illuminate\Http\Client\Response
     */
    public static function listPrivateArchivedThreads($channelId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/threads/archived/private", $query);
    }

    /**
     * List Joined Private Archived Threads.
     *
     * Returns archived threads in the channel that are of type PRIVATE_THREAD, and the user has joined.
     * Threads are ordered by their id, in descending order. Requires the READ_MESSAGE_HISTORY permission.
     *
     * GET /channels/{channel.id}/users/@me/threads/archived/private
     * @return \Illuminate\Http\Client\Response
     */
    public static function listJoinedPrivateArchivedThreads($channelId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/users/@me/threads/archived/private", $query);
    }

}

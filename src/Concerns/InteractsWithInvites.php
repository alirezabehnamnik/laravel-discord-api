<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithInvites
{
    /**
     * Get Invite.
     *
     * Returns an invite object for the given code.
     *
     * GET /invites/{invite.code}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getInvite($inviteCode, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/invites/{$inviteCode}", $query);
    }

    /**
     * Get Target Users.
     *
     * Gets the users allowed to see and accept this invite. Response is a CSV file with the header user_id
     * and each user ID from the original file passed to invite create on its own line. Requires the caller
     * to be the inviter, or have MANAGE_GUILD permission, or have VIEW_AUDIT_LOG permission.
     *
     * GET /invites/{invite.code}/target-users
     * @return \Illuminate\Http\Client\Response
     */
    public static function getTargetUsers($inviteCode, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/invites/{$inviteCode}/target-users", $query);
    }

    /**
     * Update Target Users.
     *
     * Updates the users allowed to see and accept this invite. Uploading a file with invalid user IDs will
     * result in a 400 with the invalid IDs described. Requires the caller to be the inviter or have the
     * MANAGE_GUILD permission.
     *
     * PUT /invites/{invite.code}/target-users
     * @return \Illuminate\Http\Client\Response
     */
    public static function updateTargetUsers($inviteCode, array $data = [])
    {
        return self::client()->put(self::baseUrl() . "/invites/{$inviteCode}/target-users", $data);
    }

    /**
     * Get Target Users Job Status.
     *
     * Processing target users from a CSV when creating or updating an invite is done asynchronously. This
     * endpoint allows you to check the status of that job. Requires the caller to be the inviter, or have
     * MANAGE_GUILD permission, or have VIEW_AUDIT_LOG permission.
     *
     * GET /invites/{invite.code}/target-users/job-status
     * @return \Illuminate\Http\Client\Response
     */
    public static function getTargetUsersJobStatus($inviteCode, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/invites/{$inviteCode}/target-users/job-status", $query);
    }

}

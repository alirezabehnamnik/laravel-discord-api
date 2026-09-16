<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithWebhooks
{
    /**
     * Create Webhook.
     *
     * Creates a new webhook and returns a webhook object on success. Requires the MANAGE_WEBHOOKS
     * permission. Fires a Webhooks Update Gateway event.
     *
     * POST /channels/{channel.id}/webhooks
     * @return \Illuminate\Http\Client\Response
     */
    public static function createWebhook($channelId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/webhooks", $data);
    }

    /**
     * Get Channel Webhooks.
     *
     * Returns a list of channel webhook objects. Requires the MANAGE_WEBHOOKS permission.
     *
     * GET /channels/{channel.id}/webhooks
     * @return \Illuminate\Http\Client\Response
     */
    public static function getChannelWebhooks($channelId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/webhooks", $query);
    }

    /**
     * Get Guild Webhooks.
     *
     * Returns a list of guild webhook objects. Requires the MANAGE_WEBHOOKS permission.
     *
     * GET /guilds/{guild.id}/webhooks
     * @return \Illuminate\Http\Client\Response
     */
    public static function getGuildWebhooks($guildId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/guilds/{$guildId}/webhooks", $query);
    }

    /**
     * Get Webhook.
     *
     * Returns the new webhook object for the given id.
     *
     * GET /webhooks/{webhook.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getWebhook($webhookId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/webhooks/{$webhookId}", $query);
    }

    /**
     * Get Webhook with Token.
     *
     * Same as above, except this call does not require authentication and returns no user in the webhook
     * object.
     *
     * GET /webhooks/{webhook.id}/{webhook.token}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getWebhookWithToken($webhookId, $webhookToken, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/webhooks/{$webhookId}/{$webhookToken}", $query);
    }

    /**
     * Modify Webhook.
     *
     * Modify a webhook. Requires the MANAGE_WEBHOOKS permission. Returns the updated webhook object on
     * success. Fires a Webhooks Update Gateway event.
     *
     * PATCH /webhooks/{webhook.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyWebhook($webhookId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/webhooks/{$webhookId}", $data);
    }

    /**
     * Modify Webhook with Token.
     *
     * Same as above, except this call does not require authentication, does not accept a channel_id
     * parameter in the body, and does not return a user in the webhook object.
     *
     * PATCH /webhooks/{webhook.id}/{webhook.token}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyWebhookWithToken($webhookId, $webhookToken, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/webhooks/{$webhookId}/{$webhookToken}", $data);
    }

    /**
     * Delete Webhook.
     *
     * Delete a webhook permanently. Requires the MANAGE_WEBHOOKS permission. Returns a 204 No Content
     * response on success. Fires a Webhooks Update Gateway event.
     *
     * DELETE /webhooks/{webhook.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteWebhook($webhookId)
    {
        return self::client()->delete(self::baseUrl() . "/webhooks/{$webhookId}");
    }

    /**
     * Delete Webhook with Token.
     *
     * Same as above, except this call does not require authentication.
     *
     * DELETE /webhooks/{webhook.id}/{webhook.token}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteWebhookWithToken($webhookId, $webhookToken)
    {
        return self::client()->delete(self::baseUrl() . "/webhooks/{$webhookId}/{$webhookToken}");
    }

    /**
     * Execute Webhook.
     *
     * Refer to Uploading Files for details on attachments and multipart/form-data requests. Returns a
     * message or 204 No Content depending on the wait query parameter.
     *
     * POST /webhooks/{webhook.id}/{webhook.token}
     * @return \Illuminate\Http\Client\Response
     */
    public static function executeWebhook($webhookId, $webhookToken, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/webhooks/{$webhookId}/{$webhookToken}", $data);
    }

    /**
     * Execute Slack-Compatible Webhook.
     *
     * Refer to Slack's documentation for more information. We do not support Slack's channel, icon_emoji,
     * mrkdwn, or mrkdwn_in properties.
     *
     * POST /webhooks/{webhook.id}/{webhook.token}/slack
     * @return \Illuminate\Http\Client\Response
     */
    public static function executeSlackCompatibleWebhook($webhookId, $webhookToken, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/webhooks/{$webhookId}/{$webhookToken}/slack", $data);
    }

    /**
     * Execute GitHub-Compatible Webhook.
     *
     * Add a new webhook to your GitHub repo (in the repo's settings), and use this endpoint as the
     * "Payload URL." You can choose what events your Discord channel receives by choosing the "Let me
     * select individual events" option and selecting individual events for the new webhook you're
     * configuring. The su
     *
     * POST /webhooks/{webhook.id}/{webhook.token}/github
     * @return \Illuminate\Http\Client\Response
     */
    public static function executeGitHubCompatibleWebhook($webhookId, $webhookToken, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/webhooks/{$webhookId}/{$webhookToken}/github", $data);
    }

    /**
     * Get Webhook Message.
     *
     * Returns a previously-sent webhook message from the same token. Returns a message object on success.
     *
     * GET /webhooks/{webhook.id}/{webhook.token}/messages/{message.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getWebhookMessage($webhookId, $webhookToken, $messageId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/webhooks/{$webhookId}/{$webhookToken}/messages/{$messageId}", $query);
    }

    /**
     * Edit Webhook Message.
     *
     * Edits a previously-sent webhook message from the same token. Returns a message object on success.
     *
     * PATCH /webhooks/{webhook.id}/{webhook.token}/messages/{message.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function editWebhookMessage($webhookId, $webhookToken, $messageId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/webhooks/{$webhookId}/{$webhookToken}/messages/{$messageId}", $data);
    }

    /**
     * Delete Webhook Message.
     *
     * Deletes a message that was created by the webhook. Returns a 204 No Content response on success.
     *
     * DELETE /webhooks/{webhook.id}/{webhook.token}/messages/{message.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteWebhookMessage($webhookId, $webhookToken, $messageId)
    {
        return self::client()->delete(self::baseUrl() . "/webhooks/{$webhookId}/{$webhookToken}/messages/{$messageId}");
    }

}

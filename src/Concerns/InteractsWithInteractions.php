<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithInteractions
{
    /**
     * Create Interaction Response.
     *
     * Create a response to an Interaction. Body is an interaction response. Returns 204 unless
     * with_response is set to true which returns 200 with the body as interaction callback response.
     *
     * POST /interactions/{interaction.id}/{interaction.token}/callback
     * @return \Illuminate\Http\Client\Response
     */
    public static function createInteractionResponse($interactionId, $interactionToken, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/interactions/{$interactionId}/{$interactionToken}/callback", $data);
    }

    /**
     * Get Original Interaction Response.
     *
     * Returns the initial Interaction response. Functions the same as Get Webhook Message.
     *
     * GET /webhooks/{application.id}/{interaction.token}/messages/@original
     * @return \Illuminate\Http\Client\Response
     */
    public static function getOriginalInteractionResponse($applicationId, $interactionToken, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/webhooks/{$applicationId}/{$interactionToken}/messages/@original", $query);
    }

    /**
     * Edit Original Interaction Response.
     *
     * Edits the initial Interaction response. Functions the same as Edit Webhook Message.
     *
     * PATCH /webhooks/{application.id}/{interaction.token}/messages/@original
     * @return \Illuminate\Http\Client\Response
     */
    public static function editOriginalInteractionResponse($applicationId, $interactionToken, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/webhooks/{$applicationId}/{$interactionToken}/messages/@original", $data);
    }

    /**
     * Delete Original Interaction Response.
     *
     * Deletes the initial Interaction response. Returns 204 No Content on success.
     *
     * DELETE /webhooks/{application.id}/{interaction.token}/messages/@original
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteOriginalInteractionResponse($applicationId, $interactionToken)
    {
        return self::client()->delete(self::baseUrl() . "/webhooks/{$applicationId}/{$interactionToken}/messages/@original");
    }

    /**
     * Create Followup Message.
     *
     * Create a followup message for an Interaction. Functions the same as Execute Webhook, but wait is
     * always true. The thread_id, avatar_url, and username parameters are not supported when using this
     * endpoint for interaction followups. You can use the EPHEMERAL message flag 1 << 6 (64) to send a
     * message
     *
     * POST /webhooks/{application.id}/{interaction.token}
     * @return \Illuminate\Http\Client\Response
     */
    public static function createFollowupMessage($applicationId, $interactionToken, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/webhooks/{$applicationId}/{$interactionToken}", $data);
    }

    /**
     * Get Followup Message.
     *
     * Returns a followup message for an Interaction. Functions the same as Get Webhook Message.
     *
     * GET /webhooks/{application.id}/{interaction.token}/messages/{message.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getFollowupMessage($applicationId, $interactionToken, $messageId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/webhooks/{$applicationId}/{$interactionToken}/messages/{$messageId}", $query);
    }

    /**
     * Edit Followup Message.
     *
     * Edits a followup message for an Interaction. Functions the same as Edit Webhook Message.
     *
     * PATCH /webhooks/{application.id}/{interaction.token}/messages/{message.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function editFollowupMessage($applicationId, $interactionToken, $messageId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/webhooks/{$applicationId}/{$interactionToken}/messages/{$messageId}", $data);
    }

    /**
     * Delete Followup Message.
     *
     * Deletes a followup message for an Interaction. Returns 204 No Content on success.
     *
     * DELETE /webhooks/{application.id}/{interaction.token}/messages/{message.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteFollowupMessage($applicationId, $interactionToken, $messageId)
    {
        return self::client()->delete(self::baseUrl() . "/webhooks/{$applicationId}/{$interactionToken}/messages/{$messageId}");
    }

}

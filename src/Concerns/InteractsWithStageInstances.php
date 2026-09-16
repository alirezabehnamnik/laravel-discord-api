<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithStageInstances
{
    /**
     * Create Stage Instance.
     *
     * Creates a new Stage instance associated to a Stage channel. Returns that Stage instance. Fires a
     * Stage Instance Create Gateway event.
     *
     * POST /stage-instances
     * @return \Illuminate\Http\Client\Response
     */
    public static function createStageInstance(array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/stage-instances", $data);
    }

    /**
     * Get Stage Instance.
     *
     * Gets the stage instance associated with the Stage channel, if it exists.
     *
     * GET /stage-instances/{channel.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getStageInstance($channelId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/stage-instances/{$channelId}", $query);
    }

    /**
     * Modify Stage Instance.
     *
     * Updates fields of an existing Stage instance. Returns the updated Stage instance. Fires a Stage
     * Instance Update Gateway event.
     *
     * PATCH /stage-instances/{channel.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function modifyStageInstance($channelId, array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/stage-instances/{$channelId}", $data);
    }

    /**
     * Delete Stage Instance.
     *
     * Deletes the Stage instance. Returns 204 No Content. Fires a Stage Instance Delete Gateway event.
     *
     * DELETE /stage-instances/{channel.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteStageInstance($channelId)
    {
        return self::client()->delete(self::baseUrl() . "/stage-instances/{$channelId}");
    }

}

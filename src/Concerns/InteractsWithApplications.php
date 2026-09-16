<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithApplications
{
    /**
     * Get Current Application.
     *
     * Returns the application object associated with the requesting bot user.
     *
     * GET /applications/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function getCurrentApplication(array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/@me", $query);
    }

    /**
     * Edit Current Application.
     *
     * Edit properties of the app associated with the requesting bot user. Only properties that are passed
     * will be updated. Returns the updated application object on success.
     *
     * PATCH /applications/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function editCurrentApplication(array $data = [])
    {
        return self::client()->patch(self::baseUrl() . "/applications/@me", $data);
    }

    /**
     * Get Application Activity Instance.
     *
     * Returns a serialized activity instance, if it exists. Useful for preventing unwanted activity
     * sessions.
     *
     * GET /applications/{application.id}/activity-instances/{instance_id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getApplicationActivityInstance($applicationId, $instanceId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/activity-instances/{$instanceId}", $query);
    }

}

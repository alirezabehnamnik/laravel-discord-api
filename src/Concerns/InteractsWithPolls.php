<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithPolls
{
    /**
     * Get Answer Voters.
     *
     * Get a list of users that voted for this specific answer.
     *
     * GET /channels/{channel.id}/polls/{message.id}/answers/{answer_id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getAnswerVoters($channelId, $messageId, $answerId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/channels/{$channelId}/polls/{$messageId}/answers/{$answerId}", $query);
    }

    /**
     * End Poll.
     *
     * Immediately ends the poll. You cannot end polls from other users.
     *
     * POST /channels/{channel.id}/polls/{message.id}/expire
     * @return \Illuminate\Http\Client\Response
     */
    public static function endPoll($channelId, $messageId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/channels/{$channelId}/polls/{$messageId}/expire", $data);
    }

}

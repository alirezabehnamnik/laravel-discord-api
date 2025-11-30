<?php

namespace Reysa\DiscordAPI;

use Illuminate\Support\Facades\Http;

class DAPI
{

  /**
   *
   * @param string $guildId
   * @return \Illuminate\Http\Client\Response
   */
  public static function getGuildInvites($guildId) {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->get("https://discord.com/api/guilds/{$guildId}/invites");
    return $response;
  }

  /**
   *
   * @param string $code
   * @return \Illuminate\Http\Client\Response
   */
  public static function deleteGuildInvite($code) {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->delete('https://discord.com/api/invites/'.$code);
    return $response;
  }

  /**
   *
   * @param string $channelId
   * @param string $messageId
   * @return \Illuminate\Http\Client\Response
   */
  public static function getMessage($channelId,$messageId)
  {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->get('https://discord.com/api/channels/'.$channelId.'/messages/'.$messageId);
    return $response;
  }

  /**
   *
   * @param string $userId
   * @return \Illuminate\Http\Client\Response
   */
  public static function getGuildUser($userId)
  {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->get('https://discord.com/api/guilds/'.config('discord-api.guild_id').'/members/'.$userId);
    return $response;
  }

  /**
   *
   * @return \Illuminate\Http\Client\Response
   */
  public static function getGuildRoles()
  {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->get('https://discord.com/api/guilds/'.config('discord-api.guild_id').'/roles');
    return $response;
  }

  /**
   *
   * @param string $userId
   * @param array $roleIds
   * @return \Illuminate\Http\Client\Response
   */
  public static function giveRole($userId,$roleIds)
  {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->put('https://discord.com/api/guilds/'.config('discord-api.guild_id').'/members/'.$userId.'/roles/'.$roleIds);
    return $response;
  }

  /**
   *
   * @param string $userId
   * @param array $roleIds
   * @return \Illuminate\Http\Client\Response
   */
  public static function removeRole($userId,$roleIds)
  {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->delete('https://discord.com/api/guilds/'.config('discord-api.guild_id').'/members/'.$userId.'/roles/'.$roleIds);
    return $response;
  }

  /**
   *
   * @param string $userId
   * @param string $name
   * @return \Illuminate\Http\Client\Response
   */
  public static function setName($userId,$name)
  {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->patch('https://discord.com/api/guilds/'.config('discord-api.guild_id').'/members/'.$userId, [
        'nick' => $name,
    ]);
    return $response;
  }

  /**
   *
   * @param string $userId
   * @param string $message
   * @return \Illuminate\Http\Client\Response|false
   */
  public static function sendMessageToUser($userId,$message)
  {
    $recipient = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->post('https://discord.com/api/users/@me/channels', [
        'recipient_id' => $userId
    ]);
    if (!$recipient->json()) {
      return false;
    }
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->post('https://discord.com/api/channels/'.$recipient->json()['id'].'/messages', [
      'content' => $message
    ]);
    return $response;
  }

  /**
   *
   * @param string $userId
   * @param string $message
   * @return \Illuminate\Http\Client\Response|false
   */
  public static function sendEmbedMessageToUser($userId,$message)
  {
    $recipient = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->post('https://discord.com/api/users/@me/channels', [
        'recipient_id' => $userId
    ]);
    if (!$recipient->json()) {
      return false;
    }
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->post('https://discord.com/api/v9/channels/'.$recipient->json()['id'].'/messages',
      $message
    );
    return $response;
  }

  /**
   *
   * @param string $channelId
   * @param string $message
   * @return \Illuminate\Http\Client\Response
   */
  public static function sendMessageToChannel($channelId,$message)
  {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->post('https://discord.com/api/channels/'.$channelId.'/messages',
      $message
    );
    return $response;
  }

  /**
   *
   * @param string $channelId
   * @param string $messageId
   * @return \Illuminate\Http\Client\Response
   */
  public static function getChannelMessage($channelId,$messageId)
  {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->get('https://discord.com/api/channels/'.$channelId.'/messages/'.$messageId);
    return $response;
  }

  /**
   *
   * @param string $channelId
   * @return \Illuminate\Http\Client\Response
   */
  public static function getChannelMessages($channelId)
  {
    $response = Http::withHeaders([
        'Authorization' => 'Bot '.config('discord-api.bot_token')
    ])->get('https://discord.com/api/channels/'.$channelId.'/messages');
    return $response;
  }

  /**
   *
   * @param string $channelId
   * @param string $messageId
   * @param array $embeds
   * @return \Illuminate\Http\Client\Response
   */
  public static function editChannelEmbedMessage($channelId, $messageId, array $embeds)
  {
    return Http::withHeaders([
      'Authorization' => 'Bot ' . config('discord-api.bot_token'),
    ])->patch(
      'https://discord.com/api/channels/' . $channelId . '/messages/' . $messageId,
      ['embeds' => $embeds]
    );
  }



}

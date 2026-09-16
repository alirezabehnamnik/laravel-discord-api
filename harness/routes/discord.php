<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Reysa\DiscordAPI\Facades\DAPI;

// Auto-generated test-harness routes: one per unique DAPI wrapper call.
// Each route is a thin pass-through so Swagger UI's "Try it out" can exercise
// the real package method against the real Discord API.

Route::get('discord/guilds/{guildId}/invites', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildInvites($guildId, $request->query()))->json());
})->name('discord.getGuildInvites');

Route::delete('discord/invites/{code}', function ($code, Request $request) {
    return response()->json(optional(DAPI::deleteGuildInvite($code))->json());
})->name('discord.deleteGuildInvite');

Route::get('discord/guilds/{guildId}/members/{userId}', function ($userId, Request $request) {
    return response()->json(optional(DAPI::getGuildUser($userId, $request->query()))->json());
})->name('discord.getGuildUser');

Route::get('discord/guilds/{guildId}/roles', function (Request $request) {
    return response()->json(optional(DAPI::getGuildRoles($request->query()))->json());
})->name('discord.getGuildRoles');

Route::put('discord/guilds/{guildId}/members/{userId}/roles', function ($userId, Request $request) {
    return response()->json(optional(DAPI::giveRole($userId, $request->all()))->json());
})->name('discord.giveRole');

Route::delete('discord/guilds/{guildId}/members/{userId}/roles', function ($userId, Request $request) {
    return response()->json(optional(DAPI::removeRole($userId))->json());
})->name('discord.removeRole');

Route::patch('discord/guilds/{guildId}/members/{userId}/nick', function ($userId, Request $request) {
    return response()->json(optional(DAPI::setName($userId, $request->all()))->json());
})->name('discord.setName');

Route::post('discord/users/{userId}/dm', function ($userId, Request $request) {
    return response()->json(optional(DAPI::sendMessageToUser($userId, $request->all()))->json());
})->name('discord.sendMessageToUser');

Route::post('discord/users/{userId}/dm/embed', function ($userId, Request $request) {
    return response()->json(optional(DAPI::sendEmbedMessageToUser($userId, $request->all()))->json());
})->name('discord.sendEmbedMessageToUser');

Route::post('discord/channels/{channelId}/messages', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::sendMessageToChannel($channelId, $request->all()))->json());
})->name('discord.sendMessageToChannel');

Route::get('discord/channels/{channelId}/messages', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::getChannelMessages($channelId, $request->query()))->json());
})->name('discord.getChannelMessages');

Route::get('discord/channels/{channelId}/messages/{messageId}', function ($channelId, $messageId, Request $request) {
    return response()->json(optional(DAPI::getChannelMessage($channelId, $messageId, $request->query()))->json());
})->name('discord.getChannelMessage');

Route::patch('discord/channels/{channelId}/messages/{messageId}/embeds', function ($channelId, $messageId, Request $request) {
    return response()->json(optional(DAPI::editChannelEmbedMessage($channelId, $messageId, $request->all()))->json());
})->name('discord.editChannelEmbedMessage');

Route::get('discord/applications/{applicationId}/commands', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::getGlobalApplicationCommands($applicationId, $request->query()))->json());
})->name('discord.getGlobalApplicationCommands');

Route::post('discord/applications/{applicationId}/commands', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::createGlobalApplicationCommand($applicationId, $request->all()))->json());
})->name('discord.createGlobalApplicationCommand');

Route::get('discord/applications/{applicationId}/commands/{commandId}', function ($applicationId, $commandId, Request $request) {
    return response()->json(optional(DAPI::getGlobalApplicationCommand($applicationId, $commandId, $request->query()))->json());
})->name('discord.getGlobalApplicationCommand');

Route::patch('discord/applications/{applicationId}/commands/{commandId}', function ($applicationId, $commandId, Request $request) {
    return response()->json(optional(DAPI::editGlobalApplicationCommand($applicationId, $commandId, $request->all()))->json());
})->name('discord.editGlobalApplicationCommand');

Route::delete('discord/applications/{applicationId}/commands/{commandId}', function ($applicationId, $commandId, Request $request) {
    return response()->json(optional(DAPI::deleteGlobalApplicationCommand($applicationId, $commandId))->json());
})->name('discord.deleteGlobalApplicationCommand');

Route::put('discord/applications/{applicationId}/commands', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::bulkOverwriteGlobalApplicationCommands($applicationId, $request->all()))->json());
})->name('discord.bulkOverwriteGlobalApplicationCommands');

Route::get('discord/applications/{applicationId}/guilds/{guildId}/commands', function ($applicationId, $guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildApplicationCommands($applicationId, $guildId, $request->query()))->json());
})->name('discord.getGuildApplicationCommands');

Route::post('discord/applications/{applicationId}/guilds/{guildId}/commands', function ($applicationId, $guildId, Request $request) {
    return response()->json(optional(DAPI::createGuildApplicationCommand($applicationId, $guildId, $request->all()))->json());
})->name('discord.createGuildApplicationCommand');

Route::get('discord/applications/{applicationId}/guilds/{guildId}/commands/{commandId}', function ($applicationId, $guildId, $commandId, Request $request) {
    return response()->json(optional(DAPI::getGuildApplicationCommand($applicationId, $guildId, $commandId, $request->query()))->json());
})->name('discord.getGuildApplicationCommand');

Route::patch('discord/applications/{applicationId}/guilds/{guildId}/commands/{commandId}', function ($applicationId, $guildId, $commandId, Request $request) {
    return response()->json(optional(DAPI::editGuildApplicationCommand($applicationId, $guildId, $commandId, $request->all()))->json());
})->name('discord.editGuildApplicationCommand');

Route::delete('discord/applications/{applicationId}/guilds/{guildId}/commands/{commandId}', function ($applicationId, $guildId, $commandId, Request $request) {
    return response()->json(optional(DAPI::deleteGuildApplicationCommand($applicationId, $guildId, $commandId))->json());
})->name('discord.deleteGuildApplicationCommand');

Route::put('discord/applications/{applicationId}/guilds/{guildId}/commands', function ($applicationId, $guildId, Request $request) {
    return response()->json(optional(DAPI::bulkOverwriteGuildApplicationCommands($applicationId, $guildId, $request->all()))->json());
})->name('discord.bulkOverwriteGuildApplicationCommands');

Route::get('discord/applications/{applicationId}/guilds/{guildId}/commands/permissions', function ($applicationId, $guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildApplicationCommandPermissions($applicationId, $guildId, $request->query()))->json());
})->name('discord.getGuildApplicationCommandPermissions');

Route::get('discord/applications/{applicationId}/guilds/{guildId}/commands/{commandId}/permissions', function ($applicationId, $guildId, $commandId, Request $request) {
    return response()->json(optional(DAPI::getApplicationCommandPermissions($applicationId, $guildId, $commandId, $request->query()))->json());
})->name('discord.getApplicationCommandPermissions');

Route::put('discord/applications/{applicationId}/guilds/{guildId}/commands/{commandId}/permissions', function ($applicationId, $guildId, $commandId, Request $request) {
    return response()->json(optional(DAPI::editApplicationCommandPermissions($applicationId, $guildId, $commandId, $request->all()))->json());
})->name('discord.editApplicationCommandPermissions');

Route::put('discord/applications/{applicationId}/guilds/{guildId}/commands/permissions', function ($applicationId, $guildId, Request $request) {
    return response()->json(optional(DAPI::batchEditApplicationCommandPermissions($applicationId, $guildId, $request->all()))->json());
})->name('discord.batchEditApplicationCommandPermissions');

Route::get('discord/applications/@me', function (Request $request) {
    return response()->json(optional(DAPI::getCurrentApplication($request->query()))->json());
})->name('discord.getCurrentApplication');

Route::patch('discord/applications/@me', function (Request $request) {
    return response()->json(optional(DAPI::editCurrentApplication($request->all()))->json());
})->name('discord.editCurrentApplication');

Route::get('discord/applications/{applicationId}/activity-instances/{instanceId}', function ($applicationId, $instanceId, Request $request) {
    return response()->json(optional(DAPI::getApplicationActivityInstance($applicationId, $instanceId, $request->query()))->json());
})->name('discord.getApplicationActivityInstance');

Route::get('discord/guilds/{guildId}/audit-logs', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildAuditLog($guildId, $request->query()))->json());
})->name('discord.getGuildAuditLog');

Route::get('discord/guilds/{guildId}/auto-moderation/rules', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::listAutoModerationRulesForGuild($guildId, $request->query()))->json());
})->name('discord.listAutoModerationRulesForGuild');

Route::get('discord/guilds/{guildId}/auto-moderation/rules/{autoModerationRuleId}', function ($guildId, $autoModerationRuleId, Request $request) {
    return response()->json(optional(DAPI::getAutoModerationRule($guildId, $autoModerationRuleId, $request->query()))->json());
})->name('discord.getAutoModerationRule');

Route::post('discord/guilds/{guildId}/auto-moderation/rules', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::createAutoModerationRule($guildId, $request->all()))->json());
})->name('discord.createAutoModerationRule');

Route::patch('discord/guilds/{guildId}/auto-moderation/rules/{autoModerationRuleId}', function ($guildId, $autoModerationRuleId, Request $request) {
    return response()->json(optional(DAPI::modifyAutoModerationRule($guildId, $autoModerationRuleId, $request->all()))->json());
})->name('discord.modifyAutoModerationRule');

Route::delete('discord/guilds/{guildId}/auto-moderation/rules/{autoModerationRuleId}', function ($guildId, $autoModerationRuleId, Request $request) {
    return response()->json(optional(DAPI::deleteAutoModerationRule($guildId, $autoModerationRuleId))->json());
})->name('discord.deleteAutoModerationRule');

Route::get('discord/channels/{channelId}', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::getChannel($channelId, $request->query()))->json());
})->name('discord.getChannel');

Route::patch('discord/channels/{channelId}', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::modifyChannel($channelId, $request->all()))->json());
})->name('discord.modifyChannel');

Route::put('discord/channels/{channelId}/voice-status', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::setVoiceChannelStatus($channelId, $request->all()))->json());
})->name('discord.setVoiceChannelStatus');

Route::delete('discord/channels/{channelId}', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::deleteCloseChannel($channelId))->json());
})->name('discord.deleteCloseChannel');

Route::put('discord/channels/{channelId}/permissions/{overwriteId}', function ($channelId, $overwriteId, Request $request) {
    return response()->json(optional(DAPI::editChannelPermissions($channelId, $overwriteId, $request->all()))->json());
})->name('discord.editChannelPermissions');

Route::get('discord/channels/{channelId}/invites', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::getChannelInvites($channelId, $request->query()))->json());
})->name('discord.getChannelInvites');

Route::post('discord/channels/{channelId}/invites', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::createChannelInvite($channelId, $request->all()))->json());
})->name('discord.createChannelInvite');

Route::delete('discord/channels/{channelId}/permissions/{overwriteId}', function ($channelId, $overwriteId, Request $request) {
    return response()->json(optional(DAPI::deleteChannelPermission($channelId, $overwriteId))->json());
})->name('discord.deleteChannelPermission');

Route::post('discord/channels/{channelId}/followers', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::followAnnouncementChannel($channelId, $request->all()))->json());
})->name('discord.followAnnouncementChannel');

Route::post('discord/channels/{channelId}/typing', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::triggerTypingIndicator($channelId, $request->all()))->json());
})->name('discord.triggerTypingIndicator');

Route::put('discord/channels/{channelId}/recipients/{userId}', function ($channelId, $userId, Request $request) {
    return response()->json(optional(DAPI::groupDMAddRecipient($channelId, $userId, $request->all()))->json());
})->name('discord.groupDMAddRecipient');

Route::delete('discord/channels/{channelId}/recipients/{userId}', function ($channelId, $userId, Request $request) {
    return response()->json(optional(DAPI::groupDMRemoveRecipient($channelId, $userId))->json());
})->name('discord.groupDMRemoveRecipient');

Route::post('discord/channels/{channelId}/messages/{messageId}/threads', function ($channelId, $messageId, Request $request) {
    return response()->json(optional(DAPI::startThreadFromMessage($channelId, $messageId, $request->all()))->json());
})->name('discord.startThreadFromMessage');

Route::post('discord/channels/{channelId}/threads', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::startThreadWithoutMessage($channelId, $request->all()))->json());
})->name('discord.startThreadWithoutMessage');

Route::put('discord/channels/{channelId}/thread-members/@me', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::joinThread($channelId, $request->all()))->json());
})->name('discord.joinThread');

Route::put('discord/channels/{channelId}/thread-members/{userId}', function ($channelId, $userId, Request $request) {
    return response()->json(optional(DAPI::addThreadMember($channelId, $userId, $request->all()))->json());
})->name('discord.addThreadMember');

Route::delete('discord/channels/{channelId}/thread-members/@me', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::leaveThread($channelId))->json());
})->name('discord.leaveThread');

Route::delete('discord/channels/{channelId}/thread-members/{userId}', function ($channelId, $userId, Request $request) {
    return response()->json(optional(DAPI::removeThreadMember($channelId, $userId))->json());
})->name('discord.removeThreadMember');

Route::get('discord/channels/{channelId}/thread-members/{userId}', function ($channelId, $userId, Request $request) {
    return response()->json(optional(DAPI::getThreadMember($channelId, $userId, $request->query()))->json());
})->name('discord.getThreadMember');

Route::get('discord/channels/{channelId}/thread-members', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::listThreadMembers($channelId, $request->query()))->json());
})->name('discord.listThreadMembers');

Route::get('discord/channels/{channelId}/threads/archived/public', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::listPublicArchivedThreads($channelId, $request->query()))->json());
})->name('discord.listPublicArchivedThreads');

Route::get('discord/channels/{channelId}/threads/archived/private', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::listPrivateArchivedThreads($channelId, $request->query()))->json());
})->name('discord.listPrivateArchivedThreads');

Route::get('discord/channels/{channelId}/users/@me/threads/archived/private', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::listJoinedPrivateArchivedThreads($channelId, $request->query()))->json());
})->name('discord.listJoinedPrivateArchivedThreads');

Route::get('discord/guilds/{guildId}/emojis', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::listGuildEmojis($guildId, $request->query()))->json());
})->name('discord.listGuildEmojis');

Route::get('discord/guilds/{guildId}/emojis/{emojiId}', function ($guildId, $emojiId, Request $request) {
    return response()->json(optional(DAPI::getGuildEmoji($guildId, $emojiId, $request->query()))->json());
})->name('discord.getGuildEmoji');

Route::post('discord/guilds/{guildId}/emojis', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::createGuildEmoji($guildId, $request->all()))->json());
})->name('discord.createGuildEmoji');

Route::patch('discord/guilds/{guildId}/emojis/{emojiId}', function ($guildId, $emojiId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildEmoji($guildId, $emojiId, $request->all()))->json());
})->name('discord.modifyGuildEmoji');

Route::delete('discord/guilds/{guildId}/emojis/{emojiId}', function ($guildId, $emojiId, Request $request) {
    return response()->json(optional(DAPI::deleteGuildEmoji($guildId, $emojiId))->json());
})->name('discord.deleteGuildEmoji');

Route::get('discord/applications/{applicationId}/emojis', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::listApplicationEmojis($applicationId, $request->query()))->json());
})->name('discord.listApplicationEmojis');

Route::get('discord/applications/{applicationId}/emojis/{emojiId}', function ($applicationId, $emojiId, Request $request) {
    return response()->json(optional(DAPI::getApplicationEmoji($applicationId, $emojiId, $request->query()))->json());
})->name('discord.getApplicationEmoji');

Route::post('discord/applications/{applicationId}/emojis', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::createApplicationEmoji($applicationId, $request->all()))->json());
})->name('discord.createApplicationEmoji');

Route::patch('discord/applications/{applicationId}/emojis/{emojiId}', function ($applicationId, $emojiId, Request $request) {
    return response()->json(optional(DAPI::modifyApplicationEmoji($applicationId, $emojiId, $request->all()))->json());
})->name('discord.modifyApplicationEmoji');

Route::delete('discord/applications/{applicationId}/emojis/{emojiId}', function ($applicationId, $emojiId, Request $request) {
    return response()->json(optional(DAPI::deleteApplicationEmoji($applicationId, $emojiId))->json());
})->name('discord.deleteApplicationEmoji');

Route::get('discord/applications/{applicationId}/entitlements', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::listEntitlements($applicationId, $request->query()))->json());
})->name('discord.listEntitlements');

Route::get('discord/applications/{applicationId}/entitlements/{entitlementId}', function ($applicationId, $entitlementId, Request $request) {
    return response()->json(optional(DAPI::getEntitlement($applicationId, $entitlementId, $request->query()))->json());
})->name('discord.getEntitlement');

Route::post('discord/applications/{applicationId}/entitlements/{entitlementId}/consume', function ($applicationId, $entitlementId, Request $request) {
    return response()->json(optional(DAPI::consumeAnEntitlement($applicationId, $entitlementId, $request->all()))->json());
})->name('discord.consumeAnEntitlement');

Route::post('discord/applications/{applicationId}/entitlements', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::createTestEntitlement($applicationId, $request->all()))->json());
})->name('discord.createTestEntitlement');

Route::delete('discord/applications/{applicationId}/entitlements/{entitlementId}', function ($applicationId, $entitlementId, Request $request) {
    return response()->json(optional(DAPI::deleteTestEntitlement($applicationId, $entitlementId))->json());
})->name('discord.deleteTestEntitlement');

Route::get('discord/guilds/{guildId}/scheduled-events', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::listScheduledEventsForGuild($guildId, $request->query()))->json());
})->name('discord.listScheduledEventsForGuild');

Route::post('discord/guilds/{guildId}/scheduled-events', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::createGuildScheduledEvent($guildId, $request->all()))->json());
})->name('discord.createGuildScheduledEvent');

Route::get('discord/guilds/{guildId}/scheduled-events/{guildScheduledEventId}', function ($guildId, $guildScheduledEventId, Request $request) {
    return response()->json(optional(DAPI::getGuildScheduledEvent($guildId, $guildScheduledEventId, $request->query()))->json());
})->name('discord.getGuildScheduledEvent');

Route::patch('discord/guilds/{guildId}/scheduled-events/{guildScheduledEventId}', function ($guildId, $guildScheduledEventId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildScheduledEvent($guildId, $guildScheduledEventId, $request->all()))->json());
})->name('discord.modifyGuildScheduledEvent');

Route::delete('discord/guilds/{guildId}/scheduled-events/{guildScheduledEventId}', function ($guildId, $guildScheduledEventId, Request $request) {
    return response()->json(optional(DAPI::deleteGuildScheduledEvent($guildId, $guildScheduledEventId))->json());
})->name('discord.deleteGuildScheduledEvent');

Route::get('discord/guilds/{guildId}/scheduled-events/{guildScheduledEventId}/users', function ($guildId, $guildScheduledEventId, Request $request) {
    return response()->json(optional(DAPI::getGuildScheduledEventUsers($guildId, $guildScheduledEventId, $request->query()))->json());
})->name('discord.getGuildScheduledEventUsers');

Route::get('discord/guilds/templates/{templateCode}', function ($templateCode, Request $request) {
    return response()->json(optional(DAPI::getGuildTemplate($templateCode, $request->query()))->json());
})->name('discord.getGuildTemplate');

Route::get('discord/guilds/{guildId}/templates', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildTemplates($guildId, $request->query()))->json());
})->name('discord.getGuildTemplates');

Route::post('discord/guilds/{guildId}/templates', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::createGuildTemplate($guildId, $request->all()))->json());
})->name('discord.createGuildTemplate');

Route::put('discord/guilds/{guildId}/templates/{templateCode}', function ($guildId, $templateCode, Request $request) {
    return response()->json(optional(DAPI::syncGuildTemplate($guildId, $templateCode, $request->all()))->json());
})->name('discord.syncGuildTemplate');

Route::patch('discord/guilds/{guildId}/templates/{templateCode}', function ($guildId, $templateCode, Request $request) {
    return response()->json(optional(DAPI::modifyGuildTemplate($guildId, $templateCode, $request->all()))->json());
})->name('discord.modifyGuildTemplate');

Route::delete('discord/guilds/{guildId}/templates/{templateCode}', function ($guildId, $templateCode, Request $request) {
    return response()->json(optional(DAPI::deleteGuildTemplate($guildId, $templateCode))->json());
})->name('discord.deleteGuildTemplate');

Route::get('discord/guilds/{guildId}', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuild($guildId, $request->query()))->json());
})->name('discord.getGuild');

Route::get('discord/guilds/{guildId}/preview', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildPreview($guildId, $request->query()))->json());
})->name('discord.getGuildPreview');

Route::patch('discord/guilds/{guildId}', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::modifyGuild($guildId, $request->all()))->json());
})->name('discord.modifyGuild');

Route::get('discord/guilds/{guildId}/channels', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildChannels($guildId, $request->query()))->json());
})->name('discord.getGuildChannels');

Route::post('discord/guilds/{guildId}/channels', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::createGuildChannel($guildId, $request->all()))->json());
})->name('discord.createGuildChannel');

Route::patch('discord/guilds/{guildId}/channels', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildChannelPositions($guildId, $request->all()))->json());
})->name('discord.modifyGuildChannelPositions');

Route::get('discord/guilds/{guildId}/threads/active', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::listActiveGuildThreads($guildId, $request->query()))->json());
})->name('discord.listActiveGuildThreads');

Route::get('discord/guilds/{guildId}/members', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::listGuildMembers($guildId, $request->query()))->json());
})->name('discord.listGuildMembers');

Route::get('discord/guilds/{guildId}/members/search', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::searchGuildMembers($guildId, $request->query()))->json());
})->name('discord.searchGuildMembers');

Route::put('discord/guilds/{guildId}/members/{userId}', function ($guildId, $userId, Request $request) {
    return response()->json(optional(DAPI::addGuildMember($guildId, $userId, $request->all()))->json());
})->name('discord.addGuildMember');

Route::patch('discord/guilds/{guildId}/members/{userId}', function ($guildId, $userId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildMember($guildId, $userId, $request->all()))->json());
})->name('discord.modifyGuildMember');

Route::patch('discord/guilds/{guildId}/members/@me', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::modifyCurrentMember($guildId, $request->all()))->json());
})->name('discord.modifyCurrentMember');

Route::patch('discord/guilds/{guildId}/members/@me/nick', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::modifyCurrentUserNick($guildId, $request->all()))->json());
})->name('discord.modifyCurrentUserNick');

Route::delete('discord/guilds/{guildId}/members/{userId}', function ($guildId, $userId, Request $request) {
    return response()->json(optional(DAPI::removeGuildMember($guildId, $userId))->json());
})->name('discord.removeGuildMember');

Route::get('discord/guilds/{guildId}/bans', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildBans($guildId, $request->query()))->json());
})->name('discord.getGuildBans');

Route::get('discord/guilds/{guildId}/bans/{userId}', function ($guildId, $userId, Request $request) {
    return response()->json(optional(DAPI::getGuildBan($guildId, $userId, $request->query()))->json());
})->name('discord.getGuildBan');

Route::put('discord/guilds/{guildId}/bans/{userId}', function ($guildId, $userId, Request $request) {
    return response()->json(optional(DAPI::createGuildBan($guildId, $userId, $request->all()))->json());
})->name('discord.createGuildBan');

Route::delete('discord/guilds/{guildId}/bans/{userId}', function ($guildId, $userId, Request $request) {
    return response()->json(optional(DAPI::removeGuildBan($guildId, $userId))->json());
})->name('discord.removeGuildBan');

Route::post('discord/guilds/{guildId}/bulk-ban', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::bulkGuildBan($guildId, $request->all()))->json());
})->name('discord.bulkGuildBan');

Route::get('discord/guilds/{guildId}/roles/{roleId}', function ($guildId, $roleId, Request $request) {
    return response()->json(optional(DAPI::getGuildRole($guildId, $roleId, $request->query()))->json());
})->name('discord.getGuildRole');

Route::get('discord/guilds/{guildId}/roles/member-counts', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildRoleMemberCounts($guildId, $request->query()))->json());
})->name('discord.getGuildRoleMemberCounts');

Route::post('discord/guilds/{guildId}/roles', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::createGuildRole($guildId, $request->all()))->json());
})->name('discord.createGuildRole');

Route::patch('discord/guilds/{guildId}/roles', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildRolePositions($guildId, $request->all()))->json());
})->name('discord.modifyGuildRolePositions');

Route::patch('discord/guilds/{guildId}/roles/{roleId}', function ($guildId, $roleId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildRole($guildId, $roleId, $request->all()))->json());
})->name('discord.modifyGuildRole');

Route::delete('discord/guilds/{guildId}/roles/{roleId}', function ($guildId, $roleId, Request $request) {
    return response()->json(optional(DAPI::deleteGuildRole($guildId, $roleId))->json());
})->name('discord.deleteGuildRole');

Route::get('discord/guilds/{guildId}/prune', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildPruneCount($guildId, $request->query()))->json());
})->name('discord.getGuildPruneCount');

Route::post('discord/guilds/{guildId}/prune', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::beginGuildPrune($guildId, $request->all()))->json());
})->name('discord.beginGuildPrune');

Route::get('discord/guilds/{guildId}/regions', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildVoiceRegions($guildId, $request->query()))->json());
})->name('discord.getGuildVoiceRegions');

Route::get('discord/guilds/{guildId}/integrations', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildIntegrations($guildId, $request->query()))->json());
})->name('discord.getGuildIntegrations');

Route::delete('discord/guilds/{guildId}/integrations/{integrationId}', function ($guildId, $integrationId, Request $request) {
    return response()->json(optional(DAPI::deleteGuildIntegration($guildId, $integrationId))->json());
})->name('discord.deleteGuildIntegration');

Route::get('discord/guilds/{guildId}/widget', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildWidgetSettings($guildId, $request->query()))->json());
})->name('discord.getGuildWidgetSettings');

Route::patch('discord/guilds/{guildId}/widget', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildWidget($guildId, $request->all()))->json());
})->name('discord.modifyGuildWidget');

Route::get('discord/guilds/{guildId}/widget.json', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildWidget($guildId, $request->query()))->json());
})->name('discord.getGuildWidget');

Route::get('discord/guilds/{guildId}/vanity-url', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildVanityURL($guildId, $request->query()))->json());
})->name('discord.getGuildVanityURL');

Route::get('discord/guilds/{guildId}/widget.png', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildWidgetImage($guildId, $request->query()))->json());
})->name('discord.getGuildWidgetImage');

Route::get('discord/guilds/{guildId}/welcome-screen', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildWelcomeScreen($guildId, $request->query()))->json());
})->name('discord.getGuildWelcomeScreen');

Route::patch('discord/guilds/{guildId}/welcome-screen', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildWelcomeScreen($guildId, $request->all()))->json());
})->name('discord.modifyGuildWelcomeScreen');

Route::get('discord/guilds/{guildId}/onboarding', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildOnboarding($guildId, $request->query()))->json());
})->name('discord.getGuildOnboarding');

Route::put('discord/guilds/{guildId}/onboarding', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildOnboarding($guildId, $request->all()))->json());
})->name('discord.modifyGuildOnboarding');

Route::put('discord/guilds/{guildId}/incident-actions', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildIncidentActions($guildId, $request->all()))->json());
})->name('discord.modifyGuildIncidentActions');

Route::get('discord/invites/{inviteCode}', function ($inviteCode, Request $request) {
    return response()->json(optional(DAPI::getInvite($inviteCode, $request->query()))->json());
})->name('discord.getInvite');

Route::get('discord/invites/{inviteCode}/target-users', function ($inviteCode, Request $request) {
    return response()->json(optional(DAPI::getTargetUsers($inviteCode, $request->query()))->json());
})->name('discord.getTargetUsers');

Route::put('discord/invites/{inviteCode}/target-users', function ($inviteCode, Request $request) {
    return response()->json(optional(DAPI::updateTargetUsers($inviteCode, $request->all()))->json());
})->name('discord.updateTargetUsers');

Route::get('discord/invites/{inviteCode}/target-users/job-status', function ($inviteCode, Request $request) {
    return response()->json(optional(DAPI::getTargetUsersJobStatus($inviteCode, $request->query()))->json());
})->name('discord.getTargetUsersJobStatus');

Route::get('discord/guilds/{guildId}/messages/search', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::searchGuildMessages($guildId, $request->query()))->json());
})->name('discord.searchGuildMessages');

Route::post('discord/channels/{channelId}/messages/{messageId}/crosspost', function ($channelId, $messageId, Request $request) {
    return response()->json(optional(DAPI::crosspostMessage($channelId, $messageId, $request->all()))->json());
})->name('discord.crosspostMessage');

Route::put('discord/channels/{channelId}/messages/{messageId}/reactions/{emojiId}/@me', function ($channelId, $messageId, $emojiId, Request $request) {
    return response()->json(optional(DAPI::createReaction($channelId, $messageId, $emojiId, $request->all()))->json());
})->name('discord.createReaction');

Route::delete('discord/channels/{channelId}/messages/{messageId}/reactions/{emojiId}/@me', function ($channelId, $messageId, $emojiId, Request $request) {
    return response()->json(optional(DAPI::deleteOwnReaction($channelId, $messageId, $emojiId))->json());
})->name('discord.deleteOwnReaction');

Route::delete('discord/channels/{channelId}/messages/{messageId}/reactions/{emojiId}/{userId}', function ($channelId, $messageId, $emojiId, $userId, Request $request) {
    return response()->json(optional(DAPI::deleteUserReaction($channelId, $messageId, $emojiId, $userId))->json());
})->name('discord.deleteUserReaction');

Route::get('discord/channels/{channelId}/messages/{messageId}/reactions/{emojiId}', function ($channelId, $messageId, $emojiId, Request $request) {
    return response()->json(optional(DAPI::getReactions($channelId, $messageId, $emojiId, $request->query()))->json());
})->name('discord.getReactions');

Route::delete('discord/channels/{channelId}/messages/{messageId}/reactions', function ($channelId, $messageId, Request $request) {
    return response()->json(optional(DAPI::deleteAllReactions($channelId, $messageId))->json());
})->name('discord.deleteAllReactions');

Route::delete('discord/channels/{channelId}/messages/{messageId}/reactions/{emojiId}', function ($channelId, $messageId, $emojiId, Request $request) {
    return response()->json(optional(DAPI::deleteAllReactionsForEmoji($channelId, $messageId, $emojiId))->json());
})->name('discord.deleteAllReactionsForEmoji');

Route::patch('discord/channels/{channelId}/messages/{messageId}', function ($channelId, $messageId, Request $request) {
    return response()->json(optional(DAPI::editMessage($channelId, $messageId, $request->all()))->json());
})->name('discord.editMessage');

Route::delete('discord/channels/{channelId}/messages/{messageId}', function ($channelId, $messageId, Request $request) {
    return response()->json(optional(DAPI::deleteMessage($channelId, $messageId))->json());
})->name('discord.deleteMessage');

Route::post('discord/channels/{channelId}/messages/bulk-delete', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::bulkDeleteMessages($channelId, $request->all()))->json());
})->name('discord.bulkDeleteMessages');

Route::get('discord/channels/{channelId}/messages/pins', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::getChannelPins($channelId, $request->query()))->json());
})->name('discord.getChannelPins');

Route::put('discord/channels/{channelId}/messages/pins/{messageId}', function ($channelId, $messageId, Request $request) {
    return response()->json(optional(DAPI::pinMessage($channelId, $messageId, $request->all()))->json());
})->name('discord.pinMessage');

Route::delete('discord/channels/{channelId}/messages/pins/{messageId}', function ($channelId, $messageId, Request $request) {
    return response()->json(optional(DAPI::unpinMessage($channelId, $messageId))->json());
})->name('discord.unpinMessage');

Route::get('discord/oauth2/applications/@me', function (Request $request) {
    return response()->json(optional(DAPI::getCurrentBotApplicationInformation($request->query()))->json());
})->name('discord.getCurrentBotApplicationInformation');

Route::get('discord/oauth2/@me', function (Request $request) {
    return response()->json(optional(DAPI::getCurrentAuthorizationInformation($request->query()))->json());
})->name('discord.getCurrentAuthorizationInformation');

Route::get('discord/channels/{channelId}/polls/{messageId}/answers/{answerId}', function ($channelId, $messageId, $answerId, Request $request) {
    return response()->json(optional(DAPI::getAnswerVoters($channelId, $messageId, $answerId, $request->query()))->json());
})->name('discord.getAnswerVoters');

Route::post('discord/channels/{channelId}/polls/{messageId}/expire', function ($channelId, $messageId, Request $request) {
    return response()->json(optional(DAPI::endPoll($channelId, $messageId, $request->all()))->json());
})->name('discord.endPoll');

Route::post('discord/interactions/{interactionId}/{interactionToken}/callback', function ($interactionId, $interactionToken, Request $request) {
    return response()->json(optional(DAPI::createInteractionResponse($interactionId, $interactionToken, $request->all()))->json());
})->name('discord.createInteractionResponse');

Route::get('discord/webhooks/{applicationId}/{interactionToken}/messages/@original', function ($applicationId, $interactionToken, Request $request) {
    return response()->json(optional(DAPI::getOriginalInteractionResponse($applicationId, $interactionToken, $request->query()))->json());
})->name('discord.getOriginalInteractionResponse');

Route::patch('discord/webhooks/{applicationId}/{interactionToken}/messages/@original', function ($applicationId, $interactionToken, Request $request) {
    return response()->json(optional(DAPI::editOriginalInteractionResponse($applicationId, $interactionToken, $request->all()))->json());
})->name('discord.editOriginalInteractionResponse');

Route::delete('discord/webhooks/{applicationId}/{interactionToken}/messages/@original', function ($applicationId, $interactionToken, Request $request) {
    return response()->json(optional(DAPI::deleteOriginalInteractionResponse($applicationId, $interactionToken))->json());
})->name('discord.deleteOriginalInteractionResponse');

Route::post('discord/webhooks/{applicationId}/{interactionToken}', function ($applicationId, $interactionToken, Request $request) {
    return response()->json(optional(DAPI::createFollowupMessage($applicationId, $interactionToken, $request->all()))->json());
})->name('discord.createFollowupMessage');

Route::get('discord/webhooks/{applicationId}/{interactionToken}/messages/{messageId}', function ($applicationId, $interactionToken, $messageId, Request $request) {
    return response()->json(optional(DAPI::getFollowupMessage($applicationId, $interactionToken, $messageId, $request->query()))->json());
})->name('discord.getFollowupMessage');

Route::patch('discord/webhooks/{applicationId}/{interactionToken}/messages/{messageId}', function ($applicationId, $interactionToken, $messageId, Request $request) {
    return response()->json(optional(DAPI::editFollowupMessage($applicationId, $interactionToken, $messageId, $request->all()))->json());
})->name('discord.editFollowupMessage');

Route::delete('discord/webhooks/{applicationId}/{interactionToken}/messages/{messageId}', function ($applicationId, $interactionToken, $messageId, Request $request) {
    return response()->json(optional(DAPI::deleteFollowupMessage($applicationId, $interactionToken, $messageId))->json());
})->name('discord.deleteFollowupMessage');

Route::get('discord/applications/{applicationId}/skus', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::listSKUs($applicationId, $request->query()))->json());
})->name('discord.listSKUs');

Route::post('discord/channels/{channelId}/send-soundboard-sound', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::sendSoundboardSound($channelId, $request->all()))->json());
})->name('discord.sendSoundboardSound');

Route::get('discord/soundboard-default-sounds', function (Request $request) {
    return response()->json(optional(DAPI::listDefaultSoundboardSounds($request->query()))->json());
})->name('discord.listDefaultSoundboardSounds');

Route::get('discord/guilds/{guildId}/soundboard-sounds', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::listGuildSoundboardSounds($guildId, $request->query()))->json());
})->name('discord.listGuildSoundboardSounds');

Route::get('discord/guilds/{guildId}/soundboard-sounds/{soundId}', function ($guildId, $soundId, Request $request) {
    return response()->json(optional(DAPI::getGuildSoundboardSound($guildId, $soundId, $request->query()))->json());
})->name('discord.getGuildSoundboardSound');

Route::post('discord/guilds/{guildId}/soundboard-sounds', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::createGuildSoundboardSound($guildId, $request->all()))->json());
})->name('discord.createGuildSoundboardSound');

Route::patch('discord/guilds/{guildId}/soundboard-sounds/{soundId}', function ($guildId, $soundId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildSoundboardSound($guildId, $soundId, $request->all()))->json());
})->name('discord.modifyGuildSoundboardSound');

Route::delete('discord/guilds/{guildId}/soundboard-sounds/{soundId}', function ($guildId, $soundId, Request $request) {
    return response()->json(optional(DAPI::deleteGuildSoundboardSound($guildId, $soundId))->json());
})->name('discord.deleteGuildSoundboardSound');

Route::post('discord/stage-instances', function (Request $request) {
    return response()->json(optional(DAPI::createStageInstance($request->all()))->json());
})->name('discord.createStageInstance');

Route::get('discord/stage-instances/{channelId}', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::getStageInstance($channelId, $request->query()))->json());
})->name('discord.getStageInstance');

Route::patch('discord/stage-instances/{channelId}', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::modifyStageInstance($channelId, $request->all()))->json());
})->name('discord.modifyStageInstance');

Route::delete('discord/stage-instances/{channelId}', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::deleteStageInstance($channelId))->json());
})->name('discord.deleteStageInstance');

Route::get('discord/stickers/{stickerId}', function ($stickerId, Request $request) {
    return response()->json(optional(DAPI::getSticker($stickerId, $request->query()))->json());
})->name('discord.getSticker');

Route::get('discord/sticker-packs', function (Request $request) {
    return response()->json(optional(DAPI::listStickerPacks($request->query()))->json());
})->name('discord.listStickerPacks');

Route::get('discord/sticker-packs/{packId}', function ($packId, Request $request) {
    return response()->json(optional(DAPI::getStickerPack($packId, $request->query()))->json());
})->name('discord.getStickerPack');

Route::get('discord/guilds/{guildId}/stickers', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::listGuildStickers($guildId, $request->query()))->json());
})->name('discord.listGuildStickers');

Route::get('discord/guilds/{guildId}/stickers/{stickerId}', function ($guildId, $stickerId, Request $request) {
    return response()->json(optional(DAPI::getGuildSticker($guildId, $stickerId, $request->query()))->json());
})->name('discord.getGuildSticker');

Route::post('discord/guilds/{guildId}/stickers', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::createGuildSticker($guildId, $request->all()))->json());
})->name('discord.createGuildSticker');

Route::patch('discord/guilds/{guildId}/stickers/{stickerId}', function ($guildId, $stickerId, Request $request) {
    return response()->json(optional(DAPI::modifyGuildSticker($guildId, $stickerId, $request->all()))->json());
})->name('discord.modifyGuildSticker');

Route::delete('discord/guilds/{guildId}/stickers/{stickerId}', function ($guildId, $stickerId, Request $request) {
    return response()->json(optional(DAPI::deleteGuildSticker($guildId, $stickerId))->json());
})->name('discord.deleteGuildSticker');

Route::get('discord/skus/{skuId}/subscriptions', function ($skuId, Request $request) {
    return response()->json(optional(DAPI::listSKUSubscriptions($skuId, $request->query()))->json());
})->name('discord.listSKUSubscriptions');

Route::get('discord/skus/{skuId}/subscriptions/{subscriptionId}', function ($skuId, $subscriptionId, Request $request) {
    return response()->json(optional(DAPI::getSKUSubscription($skuId, $subscriptionId, $request->query()))->json());
})->name('discord.getSKUSubscription');

Route::get('discord/users/@me', function (Request $request) {
    return response()->json(optional(DAPI::getCurrentUser($request->query()))->json());
})->name('discord.getCurrentUser');

Route::get('discord/users/{userId}', function ($userId, Request $request) {
    return response()->json(optional(DAPI::getUser($userId, $request->query()))->json());
})->name('discord.getUser');

Route::patch('discord/users/@me', function (Request $request) {
    return response()->json(optional(DAPI::modifyCurrentUser($request->all()))->json());
})->name('discord.modifyCurrentUser');

Route::get('discord/users/@me/guilds', function (Request $request) {
    return response()->json(optional(DAPI::getCurrentUserGuilds($request->query()))->json());
})->name('discord.getCurrentUserGuilds');

Route::get('discord/users/@me/guilds/{guildId}/member', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getCurrentUserGuildMember($guildId, $request->query()))->json());
})->name('discord.getCurrentUserGuildMember');

Route::delete('discord/users/@me/guilds/{guildId}', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::leaveGuild($guildId))->json());
})->name('discord.leaveGuild');

Route::post('discord/users/@me/channels', function (Request $request) {
    return response()->json(optional(DAPI::createDM($request->all()))->json());
})->name('discord.createDM');

Route::get('discord/users/@me/connections', function (Request $request) {
    return response()->json(optional(DAPI::getCurrentUserConnections($request->query()))->json());
})->name('discord.getCurrentUserConnections');

Route::get('discord/users/@me/applications/{applicationId}/role-connection', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::getCurrentUserApplicationRoleConnection($applicationId, $request->query()))->json());
})->name('discord.getCurrentUserApplicationRoleConnection');

Route::put('discord/users/@me/applications/{applicationId}/role-connection', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::updateCurrentUserApplicationRoleConnection($applicationId, $request->all()))->json());
})->name('discord.updateCurrentUserApplicationRoleConnection');

Route::delete('discord/users/@me/applications/{applicationId}/role-connection', function ($applicationId, Request $request) {
    return response()->json(optional(DAPI::deleteCurrentUserApplicationRoleConnection($applicationId))->json());
})->name('discord.deleteCurrentUserApplicationRoleConnection');

Route::get('discord/voice/regions', function (Request $request) {
    return response()->json(optional(DAPI::listVoiceRegions($request->query()))->json());
})->name('discord.listVoiceRegions');

Route::get('discord/guilds/{guildId}/voice-states/@me', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getCurrentUserVoiceState($guildId, $request->query()))->json());
})->name('discord.getCurrentUserVoiceState');

Route::get('discord/guilds/{guildId}/voice-states/{userId}', function ($guildId, $userId, Request $request) {
    return response()->json(optional(DAPI::getUserVoiceState($guildId, $userId, $request->query()))->json());
})->name('discord.getUserVoiceState');

Route::patch('discord/guilds/{guildId}/voice-states/@me', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::modifyCurrentUserVoiceState($guildId, $request->all()))->json());
})->name('discord.modifyCurrentUserVoiceState');

Route::patch('discord/guilds/{guildId}/voice-states/{userId}', function ($guildId, $userId, Request $request) {
    return response()->json(optional(DAPI::modifyUserVoiceState($guildId, $userId, $request->all()))->json());
})->name('discord.modifyUserVoiceState');

Route::post('discord/channels/{channelId}/webhooks', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::createWebhook($channelId, $request->all()))->json());
})->name('discord.createWebhook');

Route::get('discord/channels/{channelId}/webhooks', function ($channelId, Request $request) {
    return response()->json(optional(DAPI::getChannelWebhooks($channelId, $request->query()))->json());
})->name('discord.getChannelWebhooks');

Route::get('discord/guilds/{guildId}/webhooks', function ($guildId, Request $request) {
    return response()->json(optional(DAPI::getGuildWebhooks($guildId, $request->query()))->json());
})->name('discord.getGuildWebhooks');

Route::get('discord/webhooks/{webhookId}', function ($webhookId, Request $request) {
    return response()->json(optional(DAPI::getWebhook($webhookId, $request->query()))->json());
})->name('discord.getWebhook');

Route::get('discord/webhooks/{webhookId}/{webhookToken}', function ($webhookId, $webhookToken, Request $request) {
    return response()->json(optional(DAPI::getWebhookWithToken($webhookId, $webhookToken, $request->query()))->json());
})->name('discord.getWebhookWithToken');

Route::patch('discord/webhooks/{webhookId}', function ($webhookId, Request $request) {
    return response()->json(optional(DAPI::modifyWebhook($webhookId, $request->all()))->json());
})->name('discord.modifyWebhook');

Route::patch('discord/webhooks/{webhookId}/{webhookToken}', function ($webhookId, $webhookToken, Request $request) {
    return response()->json(optional(DAPI::modifyWebhookWithToken($webhookId, $webhookToken, $request->all()))->json());
})->name('discord.modifyWebhookWithToken');

Route::delete('discord/webhooks/{webhookId}', function ($webhookId, Request $request) {
    return response()->json(optional(DAPI::deleteWebhook($webhookId))->json());
})->name('discord.deleteWebhook');

Route::delete('discord/webhooks/{webhookId}/{webhookToken}', function ($webhookId, $webhookToken, Request $request) {
    return response()->json(optional(DAPI::deleteWebhookWithToken($webhookId, $webhookToken))->json());
})->name('discord.deleteWebhookWithToken');

Route::post('discord/webhooks/{webhookId}/{webhookToken}', function ($webhookId, $webhookToken, Request $request) {
    return response()->json(optional(DAPI::executeWebhook($webhookId, $webhookToken, $request->all()))->json());
})->name('discord.executeWebhook');

Route::post('discord/webhooks/{webhookId}/{webhookToken}/slack', function ($webhookId, $webhookToken, Request $request) {
    return response()->json(optional(DAPI::executeSlackCompatibleWebhook($webhookId, $webhookToken, $request->all()))->json());
})->name('discord.executeSlackCompatibleWebhook');

Route::post('discord/webhooks/{webhookId}/{webhookToken}/github', function ($webhookId, $webhookToken, Request $request) {
    return response()->json(optional(DAPI::executeGitHubCompatibleWebhook($webhookId, $webhookToken, $request->all()))->json());
})->name('discord.executeGitHubCompatibleWebhook');

Route::get('discord/webhooks/{webhookId}/{webhookToken}/messages/{messageId}', function ($webhookId, $webhookToken, $messageId, Request $request) {
    return response()->json(optional(DAPI::getWebhookMessage($webhookId, $webhookToken, $messageId, $request->query()))->json());
})->name('discord.getWebhookMessage');

Route::patch('discord/webhooks/{webhookId}/{webhookToken}/messages/{messageId}', function ($webhookId, $webhookToken, $messageId, Request $request) {
    return response()->json(optional(DAPI::editWebhookMessage($webhookId, $webhookToken, $messageId, $request->all()))->json());
})->name('discord.editWebhookMessage');

Route::delete('discord/webhooks/{webhookId}/{webhookToken}/messages/{messageId}', function ($webhookId, $webhookToken, $messageId, Request $request) {
    return response()->json(optional(DAPI::deleteWebhookMessage($webhookId, $webhookToken, $messageId))->json());
})->name('discord.deleteWebhookMessage');

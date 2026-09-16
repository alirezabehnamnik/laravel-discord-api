<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithOAuth2
{
    /**
     * Get Current Bot Application Information.
     *
     * Returns the bot's application object.
     *
     * GET /oauth2/applications/@me
     * @return \Illuminate\Http\Client\Response
     */
    public static function getCurrentBotApplicationInformation(array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/oauth2/applications/@me", $query);
    }

    /**
     * Get Current Authorization Information.
     *
     * Returns info about the current authorization. Requires authentication with a bearer token
     * (the user's OAuth2 access token, not the bot token).
     *
     * GET /oauth2/@me
     * @param string $accessToken User OAuth2 bearer access token.
     * @return \Illuminate\Http\Client\Response
     */
    public static function getCurrentAuthorizationInformation($accessToken)
    {
        return \Illuminate\Support\Facades\Http::withToken($accessToken)
            ->get(self::baseUrl() . "/oauth2/@me");
    }

    /**
     * Build the OAuth2 authorization URL a user is redirected to in order to grant scopes.
     *
     * @param array $scopes e.g. ['identify', 'guilds.join']
     * @param string|null $state
     * @return string
     */
    public static function getAuthorizationUrl(array $scopes = [], $state = null)
    {
        $query = http_build_query(array_filter([
            'response_type' => 'code',
            'client_id' => config('discord-api.client_id'),
            'scope' => implode(' ', $scopes),
            'redirect_uri' => config('discord-api.redirect_uri'),
            'state' => $state,
        ]));

        return 'https://discord.com/oauth2/authorize?' . $query;
    }

    /**
     * Exchange Authorization Code.
     *
     * Exchanges an OAuth2 authorization code for an access token/refresh token pair.
     *
     * POST /oauth2/token
     * @param string $code
     * @param string|null $redirectUri Must match the redirect_uri used to obtain the code.
     * @return \Illuminate\Http\Client\Response
     */
    public static function exchangeAuthorizationCode($code, $redirectUri = null)
    {
        return \Illuminate\Support\Facades\Http::asForm()
            ->withBasicAuth(config('discord-api.client_id'), config('discord-api.client_secret'))
            ->post(self::baseUrl() . '/oauth2/token', [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => $redirectUri ?? config('discord-api.redirect_uri'),
            ]);
    }

    /**
     * Refresh Access Token.
     *
     * Exchanges a refresh token for a new access token/refresh token pair.
     *
     * POST /oauth2/token
     * @param string $refreshToken
     * @return \Illuminate\Http\Client\Response
     */
    public static function refreshAccessToken($refreshToken)
    {
        return \Illuminate\Support\Facades\Http::asForm()
            ->withBasicAuth(config('discord-api.client_id'), config('discord-api.client_secret'))
            ->post(self::baseUrl() . '/oauth2/token', [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
            ]);
    }

    /**
     * Revoke Token.
     *
     * Revokes an access token or refresh token.
     *
     * POST /oauth2/token/revoke
     * @param string $token
     * @return \Illuminate\Http\Client\Response
     */
    public static function revokeToken($token)
    {
        return \Illuminate\Support\Facades\Http::asForm()
            ->withBasicAuth(config('discord-api.client_id'), config('discord-api.client_secret'))
            ->post(self::baseUrl() . '/oauth2/token/revoke', [
                'token' => $token,
            ]);
    }

}

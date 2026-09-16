<?php

namespace Reysa\DiscordAPI\Concerns;

trait InteractsWithMonetization
{
    /**
     * List Entitlements.
     *
     * Returns all entitlements for a given app, active and expired.
     *
     * GET /applications/{application.id}/entitlements
     * @return \Illuminate\Http\Client\Response
     */
    public static function listEntitlements($applicationId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/entitlements", $query);
    }

    /**
     * Get Entitlement.
     *
     * Returns an entitlement.
     *
     * GET /applications/{application.id}/entitlements/{entitlement.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getEntitlement($applicationId, $entitlementId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/entitlements/{$entitlementId}", $query);
    }

    /**
     * Consume an Entitlement.
     *
     * For One-Time Purchase consumable SKUs, marks a given entitlement for the user as consumed. The
     * entitlement will have consumed: true when using List Entitlements.
     *
     * POST /applications/{application.id}/entitlements/{entitlement.id}/consume
     * @return \Illuminate\Http\Client\Response
     */
    public static function consumeAnEntitlement($applicationId, $entitlementId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/applications/{$applicationId}/entitlements/{$entitlementId}/consume", $data);
    }

    /**
     * Create Test Entitlement.
     *
     * Creates a test entitlement to a given SKU for a given guild or user. Discord will act as though that
     * user or guild has entitlement to your premium offering.
     *
     * POST /applications/{application.id}/entitlements
     * @return \Illuminate\Http\Client\Response
     */
    public static function createTestEntitlement($applicationId, array $data = [])
    {
        return self::client()->post(self::baseUrl() . "/applications/{$applicationId}/entitlements", $data);
    }

    /**
     * Delete Test Entitlement.
     *
     * Deletes a currently-active test entitlement. Discord will act as though that user or guild _no
     * longer has_ entitlement to your premium offering.
     *
     * DELETE /applications/{application.id}/entitlements/{entitlement.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function deleteTestEntitlement($applicationId, $entitlementId)
    {
        return self::client()->delete(self::baseUrl() . "/applications/{$applicationId}/entitlements/{$entitlementId}");
    }

    /**
     * List SKUs.
     *
     * Returns all SKUs for a given application.
     *
     * GET /applications/{application.id}/skus
     * @return \Illuminate\Http\Client\Response
     */
    public static function listSKUs($applicationId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/applications/{$applicationId}/skus", $query);
    }

    /**
     * List SKU Subscriptions.
     *
     * Returns all subscriptions containing the SKU, filtered by user. Returns a list of subscription
     * objects.
     *
     * GET /skus/{sku.id}/subscriptions
     * @return \Illuminate\Http\Client\Response
     */
    public static function listSKUSubscriptions($skuId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/skus/{$skuId}/subscriptions", $query);
    }

    /**
     * Get SKU Subscription.
     *
     * Get a subscription by its ID. Returns a subscription object.
     *
     * GET /skus/{sku.id}/subscriptions/{subscription.id}
     * @return \Illuminate\Http\Client\Response
     */
    public static function getSKUSubscription($skuId, $subscriptionId, array $query = [])
    {
        return self::client()->get(self::baseUrl() . "/skus/{$skuId}/subscriptions/{$subscriptionId}", $query);
    }

}

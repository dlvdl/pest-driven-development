<?php


use Spatie\WebhookClient\Models\WebhookCall;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\post;
use function Pest\Laravel\postJson;
use function Pest\Laravel\withoutExceptionHandling;

test('stores a paddle purchase request', function () {
    assertDatabaseCount(WebhookCall::class, 0);

    list($signature, $paddleRequestData) = generatePaddleTestData();

    postJson(
        'webhooks',
        $paddleRequestData,
        [
            'paddle-signature' => $signature
        ]);

    assertDatabaseCount(WebhookCall::class, 1);
});

test('does not store invalid paddle purchase request', function () {
    assertDatabaseCount(WebhookCall::class, 0);

    post('webhooks', []);

    assertDatabaseCount(WebhookCall::class, 0);
});


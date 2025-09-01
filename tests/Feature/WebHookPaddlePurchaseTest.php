<?php

use App\Jobs\HandlePaddlePurchaseJob;
use Spatie\WebhookClient\Models\WebhookCall;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\post;
use function Pest\Laravel\postJson;

test('stores a paddle purchase request', function () {
    Queue::fake();
    assertDatabaseCount(WebhookCall::class, 0);

    [$signature, $paddleRequestData] = getValidPaddleRequestData();

    postJson(
        'webhooks',
        $paddleRequestData,
        [
            'paddle-signature' => $signature,
        ]
    );

    assertDatabaseCount(WebhookCall::class, 1);
});

test('does not store invalid paddle purchase request', function () {
    assertDatabaseCount(WebhookCall::class, 0);

    post('webhooks', []);

    assertDatabaseCount(WebhookCall::class, 0);
});

test('dispatches a job for valid paddle request', function () {
    Queue::fake();

    [$signature, $paddleRequestData] = getValidPaddleRequestData();

    postJson(
        'webhooks',
        $paddleRequestData,
        [
            'paddle-signature' => $signature,
        ]
    );

    Queue::assertPushed(HandlePaddlePurchaseJob::class);
});

test('does not dispatch job for invalid paddle request', function () {
    Queue::fake();

    [$signature, $paddleRequestData] = getValidPaddleRequestData();

    postJson(
        'webhooks',
        [],
        [
            'paddle-signature' => $signature,
        ]
    );

    Queue::assertNothingPushed();
});

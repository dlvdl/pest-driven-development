<?php

use App\Jobs\HandlePaddlePurchaseJob;
use App\Models\Course;
use App\Models\PurchasedCourse;
use App\Models\User;
use Spatie\WebhookClient\Models\WebhookCall;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

test('stores paddle purchase', function () {
    Queue::fake();
    assertDatabaseCount(User::class, 0);
    assertDatabaseCount(PurchasedCourse::class, 0);

    $course = Course::factory()->create(['paddle_price_id' => 'pro_01k3jydbjn3t3kayz3jfpcdaen']);
    $webhookCall = WebhookCall::create([
        'name' => 'default',
        'url' => 'some-url',
        'payload' => [
            'email' => 'some-email@example.com',
            'name' => 'Test User',
            'p_product_id' => 'pro_01k3jydbjn3t3kayz3jfpcdaen',
        ],
    ]);

    (new HandlePaddlePurchaseJob($webhookCall))->handle();

    assertDatabaseHas(User::class, [
        'email' => 'some-email@example.com',
        'name' => 'Test User',
    ]);

    $user = User::where('email', 'some-email@example.com')->first();

    assertDatabaseHas(PurchasedCourse::class, [
        'course_id' => $course->id,
        'user_id' => $user->id,
    ]);
});

test('stores paddle purchase for given user', function () {});

test('sends out purchase for given user', function () {});

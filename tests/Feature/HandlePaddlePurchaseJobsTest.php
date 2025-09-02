<?php

use App\Jobs\HandlePaddlePurchaseJob;
use App\Mail\NewPurchaseMail;
use App\Models\Course;
use App\Models\PurchasedCourse;
use App\Models\User;
use Spatie\WebhookClient\Models\WebhookCall;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

test('stores paddle purchase', function () {
    Mail::fake();
    Queue::fake();
    assertDatabaseCount(User::class, 0);
    assertDatabaseCount(PurchasedCourse::class, 0);

    $course = Course::factory()->create(['paddle_price_id' => '178888']);
    $webhookCall = WebhookCall::create([
        'name' => 'default',
        'url' => 'some-url',
        'payload' => [
            'email' => 'some-email@example.com',
            'name' => 'Test User',
            'p_product_id' => '178888',
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

test('stores paddle purchase for given user', function () {
    Mail::fake();
    Queue::fake();
    assertDatabaseCount(User::class, 0);
    assertDatabaseCount(PurchasedCourse::class, 0);

    $user = User::factory()->create(['email' => 'some-email@example.com']);
    $course = Course::factory()->create(['paddle_price_id' => '178888']);
    $webhookCall = WebhookCall::create([
        'name' => 'default',
        'url' => 'some-url',
        'payload' => [
            'email' => 'some-email@example.com',
            'name' => 'Test User',
            'p_product_id' => '178888',
        ],
    ]);

    (new HandlePaddlePurchaseJob($webhookCall))->handle();

    assertDatabaseCount(User::class, 1);

    assertDatabaseHas(User::class, [
        'email' => $user->email,
        'name' => $user->name,
    ]);

    $user = User::where('email', 'some-email@example.com')->first();

    assertDatabaseHas(PurchasedCourse::class, [
        'course_id' => $course->id,
        'user_id' => $user->id,
    ]);
});

test('sends out purchase email for given user', function () {
    Mail::fake();
    $course = Course::factory()->create(['paddle_price_id' => '178888']);
    $webhookCall = WebhookCall::create([
        'name' => 'default',
        'url' => 'some-url',
        'payload' => [
            'email' => 'some-email@example.com',
            'name' => 'Test User',
            'p_product_id' => '178888',
        ],
    ]);

    (new HandlePaddlePurchaseJob($webhookCall))->handle();

    Mail::assertSent(NewPurchaseMail::class);
});

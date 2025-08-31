<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

use App\Models\Course;
use App\Models\User;
use App\Models\Video;

use function Pest\Laravel\actingAs;

pest()->extend(Tests\TestCase::class)
    ->use(Illuminate\Foundation\Testing\LazilyRefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function loginAsUser(?User $user = null): User
{
    $user = $user ?? User::factory()->create();
    actingAs($user);

    return $user;
}

function createCourseAndVideos(int $videosCount = 1): Course
{
    return Course::factory()
        ->has(Video::factory()
            ->count($videosCount)
        )
        ->create();
}

function generatePaddleTestData()
{
    $paddleRequestData = [
        'event_id' => 'ntfsimevt_01k40mmzwh4gmws669b6acsg37',
        'event_type' => 'transaction.created',
        'occurred_at' => '2025-08-31T18:01:23.601258Z',
        'notification_id' => 'ntfsimntf_01k40mn08abgznj70cmtbfpan7',
        'data' => [
            'id' => 'txn_01hv8wptq8987qeep44cyrewp9',
            'items' => [
                [
                    'price' => [
                        'id' => 'pri_01gsz8x8sawmvhz1pv30nge1ke',
                        'name' => 'Monthly (per seat)',
                        'type' => 'standard',
                        'status' => 'active',
                        'quantity' => [
                            'maximum' => 999,
                            'minimum' => 1
                        ],
                        'tax_mode' => 'account_setting',
                        'created_at' => '2023-02-23T13:55:22.538367Z',
                        'product_id' => 'pro_01gsz4t5hdjse780zja8vvr7jg',
                        'unit_price' => [
                            'amount' => '3000',
                            'currency_code' => 'USD'
                        ],
                        'updated_at' => '2024-04-11T13:54:52.254748Z',
                        'custom_data' => null,
                        'description' => 'Monthly',
                        'import_meta' => null,
                        'trial_period' => null,
                        'billing_cycle' => [
                            'interval' => 'month',
                            'frequency' => 1
                        ],
                        'unit_price_overrides' => []
                    ],
                    'quantity' => 10,
                    'proration' => null
                ],
                [
                    'price' => [
                        'id' => 'pri_01h1vjfevh5etwq3rb416a23h2',
                        'name' => 'Monthly (recurring addon)',
                        'type' => 'standard',
                        'status' => 'active',
                        'quantity' => [
                            'maximum' => 100,
                            'minimum' => 1
                        ],
                        'tax_mode' => 'account_setting',
                        'created_at' => '2023-06-01T13:31:12.625056Z',
                        'product_id' => 'pro_01h1vjes1y163xfj1rh1tkfb65',
                        'unit_price' => [
                            'amount' => '10000',
                            'currency_code' => 'USD'
                        ],
                        'updated_at' => '2024-04-09T07:23:00.907834Z',
                        'custom_data' => null,
                        'description' => 'Monthly',
                        'import_meta' => null,
                        'trial_period' => null,
                        'billing_cycle' => [
                            'interval' => 'month',
                            'frequency' => 1
                        ],
                        'unit_price_overrides' => []
                    ],
                    'quantity' => 1,
                    'proration' => null
                ],
                [
                    'price' => [
                        'id' => 'pri_01gsz98e27ak2tyhexptwc58yk',
                        'name' => 'One-time addon',
                        'type' => 'standard',
                        'status' => 'active',
                        'quantity' => [
                            'maximum' => 1,
                            'minimum' => 1
                        ],
                        'tax_mode' => 'account_setting',
                        'created_at' => '2023-02-23T14:01:28.391712Z',
                        'product_id' => 'pro_01gsz97mq9pa4fkyy0wqenepkz',
                        'unit_price' => [
                            'amount' => '19900',
                            'currency_code' => 'USD'
                        ],
                        'updated_at' => '2024-04-09T07:23:10.921392Z',
                        'custom_data' => null,
                        'description' => 'One-time addon',
                        'import_meta' => null,
                        'trial_period' => null,
                        'billing_cycle' => null,
                        'unit_price_overrides' => []
                    ],
                    'quantity' => 1,
                    'proration' => null
                ]
            ],
            'origin' => 'web',
            'status' => 'draft',
            'details' => [
                'totals' => [
                    'fee' => null,
                    'tax' => '5315',
                    'total' => '65215',
                    'credit' => '0',
                    'balance' => '65215',
                    'discount' => '0',
                    'earnings' => null,
                    'subtotal' => '59900',
                    'grand_total' => '65215',
                    'currency_code' => 'USD',
                    'credit_to_balance' => '0'
                ],
                'line_items' => [
                    [
                        'id' => 'txnitm_01hv8wt98jahpbm1t1tzr06z6n',
                        'totals' => [
                            'tax' => '2662',
                            'total' => '32662',
                            'discount' => '0',
                            'subtotal' => '30000'
                        ],
                        'product' => [
                            'id' => 'pro_01gsz4t5hdjse780zja8vvr7jg',
                            'name' => 'AeroEdit Pro',
                            'type' => 'standard',
                            'status' => 'active',
                            'image_url' => 'https://paddle.s3.amazonaws.com/user/165798/bT1XUOJAQhOUxGs83cbk_pro.png',
                            'created_at' => '2023-02-23T12:43:46.605Z',
                            'updated_at' => '2024-04-05T15:53:44.687Z',
                            'custom_data' => [
                                'features' => [
                                    'sso' => false,
                                    'route_planning' => true,
                                    'payment_by_invoice' => false,
                                    'aircraft_performance' => true,
                                    'compliance_monitoring' => true,
                                    'flight_log_management' => true
                                ],
                                'suggested_addons' => [
                                    'pro_01h1vjes1y163xfj1rh1tkfb65',
                                    'pro_01gsz97mq9pa4fkyy0wqenepkz'
                                ],
                                'upgrade_description' => 'Move from Basic to Pro to take advantage of aircraft performance, advanced route planning, and compliance monitoring.'
                            ],
                            'description' => 'Designed for professional pilots, including all features plus in Basic plus compliance monitoring, route optimization, and third-party integrations.',
                            'import_meta' => null,
                            'tax_category' => 'standard'
                        ],
                        'price_id' => 'pri_01gsz8x8sawmvhz1pv30nge1ke',
                        'quantity' => 10,
                        'tax_rate' => '0.08875',
                        'unit_totals' => [
                            'tax' => '266',
                            'total' => '3266',
                            'discount' => '0',
                            'subtotal' => '3000'
                        ]
                    ],
                    [
                        'id' => 'txnitm_01hv8wt98jahpbm1t1v1sd067y',
                        'totals' => [
                            'tax' => '887',
                            'total' => '10887',
                            'discount' => '0',
                            'subtotal' => '10000'
                        ],
                        'product' => [
                            'id' => 'pro_01h1vjes1y163xfj1rh1tkfb65',
                            'name' => 'Analytics addon',
                            'type' => 'standard',
                            'status' => 'active',
                            'image_url' => 'https://paddle.s3.amazonaws.com/user/165798/97dRpA6SXzcE6ekK9CAr_analytics.png',
                            'created_at' => '2023-06-01T13:30:50.302Z',
                            'updated_at' => '2024-04-05T15:47:17.163Z',
                            'custom_data' => null,
                            'description' => 'Unlock advanced insights into your flight data with enhanced analytics and reporting features. Includes customizable reporting templates and trend analysis across flights.',
                            'import_meta' => null,
                            'tax_category' => 'standard'
                        ],
                        'price_id' => 'pri_01h1vjfevh5etwq3rb416a23h2',
                        'quantity' => 1,
                        'tax_rate' => '0.08875',
                        'unit_totals' => [
                            'tax' => '887',
                            'total' => '10887',
                            'discount' => '0',
                            'subtotal' => '10000'
                        ]
                    ],
                    [
                        'id' => 'txnitm_01hv8wt98jahpbm1t1v67vqnb6',
                        'totals' => [
                            'tax' => '1766',
                            'total' => '21666',
                            'discount' => '0',
                            'subtotal' => '19900'
                        ],
                        'product' => [
                            'id' => 'pro_01gsz97mq9pa4fkyy0wqenepkz',
                            'name' => 'Custom domains',
                            'type' => 'standard',
                            'status' => 'active',
                            'image_url' => 'https://paddle.s3.amazonaws.com/user/165798/XIG7UXoJQHmlIAiKcnkA_custom-domains.png',
                            'created_at' => '2023-02-23T14:01:02.441Z',
                            'updated_at' => '2024-04-05T15:43:28.971Z',
                            'custom_data' => null,
                            'description' => 'Make AeroEdit truly your own with custom domains. Custom domains reinforce your brand identity and make it easy for your team to access your account.',
                            'import_meta' => null,
                            'tax_category' => 'standard'
                        ],
                        'price_id' => 'pri_01gsz98e27ak2tyhexptwc58yk',
                        'quantity' => 1,
                        'tax_rate' => '0.08875',
                        'unit_totals' => [
                            'tax' => '1766',
                            'total' => '21666',
                            'discount' => '0',
                            'subtotal' => '19900'
                        ]
                    ]
                ],
                'payout_totals' => null,
                'tax_rates_used' => [
                    [
                        'totals' => [
                            'tax' => '5315',
                            'total' => '65215',
                            'discount' => '0',
                            'subtotal' => '59900'
                        ],
                        'tax_rate' => '0.08875'
                    ]
                ],
                'adjusted_totals' => [
                    'fee' => '0',
                    'tax' => '5315',
                    'total' => '65215',
                    'earnings' => '0',
                    'subtotal' => '59900',
                    'grand_total' => '65215',
                    'currency_code' => 'USD'
                ],
                'adjusted_payout_totals' => null
            ],
            'checkout' => [
                'url' => 'https://aeroedit.com/pay?_ptxn=txn_01hv8wptq8987qeep44cyrewp9'
            ],
            'payments' => [],
            'billed_at' => null,
            'address_id' => null,
            'created_at' => '2025-08-31T18:01:23.597025Z',
            'invoice_id' => null,
            'revised_at' => null,
            'updated_at' => '2025-08-31T18:01:23.597038Z',
            'business_id' => null,
            'custom_data' => null,
            'customer_id' => null,
            'discount_id' => null,
            'currency_code' => 'USD',
            'billing_period' => null,
            'invoice_number' => null,
            'billing_details' => null,
            'collection_mode' => 'automatic',
            'subscription_id' => null
        ]
    ];

    $dateString = "2025-08-31T18:01:23.601258Z";
    $date = new \DateTime($dateString, new DateTimeZone('UTC'));
    $timestamp = $date->getTimestamp();

    $encodedBody = json_encode($paddleRequestData);

    $signedPayload = $timestamp . ':' . $encodedBody;
    $hash = hash_hmac('sha256', $signedPayload, config('services.paddle.notification_secret_key'));

    $signature = "ts={$timestamp};h1={$hash}";

    return [$signature, $paddleRequestData];
}

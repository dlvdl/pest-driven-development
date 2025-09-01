<?php

namespace App\Jobs;

use App\Models\Course;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;

class HandlePaddlePurchaseJob extends SpatieProcessWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $user = User::create([
            'name' => $this->webhookCall->payload['name'],
            'email' => $this->webhookCall->payload['email'],
            'password' => bcrypt(Str::uuid()),
        ]);

        $course = Course::where('paddle_price_id', $this->webhookCall->payload['p_product_id'])->first();
        $user->purchasedCourses()->attach($course);
    }
}

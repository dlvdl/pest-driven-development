<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;


class PaddleSignatureValidator implements SignatureValidator
{

    public function isValid(Request $request, WebhookConfig $config): bool
    {
        return $this->validatePaddleSignature($request);
    }

    private function validatePaddleSignature(Request $request): bool
    {
        $paddleSignature = $request->header('paddle-signature');

        if (empty($paddleSignature)) {
            return false;
        }

        list($timestamp, $signature) = explode(';', $paddleSignature);

        $parsedTimestamp = explode('=', $timestamp)[1];
        $parsedSignature = explode('=', $signature)[1];

        $rawBody = $request->getContent();

        $signedPayload = $parsedTimestamp . ':' . $rawBody;
        $hash = hash_hmac('sha256', $signedPayload, config('services.paddle.notification_secret_key'));

        return $hash === $parsedSignature;
    }
}
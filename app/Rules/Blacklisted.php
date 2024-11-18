<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Blacklisted implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $details = [
            'url' => $attribute,
            'format' => 'json',
        ];

        $response = Http::post(config('fifteen.phishTank'), $details);
        $details = $response->json();

        if (!is_null($details) && $details['in_database']) {
            $fail(':attribute appears in our blacklist');
        }
    }
}

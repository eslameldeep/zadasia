<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SlugRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match('/^[a-zA-Z0-9ء-ي_-]+$/', $value)) {
            $fail('The :attribute field must contain only letters, numbers, underscores (_), hyphens (-), and Arabic characters.');
        }
    }
}

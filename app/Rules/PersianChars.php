<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PersianChars implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match("/^([0-9\-\_ پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژآ])+$/u", $value)) {
            $fail('مقدار فیلد باید فارسی باشد');
        }
    }
}

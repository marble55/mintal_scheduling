<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class YearRange implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Regex for "YYYY-YYYY" format
        if (preg_match('/^(?P<year1>\d{4})-(?P<year2>\d{4})$/', $value, $matches)){    
            $year1 = (int) $matches['year1'];
            $year2 = (int) $matches['year2'];
            
            // Check if year 1 is less than current year
            if($year1 < (Carbon::now()->year-1))
                $fail('The first year must not be less than the current year.');
            // Check if year 2 is less or equals than year 1
            if($year2 <= $year1) 
                $fail('The :attribute second year must be greater than the first year.');
        }else
            $fail('The :attribute must be in the format "YYYY-YYYY".');
    }
}

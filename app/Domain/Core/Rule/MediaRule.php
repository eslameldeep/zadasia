<?php

namespace App\Domain\Core\Rule;

use App\Domain\Core\Models\File;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class MediaRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $inputIds = $value ? explode(',', $value) : [];
                
        if (count($inputIds) != 0 ){
            $validIds = DB::table('media')
            ->whereIn('id',  $inputIds)
            ->where('model_type',  File::class)
            ->pluck('id')
            ->toArray();


            foreach ($inputIds as $id) {
                if (!in_array($id, $validIds)) {
                    $fail("The selected {$attribute} contains invalid ID(s).");
                    break;
                }
            }
        }
       
    }
}

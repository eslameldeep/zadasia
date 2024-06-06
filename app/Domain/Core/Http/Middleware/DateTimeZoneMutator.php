<?php

namespace App\Domain\Core\Http\Middleware ;

use App\Domain\Core\Models\User;
use Auth;
use Cache;
use Carbon\Carbon;
use Closure;

class DateTimeZoneMutator
{

    // TODo::handel user timezone

    public static function mutate($value)
    {


        if (Auth::check()) {

            $expireTime = Carbon::now()->addMinute(1); // keep online for 1 min

            // Cache::put('is_online' . Auth::user()->id, true, $expireTime);

            //Last Seen

            User::where('id', Auth::user()?->id)->update(['last_seen' => Carbon::now()]);

        }

        if (auth()->user()->guest()) {
            $timezone = config('app.timezone');
        }
        else {
            $timezone = auth()->user()->timezone;
        }

        return new Carbon(
            $value, $timezone
        );

    }

}
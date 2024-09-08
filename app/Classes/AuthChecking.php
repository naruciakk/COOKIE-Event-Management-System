<?php

namespace EventTool\Classes;

use Auth;
use EventTool\Prerogative;

class AuthChecking
{
    public static function checkAuth($prerogative) {
        $user = Auth::user();
        if($user->admin == 1) return true;
        else if ($prerogative > 0) {
            $prerogativeSearch = Prerogative::where('user_id', $user->id)->where('pre_id', $prerogative)->count();

            if($prerogativeSearch > 0) return true;
            else return false;
        }

        return false;
    }
}

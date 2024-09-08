<?php

namespace EventTool\Classes;

use Auth;
use EventTool\Rank;

class RankTools
{
    public static function rankColour($givenRank) {
        $rank = Rank::findOrFail($givenRank);

        return $rank->colour;
    }

    public static function rankPayment($givenRank, $paid, $type) {
        $rank = Rank::findOrFail($givenRank);

        if($paid == 0) {
            if($type == 1) return $rank->prepayment;
            if($type == 2) return $rank->payment;
        }
        else return 0;
    }
}

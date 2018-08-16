<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Star;
use Illuminate\Support\Facades\DB;

class Naming extends Model
{
    protected $fillable = ['name'];
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function theme() {
        return $this->belongsTo('App\Theme');
    }

    public function pointOfUser($user_id) {
        $star = Star::where('user_id', $user_id)->where('naming_id', $this->id)->first();
        return empty($star) ? 0 : $star->point;
    }

    public function totalPoint() {
        $result = Star::select(DB::raw('sum(point) as totalPoint'))->where('naming_id', $this->id)->first();
        $totalPoint = $result->totalPoint;
        return $totalPoint ? $totalPoint : 0;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = ['content'];

    public function user() {
        $this->belongsTo('App\User', 'foreign_key');
    }
    //
}

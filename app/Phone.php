<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    public function user() {
        // \App\User
        return $this->belongsTo(User::class);
    }
}

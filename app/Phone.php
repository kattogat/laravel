<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\phone
 *
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
class phone extends Model
{
    public function user() {
        // \App\User
        return $this->belongsTo(User::class);
    }
}

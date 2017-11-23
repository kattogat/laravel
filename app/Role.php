<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Laravel tror nu att det finns en tabell kallad roles
/**
 * App\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @mixin \Eloquent
 */
class Role extends Model
{
    public function users() {
        return $this->belongsToMany(User::class);
    }
}

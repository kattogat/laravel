<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Laravel tror nu att det finns en tabell kallad roles
class Role extends Model
{
    public function users() {
        return $this->belongsToMany(User::class);
    }
}

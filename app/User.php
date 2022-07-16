<?php

namespace App;

use App\Models\Project;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;


class User {

    protected $fillable = [
        'name', 'age', 'gender', 'work', 'language'
    ];
}

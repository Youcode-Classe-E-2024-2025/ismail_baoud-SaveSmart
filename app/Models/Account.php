<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

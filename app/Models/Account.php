<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];
    use softDeletes;
    protected $dates = ['deleted_at'];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

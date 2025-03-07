<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'target',
        'target_date',
        'user_id',
        'account_id',

        ];

    public function users(){
        return $this->belongsTo(User::class);
    }


    public function accounts(){
        return $this->belongsTo(Account::class);
    }
}

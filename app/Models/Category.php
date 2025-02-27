<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $fillable = [
        'name',
        'account_id'
    ];
    use softDeletes;

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

}

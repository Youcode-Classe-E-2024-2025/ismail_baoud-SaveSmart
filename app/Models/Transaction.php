<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transaction extends Model
{
    protected $fillable = [
        'description',
        'type',
        'user_id',
        'amount',
        'account_id',
        'category_id',

    ];
use SoftDeletes;
    protected array $dates = ['deleted_at'];
    protected $table = 'transactions';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function account(){
        return $this->belongsTo(Account::class, 'account_id');
    }


}

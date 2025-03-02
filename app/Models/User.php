<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 *
 */
class User extends Authenticatable
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,softDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'account_id',
        'phone',
        'image',
        'balance',
    ];
    public function account()
    {
        return $this->belongsTo(Account::class);
    }


    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function goals(){
        return $this->hasMany(Goal::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * @return HasMany
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */






}

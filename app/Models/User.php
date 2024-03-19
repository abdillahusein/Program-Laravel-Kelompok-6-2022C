<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class User extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['username', 'password', 'name'];

    public function Contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function Addresses()
    {
        return $this->hasMany(Address::class);
    }
}

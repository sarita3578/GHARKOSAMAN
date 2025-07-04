<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DeliveryPerson extends Authenticatable
{
    use Notifiable;

    protected $guard = 'delivery';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

public function orders()
{
    return $this->hasMany(Order::class, 'delivery_person_id');
}
}
<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Officer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'password', 'level',
    ];

    // Other model methods as needed
}

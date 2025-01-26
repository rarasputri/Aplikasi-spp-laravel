<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{


    use HasFactory;
    protected $guarded = [];
    protected $guard = 'student'; // Set the custom guard

    protected $fillable = [
        'spp_id',
        'classes_id',
        'name',
        'alamat',
        'nis',
        'nisn',
        'no_telp',
        'email',
        'password',
    ];

    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classes_id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'student_id');
    }

}

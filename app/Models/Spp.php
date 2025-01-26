<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $fillable = ['nominal', 'tahun' ];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    use HasFactory;
}

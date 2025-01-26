<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['name', 'major', 'kelas'];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    use HasFactory;
}

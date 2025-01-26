<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primarykey = "payment_id";
    protected $fillable = ['student_id', 'spp_id', 'user_id', 'tgl_bayar', 'bulan_bayar', 'tahun_bayar', 'jumlah_bayar' ];
    public function spp(){
        return $this->belongsTo(Spp::class, 'spp_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
    use HasFactory;
}

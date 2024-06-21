<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_Materi extends Model
{
    use HasFactory;
    protected $table = "t_m_materi";
    protected $fillable = [
        'brand_name', // Tambahkan field lain yang sesuai
        'version_name', // Tambahkan field lain yang sesuai
        'duration', // Tambahkan field lain yang sesuai
        'type_iklan', // Tambahkan field lain yang sesuai
    ];
    public $timestamps = false;

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_SpotType extends Model
{
    use HasFactory;
    protected $table = "t_m_spottype";
    protected $fillable = [
        'username',
        'fullname',
        'posisi',
    ];
    public $timestamps = false;
}

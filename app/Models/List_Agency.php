<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_Agency extends Model
{
    use HasFactory;
    protected $table = "t_m_agencies";
    protected $fillable = [
        'username',
        'fullname',
        'posisi',
    ];
    public $timestamps = false;
}

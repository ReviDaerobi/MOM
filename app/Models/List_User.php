<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'fullname',
        'posisi',
    ];

    protected $table = 'tbluser';

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class List_User extends Authenticatable
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

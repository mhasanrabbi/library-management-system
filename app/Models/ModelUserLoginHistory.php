<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelUserLoginHistory extends Model
{
    use HasFactory;


    protected $fillable = [

        'first_name',
        'email',
        'login_time'

    ];

}

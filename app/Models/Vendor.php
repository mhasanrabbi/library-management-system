<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'website',
        'mobile',
        'email',
        'address',
        'type',
        'spoc_mobile',
        'spoc_email',
        'created_at',
        'updated_at'
    ];
}




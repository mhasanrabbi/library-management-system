<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelUeserGetNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'book_name',
        'book_autor',
        'book_category',
        'from_avaiable'

    ];
}
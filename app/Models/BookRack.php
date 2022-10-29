<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRack extends Model
{
    protected $fillable = array('id', 'rack_name', 'max_capacity', 'available_status');
    use HasFactory;
}

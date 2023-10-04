<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname', 'name', 'last_name',
        'date_of_birth', 'gender', 'phone',
        'city', 'email', 'rating',
        'options', 'comment'
    ];
}

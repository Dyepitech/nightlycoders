<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;
    
    protected $table = 'devis';

    protected $fillable = [
        'email',
        'firstname',
        'lastname',
        'pages',
        'phone',
        'prestation',
        'situation',
        'society',
    ];
}

<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;


    public function category() //? Laravel concat le nom de cette fonction avec _id
    {
        return $this->belongsTo(Category::class);
    }
}

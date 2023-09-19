<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'genre', 'image', 'pages', 'description', 'year', 'price',
    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }
}

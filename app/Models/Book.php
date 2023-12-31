<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'genre', 'image', 'pages', 'description', 'year', 'price', 'author_id', 'uri', 'user_id',
    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}

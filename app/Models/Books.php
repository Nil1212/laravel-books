<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'Title',
        'Author',
        'Description',
        'CoverImage',
        'Publisher',
        'Genre',
        'PageCount',
        'Language',
        'Format',
    ];
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'Genre');
    }
}

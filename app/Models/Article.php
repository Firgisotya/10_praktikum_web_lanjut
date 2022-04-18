<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles_tables';
    protected $fillable = [
        'title',
        'content',
        'featured_image'
    ];
}

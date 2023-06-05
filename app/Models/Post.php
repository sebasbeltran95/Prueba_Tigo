<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function getKeyName(){
        return "id";
    }

    public $fillable = [
        'id',
        'category_id',
        'title',
        'body',
        'author',
        'created_at',
        'updated_at'
    ];
    public function CATEGORIA(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}

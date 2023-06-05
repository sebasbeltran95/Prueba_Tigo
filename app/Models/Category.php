<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    public function getKeyName(){
        return "id";
    }

    public $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
        // allow mass assignment if you need it
    protected $fillable = ['name', 'description', 'cover_url', 'is_active'];

    /**
     * One category has many books.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Book extends Model
{

    use HasFactory;
        // add fillable fields as needed
    protected $fillable = ['title', 'description', 'cover_url', 'is_active', 'original_price', 'selling_price', 'stock_quantity', 'sold_quantity', 'author_id', 'category_id'];

    public function scopeNewBook(Builder $query) {
        return $query ->where('is_active', true)
                ->where('stock_quantity', '>', 0)
                ->orderBy('created_at', 'desc')
                ->limit(4);
    }

    public function scopeFeaturedBook(Builder $query) {
        return $query ->where('is_active', true)
                ->where('stock_quantity', '>', 0)
                ->orderBy('created_at', 'desc')
                ->limit(4);
    }
    /**
     * Book belongs to a single category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author () {
        return $this->belongsTo(Author::class);
    }
}

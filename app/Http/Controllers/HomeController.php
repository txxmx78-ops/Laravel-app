<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        $categories = Category::where('is_active', true)->get();
        $newBooks = Book::newBook()->get();
        $featuredBooks = 
            Book::featuredBook()->get();

        $searchResults = null;
        $searchQuery = $request->get('search');
        if ($searchQuery) {
            $searchResults = Book::with('author', 'category')
                ->where('is_active', true)
                ->where('title', 'like', '%' . $searchQuery . '%')
                ->get();
        }
        return view('welcome', compact('featuredBooks', 'searchResults', 'categories', 'newBooks'));
    }
    public function shop (Request $request) {
        $categories = (array) $request->input('category', []);
        return 'Shop page';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Watch;

class WatchController extends Controller
{
    public function index()
    {
        $watches = Watch::latest()->paginate(12);
        $categoryName = "ALL";
        return view('watches.index', compact('watches', 'categoryName'));
    }

    public function show(Watch $watch)
    {
        return view('watches.show', compact('watch'));
    }

    public function category(string $slug)
    {
        $category = Category::where("name", $slug)->firstOrFail();
        $watches = Watch::where("category_id", $category->id)->paginate(12);
        $categoryName = strtoupper($category->name);

        return view("watches.index", compact("watches", "categoryName"));
    }

    public function search(Request $request)
    {
        $query = trim($request->input('query', ''));

        $watches = Watch::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('search_results', compact('watches', 'query'));
    }
}
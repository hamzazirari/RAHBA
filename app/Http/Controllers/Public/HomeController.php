<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\{Category, Product};
use Illuminate\Http\Request;

class HomeController extends Controller 
{
    public function index(Request $request)
    {
        $categories = Category::all(); 

        $query = Product::query();

        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->paginate(12); // Utilise paginate au lieu de get() pour éviter de surcharger la page

        return view('public.catalog', compact('products', 'categories'));
    }

    public function search(Request $request) 
    {
        // 1. Récupère les catégories aussi ici pour ne pas avoir l'erreur
        $categories = Category::all();

        // 2. Recherche
        $products = Product::where('name', 'like', '%'.$request->query('search').'%')->paginate(12);
        
        // 3. Passe bien les deux variables à la vue
        return view('public.catalog', compact('products', 'categories'));
    }
}
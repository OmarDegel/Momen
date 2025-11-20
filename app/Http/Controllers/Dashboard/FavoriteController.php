<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->setClass('favorites');
    }
    public function index()
    {
        $products = Product::where('parent_id', null)->select('id', 'name')->get()->mapWithKeys(fn($product) => [$product->id => $product->nameLang()])->toArray();
        $users = User::select('id', 'name_first', 'name_last')->get();
        $favorites = Favorite::with('user', 'product')->paginate($this->perPage);
        return view('admin.favorites.index', compact('products', 'users', 'favorites'   ));
    }
}

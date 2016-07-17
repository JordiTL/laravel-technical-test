<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProductListController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application product list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cheapProducts = Product::findCheapProducts();
        $expensiveProducts = Product::findExpensiveProducts();

        return view('pages/home/main')
            ->with('cheapProducts', $cheapProducts)
            ->with('expensiveProducts', $expensiveProducts);
    }
}

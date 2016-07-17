<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
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
     * Wish a product and redirect back.
     *
     * @param integer $productId product id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function wish($productId)
    {
        $product = Product::find($productId);

        if ($product == null) {
            abort(404);
        }

        $product->wish();

        return redirect()->back();
    }

    /**
     * Unwish a product and redirect back.
     *
     * @param integer $productId product id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unwish($productId)
    {
        $product = Product::find($productId);

        if ($product == null) {
            abort(404);
        }

        $product->unwish();
        return redirect()->back();
    }

    /**
     * Toggle wish a product and redirect back.
     *
     * @param integer $productId product id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function togglewish($productId)
    {
        $product = Product::find($productId);

        if ($product == null) {
            abort(404);
        }

        $product->togglewish();
        return redirect()->back();
    }
}

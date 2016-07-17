<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'image',
    ];

    /**
     * Retrieves a product that matches given name.
     *
     * @param string $name the product name
     */
    public static function findByName($name)
    {
        return Product::where('name', $name)->first();
    }

    /**
     * Retrieves a collection of the cheapest products.
     *
     * @param integer $size collection size
     */
    public static function findCheapProducts($size = 10)
    {
        return Product::orderBy('price', 'ASC')->limit($size)->offset(0)->get();
    }

    /**
     * Retrieves a collection of the most expensive products.
     *
     * @param integer $size collection size
     */
    public static function findExpensiveProducts($size = 10)
    {
        return Product::orderBy('price', 'DESC')->limit($size)->offset(0)->get();
    }

    /**
     * Let the user logged in toggle wish status.
     */
    public function toggleWish()
    {
        if ($this->isWished()) {
            return $this->unwish();
        }

        return $this->wish();
    }

    /**
     * Let the user logged in unwish this product.
     */
    public function isWished()
    {
        return !!$this->wishes()->where('user_id', Auth::id())->count();
    }

    /**
     * Get the users that wished this product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     */
    public function wishes()
    {
        return $this->belongsToMany('App\User', 'wishes');
    }

    /**
     * Let the user logged in unwish this product.
     */
    public function unwish()
    {
        $this->wishes()->detach(Auth::id());
    }

    /**
     * Let the user logged in wish this product.
     */
    public function wish()
    {
        $this->wishes()->attach(Auth::id());
    }
}

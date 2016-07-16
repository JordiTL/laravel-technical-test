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
     * Let the user logged in wish this product.
     */
    public function wish()
    {
        $this->wishes()->attach(Auth::id());
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
}

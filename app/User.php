<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the wished product list.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     */
    public function wishes()
    {
        return $this->belongsToMany('App\Product', 'wishes')->withTimestamps();
    }

    /**
     * Wish a specified product for this user.
     *
     * @param Product $product Product to be wished
     */
    public function wish(Product $product)
    {
        $this->wishes()->attach($product);
    }
}

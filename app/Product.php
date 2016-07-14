<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{

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
     * Let the user logged in wish this product.
     */
    public function wish()
    {
        $this->wishes()->attach(Auth::id());
    }
}

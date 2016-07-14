<?php

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersTest extends TestCase{

    use DatabaseMigrations;

    /**
     * @test
     *
     * Test if a user could wish an specified product.
     *
     * @author jtorregrosa
     * @see App\Product
     * @see App\User
     */
    public function a_user_can_wish_a_product(){

        // Given I have a product
        $product = factory(Product::class)->create();

        // and a user
        $user = factory(User::class)->create();

        // when a user wishes a product
        $user->wish($product);

        // then we should see evidence in database, and the product will be wished
        $this->seeInDatabase('wishes', [
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);
    }
}
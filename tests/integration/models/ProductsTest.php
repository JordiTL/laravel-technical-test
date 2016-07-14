<?php

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductsTest extends TestCase{

    use DatabaseMigrations;

    /**
     * @test
     *
     * Test if the system could create a new product.
     *
     * @author jtorregrosa
     * @see App\Product
     */
    public function the_system_can_create_a_product(){

        // Given a product definition
        $product = factory(Product::class)->create();

        // When we want to create a product
        $retrievedProducts = Product::find($product->id);

        // Then we should see evidence in database, and the product will be created
        $this->assertNotNull($retrievedProducts);
        $this->assertEquals($product->id, $retrievedProducts->first()->id);
    }

    /**
     * @test
     *
     * Test if the system could delete an existent product.
     *
     * @author jtorregrosa
     * @see App\Product
     */
    public function the_system_can_delete_a_product(){

        // Given I have a product definition
        $product = factory(Product::class)->create();

        // when we want delete a product
        $product->delete();

        // then we should see evidence in database, and the product will be deleted
        $retrievedProducts = Product::find($product->id);
        $this->assertNull($retrievedProducts);
    }

    /**
     * @test
     *
     * Test if a product could be wished by current logged in user.
     *
     * @author jtorregrosa
     * @see App\Product
     * @see App\User
     */
    public function a_product_can_be_wished(){

        // Given I have two products
        $product = factory(Product::class)->create();

        // and a user
        $user = factory(User::class)->create();

        // and that user is logged in
        $this->actingAs($user);

        // when a product is wished
        $product->wish();

        // then we should see evidence in database, and the product will be wished
        $this->seeInDatabase('wishes', [
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);
    }
}
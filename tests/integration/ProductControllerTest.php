<?php


use App\Product;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductControllerTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @test
     * Test that a user can wish a product via controller.
     */
    public function a_user_can_wish_a_product()
    {
        // Given a user
        $user = factory(User::class, 'random')->create();
        // and a product
        $product = factory(Product::class)->create();

        // When acting as that registered user
        $this->actingAs($user);
        // and wished that product via controller
        $this->action('GET', 'ProductController@wish', ['product' => $product->id]);

        // Then status code is a redirection
        $this->assertResponseStatus(302);

        // and that user wished the product
        $this->assertNotNull($user->wishes()->first());
        $this->assertEquals($product->id, $user->wishes()->first()->id);
    }

    /**
     * @test
     * Test that a user can unwish a product via controller.
     */
    public function a_user_can_unwish_a_product()
    {
        // Given a user
        $user = factory(User::class, 'random')->create();
        // and a product
        $product = factory(Product::class)->create();

        // When acting as that registered user
        $this->actingAs($user);

        // and that user wishes the product
        $product->wish();

        // and we are sure that the product is wished
        $this->assertNotNull($user->wishes()->first());
        $this->assertEquals($product->id, $user->wishes()->first()->id);

        // and unwished that product via controller
        $this->action('GET', 'ProductController@unwish', ['product' => $product->id]);

        // Then status code is a redirection
        $this->assertResponseStatus(302);

        // and that user unwished the product
        $this->assertNull($user->wishes()->first());
    }

    /**
     * @test
     * Test that a user can toggle wish a product via controller.
     */
    public function a_user_can_toggle_wish_a_product()
    {
        // Given a user
        $user = factory(User::class, 'random')->create();
        // and a product
        $product = factory(Product::class)->create();

        // When acting as that registered user
        $this->actingAs($user);

        // and toggle wish that product via controller
        $this->action('GET', 'ProductController@togglewish', ['product' => $product->id]);

        // Then status code is a redirection
        $this->assertResponseStatus(302);

        // and that user wished the product
        $this->assertNotNull($user->wishes()->first());
        $this->assertEquals($product->id, $user->wishes()->first()->id);
    }

    /**
     * @test
     * Test that a user cant wish a nonexistent product via controller.
     */
    public function a_user_cant_wish_an_nonexistent_product()
    {
        // Given a user
        $user = factory(User::class, 'random')->create();

        // When acting as that registered user
        $this->actingAs($user);

        // and toggle wish that product via controller
        $this->action('GET', 'ProductController@wish', ['product' => 99999999999]);

        // Then status code is 404
        $this->assertResponseStatus(404);
    }
    /**
     * @test
     * Test that a user cant wish a nonexistent product via controller.
     */
    public function a_user_cant_unwish_an_nonexistent_product()
    {
        // Given a user
        $user = factory(User::class, 'random')->create();

        // When acting as that registered user
        $this->actingAs($user);

        // and toggle wish that product via controller
        $this->action('GET', 'ProductController@unwish', ['product' => 99999999999]);

        // Then status code is 404
        $this->assertResponseStatus(404);
    }
    /**
     * @test
     * Test that a user cant wish a nonexistent product via controller.
     */
    public function a_user_cant_toggle_wish_an_nonexistent_product()
    {
        // Given a user
        $user = factory(User::class, 'random')->create();

        // When acting as that registered user
        $this->actingAs($user);

        // and toggle wish that product via controller
        $this->action('GET', 'ProductController@togglewish', ['product' => 99999999999]);

        // Then status code is 404
        $this->assertResponseStatus(404);
    }
}

<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_returns_a_view()
    {
        $response = $this->actingAs($this->superAdminUser())->get(
            route('admin.products.index'),
        );

        $response->assertStatus(200);
        $response->assertViewIs('admin.products.index');
    }

    public function test_create_method_returns_a_view()
    {
        $response = $this->actingAs($this->superAdminUser())->get(
            route('admin.products.create'),
        );

        $response->assertStatus(200);
        $response->assertViewIs('admin.products.create');
    }

    public function test_can_create_product_when_optional_fields_are_not_filled()
    {
        $response = $this->actingAs($this->superAdminUser())->post(
            route('admin.products.store'),
            [
                'name' => 'Test Product',
                'description' => 'Test Description',
                'price' => 100,
                'category_id' => Category::factory()->create()->id,
                'track_quantity' => 1,
                'quantity' => 10,
                'sell_out_of_stock' => 1,
                'status' => 'active',
                'sku' => Str::random(10),
                'cost' => '',
                'discounted_price' => '',
            ],
        );

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.products.index'));

        $this->assertCount(1, Product::all());

        $product = Product::first();
        $this->assertEquals(0, $product->cost);
        $this->assertEquals(0, $product->discounted_price);

        $response = $this->actingAs($this->superAdminUser())->post(
            route('admin.products.store'),
            [
                'name' => 'Test Product',
                'description' => 'Test Description',
                'price' => 100,
                'category_id' => Category::factory()->create()->id,
                'track_quantity' => 0,
                'quantity' => null,
                'sell_out_of_stock' => 0,
                'cost' => 10,
                'status' => 'active',
                'sku' => Str::random(10),
            ],
        );

        $response->assertRedirect(route('admin.products.index'));
        $this->assertCount(2, Product::all());

        $product = Product::find(2);
        $this->assertEquals(10, $product->cost);
        $this->assertEquals(0, $product->discounted_price);
        $this->assertEquals(0, $product->quantity);
    }

    public function test_can_update_product_when_optional_fields_are_not_field()
    {
        $product = Product::factory()->create();

        $response = $this->actingAs($this->superAdminUser())->put(
            route('admin.products.update', $product),
            [
                'name' => 'Test Product',
                'description' => 'Test Description',
                'price' => 100,
                'category_id' => Category::factory()->create()->id,
                'track_quantity' => 1,
                'quantity' => 10,
                'sell_out_of_stock' => 1,
                'status' => 'active',
                'sku' => Str::random(10),
                'cost' => '',
                'discounted_price' => '',
            ],
        );

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.products.index'));

        $this->assertCount(1, Product::all());

        $product = Product::first();
        $this->assertEquals(0, $product->cost);
        $this->assertEquals(0, $product->discounted_price);
        //
        //        $response = $this->actingAs($this->superAdminUser())->put(
        //            route('admin.products.update', $product),
        //            [
        //                'name' => 'Test Product 2',
        //                'description' => 'Test Description',
        //                'price' => 100,
        //                'category_id' => Category::factory()->create()->id,
        //                'track_quantity' => 0,
        //                'quantity' => null,
        //                'sell_out_of_stock' => 0,
        //                'cost' => 10,
        //                'status' => 'active',
        //                'sku' => Str::random(10),
        //            ],
        //        );
        //
        //        $response->assertRedirect(route('admin.products.index'));
        //        $this->assertCount(1, Product::all());
        //
        //        $product = Product::first();
        //        $this->assertEquals(10, $product->cost);
        //        $this->assertEquals(0, $product->discounted_price);
        //        $this->assertEquals(0, $product->quantity);
    }
}

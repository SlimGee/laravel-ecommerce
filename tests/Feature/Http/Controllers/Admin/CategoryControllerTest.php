<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_categories_if_user_has_permission(): void
    {
        $user = $this->adminUser();

        $user->givePermissionTo('view all categories');

        $this->actingAs($user)
            ->get(route('admin.categories.index'))
            ->assertStatus(200)
            ->assertSee('Categories')
            ->assertSee('Create Category')
            ->assertViewIs('admin.categories.index')
            ->assertViewHas('categories');
    }

    public function test_cannot_see_all_categories_if_user_is_not_permitted(): void
    {
        $user = $this->adminUser();

        $this->actingAs($user)
            ->get(route('admin.categories.index'))
            ->assertForbidden();
    }

    public function test_can_see_create_category_page_if_user_has_permission(): void
    {
        $user = $this->adminUser();

        $user->givePermissionTo('create category');

        $this->actingAs($user)
            ->get(route('admin.categories.create'))
            ->assertStatus(200)
            ->assertSee('Create Category')
            ->assertViewIs('admin.categories.create');
    }

    public function test_cannot_create_category_if_user_is_not_permitted(): void
    {
        $user = $this->adminUser();

        $this->actingAs($user)
            ->get(route('admin.categories.create'))
            ->assertForbidden();
    }

    public function test_can_persist_category_in_storage_if_user_has_permission(): void
    {
        $user = $this->adminUser();

        $user->givePermissionTo('create category');

        $this->actingAs($user)
            ->post(route('admin.categories.store'), [
                'name' => 'Test Category',
                'description' => 'test category',
                'parent_id' => null,
            ])
            ->assertRedirect(route('admin.categories.index'))
            ->assertSessionHas('success', 'Category created successfully.');
    }

    public function test_cannot_persist_category_in_storage_if_user_not_permitted(): void
    {
        $user = $this->adminUser();

        $this->actingAs($user)
            ->post(route('admin.categories.store'), [
                'name' => 'Test Category',
                'description' => 'test category',
                'parent_id' => null,
            ])
            ->assertForbidden();
    }

    public function test_can_see_edit_category_page_if_user_has_permission(): void
    {
        $user = $this->adminUser();

        $user->givePermissionTo('update category');

        $category = Category::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.categories.edit', $category))
            ->assertStatus(200)
            ->assertSee('Edit Category')
            ->assertViewIs('admin.categories.edit')
            ->assertViewHas('category');
    }

    public function test_can_update_category_if_user_has_permission(): void
    {
        $user = $this->adminUser();

        $user->givePermissionTo('update category');

        $category = Category::factory()->create();

        $this->actingAs($user)
            ->put(route('admin.categories.update', $category), [
                'name' => 'Test Category',
                'description' => 'test category',
                'parent_id' => null,
            ])
            ->assertRedirect(route('admin.categories.index'))
            ->assertSessionHas('success', 'Category updated successfully.');

        $this->assertEquals('Test Category', $category->fresh()->name);
        $this->assertEquals('test category', $category->fresh()->description);
    }

    public function test_can_delete_category_if_user_has_permission(): void
    {
        $user = $this->adminUser();

        $user->givePermissionTo('delete category');

        $category = Category::factory()->create();

        $this->actingAs($user)
            ->delete(route('admin.categories.destroy', $category))
            ->assertRedirect(route('admin.categories.index'))
            ->assertSessionHas('success', 'Category deleted successfully.');

        $this->assertModelMissing($category);
    }

    public function test_cannot_delete_category_if_user_is_not_permitted(): void
    {
        $user = $this->adminUser();

        $category = Category::factory()->create();

        $this->actingAs($user)
            ->delete(route('admin.categories.destroy', $category))
            ->assertForbidden();

        $this->assertModelExists($category);
    }
}

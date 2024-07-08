<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a Category instance can be created.
     *
     * @return void
     */
    public function testCategoryInstanceCanBeCreated()
    {
        $category = Category::factory()->create();

        $this->assertInstanceOf(Category::class, $category);
    }

    /**
     * Test the relationship between Category and News.
     *
     * @return void
     */
    public function testCategoryHasManyNews()
    {
        $category = Category::factory()->create();
        News::factory()->count(3)->create(['id_category' => $category->id]);

        $this->assertCount(3, $category->news);
        $this->assertInstanceOf(News::class, $category->news->first());
    }
}

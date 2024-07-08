<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\News;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a News instance can be created.
     *
     * @return void
     */
    public function testNewsInstanceCanBeCreated()
    {
        $category = Category::factory()->create();
        $news = News::factory()->create(['id_category' => $category->id]);

        $this->assertInstanceOf(News::class, $news);
        $this->assertEquals($category->id, $news->id_category);
    }

    /**
     * Test if the permalink is generated correctly.
     *
     * @return void
     */
    public function testPermalinkIsGeneratedCorrectly()
    {
        $title = 'Sample News Title';
        $news = News::factory()->create(['title' => $title]);

        $this->assertEquals('sample-news-title', $news->slug);
    }

    /**
     * Test the relationship between News and Category.
     *
     * @return void
     */
    public function testNewsBelongsToCategory()
    {
        $category = Category::factory()->create();
        $news = News::factory()->create(['id_category' => $category->id]);

        $this->assertInstanceOf(Category::class, $news->category);
        $this->assertEquals($category->id, $news->category->id);
    }
}

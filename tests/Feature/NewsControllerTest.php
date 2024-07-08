<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Testing\WithFaker;

class NewsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test that the create news form is displayed correctly.
     *
     * @return void
     */
    public function testCreateNewsFormIsDisplayed()
    {
        $response = $this->get(route('news.create'));

        $response->assertStatus(200);
        $response->assertSee('Registrar nova notícia');
        $response->assertSee('Título');
        $response->assertSee('Conteúdo');
        $response->assertSee('Data');
        $response->assertSee('Categoria');
    }

    /**
     * Test that news can be created successfully.
     *
     * @return void
     */
    public function testNewsCanBeCreated()
    {
        $category = Category::factory()->create();

        $formData = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'date' => $this->faker->date('Y-m-d'),
            'id_category' => $category->id,
        ];

        $response = $this->post(route('news.store'), $formData);

        $response->assertStatus(302);
        $response->assertRedirect(route('news.create'));
        $response->assertSessionHas('success', 'Notícia cadastrada com sucesso.');

        $this->assertDatabaseHas('news', ['title' => $formData['title']]);
    }

    /**
     * Test that news cannot be created without a title.
     *
     * @return void
     */
    public function testNewsCannotBeCreatedWithoutTitle()
    {
        $category = Category::factory()->create();

        $formData = [
            'title' => '',
            'content' => $this->faker->paragraph,
            'date' => $this->faker->date('Y-m-d'),
            'id_category' => $category->id,
        ];

        $response = $this->post(route('news.store'), $formData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');

        $this->assertDatabaseMissing('news', ['content' => $formData['content']]);
    }

    /**
     * Test that news cannot be created without content.
     *
     * @return void
     */
    public function testNewsCannotBeCreatedWithoutContent()
    {
        $category = Category::factory()->create();

        $formData = [
            'title' => $this->faker->sentence,
            'content' => '',
            'date' => $this->faker->date('Y-m-d'),
            'id_category' => $category->id,
        ];

        $response = $this->post(route('news.store'), $formData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('content');

        $this->assertDatabaseMissing('news', ['title' => $formData['title']]);
    }

    /**
     * Test that news cannot be created without a date.
     *
     * @return void
     */
    public function testNewsCannotBeCreatedWithoutDate()
    {
        $category = Category::factory()->create();

        $formData = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'date' => '',
            'id_category' => $category->id,
        ];

        $response = $this->post(route('news.store'), $formData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('date');

        $this->assertDatabaseMissing('news', ['title' => $formData['title']]);
    }

    /**
     * Test that news cannot be created without a category.
     *
     * @return void
     */
    public function testNewsCannotBeCreatedWithoutCategory()
    {
        $formData = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'date' => $this->faker->date('Y-m-d'),
            'id_category' => null,
        ];

        $response = $this->post(route('news.store'), $formData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('id_category');

        $this->assertDatabaseMissing('news', ['title' => $formData['title']]);
    }

    /**
     * Test that the search functionality works correctly.
     *
     * @return void
     */
    public function testNewsSearch()
    {
        $categoryTech = Category::factory()->create(['title' => 'Tech']);
        $categorySport = Category::factory()->create(['title' => 'Sport']);
        News::factory()->create([
            'title' => 'Tech News',
            'content' => 'Content of tech news.',
            'date' => '2024-07-08',
            'id_category' => $categoryTech->id,
        ]);

        News::factory()->create([
            'title' => 'Sports News',
            'content' => 'Content of sports news.',
            'date' => '2024-07-08',
            'id_category' => $categorySport->id,
        ]);

        $response = $this->get(route('news.search', ['s' => 'Tech']));

        $response->assertStatus(200);
        $response->assertSee('Tech News');
        $response->assertDontSee('Sports News');
    }
}

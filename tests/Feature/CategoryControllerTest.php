<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test that the create category form is displayed correctly.
     *
     * @return void
     */
    public function testCreateCategoryFormIsDisplayed()
    {
        $response = $this->get(route('category.create'));

        $response->assertStatus(200);
        $response->assertSee('Registrar nova categoria');
        $response->assertSee('Título');
    }

    /**
     * Test that a category can be created successfully.
     *
     * @return void
     */
    public function testCategoryCanBeCreated()
    {
        $formData = [
            'title' => $this->faker->word,
        ];

        $response = $this->post(route('category.store'), $formData);

        $response->assertStatus(302);
        $response->assertRedirect(route('category.create'));
        $response->assertSessionHas('success', 'Categoria cadastrada com sucesso.');

        $this->assertDatabaseHas('categories', ['title' => $formData['title']]);
    }

    /**
     * Test that a category cannot be created without a title.
     *
     * @return void
     */
    public function testCategoryCannotBeCreatedWithoutTitle()
    {
        $formData = [
            'title' => '',
        ];

        $response = $this->post(route('category.store'), $formData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');

        $this->assertDatabaseMissing('categories', ['title' => $formData['title']]);
    }

    /**
     * Test that a category cannot be created with a title longer than 255 characters.
     *
     * @return void
     */
    public function testCategoryCannotBeCreatedWithLongTitle()
    {
        $formData = [
            'title' => str_repeat('a', 256),
        ];

        $response = $this->post(route('category.store'), $formData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');

        $this->assertDatabaseMissing('categories', ['title' => $formData['title']]);
    }
}

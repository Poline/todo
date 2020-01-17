<?php

namespace Todo\Todo\Tests\Integration;

use Tests\TestCase;
use Illuminate\Support\Arr;

class SaveNewCategoryEndPointTest extends TestCase
{
    /** @test */
    public function category_can_be_saved()
    {
        $this->withoutExceptionHandling();

        $newCategoryName = 'first category';

        $this->assertDatabaseMissing('categories', [
            'name' => $newCategoryName,
        ]);

        $response = $this->post(route('category-create', [
            'name' => $newCategoryName,
        ]));

        $response->assertStatus(200);
        $this->assertCount(1, $response->json());

        $newCategory = Arr::get($response->json(), '0');
        $this->assertEquals($newCategoryName, $newCategory['name']);

        $this->assertDatabaseHas('categories', [
            'name' => $newCategoryName,
        ]);
    }
}

<?php

namespace Todo\Todo\Tests\Integration;

use Tests\TestCase;
use Todo\Todo\Model\Category;

class GetCategoriesEndPointTest extends TestCase
{
    /** @test */
    public function get_categories()
    {
        $this->withoutExceptionHandling();

        factory(Category::class)->create();
        factory(Category::class)->create();

        $response = $this->get(route('categories-get'));

        $response->assertStatus(200);

        $data = $response->json()['data'];

        $this->assertCount(2, $data);
    }
}

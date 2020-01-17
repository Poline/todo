<?php

namespace Todo\Todo\Tests\Integration;

use Tests\TestCase;
use Illuminate\Support\Arr;
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
        $this->assertCount(2, $response->json());
    }
}

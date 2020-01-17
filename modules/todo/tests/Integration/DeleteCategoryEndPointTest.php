<?php

namespace Todo\Todo\Tests\Integration;

use Tests\TestCase;
use Illuminate\Support\Arr;
use Todo\Todo\Model\Category;

class DeleteCategoryEndPointTest extends TestCase
{
    /** @test */
    public function get_categories()
    {
        $this->withoutExceptionHandling();

        $category1 = factory(Category::class)->create();
        $categoryId1 = $category1->id;
        $category2 = factory(Category::class)->create();
        $categoryId2 = $category2->id;


        $this->assertDatabaseHas('categories', [
            'id' => $categoryId1,
        ]);

    }
}

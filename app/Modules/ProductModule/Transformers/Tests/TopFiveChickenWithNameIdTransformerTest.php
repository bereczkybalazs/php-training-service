<?php

namespace App\Modules\ProductModule\Transformers\Tests;


use App\Modules\ProductModule\Transformers\TopFiveChickenWithNameIdTransformer;
use PHPUnit\Framework\TestCase;

class TopFiveChickenWithNameIdTransformerTest extends TestCase
{
    private $transformer;

    protected function setUp(): void
    {
        print("setUp RUN");
        // Initialize the transformer
        $this->transformer = new TopFiveChickenWithNameIdTransformer();
    }

    public function testTransform()
    {
        // Sample data for the test
        $topFiveChicken = collect([
            (object)['id' => 1, 'name' => 'Chicken 1'],
            (object)['id' => 2, 'name' => 'Chicken 2'],
            (object)['id' => 3, 'name' => 'Chicken 3'],
            (object)['id' => 4, 'name' => 'Chicken 4'],
            (object)['id' => 5, 'name' => 'Chicken 5'],
        ]);

        // Expected transformed data
        $expected = collect([
            (object)['id' => 1, 'name' => 'Chicken 1', 'name_id' => 'Chicken 11'],
            (object)['id' => 2, 'name' => 'Chicken 2', 'name_id' => 'Chicken 22'],
            (object)['id' => 3, 'name' => 'Chicken 3', 'name_id' => 'Chicken 33'],
            (object)['id' => 4, 'name' => 'Chicken 4', 'name_id' => 'Chicken 44'],
            (object)['id' => 5, 'name' => 'Chicken 5', 'name_id' => 'Chicken 55'],
        ]);

        // Call the transform method
        $result = $this->transformer->transform($topFiveChicken);

        // Asserting the expected result
        $this->assertEquals($expected, $result);
    }

    public function test_helloWorld()
    {
        $this->assertTrue(true);
    }
}

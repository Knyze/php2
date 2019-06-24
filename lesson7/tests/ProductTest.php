<?php

use app\model\Products;


class ProductTest extends \PHPUnit\Framework\TestCase
{
    protected $testClass;
        
    protected function setUp() {
        $this->testClass = new Products('Tea', 'Ceylon', 'img.jpg', 23);
    }
    
    protected function tearDown() {
        $this->testClass = null;
    }
    
    public function testProduct() {
        $this->assertEquals('Tea', $this->testClass->name);
        $this->assertEquals('Ceylon', $this->testClass->description);
        $this->assertEquals('img.jpg', $this->testClass->img);
        $this->assertEquals(23, $this->testClass->price);
    }
    
    /*
    public function testProduct()
    {
        $product = new Products("Чай", "Цейлонский", 23);
        $this->assertEquals("Чай", $product->name);
        $this->assertEquals("Цейлонский", $product->description);

        if (strpos(Models::class, "App\\") === 0)
            if (array_slice(explode("\\", get_class(new Models)), 1, 1) === ["Model"])
                if (substr_count(Models::class, "\\") === 2)
    }
    */

}
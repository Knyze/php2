<?php

use app\model\Products;


class ProductTest extends \PHPUnit\Framework\TestCase
{
    /** 
    * @dataProvider providerModel
    */
    
    public function testProduct($p1, $p2, $p3, $p4) {
        
        $product = new Products($p1, $p2, $p3, $p4);
        $this->assertEquals($p1, $product->name);
        $this->assertEquals($p2, $product->description);
        $this->assertEquals($p3, $product->img);
        $this->assertEquals($p4, $product->price);
    }
    
    public function providerModel ()
    {
        return array (
            array ('Tea', 'Ceylon', 'img.jpg', 23),
            array ('Cofee', 'Brazil', 'img2.jpg', 100)
        ); 
    }

}
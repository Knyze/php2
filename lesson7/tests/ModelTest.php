<?php

use app\model\Products;
use app\model\Cart;
use app\model\Orders;
use app\model\Users;


class ModelTest extends \PHPUnit\Framework\TestCase
{
    protected $testClass;
    
    /** 
    * @dataProvider providerModel
    */
    
    public function testModel($Model)
    {
        
        var_dump(get_class($this->testClass));
        // Что-то я запутался
        // Мы же сверху подключаем через use
        // И тут же проверяем
    }
    
    public function providerModel ()
    {
        return array (
            //array (Products::class),
            //array (Cart::class),
            //array (Orders::class),
            array (Users::class)
        ); 
    }
    
    protected function setUp() {
        $this->testClass = new Products('Tea', 'Ceylon', 'img.jpg', 23);
    }
    
    protected function tearDown() {
        $this->testClass = null;
    }

}
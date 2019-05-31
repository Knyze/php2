<?php

//Задание №5

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

$a1 = new A();
$a2 = new A();
$a1->foo(); // x=1 
$a2->foo(); // x=2
$a1->foo(); // x=3
$a2->foo(); // x=4 x-статичный поэтому при вызове класса постоянно инкреминируется

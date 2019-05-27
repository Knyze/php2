<?php

//Задание №6

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); // x=1 class A
$b1->foo();  // x=1 class B
$a1->foo();  // x=2 class A
$b1->foo(); // x=2 class B

//Задание №7 идентично №6
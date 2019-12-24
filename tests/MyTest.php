<?php

namespace App\tests;


use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
     function testFirst()
    {
        $this->assertTrue(true);
    }

    /**
     * @dataProvider getSumData
     */
    function testSecond($a,$b,$summ)
    {
        $sum = $this->summ($a,$b);
        $this->assertEquals($sum,$summ);
    }
     function getSumData(){
        return[
            [1,2,3],
            [2,2,4],
            [4,4,8]
        ];

    }
    protected function summ($a,$b){
        return $a + $b;

    }
}
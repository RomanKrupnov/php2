<?php


namespace App\tests;
use App\services\UserService;

use PHPUnit\Framework\TestCase;

class authTest extends TestCase
{
    public function testAuth(){
        $user = new UserService();
    }

}
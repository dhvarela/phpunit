<?php

use \PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
       require 'User.php';

       $user = new User();
       $user->first_name = "Rufio";
       $user->surname = "Golliat";

       $this->assertEquals('Rufio Golliat', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();

        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     */
    public function user_has_first_name()
    {
        $user = new User;

        $user->first_name = "Rodrigo";

        $this->assertEquals('Rodrigo', $user->first_name);
    }
}
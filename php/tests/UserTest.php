<?php

use \PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User();
        $user->first_name = 'Rufio';
        $user->surname = 'Golliat';

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

        $user->first_name = 'Rodrigo';

        $this->assertEquals('Rodrigo', $user->first_name);
    }

    public function testNotificationIsSent()
    {
        $user = new User();

        $user->first_name = 'Carlos';
        $user->surname = 'Ortiz';
        $user->email = 'test@testing.com';

        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer
            ->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('test@testing.com'), $this->equalTo('Hello Carlos Ortiz'))
            ->willReturn(true);

        $user->setMailer($mock_mailer);

        $this->assertTrue($user->notify('Hello ' . $user->getFullName()));
    }

}
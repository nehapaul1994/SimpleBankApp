<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testUserRegistration()
    {
        $this->visit('auth/register')
            ->type('bob', 'name')
            ->type('hello1@in.com', 'email')
            ->type('hello1', 'password')
            ->press('register')
            ->seePageIs('/');
    }
}

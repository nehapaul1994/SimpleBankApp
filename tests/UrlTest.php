
//Execute the testcases by each methods 

//For:Ex

//phpunit --filter test_saves_signups


<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UrlTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function test_home_page_links()
    {
        $this->visit('/')
            ->click('REGISTER')
            ->seePageIs('auth/register');
        
        $this->visit('/')
            ->click('LOGIN')
            ->seePageIs('auth/login');
       
    }
    
    public function test_signup()
    {
        $this->visit('/auth/register')
            ->type('test', 'name')
            ->type('me@me.com','email')
            ->type('abcde','password')
            ->press('register')
            ->seePageIs('/auth/register');
    }
    
    public function test_login()
    {
        $this->visit('/auth/login')
            ->submitForm('login', ['email' => 'me@me.com', 'password' => 'secret'])
            ->seePageIs('/auth/login');
    }
    
    public function test_saves_signups()
    {
        $this->visit('/auth/register')
            ->type('lolly', 'name')
            ->type('lol@gmail.com','email')
            ->press('register')
            ->seeInDatabase('users', ['name'=>'lolly','email'=>'lol@gmail.com']);
    }
    
}

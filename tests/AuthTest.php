<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_reg_success()
    {
        $this->post('/register', ['name' => 'admin123', 'email' => 'email@mail.ru', 'password' => '123123', 'password_confirmation' => '123123'])
            ->dontSeeIsAuthenticated();

    }

    public function test_reg_fail()
    {
        $this->post('/register', ['name' => 'admin123', 'email' => 'email@mail.ru', 'password' => '123123', 'password_confirmation' => '321321'])
            ->seeIsAuthenticated();
    }

    public function test_login_success()
    {
        $this->post('/login', ['email' => 'denis70@gmail.com', 'password' => '123123'])
            ->dontSeeIsAuthenticated();
    }

    public function test_login_fail()
    {
        $this->post('/login', ['email' => 'denis70@gmail.com', 'password' => '321321'])
            ->dontSeeIsAuthenticated();
    }


}

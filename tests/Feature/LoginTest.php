<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_home_before_login() {
        $homeResponse = $this->get('/home');

        $homeResponse->assertStatus(302);
    }

    public function test_home_after_login() {
        $loginResponse = $this->post('login', ['identifier' => 'krkr', 'password' => '123456789']); // login

        $homeResponse = $this->get('/home');

        $homeResponse->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_register_link()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_register_step_one_input_valid_email() {
        $response = $this->post('/register', ['email' => 'test@test.com']);

        $response->assertStatus(302);
        $response->assertLocation('/register2');

        // $response->assertRedirect('/register2')
    }

    public function test_register_step_one_input_invalid_email() {
        $response = $this->post('/register', ['email' => 'blabla@blabla.blabla']);

        $response->assertStatus(302);
        $response->assertLocation('');
    }

    public function test_resigter_step_two_link() {
        $response = $this->get('/register2');

        $response->assertStatus(404);
    }

    // public function test_resigter_step_two_link_with_user() {
    //     $response = $this->withSession(['user' => User::find(54)])->get('/register2');

    //     $response->assertStatus(200);
    // }

    // public function test_resigter_step_two_submit() {
    //     $response = $this->post('/register2/54', [
    //         'fname' => 'blabla',
    //         'lname' => 'blabla',
    //         'username' => 'test2test',
    //         'password' => '123456789',
    //         'password_confirmation' => '123456789',
    //         'phone' => '01063620757',
    //         'address' => 'gojasdpgj',
    //         'national_id' => '12345678912345'
    //     ]);

    //     $response->assertStatus(302);
    //     $response->assertLocation('/home');
    // }
}

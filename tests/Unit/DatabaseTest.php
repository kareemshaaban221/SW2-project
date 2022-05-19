<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_manager_kareem()
    {
        $this->assertDatabaseHas('users', [
            'fname' => 'Kareem'
        ]);
    }
}

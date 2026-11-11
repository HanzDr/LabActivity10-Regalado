<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_home_redirects_to_posts(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect('/posts');
    }
}

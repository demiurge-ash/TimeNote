<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testRoutes()
    {
        $urls = [
            '/',
            '/about',
            '/form'
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
            $response->assertSee('TimeNote');
        }

    }
}

<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic unit show form.
     *
     * @return void
     */
    public function test_show_form()
    {
        $response = $this->get('affiliates');
        $response->assertStatus(200);
    }

    /**
     * A basic unit search form.
     *
     * @return void
     */
    public function test_search_form()
    {
        $distance = 1;
        $response = $this->get("affiliates/$distance");
        $response->assertStatus(200);
    }

    /**
     * A basic unit home form.
     *
     * @return void
     */
    public function test_home_form()
    {
        $response = $this->get('');
        $response->assertStatus(200);
    }

    /**
     * A basic unit file form.
     *
     * @return void
     */
    public function test_file_form()
    {
        $response = $this->get('files/read');
        $response->assertStatus(200);
    }

    /**
     * A basic unit about form.
     *
     * @return void
     */
    public function test_about_form()
    {
        $response = $this->get('about');
        $response->assertStatus(200);
    }

    public function testRouteWithParameter()
    {
        $request = new Request([], [], [], [], [], ['REQUEST_URI' => 'affiliates/100']);

        $request->setRouteResolver(function () use ($request) {
            return (new Route('GET', 'affiliates/{distance}', []))->bind($request);
        });

        $this->assertEquals('100', $request->route()->parameter('distance'));
    }
}
